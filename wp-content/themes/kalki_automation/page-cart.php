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
            Continue Shopping
        </a>
    </div>
</div>

<?php get_footer(); ?>

<style>
.cart-container {
    text-align: center;
    padding: 20px;
}

.continue-shopping {
    margin-top: 20px;
}

.continue-shopping-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
}

.continue-shopping-button:hover {
    background-color: #e55e00;
}
</style>
