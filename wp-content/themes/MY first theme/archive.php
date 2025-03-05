<?php get_header(); ?>

<h2>archive.php</h2>
<?php

while(have_posts()){
    the_post();
    the_title();
    echo '<a href="' . get_the_permalink() . '">Read More</a>';
}

?>

<?php get_footer(); ?>