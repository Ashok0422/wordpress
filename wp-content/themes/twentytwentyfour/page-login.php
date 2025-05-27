<?php
/* Template Name: Login Page */
get_header();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wp_login'])) {
    $creds = array(
        'user_login'    => $_POST['username'],
        'user_password' => $_POST['password'],
        'remember'      => true
    );

    $user = wp_signon($creds, false);

    if (is_wp_error($user)) {
        echo "<p style='color:red;'>Login failed: " . $user->get_error_message() . "</p>";
    } else {
        wp_redirect(home_url()); // Redirect to homepage after login
        exit;
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="wp_login" value="Login">
</form>

<?php get_footer(); ?>
