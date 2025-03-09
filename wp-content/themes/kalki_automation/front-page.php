<?php
/*
template name:Kalki_Automation
*/
get_header();
?>
<div class="page-container">
    <?php
   
            $args = array(
                'post_type' => 'page',
                'pagename' => 'Achievement', // Make sure this matches the page slug
                'posts_per_page' => 1
            );
            $new_page_query = new WP_Query($args);
            if ($new_page_query->have_posts()):
                while($new_page_query->have_posts()) : $new_page_query->the_post();
        ?>
        <div class="content">
            <?php the_content(); ?>
            
        </div>
        <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No content found.</p>';
            endif;
    ?>
</div>


<!-- our services -->
<hr>
<div class="container-mata-service serv">
    <?php
    // Define category slug
    $category_slug = 'service';

    // Get category details
    $category = get_term_by('slug', $category_slug, 'category');
    if ($category) {
        $category_id = $category->term_id;
        $category_name = esc_html($category->name);
        $category_description = esc_html($category->description);

        // Split category name into words
        $category_name_parts = explode(' ', $category_name);
        $first_word  = !empty($category_name_parts[0]) ? ucfirst($category_name_parts[0]) : '';
        $second_word = !empty($category_name_parts[1]) ? ucfirst($category_name_parts[1]) : '';

        // Get category image (fallback to default if missing)
        $category_image = get_option('z_taxonomy_image' . $category_id);
        
        $category_image = !empty($category_image) ? esc_url($category_image) : $default_image;
    ?>
        <!-- Updated Category Section (Swapped Image & Text) -->
        <div class="service">
            <div class="wp-block-media-text reverse-layout"> <!-- Added reverse-layout class -->
                <div class="wp-block-media-text__content">
                    <h1>
                        <span style="color: black;"><?php echo $first_word; ?></span><br>
                        <span style="color: #007BFF;"><?php echo $second_word; ?></span>
                    </h1>
                    <p><?php echo $category_description; ?></p>
                    <div class="view-all-button">
                        <a href="<?php echo esc_url(get_category_link($category_id)); ?>" class="button">
                            View All
                        </a>
                    </div>
                </div>
                <figure class="wp-block-media-text__media">
                    <img src="<?php echo $category_image; ?>" alt="<?php echo esc_attr($category_name); ?>">
                </figure>
            </div>
        </div>
    <?php } else {
        echo '<p>Category not found.</p>';
    } ?>

    <!-- Dynamic Circles in Plus Formation (Fixed) -->
    <div class="circle-container">
        <?php
        // Fetch 4 posts from 'service' category
        $circle_args = [
            'category_name'  => 'service', // Ensure correct category slug
            'posts_per_page' => 4,
            'post__not_in'   => [get_queried_object_id()] // Exclude the current post
        ];
        $circle_query = new WP_Query($circle_args);
        $circle_classes = ['circle-top', 'circle-left', 'circle-right', 'circle-bottom'];
        $icons = ['fa-gem', 'fa-layer-group', 'fa-desktop', 'fa-gear'];
        $i = 0;

        if ($circle_query->have_posts()) :
            while ($circle_query->have_posts() && $i < 4) :
                $circle_query->the_post();
                ?>
                <div class="circle <?php echo esc_attr($circle_classes[$i]); ?>">
                    <i class="fas <?php echo esc_attr($icons[$i]); ?>"></i>
                    <h2><?php the_title(); ?></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
                <?php
                $i++;
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No service sections found.</p>';
        endif;
        ?>
    </div>
</div>


<!-- featured posts       -->
<section class="featured-projects">
    <div class="content">
        <h2>Featured<br><span>Projects</span></h2>
        <a href="<?php echo esc_url(get_category_link(get_category_by_slug('slider')->term_id)); ?>" class="view-all">VIEW ALL</a>
        <div class="nav-buttons">
            <button id="prev">&#8592;</button>
            <button id="next">&#8594;</button>
        </div>
    </div>
    <div class="slider-container">
        <div class="slider">
            <?php
            $args = array(
                'post_type'      => 'post',
                'posts_per_page' => 3,
                'category_name'  => 'slider',
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="slide">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php the_excerpt(); ?></p>
                        
                    </div>
                    
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No projects available.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<div class="about-title">
        <h3>Client's<br><span>Testimonials</span></h3>
    </div>
<section class="testimonials">
    <div class="testimonial-wrapper">
        <button id="prevTestimonial" class="arrow left">
            <img id="prevImage" src="" alt="Previous">
            <span>&#8592;</span>
        </button>

        <div class="testimonial-content">
            <div class="testimonial-slider">
                <?php
                $args = array(
                    'post_type'      => 'testimonial',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'order'          => 'DESC'
                );

                $query = new WP_Query($args);
                
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                    
                        // Explode title into words
                        $title_parts = explode(' ', get_the_title());

                        // Modify the second word if it exists
                        if (isset($title_parts[1])) {
                            $title_parts[1] = '<span class="blue-text">' . $title_parts[1] . '</span>';
                        }

                        // Reconstruct the title
                        $styled_title = implode(' ', $title_parts);

                        ?>
                        <div class="testimonial-slide">
                            <div class="testimonial-img">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: 'path/to/default-image.jpg'); ?>" 
                                     alt="<?php echo esc_attr(get_the_title()); ?>">
                            </div>
                            <div class="testimonial-text">
                                <p><?php echo wp_kses_post(apply_filters('the_content', get_the_content())); ?></p>
                                <h3><?php echo wp_kses_post($styled_title); ?></h3>
                                <p>CEO / Founder</p>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>

        <button id="nextTestimonial" class="arrow right">
            <img id="nextImage" src="" alt="Next">
            <span>&#8594;</span>
        </button>
    </div>
</section>


<!-- Counter -->
<section class="counter-section">
    <?php
    $args = array(
        'post_type'      => 'counter',
        'posts_per_page' => 1
    );
    $counter_query = new WP_Query($args);
    
    if ($counter_query->have_posts()) :
        while ($counter_query->have_posts()) : $counter_query->the_post();
            // Fetch meta values
            $projects_completed = get_post_meta(get_the_ID(), 'projects_completed', true) ?: '0';
            $hours_coding = get_post_meta(get_the_ID(), 'hours_coding', true) ?: '0';
            $happy_clients = get_post_meta(get_the_ID(), 'happy_clients', true) ?: '0';
    ?>
            <div class="counter-box">
                <h2><?php echo esc_html($projects_completed); ?> <span>+</span></h2>
                <p>Projects Completed</p>
            </div>
            <div class="counter-box">
                <h2><?php echo esc_html($hours_coding); ?> <span>m</span></h2>
                <p>Hours Coding</p>
            </div>
            <div class="counter-box">
                <h2><?php echo esc_html($happy_clients); ?> <span>+</span></h2>
                <p>Happy Clients</p>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    else :
        echo '<p>No counter data found.</p>';
    endif;
    ?>
</section>


 
 <!-- recent post -->
<div class="recent-post-wrap">
    <section class="recent-posts">
    <div class="recent-posts-header">
        <h1><span class="black">Recent<br></span> <span class="blue">Posts</span></h1>
        <a href="<?php echo esc_url(get_category_link(get_category_by_slug('recent')->term_id)); ?>" class="view-all">VIEW ALL</a>
    </div>
    <div class="recent-posts-container">
        <?php
        $args = array(
            'post_type'      => 'post',
            'posts_per_page' => 3,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'tax_query' => array(
                            array(
                                'taxonomy' => 'category',
                                'field'    => 'slug',
                                'terms'    => 'recent',
                            ),
                        ),
                    );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $image = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://via.placeholder.com/600';
                $title = get_the_title();
                $date = get_the_date('d M, Y');
                $link = get_permalink();
        ?>
                <div class="post-card">
                    <div class="post-image">
                        <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr($title); ?>">
                    </div>
                    <div class="post-info">
                        <h3><a href="<?php echo esc_url($link); ?>"><?php echo esc_html($title); ?></a></h3>
                        <p>Admin | <?php echo esc_html($date); ?></p>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>
    </section>
</div>


<!-- form post -->
<section class="contact-section">
    <div class="contact-container">
        <?php
        $args = array(
            'post_type'      => 'post',
            // Make sure to use the slug (URL-friendly version) of the title if using the 'name' parameter.
            'name'           => 'Have an idea?Tell us about it', 
            'posts_per_page' => 1,
            'post_status'    => 'publish',
            'tax_query'      => array(
                array(
                    'taxonomy' => 'category',
                    'field'    => 'slug',
                    'terms'    => 'contact',
                ),
            ),
        );

        $new_page_query = new WP_Query($args);
        if ( $new_page_query->have_posts() ) :
            while ( $new_page_query->have_posts() ) :
                $new_page_query->the_post(); 
                $title=get_the_title();
                $arr =explode("-", $title);
               
                ?>
            <div class="contact">
                <div class="contact-first">
                    <img src="<?php the_post_thumbnail('large');?>
                </div>
                 
                <div class="contact-second">
                    <div class="default-header">
                        <?php echo isset($arr[0]) ? $arr[0]:''; ?>
                        <br>
                        <e><?php echo isset($arr[1]) ? $arr[1]:''; ?></e>
                        <br>
                    </div>
                    <?php the_content(); ?>
                 </div>
             </div>
            <?php endwhile;
            wp_reset_postdata();
        else : ?>
            <p class="no-content">No content found</p>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
?>