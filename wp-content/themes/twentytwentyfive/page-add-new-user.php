<?php
/* Template Name: Add New User */
get_header();

?>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/profile.css">


<div class="profile-container">
    <h2>Add New User</h2>


    <form id="add-user-form">
        <?php wp_nonce_field('add_user_nonce_action', 'add_user_nonce'); ?>

        <label for="username">Username</label>
        <input type="text" name="username" required>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <label for="role">Role</label>
        <select name="role">
            <option value="subscriber">Subscriber</option>
            <option value="content_creator">Content Creator</option>
            <option value="administrator">Administrator</option>
        </select>

        <input type="submit" value="Submit">
    </form>

    <div id="user-add-result"></div>
</div>

<!-- <script>
document.getElementById('add-user-form').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: new URLSearchParams({
            action: 'submit_new_user',
            security: formData.get('add_user_nonce'),
            username: formData.get('username'),
            email: formData.get('email'),
            password: formData.get('password'),
            role: formData.get('role')
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('user-add-result').textContent = data.message;
    })
    .catch(err => {
        document.getElementById('user-add-result').textContent = 'An error occurred.';
    });
});
</script> -->

<?php get_footer(); ?>
