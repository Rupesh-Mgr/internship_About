<?php
/* Template Name: Cart Page */
get_header();
?>

<div class="cart-container">
    <div class="cart-title">
        <h1>Your Shopping Cart</h1>
    </div>
    <div class="cart-content">
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
    </div>
    <div class="continue-shopping">
        <a href="<?php echo get_permalink(get_page_by_path('projects')); ?>" class="continue-shopping-button">
            Continue to the Shopping
        </a>
    </div>
</div>

<?php get_footer(); ?>

