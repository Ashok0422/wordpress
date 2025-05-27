<?php
/* Template Name: Dashboard Page */

// Optional: redirect if not logged in
if (!is_user_logged_in()) {
echo "user,,,,,,,,,,";
    wp_redirect(home_url('/index.php/login'));
    exit;
}

get_header();
?>


<style>
    body {
        background: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .dashboard-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 30px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.05);
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .dashboard-header h2 {
        color: #333;
        font-size: 28px;
        margin: 0;
    }

    .dashboard-section {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 20px;
    }

    .card {
        background: #f1f3f5;
        padding: 20px;
        flex: 1 1 calc(33% - 20px);
        min-width: 250px;
        border-radius: 8px;
        box-shadow: 0 1px 5px rgba(0,0,0,0.05);
        transition: background 0.3s;
    }

    .card:hover {
        background: #e2e6ea;
    }

    .card h3 {
        margin-top: 0;
        font-size: 20px;
    }

    .logout-link {
        display: block;
        text-align: right;
        margin-top: 20px;
    }

    .logout-link a {
        color: #d9534f;
        text-decoration: none;
        font-weight: bold;
    }

    .logout-link a:hover {
        text-decoration: underline;
    }
</style>


<h2>Welcome to your dashboard, <?php echo wp_get_current_user()->user_login; ?>!</h2>

<p><a href="<?php echo wp_logout_url(home_url('/index.php/login')); ?>">Logout</a></p>




<?php get_footer(); ?>
