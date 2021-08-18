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
  <!-- LinkedIn Tag -->
  <script type="text/javascript">
    _linkedin_partner_id = "621898";
    window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
    window._linkedin_data_partner_ids.push(_linkedin_partner_id);
  </script>
  <script type="text/javascript">
    (function() {
      var s = document.getElementsByTagName("script")[0];
      var b = document.createElement("script");
      b.type = "text/javascript";
      b.async = true;
      b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
      s.parentNode.insertBefore(b, s);
    })();
  </script>
  <noscript>
    <img height="1" width="1" style="display:none;" alt="" src="https://px.ads.linkedin.com/collect/?pid=621898&fmt=gif" />
  </noscript>
  <!-- LinkedIn Tag End -->
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