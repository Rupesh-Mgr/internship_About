<?php

get_header();

echo "this is the single.php<br>";

?>
<h2><a href="<?php echo home_url() ?>">Back to homepage</a></h2>
<?php

while(have_posts()){
    the_post();
    the_title();

    the_content();
}

get_footer();