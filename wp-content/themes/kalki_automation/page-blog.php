<?php
/*
Template Name: Blog
*/
get_header();
?>
<div class="blog-page">
    <?php
    $category = get_category_by_slug('blog'); // Ensure the slug is lowercase
    if ($category) :
    ?>
        <h2 class="Blog-title"><?php echo esc_html($category->name); ?></h2>
    <?php endif; ?>

    <div class="blog-section">
        <?php
        // Get the current page number
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $blog_posts = new WP_Query(array(
            'post_type'      => 'post', // Ensure fetching only posts
            'category_name'  => 'Blog', // Use lowercase category slug
            'posts_per_page' => 8, // Show only 8 posts per page
            'order'          => 'ASC',
            'paged'          => $paged, // Enable pagination
        ));

        if ($blog_posts->have_posts()) :
            while ($blog_posts->have_posts()) : $blog_posts->the_post();
        ?>
            <div class="Blog-post-item">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
                <div class="Blog-post-header">
                    <h1><?php the_title(); ?></h1>
                    <div class="Blog-post-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="view-details">VIEW DETAILS</a>
                </div>
            </div>
        <?php
            endwhile;
        ?>
    </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            echo paginate_links(array(
                'total'   => $blog_posts->max_num_pages,
                'current' => $paged,
                'prev_text' => '← Previous',
                'next_text' => 'Next →',
            ));
            ?>
        </div>

        <?php
            wp_reset_postdata();
        else :
            echo "<p>No Blogs found.</p>";
        endif;
    ?>

 <div class="blog-bottom-part">
        <div>
            <h1>
            Get the latest<br>
            news into your inbox
            </h1>
        </div>
        <div class="blog-right-content">
            <div class="blog-paragraph">
            Stay informed and up-tp-date with the latest news<br>
           delivered straight to your inbox for a seamless and<br>
             convenient experience.
            </div>
                <div class="mail-form-container">
                        <?php
                        $args = array(
                            'post_type'      => 'post',
                            'name'  => 'Blog', // Correct way to get blog posts
                            'posts_per_page' => 1, // Get only the latest post
                            'post_status'    => 'publish',
                        );
                        $new_page_query = new WP_Query($args);
                        
                        if ($new_page_query->have_posts()) :
                            while ($new_page_query->have_posts()) : $new_page_query->the_post();
                            echo the_content();
                            endwhile;
                            wp_reset_postdata(); // Important to reset post data
                        else :
                            echo '<p>No blog posts found.</p>';
                        endif;
                        ?>
                
                </div>
        </div>        
 </div>
        

<?php get_footer(); ?>
