<?php
/* Single Product Template */
get_header();
?>

<?php
if (have_posts()) :
    while (have_posts()) :
        the_post();
        $product = wc_get_product(get_the_ID());

        if (!$product) {
            echo '<p>Product not found.</p>';
            exit;
        }
?>

<!-- Wrap everything inside a unique class -->
<div class="single-product-page">
    <div class="single-product-container">
        <div class="single-product">
            
            <!-- Display Only the Product Image -->
            <div class="product-image">
                <?php 
                if (has_post_thumbnail()) { 
                    the_post_thumbnail('full'); // Displays only the featured image
                }
                ?>
            </div>

            <!-- Product Info -->
            <div class="product-info">
                <h1 class="product-title"><?php the_title(); ?></h1>

                <!-- Product Description -->
                <div class="product-description">
                    <?php the_content(); ?>
                </div>

                <!-- Back to Shop Link -->
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_shop_page_id'))); ?>" class="back-to-shop">← Back to Shop</a>
            </div>
        </div>
    </div>
</div>

<?php 
    endwhile; 
endif;
?>

<?php get_footer(); ?>
