<?php
/* Template Name: Signup Page */

$signup_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['wp_signup'])) {
    $username = sanitize_user($_POST['username']);
    $email = sanitize_email($_POST['email']);
    $password_raw = $_POST['password'];

    if (!username_exists($username) && !email_exists($email)) {
        $user_id = wp_create_user($username, $password_raw, $email);
        wp_redirect(home_url('/index.php/login'));
        exit;
    } else {
        $signup_message = 'Signup failed: Username or email already exists.';
    }
}

