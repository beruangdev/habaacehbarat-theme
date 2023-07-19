<?php
// Register Taxonomy
function register_region_taxonomy()
{
  $labels = array(
    'name'              => _x('Region', 'taxonomy general name', 'textdomain'),
    'singular_name'     => _x('Region', 'taxonomy singular name', 'textdomain'),
    'search_items'      => __('Search Regions', 'textdomain'),
    'all_items'         => __('All Regions', 'textdomain'),
    'parent_item'       => __('Parent Region', 'textdomain'),
    'parent_item_colon' => __('Parent Region:', 'textdomain'),
    'edit_item'         => __('Edit Region', 'textdomain'),
    'update_item'       => __('Update Region', 'textdomain'),
    'add_new_item'      => __('Add New Region', 'textdomain'),
    'new_item_name'     => __('New Region Name', 'textdomain'),
    'menu_name'         => __('Region', 'textdomain'),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'region'),
  );

  register_taxonomy('region', array('post'), $args);
}
add_action('init', 'register_region_taxonomy');

// Insert Region Terms
function insert_region_terms()
{
  wp_insert_term('Internasional', 'region');
  wp_insert_term('Nasional', 'region');

  $aceh_term = wp_insert_term('Aceh', 'region');
  if (!is_wp_error($aceh_term)) {
    $aceh_term_id = $aceh_term['term_id'];

    $aceh_terms = array(
      'Banda Aceh',
      'Aceh Besar',
      'Aceh Barat',
      'Nagan Raya',
      'Pidie',
      'Aceh Tengah',
    );

    foreach ($aceh_terms as $term) {
      wp_insert_term($term, 'region', array('parent' => $aceh_term_id));
    }
  }
}
add_action('init', 'insert_region_terms');
