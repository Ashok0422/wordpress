<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wp_login'])) {
    $input = sanitize_text_field($_POST['username']);
    $password_input = $_POST['password'];

    $env = getenv('APP_ENV') ?: 'dev';

    $db_config_path = dirname(dirname(dirname(dirname(__DIR__)))) . "/db.$env.php";
    if (!file_exists($db_config_path)) {
        die("Invalid environment or missing DB config.");
    }

    $db_config = include $db_config_path;

    global $wpdb;
    $conn = new wpdb(
        $db_config['username'],
        $db_config['password'],
        $db_config['database'],
        $db_config['host']
    );

    $user = $conn->get_row(
        $conn->prepare(
            "SELECT * FROM wp_users WHERE user_login = %s OR user_email = %s",
            $input, $input
        )
    );

    if ($user && isset($user->password) && wp_check_password($password_input, $user->password)) {

        // 2FA check
        $api_url = "https://your-2fa-api.com/verify";

        $post_fields = json_encode([
            'username' => $user->user_login,
            'password' => $password_input
        ]);

        $ch = curl_init($api_url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post_fields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Content-Length: ' . strlen($post_fields)
            ]
        ]);

        curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($http_code === 200) {
            $wp_user = get_user_by('login', $user->user_login);
            if ($wp_user) {
                wp_set_current_user($wp_user->ID);
                wp_set_auth_cookie($wp_user->ID);
                wp_redirect(home_url('/index.php/dashboard'));
                exit;
            } else {
                echo "<p style='color:green;'>Logged in from external DB (not WP user).</p>";
            }
        } else {
            echo "<p style='color:red;'>2FA failed. HTTP status code: $http_code</p>";
        }
    } else {
        echo "<p style='color:red;'>Invalid username or password.</p>";
    }
}
?>
