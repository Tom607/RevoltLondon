<?php

/**
 * Custom posts for use with this theme
 *
 *
 */

function revolt_register_projects_cpt()
{
  register_post_type(
    'projects',
    array(
      'labels'              => array(
        'name'               => 'Project',
        'singular_name'      => 'Project',
        'menu_name'          => 'Projects',
        'add_new'            => 'Add',
        'add_new_item'       => 'Add New',
        'edit'               => 'Edit',
        'edit_item'          => 'Edit',
        'new_item'           => 'New',
        'view'               => 'View',
        'view_item'          => 'View',
        'search_items'       => 'Search',
        'not_found'          => 'Project not found',
        'not_found_in_trash' => 'Project not found in trash',
        'parent'             => 'Parent Project',
      ),
      'public'              => true,
      'show_ui'             => true,
      'capability_type'     => 'page',
      'publicly_queryable'  => true,
      'menu_icon'            => 'dashicons-slides',
      'exclude_from_search' => true,
      'hierarchical'        => false,
      'rewrite' => array('slug' => 'project'),
      'query_var'   => true,
      'supports'       => array('title'),
      'has_archive' => false,
      'show_in_nav_menus'   => true
    )
  );
}

add_action('init', 'revolt_register_projects_cpt', 2);


function revolt_register_topics_cpt()
{
  register_post_type(
    'topic',
    array(
      'labels'              => array(
        'name'               => 'Topic',
        'singular_name'      => 'Topic',
        'menu_name'          => 'Topics',
        'add_new'            => 'Add',
        'add_new_item'       => 'Add New',
        'edit'               => 'Edit',
        'edit_item'          => 'Edit',
        'new_item'           => 'New',
        'view'               => 'View',
        'view_item'          => 'View',
        'search_items'       => 'Search',
        'not_found'          => 'Topic not found',
        'not_found_in_trash' => 'Topic not found in trash',
        'parent'             => 'Parent Topic',
      ),
      'public'              => false,
      'show_ui'             => true,
      'capability_type'     => 'page',
      'publicly_queryable'  => true,
      'menu_icon'            => 'dashicons-feedback',
      'exclude_from_search' => true,
      'hierarchical'        => false,
      'query_var'   => false,
      'supports'       => array('title', 'editor'),
      'has_archive' => false,
      'show_in_nav_menus'   => true
    )
  );
}

add_action('init', 'revolt_register_topics_cpt', 2);




function revolt_register_team_cpt()
{
  register_post_type(
    'team-members',
    array(
      'labels'              => array(
        'name'               => 'Team Member',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Team Members',
        'add_new'            => 'Add',
        'add_new_item'       => 'Add New',
        'edit'               => 'Edit',
        'edit_item'          => 'Edit',
        'new_item'           => 'New',
        'view'               => 'View',
        'view_item'          => 'View',
        'search_items'       => 'Search',
        'not_found'          => 'Team Member not found',
        'not_found_in_trash' => 'Team Member not found in trash',
        'parent'             => 'Parent Team Member',
      ),
      'public'              => false,
      'show_ui'             => true,
      'capability_type'     => 'page',
      'publicly_queryable'  => true,
      'menu_icon'            => 'dashicons-buddicons-buddypress-logo',
      'exclude_from_search' => true,
      'hierarchical'        => false,
      'rewrite' => array('slug' => 'team-member'),
      'query_var'   => true,
      'supports'       => array('title'),
      'has_archive' => false,
      'show_in_nav_menus'   => true
    )
  );
}

add_action('init', 'revolt_register_team_cpt', 2);
