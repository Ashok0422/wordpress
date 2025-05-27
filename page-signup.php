<?php
/* Template Name: Signup Page */
get_header();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wp_signup'])) {
    $username = sanitize_user($_POST['username']);
    $password = $_POST['password'];
    $email = sanitize_email($_POST['email']);

    $error = new WP_Error();

    if (username_exists($username) || email_exists($email)) {
        $error->add('user_exists', 'Username or Email already exists.');
    }

    if (empty($username) || empty($password) || empty($email)) {
        $error->add('empty_fields', 'All fields are required.');
    }

    if (!is_email($email)) {
        $error->add('invalid_email', 'Invalid email address.');
    }

    if (empty($error->errors)) {
        $user_id = wp_create_user($username, $password, $email);
        echo "<p>User registered successfully!</p>";
    } else {
        foreach ($error->get_error_messages() as $message) {
            echo "<p style='color:red;'>$message</p>";
        }
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="wp_signup" value="Sign Up">
</form>

<?php get_footer(); ?>
