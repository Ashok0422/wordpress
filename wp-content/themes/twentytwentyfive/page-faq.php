<?php
/* Template Name: FAQ Page */
get_header();
?>

<div class="faq-container">
    <h2>Frequently Asked Questions</h2>

    <div class="faq-item">
        <h4>Q: How do I reset my password?</h4>
        <p>A: You can reset it from the login page by clicking "Forgot Password".</p>
    </div>

    <div class="faq-item">
        <h4>Q: How do I update my profile?</h4>
        <p>A: Log in and go to your <a href="<?php echo home_url('/index.php/profile'); ?>">Profile page</a>.</p>
    </div>

    <!-- Add more Q&A pairs as needed -->
</div>

<?php get_footer(); ?>
