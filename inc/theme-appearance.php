<?php

/**
 * Customise the log-in page and admin dashboard area logo
 */

function revolt_login_logo()
{
?>
  <style type="text/css">
    #adminmenu,
    #adminmenu .wp-submenu,
    #adminmenuback,
    #adminmenuwrap,
    #wp-auth-check-wrap #wp-auth-check {
      background: #000;
    }

    #login h1 a,
    .login h1 a {
      background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/logo.png);
      height: auto;
      width: 320px;
      background-size: contain;
      background-repeat: no-repeat;
      padding-bottom: 50px;
    }

    body.login {
      background: #000;
    }

    body.login form {
      background: #fff;
      box-shadow: 0 5px 30px 0 rgba(255, 255, 255, 0.17);
    }

    body.login form label {
      color: #000;
    }

    body.login form input[type="text"],
    body.login form input[type="password"],
    body.login form input[type="checkbox"] {
      background: #fff !important;
      border-color: #000;
      outline: 0;
    }

    body.login form input[type="text"]:focus,
    body.login form input[type="password"]:focus,
    body.login form input[type="checkbox"]:focus {
      outline: 0;
      box-shadow: none;
    }

    body.login .button.wp-hide-pw .dashicons {
      color: #000;
    }

    body.login form input[type="submit"] {
      background: #fb5778 !important;
      border-color: #fb5778 !important;
      transition: all 0.4s ease !important;
      text-shadow: none !important;
      box-shadow: none !important;
      border-radius: 0 !important;
    }

    body.login form input[type="submit"]:hover {
      background: #3edea8 !important;
      border-color: #3edea8 !important;
      color: #fff !important;
      text-shadow: none !important;
    }

    body.login #login_error,
    body.login .message,
    body.login .success {
      border-left: 4px solid #fb5778;
    }



    .login #backtoblog a,
    .login #nav a {
      color: #3edea8 !important;
      transition: color 0.4s ease;
    }

    .login #backtoblog a:hover,
    .login #nav a:hover,
    .login h1 a:hover {
      color: #3edea8 !important;
    }
  </style>
<?php
}
add_action('login_enqueue_scripts', 'revolt_login_logo');

function revolt_custom_logo()
{
  echo '<style type="text/css">
  #wp-admin-bar-wp-logo{
    display:none;
  }
  </style>';
}

add_action('wp_before_admin_bar_render', 'revolt_custom_logo');

function revolt_login_logo_url()
{
  return home_url();
}
add_filter('login_headerurl', 'revolt_login_logo_url');

function revolt_login_logo_url_title()
{
  return 'revolt';
}
add_filter('login_headertext', 'revolt_login_logo_url_title');

?>
