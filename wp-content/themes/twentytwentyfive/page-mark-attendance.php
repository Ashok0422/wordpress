<?php
/* Template Name: Mark Attendance Page */
get_header();

if (!is_user_logged_in()) {
    echo '<p>Please <a href="' . wp_login_url() . '">login</a> to mark your attendance.</p>';
    get_footer();
    exit;
}

global $wpdb;
$current_user = wp_get_current_user();
$message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mark_attendance'])) {
    $user_id = get_current_user_id();
    $today = current_time('Y-m-d');

    // Check if already marked
    $existing = $wpdb->get_var(
        $wpdb->prepare(
            "SELECT COUNT(*) FROM {$wpdb->prefix}attendance WHERE user_id = %d AND date = %s",
            $user_id,
            $today
        )
    );

    if ($existing) {
        $message = '<p class="error">Attendance already marked for today.</p>';
    } else {
        $inserted = $wpdb->insert(
            "{$wpdb->prefix}attendance",
            [
                'user_id' => $user_id,
                'date' => $today,
                'status' => 'present',
            ],
            ['%d', '%s', '%s']
        );

        if ($inserted) {
            $message = '<p class="success">Attendance marked successfully for today!</p>';
        } else {
            $message = '<p class="error">Something went wrong. Please try again.</p>';
        }
    }
}
?>

<style>
    .attendance-container { max-width: 600px; margin: auto; text-align: center; padding: 20px; }
    .success { color: green; }
    .error { color: red; }
    button { padding: 10px 20px; font-size: 16px; }
</style>

<div class="attendance-container">
    <h2>Hello, <?php echo esc_html($current_user->display_name); ?></h2>
    <p>Click below to mark your attendance for <strong><?php echo date('F j, Y'); ?></strong>.</p>

    <?php echo $message; ?>

    <form method="post">
        <input type="hidden" name="mark_attendance" value="1">
        <button type="submit">Mark Attendance</button>
    </form>
</div>

<?php get_footer(); ?>
