<?php
/* 
Template Name: About Us 
*/
get_header();
?>

<div class="about-page">
    <?php
    $about_posts = new WP_Query(array(
        'post_type' => 'page',
        'posts_per_page' => 1,
        'pagename' => 'about',
    ));
    if ($about_posts->have_posts()) :
        while ($about_posts->have_posts()) : $about_posts->the_post();
    ?>
            <div class="about-container-header">
                <h1><?php the_title(); ?></h1>
            </div>
            <div class="about-container-content">
                <?php the_content(); ?>
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>">
                <?php endif; ?>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    endif;
    ?>
</div>


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


<!-- About Posts -->
<div class="about-title">
        <h1>We provide <span>high</span><br> quality services</h1>
    </div>
    <div class="about-posts">
        <?php
        $about_posts = new WP_Query(array(
            'category_name' => 'We provide-high-quality services',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'orderby' => 'date'
        ));
        if ($about_posts->have_posts()) :
            while ($about_posts->have_posts()) : $about_posts->the_post();
        ?>
                <div class="about-post-item">
                    <h2><?php the_title(); ?></h2>
                    <div class="about-post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo "<p>No posts found in About category.</p>";
        endif;
        ?>
    </div>



    
<div class="director-wrap">
    <div class="director">
        <?php
        $director_query = new WP_Query(array(
            'category_name' => 'directors',
            'posts_per_page' => 4
        ));
        if ($director_query->have_posts()) {
            $director_query->the_post(); // Fetch first post for main display
        ?>
            <div class="director-left">
                <?php if (has_post_thumbnail()) : ?>
                    <img class="main-image" id="mainImage" src="<?php the_post_thumbnail_url('large'); ?>" alt="Director">
                <?php endif; ?>
            </div>
            <div class="director-right">
                <div class="director-content-container">
                    <h1><?php the_title(); ?></h1>
                    <p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
                    <p><?php echo wp_trim_words(get_the_content(), 30, '...'); ?></p>
                    <div class="navigation">
                        <button class="nav-btn prev-btn">←</button>
                        <button class="nav-btn next-btn">→</button>
                    </div>
                </div>
                <div class="thumbnail-container">
                    <img class="thumbnail active"
                         src="<?php the_post_thumbnail_url('thumbnail'); ?>"
                         data-title="<?php the_title(); ?>"
                         data-desc="<?php echo esc_attr(get_the_excerpt()); ?>"
                         data-content="<?php echo esc_attr(strip_tags(get_the_content())); ?>"
                         data-img="<?php the_post_thumbnail_url('large'); ?>"
                         alt="">

                    <?php while ($director_query->have_posts()) {
                        $director_query->the_post();
                    ?>
                        <img class="thumbnail"
                             src="<?php the_post_thumbnail_url('thumbnail'); ?>"
                             data-title="<?php the_title(); ?>"
                             data-desc="<?php echo esc_attr(get_the_excerpt()); ?>"
                             data-content="<?php echo esc_attr(strip_tags(get_the_content())); ?>"
                             data-img="<?php the_post_thumbnail_url('large'); ?>"
                             alt="">
                    <?php } ?>
                </div>
            </div>
        <?php
        }
        wp_reset_postdata();
        ?>
    </div>
</div>

<div class="need-advice">
    <h1>You have a project? Need advice?</h1>
</div>

<?php get_footer(); ?>
