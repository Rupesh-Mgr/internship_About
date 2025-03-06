<?php get_header(); ?>
<div class="archive-container">
    <h1 class="archive-page-title">
        <?php
        $title = str_replace('_', ' ', single_cat_title('', false));
        $title_parts = explode(' ', $title, 2);
        if (count($title_parts) === 2) {
            echo '<span style="color: black;">' . esc_html(ucfirst($title_parts[0])) . '</span> ';
            echo '<span style="color: #007BFF;">' . esc_html(ucfirst($title_parts[1])) . '</span>';
        } else {
           
        }
        ?>
    </h1>

    <!-- Back to Home Button -->
    <div class="back-to-home-container">
    </div>

    <?php
    $paged = get_query_var('paged') ?: 1;
    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'category_name'  => get_query_var('category_name'),
        'paged'          => $paged,
        'order'          => 'DESC',
    ];
    $query = new WP_Query($args);
    $icons = ['fa-gem', 'fa-layer-group', 'fa-desktop', 'fa-gear'];
    $index = 0;

    if ($query->have_posts()) :
    ?>
        <div class="archive-service-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="archive-service-card">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="archive-service-image">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" alt="<?php the_title_attribute(); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="archive-service-content">
                            <?php if (has_category('Our service')) : ?>
                                <div class="archive-icon-container">
                                    <h2 class="archive-icon-title">
                                        <i class="fas <?php echo $icons[$index % count($icons)]; ?>"></i>
                                        <a><?php the_title(); ?></a>
                                    </h2>
                                    <div class="archive-icon-excerpt"><?php the_excerpt(); ?></div>
                                </div>
                                <?php $index++; ?>
                            <?php else : ?>
                                <h2 class="archive-service-title"><?php the_title(); ?></h2>
                                <div class="archive-service-text"><?php the_excerpt(); ?></div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
        <a href="<?php echo home_url(); ?>" class="back-to-home-button">Back to Home</a>


        <div class="archive-pagination">
            <?php echo paginate_links(['total' => $query->max_num_pages]); ?>
        </div>
    <?php else : ?>
        <p class="archive-no-services">No posts found in this category.</p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</div>
<?php get_footer(); ?>
