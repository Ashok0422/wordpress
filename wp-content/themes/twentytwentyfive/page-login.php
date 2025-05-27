<?php
/* Template Name: Login Page */
get_header();
include get_template_directory() . '/templates/login-handler.php';
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/login.css">

<div class="login-container">
    <form method="post">
        <input type="text" name="username" placeholder="Username or Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="wp_login" value="Login">
    </form>
    <p><a href="<?php echo wp_lostpassword_url(); ?>">Forgot your password?</a></p>
    <p>New user? <a href="<?php echo home_url('/index.php/signup'); ?>">Signup here</a></p>
</div>

<?php get_footer(); ?>
