<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and start of the <body> section
 *
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/favicon.png" type="image/png">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <header class="header">

    <div class="header-menu overlay">
      <div class="container">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'header-menu',
          'container' => 'nav',
          'container_class' => '',
        ));
        ?>
      </div>
    </div>

    <div class="header-items">
      <div class="container flex justify-content-between">

        <div class="hamburger_icon content" id="open-button">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div class="hamburger_icon overlay" id="close-button">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div class="header__logo">
          <a class="hover" href="<?php echo home_url(); ?>">
            <?php
            $logo = get_field('revolt_logo', 'options');
            $size = 'medium';
            $thumb = $logo['sizes'][$size];
            ?>
            <img src="<?php echo esc_url($thumb); ?>" alt="<?php echo esc_attr($alt); ?>">
          </a>
        </div>
      </div>
    </div>
  </header>