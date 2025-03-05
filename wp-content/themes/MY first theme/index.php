<?php

get_header();

echo "<h1>this is the index.php</h1>";

while( have_posts())
{
    the_post();
    the_title();
    
}
 get_footer();
