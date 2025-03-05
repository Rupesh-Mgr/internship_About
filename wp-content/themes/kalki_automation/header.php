<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalki-Automation</title>
    <?php wp_head();?>

</head>
<body>
<?php if(is_front_page()): ?>
    <!-- Banner Section -->
    <div class="banner-container">
        <p>Automata<br><strong>WorkFlow</strong> with us</p>
        <button class="banner-container-button">View More</button>
    </div>

    <div class="banner-img">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/1.png" alt="" width="100%"> 
    </div>
<?php endif; ?>

<!-- Sticky Navbar After Banner -->
<div class="NavBar sticky-nav">
    <div class="NavBar-head"></div>
    <div>
        <?php
            wp_nav_menu([
                'menu' => 'menu-1',
                'menu_class' => 'NavBar-menu',
                'container' => false, 
            ]);
        ?>
    </div>
</div>

   
    
