<?php
get_header();

echo"this is the archive folder<br>";
 while(have_posts()){
    the_post();
    the_title();
 }
 get_footer();
 ?>