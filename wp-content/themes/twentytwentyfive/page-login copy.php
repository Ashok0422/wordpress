<?php
/* Template Name: Login Page */


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wp_login'])) {
    $input = sanitize_text_field($_POST['username']);
    $password_input = $_POST['password'];

    // MySQL connection details
    $db_servername = "localhost";
    $db_username = "root";  // Default MySQL username
    $db_password = "";      // Default MySQL password (empty for local server)
    $dbname = "wordpress_db_custom";  // The name of your database

    // Create connection
    $conn = new wpdb($db_servername, $db_username, $db_password, $dbname);
    
   echo "connection established/...";
    // Look up user by username or email
    $user = $conn->get_row(
        $conn->prepare(
            "SELECT * FROM external_users WHERE username = %s OR email = %s",
            $input, $input
        )
    );
	

	
   echo "extracted crews.....";
print_r($user);



    if ($user && wp_check_password($password_input, $user->password)) {
        // ✅ Authenticated!
	echo "<p style='color:green;'>Login successful!</p>";

        // OPTIONAL: log them into WordPress (if user exists)
        $wp_user = get_user_by('login', $user->username);

        if ($wp_user) {
            wp_set_current_user($wp_user->ID);
            wp_set_auth_cookie($wp_user->ID);
            wp_redirect(home_url()); // or dashboard
            exit;
        } else {
            echo "<p style='color:green;'>Logged in from external DB (not WP user).</p>";
            // You can start a custom session or handle differently
        }
    } else {
        echo "<p style='color:red;'>Invalid username or password.</p>";
    }
}
get_header();
?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="wp_login" value="Login">
</form>
<p>New user? <a href="<?php echo home_url('/index.php/signup'); ?>">Signup here</a></p>

<?php get_footer(); ?>
