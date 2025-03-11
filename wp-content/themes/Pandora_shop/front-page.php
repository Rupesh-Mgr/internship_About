<?php get_header(); ?>

<div class="page-banner">
    <?php
    $args = array(
        'post_type'      => 'post',
        'category_name'  => 'banner',
        'posts_per_page' => 1,
    );

    $banner_query = new WP_Query($args);

    if ($banner_query->have_posts()) :
        while ($banner_query->have_posts()) :
            $banner_query->the_post();
    ?>
            <div class="content">
                <?php if (has_post_thumbnail()) : ?>
                    <img class="banner-img" src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'large')); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>

                
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No banner found</p>';
    endif;
    ?>
</div>
<?php get_header(); ?>


<!-- //discover-a-world-of-jewellery section -->
<div class="jewellery-category-container">
    <div class="jewellery-category-posts">
        <?php
        // Query to fetch posts from the "Discover a world of jewellery" category
        $query = new WP_Query(array(
            'category_name'  => 'discover-a-world-of-jewellery', // Ensure this is the correct slug
            'posts_per_page' => 10, // Adjust number of posts to display
            'order'          => 'ASC'
        ));

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="jewellery-post">
                    <div class="post-thumbnail">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('medium');
                        } ?>
                    </div>
                    <h2><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h2>
                </div>
            <?php endwhile;
            wp_reset_postdata(); // Reset the query
        else : ?>
            <p>No posts found in this category.</p>
        <?php endif; ?>
    </div>
    <h2 class="jewellery-title">Discover a world of <br><span class="highlight">jewellery</span></h2>
</div>

<?php get_footer(); ?>
