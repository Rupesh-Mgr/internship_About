<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
<header>
    <div class="container">

        <!-- Logo (Positioned Right) -->
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Pandora">
            </a>
        </div>

        <!-- Navigation Menu (Centered) -->
        <nav class="pandora-nav">
            <div class="menu-items">
                <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'items_wrap' => '%3$s', // This removes the default <ul> wrapper
                        'container' => false
                    ));
                ?>
            </div>
        </nav>
    <!-- Left Icons (Search, User, Cart) -->
        <div class="menu-icons">
            <a href="#" class="icon"><i class="fas fa-search"></i></a>
            <a href="#" class="icon"><i class="fas fa-user"></i></a>
            <a href="#" class="icon"><i class="fas fa-shopping-bag"></i></a>
        </div>
    </div>
</header>


