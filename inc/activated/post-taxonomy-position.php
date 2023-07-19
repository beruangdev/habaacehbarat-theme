<?php

add_action('init', function () {
  $labels = array(
    'name'              => _x('Positions', 'taxonomy general name', 'textdomain'),
    'singular_name'     => _x('Position', 'taxonomy singular name', 'textdomain'),
    'search_items'      => __('Search Positions', 'textdomain'),
    'all_items'         => __('All Positions', 'textdomain'),
    'parent_item'       => __('Parent Position', 'textdomain'),
    'parent_item_colon' => __('Parent Position:', 'textdomain'),
    'edit_item'         => __('Edit Position', 'textdomain'),
    'update_item'       => __('Update Position', 'textdomain'),
    'add_new_item'      => __('Add New Position', 'textdomain'),
    'new_item_name'     => __('New Position Name', 'textdomain'),
    'menu_name'         => __('Position', 'textdomain'),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'position'),
  );

  register_taxonomy('position', array('post'), $args);

  wp_insert_term(
    'Slide Welcome Page',
    'position'
  );

  wp_insert_term(
    'Berita Utama',
    'position'
  );
  wp_insert_term(
    'Laporan Interaktif',
    'position'
  );
  wp_insert_term(
    'Rekomendasi',
    'position'
  );
});
