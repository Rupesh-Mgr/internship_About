<?php
/* Template Name: Projects Page */
get_header();
?>

<?php
    // Get the WooCommerce product category
    $category = get_term_by('slug', 'projects', 'product_cat');
    if ($category):
?>
<h2 class='projects-title'>Available For Sale</h2>

<?php endif; ?>

<div class="project-page">
    <?php
    // Fetch WooCommerce products under "projects" category
    $args = array(
        'post_type'      => 'product', // Fetch WooCommerce products
        'posts_per_page' => -1, // Show all products
        'order'          => 'ASC',
        'tax_query'      => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => 'projects', // Ensure this matches the actual category slug in WooCommerce
            )
        )
    );

    $project_products = new WP_Query($args);

    if ($project_products->have_posts()) :
        while ($project_products->have_posts()) : $project_products->the_post();
        
        // Ensure WooCommerce product object is retrieved properly
        $product = wc_get_product(get_the_ID());
        if (!$product) {
            continue; // Skip if not a valid product
        }
    ?>
    <div class="project-post-item">
        <?php if (has_post_thumbnail()): ?>
            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>" alt="<?php the_title_attribute(); ?>">
        <?php else: ?>
            <img src="<?php echo esc_url(wc_placeholder_img_src()); ?>" alt="Placeholder Image">
        <?php endif; ?>

        <div class="project-post-header">
            <h1><?php the_title(); ?></h1>
            <p class="project-price">
    <?php
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();
        $currency_symbol = 'Rs.';

        if ($sale_price && $regular_price) {
            // Ensuring Rs. is shown once and regular price is struck-through
            echo '<span class="price-container">' . 
                 $currency_symbol . ' <del class="regular-price">' . number_format($regular_price) . '</del> ' . 
                 '<span class="sale-price">' . number_format($sale_price) . '</span>' . 
                 '</span>';
        } else {
            // If no sale, show only the regular price
            echo '<span class="sale-price">' . $currency_symbol . ' ' . number_format($product->get_price()) . '</span>';
        }
    ?>
</p>
            
            <a href="<?php the_permalink(); ?>" class="view-details">VIEW DETAILS</a>
            <a href="<?php echo esc_url($product->add_to_cart_url()); ?>"
                  data-quantity="1" 
                  class="add-to-cart-button" 
                  data-product_id="<?php echo esc_attr($product->get_id()); ?>" 
                  data-product_sku="<?php echo esc_attr($product->get_sku()); ?>">
                  <?php echo esc_html($product->add_to_cart_text()); ?>
            </a>
        </div>
    </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo "<p>No projects found.</p>";
    endif;
    ?>
</div>

<?php get_footer(); ?>
