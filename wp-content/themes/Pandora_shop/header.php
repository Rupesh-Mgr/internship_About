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
                        'menu' => 'menu-1',
                        'menu_class' => 'menu',
                    ));
                ?>
            </div>
        </nav>
            <!-- Left Icons (Search, User, Cart) -->
            <div class="menu-icons">
                <div class="search-icon">
                <a href="#" class="icon"><i class="fas fa-search"></i></a>
                </div>
                <div class="icon-divider"></div>
                <div class="user-cart-icons">
                    <a href="#" class="icon"><i class="fas fa-user"></i></a>
                    <a href="#" class="icon"><i class="fas fa-cart-shopping"></i></a>
                </div>
            </div>

    </div>
</header>


