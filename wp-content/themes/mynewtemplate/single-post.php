<?php
get_header();

echo"<h2>this is the single-post</h2>";

while(have_posts()){

    the_post();
    the_title();
}
get_footer();
?>
