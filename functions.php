<?php

/**
 * Theme functions and definitions
 */

if (!function_exists('theme_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function theme_setup()
  {
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Excerpts for blogs 
    add_post_type_support('page', 'excerpt');

    /*
 	 * Let WordPress manage the document title.
 	 * By adding theme support, we declare that this theme does not use a
 	 * hard-coded <title> tag in the document head, and expect WordPress to
 	 * provide it for us.
 	 */
    add_theme_support('title-tag');

    /*
 	 * Enable support for Post Thumbnails on posts and pages.
 	 *
 	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
 	 */
    add_theme_support('post-thumbnails');

    // Enable custom menus
    // =======================
    add_theme_support('menus');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
      // Example
      'header-menu' => esc_html__('Header Menu', 'revolt'),
      'footer-menu' => esc_html__('Footer Menu', 'revolt'),
    ));

    /*
 	 * Switch default core markup for search form, comment form, and comments
 	 * to output valid HTML5.
 	 */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }
endif;
add_action('after_setup_theme', 'theme_setup');

// Adds CSS
// ============
function theme_styles()
{
  // Example with external URL
  // wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );
  // Example with internal file
  wp_enqueue_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css');
  wp_enqueue_style('gridjs', get_template_directory_uri() . '/node_modules/gridjs/dist/theme/mermaid.min.css');
  wp_enqueue_style('aos', get_template_directory_uri() . '/node_modules/aos/dist/aos.css');
  wp_enqueue_style('revolt-css', get_template_directory_uri() . '/style.min.css');
}
add_action('wp_enqueue_scripts', 'theme_styles');

// Adds JS
// ==========
function theme_js()
{
  // Example with external URL
  wp_enqueue_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.bundle.min.js', '', true);
  wp_enqueue_script('gridjs', get_template_directory_uri() . '/node_modules/gridjs/dist/gridjs.production.min.js', '', true);
  wp_enqueue_script('aos', get_template_directory_uri() . '/node_modules/aos/dist/aos.js', '', true);
  wp_enqueue_script('lib-js', get_template_directory_uri() . '/assets/js/libs.min.js', array('jquery'), '', true);
  wp_enqueue_script('revolt-js', get_template_directory_uri() . '/assets/js/main.min.js', array('lib-js'), '', true);

  wp_localize_script('revolt-js', 'revolt_ajax_params', array(
    'ajaxurl' => admin_url('admin-ajax.php'),
    'security' => wp_create_nonce('revolt_ajax_nonce'),
  ));
  // Example with internal file
}
add_action('wp_enqueue_scripts', 'theme_js');

// Implement Additional files
//==========
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Custom Posts file
 */
require get_template_directory() . '/inc/custom-posts.php';

/**
 * Load Custom Taxonomies file
 */
require get_template_directory() . '/inc/custom-taxonomies.php';

/**
 * Where to edit login page and dashboard logo
 */
require get_template_directory() . '/inc/theme-appearance.php';

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length)
{
  return 30;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more($more)
{
  return '...';
}
add_filter('excerpt_more', 'wpdocs_excerpt_more');
