<?php
/* Template Name: Signup Page */

// 🟢 Move this before any output happens
include get_template_directory() . '/templates/signup-handler.php';

get_header();
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/signup.css">

<div class="signup-container">
    <h2>Create an Account</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="wp_signup" value="Sign Up">
    </form>

    <?php if (!empty($signup_message)): ?>
        <p style="color:red;"><?php echo esc_html($signup_message); ?></p>
    <?php endif; ?>

    <p>Already have an account? <a href="<?php echo home_url('/index.php/login'); ?>">Login here</a></p>
</div>
