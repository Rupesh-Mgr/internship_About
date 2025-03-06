<?php  get_header();?>

<?php
// Get the categories of the current post
$categories = get_the_category();
$category_slug = !empty($categories) ? $categories[0]->slug : 'default';
?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php
// Check if the post belongs to 'service' category


if (has_category('Our service')) : ?>
    <div class="single-post-container <?php echo esc_attr($category_slug); ?>">
        <!-- Service Section Layout -->
        <article class="single-post-content service-layout">
            <div class="service-header">
                
                <h1 class="post-service-title"><?php the_title(); ?>
            </h1>

                <p class="post-date"><?php echo get_the_date('F j, Y'); ?>
               </p>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="service-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="service-content">
                <?php the_excerpt(); ?>
            </div>
            <a href="<?php echo esc_url(get_category_link(get_cat_ID('Our service'))); ?>" class="back-button">← Back to Services</a>

            </article>
    </div>
        <!--End of the service  -->


       <?php elseif(has_category('slider')):?>
        <div class="slider-single-container <?php echo esc_attr($category_slug)?>">
            <article class="slider-single-post slider-layout">
                <div class="slider-header">
                    <h1 class="post-slider-title"><?php the_title();?></h1>
                    <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                </div>
                 <?php if(has_post_thumbnail()):?>
                    <div class="slider-images">
                        <?php the_post_thumbnail('large');?>
                    </div>
                    <?php endif;?>

                    <div class="slider-content">
                        <?php the_content();?>
                    </div>
                    <a href="<?php echo esc_url(get_category_link(get_cat_ID('slider')));?>"class="back-button">← Back to Featured projects</a>
            </article>
        </div>

     


     <!-- recent-posts single posts section -->
      <?php elseif(has_category('recent')):?>
        <div class="recent-single-container <?php echo esc_attr($category_slug)?>">
            <article class="recent-single-post recent-layout">
                <div class="recent-header">
                    <h1 class="post-recent-title"><?php the_title();?></h1>
                    <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
                </div>
                 <?php if(has_post_thumbnail()):?>
                    <div class="recent-images">
                        <?php the_post_thumbnail('large');?>
                    </div>
                    <?php endif;?>

                    <div class="recent-content">
                        <?php the_content();?>
                    </div>
                    <a href="<?php echo esc_url(get_category_link(get_cat_ID('recent')));?>"class="back-button">← Back to Recent</a>
            </article>
        </div>

     
     
        <!-- service single post section -->
     <?php elseif (has_category('services')) : ?>
    <div class="single-post-container <?php echo esc_attr($category_slug); ?>">
        <!-- Service Section Layout -->
        <article class="single-post-content service-layout">
            <div class="service-header">
                <h1 class="post-service-title"><?php the_title(); ?></h1>
                <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="service-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="service-content">
                <?php the_content(); ?>
            </div>

            <!-- Related Services Section -->
            <div class="related-services">
                <h1 class="service-relate-header">Related Services</h1>
                <div class="related-services-grid">
                    <?php
                    $current_post_id = get_the_ID();
                    $related_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 2,
                        'post__not_in'   => array($current_post_id),
                        'category_name'  => 'services',
                        'orderby'        => 'rand'
                    );
                    $related_query = new WP_Query($related_args);
                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                    ?>
                    <div class="related-service-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="related-service-image">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="related-service-title"><?php the_title(); ?></h3>
                        </a>
                        <P class="service-content"><?php the_excerpt();?></P>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No related services found.</p>';
                    endif;
                    ?>
                </div>
            </div>

            <!-- Back to Services -->
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('services'))); ?>" class="back-button">← Back to Services</a>
        </article>
    </div>


        <!-- Starting for blog -->
        <!-- Blog Post Layout -->
    <?php elseif (has_category('Blog')) : ?>
<div class="single-post-container <?php echo esc_attr($category_slug); ?>">
        <!-- Blog Post Layout -->
        <article class="single-post-content blog-layout">
            <div class="blog-header">
                <h1 class="post-blog-title"><?php the_title(); ?></h1>
                <p class="post-date"><?php echo get_the_date('F j, Y'); ?></p>
            </div>

            <?php if (has_post_thumbnail()) : ?>
                <div class="blog-image">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

            <div class="blog-content">
                <?php the_content(); ?>
            </div>
       
            <!-- Related Blog Posts -->
            <div class="related-blogs">
                <h1 class="blog-relate-header">Related Articles</h1>
                
                <div class="related-blogs-grid">
                    <?php
                    $current_post_id = get_the_ID();
                    $related_args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 2,
                        'post__not_in'   => array($current_post_id),
                        'category_name'  => 'Blog',
                        'orderby'        => 'rand'

                    );
                    $related_query = new WP_Query($related_args);
                    if ($related_query->have_posts()) :
                        while ($related_query->have_posts()) : $related_query->the_post();
                    ?>
                    <div class="related-blog-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="related-blog-image">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="related-blog-title"><?php the_title(); ?></h3>
                        </a>
                        <P><?php the_excerpt();?></P>
                    </div>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p>No related articles found.</p>';
                    endif;
                    ?>
                </div>
            </div>

            <!-- Back to Blog -->
            <a href="<?php echo esc_url(site_url('/blog')); ?>" class="back-button">← Back to Blog</a>
        </article>
</div>
         <?php else:?>





            <!-- Default Post Layout -->
            <article class="single-post-content default-layout">
                <h1 class="post-title"><?php the_title(); ?></h1>
                <div class="post-content"><?php the_content(); ?></div>
            </article>
        <?php endif; ?>
    <?php endwhile; endif; ?>



<?php get_footer(); ?>







