<?php

get_header();

echo"this is the front page";

while(have_posts()){
    the_post();
    the_title();
    ?>
    <a href="<?php the_permalink() ?>">Read More</a>
    <?php

}

get_footer();
