<?php

/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ben_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function theme_body_classes($classes)
{
  // Adds a class of group-blog to blogs with more than 1 published author.
  if (is_multi_author()) {
    $classes[] = 'group-blog';
  }

  // Adds a class of hfeed to non-singular pages.
  if (!is_singular()) {
    $classes[] = 'hfeed';
  }

  return $classes;
}
add_filter('body_class', 'theme_body_classes');



if (function_exists('acf_add_options_page')) {
  acf_add_options_page(array(
    'page_title'   => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}

function revolt_pick_your_fight()
{

  check_ajax_referer('revolt_ajax_nonce', 'security');

  if (isset($_POST) && ($_POST['action'] == 'pick_your_fight')) {

    $main_title = $_POST['main_title'];
    $sub_title = $_POST['sub_title'];

    $args = array(
      'post_type' => 'topic',
      'posts_per_page' => -1,
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'main_list',
          'value' => $main_title,
          'compare' => '==',
        ),
        array(
          'key' => strtolower($main_title) . '_list',
          'value' => $sub_title,
          'compare' => '==',
        )
      )
    );

    $topics = new WP_Query($args);

    $list = array();
    if ($topics->have_posts()) :
      while ($topics->have_posts()) : $topics->the_post();
        array_push(
          $list,
          array(
            "title" => get_the_title(),
            "post_id" => get_the_id()
          )
        );
      endwhile;
    endif;

    wp_reset_postdata();

    $data = json_encode(array(
      'code' => 200,
      'list' => $list
    ));

    print_r($data);
  } else {
    $data = json_encode(array(
      'code' => 403,
      'message' => 'We have a problem',
      'list' => null
    ));

    print_r($data);
  }

  die;
}

add_action('wp_ajax_pick_your_fight', 'revolt_pick_your_fight');
add_action('wp_ajax_nopriv_pick_your_fight', 'revolt_pick_your_fight');


function open_pick_your_fight()
{

  check_ajax_referer('revolt_ajax_nonce', 'security');

  if (isset($_POST) && ($_POST['action'] == 'open_pick_your_fight')) {

    $post_id = $_POST['post_id'];

    $args = array(
      'post_type' => 'topic',
      'p' => $post_id
    );


    $topics = new WP_Query($args);

    $related_article = get_field('related_articles', $post_id);

    $post = '';

    if ($topics->have_posts()) :
      while ($topics->have_posts()) : $topics->the_post();
        $post = array(
          'featured_img' => get_field('background_image', get_the_ID()),
          'content' => wpautop(get_the_content()),
          'related_articles' => $related_article
        );
      endwhile;
    endif;
    wp_reset_postdata();

    $data = json_encode(array(
      'code' => 200,
      'post' => $post
    ));

    print_r($data);
  }

  die;
}
add_action('wp_ajax_open_pick_your_fight', 'open_pick_your_fight');
add_action('wp_ajax_nopriv_open_pick_your_fight', 'open_pick_your_fight');
