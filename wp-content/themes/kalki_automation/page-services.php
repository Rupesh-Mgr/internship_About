<?php
/*
Template name: Service page
 */
get_header();?>

<?php
    $category= get_category_by_slug('services');
        if($category):
?>
<h2 class='services-title'><?php echo esc_html($category->name);?></h2>
<?php endif; ?>

 <div class="service-page">
    <?php
    $service_posts = new WP_Query(array(
        'category_name'   => 'services',
        'post_type'       => 'post',
        'posts_per_page'  => -1,
        'order'           => 'ASC',
    ));

    if ($service_posts->have_posts()) :
        while ($service_posts->have_posts()) : $service_posts->the_post();
    ?>
    <div class="service-post-item">
        <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
        <div class="service-post-header">
            <h1><?php the_title(); ?></h1>
            <div class="service-post-content">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="view-details">VIEW DETAILS</a>
        </div>
    </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo "<p>No services found.</p>";
    endif;
    ?>
</div>


<?php get_footer();?>