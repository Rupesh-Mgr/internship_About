<?php
get_header();

echo"this is the author id file";
 while(have_posts()){
    the_post();
    the_title();
 }
 get_footer();
 ?>