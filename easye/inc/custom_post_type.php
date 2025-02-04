<?php
// Register Team Post Type
function create_team_post_type() {
    $labels = array(
      'name' => __( 'Team' ),
      'singular_name' => __( 'Team' ),
      'add_new' => __( 'New Member' ),
      'add_new_item' => __( 'Add New Member' ),
      'edit_item' => __( 'Edit Employee' ),
      'new_item' => __( 'New Member' ),
      'view_item' => __( 'View Member' ),
      'search_items' => __( 'Search teammate' ),
      'not_found' =>  __( 'No teammate Found' ),
      'not_found_in_trash' => __( 'No teammate found in Trash' ),
      );
    $args = array(
      'labels' => $labels,
      'has_archive' => true,
      'public' => true,
      'hierarchical' => false,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-cart',
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_icon'           => 'dashicons-groups',
      'can_export'          => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      'supports' => array(
        'title',
        'excerpt',
        'custom-fields',
        'thumbnail',
        'trackbacks',
        'comments',
        'author',
        'page-attributes'
        ),
      );
    register_post_type( 'team', $args );
  }
  add_action( 'init', 'create_team_post_type' );

  function team_register_taxonomy() {
    register_taxonomy( 'team_category', 'team',
      array(
        'labels' => array(
          'name'              => 'Member Locations',
          'singular_name'     => 'Member Location',
          'search_items'      => 'Search Member Locations',
          'all_items'         => 'All Member Locations',
          'edit_item'         => 'Edit Member Locations',
          'update_item'       => 'Update Member Location',
          'add_new_item'      => 'Add New Member Location',
          'new_item_name'     => 'New Member Location Name',
          'menu_name'         => 'Member Location',
          ),
        'hierarchical' => true,
        'sort' => true,
        'args' => array( 'orderby' => 'term_order' ),
        'show_admin_column' => true
        )
      );
  }
  add_action( 'init', 'team_register_taxonomy' );