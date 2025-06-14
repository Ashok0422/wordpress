<?php

/* Template Name: Profile Page */
/*
get_header();

if (is_user_logged_in()) {
    $current_user = wp_get_current_user();
    ?>

    <div class="profile-container">
        <h2>Welcome, <?php echo esc_html($current_user->display_name); ?>!</h2>
        <p>Email: <?php echo esc_html($current_user->user_email); ?></p>
        <p>Username: <?php echo esc_html($current_user->user_login); ?></p>
        <!-- Add form to update profile info if needed -->
    </div>

    <?php
} else {
    echo '<p>You must be logged in to view this page. <a href="' . home_url('/index.php/login') . '">Login</a></p>';
}

get_footer();
?>
 */



/* Template Name: Profile Page */
get_header();
$current_user = wp_get_current_user();
$user_roles = $current_user->roles;
?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/profile.css">



<div class="profile-container">
    <h2>Welcome, <?php echo esc_html($current_user->display_name); ?></h2>

    <div class="profile-container">
        <p>Email: <?php echo esc_html($current_user->user_email); ?></p>
        <p>Username: <?php echo esc_html($current_user->user_login); ?></p>
        <!-- Add form to update profile info if needed -->
    </div>

    <?php if (in_array('administrator', $user_roles)) : ?>
        <div class="admin-section">
            <h3>Admin Panel</h3>
            <a href="<?php echo site_url('/index.php/add-new-user'); ?>" class="btn">Add New User</a>
        </div>

    <?php elseif (in_array('content_creator', $user_roles)) : ?>
        <div class="creator-section">
            <h3>Content Creator Panel</h3>
            <a href="<?php echo site_url('/add-video'); ?>" class="btn">Add New Video</a>
        </div>

    
    <?php endif; ?>
</div>

<?php get_footer(); ?>
