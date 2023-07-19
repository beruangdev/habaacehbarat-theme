<?php

// Register Custom Post Type
function register_banner_post_type()
{
  $labels = array(
    'name'                  => 'Banners',
    'singular_name'         => 'Banner',
    'menu_name'             => 'Banners',
    'all_items'             => 'All Banners',
    'add_new'               => 'Add New',
    'add_new_item'          => 'Add New Banner',
    'edit_item'             => 'Edit Banner',
    'new_item'              => 'New Banner',
    'view_item'             => 'View Banner',
    'search_items'          => 'Search Banners',
    'not_found'             => 'No banners found',
    'not_found_in_trash'    => 'No banners found in Trash',
    'parent_item_colon'     => 'Parent Banner:',
    'featured_image'        => 'Banner Image',
    'set_featured_image'    => 'Set banner image',
    'remove_featured_image' => 'Remove banner image',
    'use_featured_image'    => 'Use as banner image',
    'archives'              => 'Banner archives',
    'insert_into_item'      => 'Insert into banner',
    'uploaded_to_this_item' => 'Uploaded to this banner',
    'filter_items_list'     => 'Filter banners list',
    'items_list_navigation' => 'Banners list navigation',
    'items_list'            => 'Banners list',
  );

  $args = array(
    'label'               => 'Banner',
    'description'         => 'Post type for banners',
    'labels'              => $labels,
    'supports'            => array('title', 'editor', 'thumbnail'),
    'public'              => true,
    'menu_icon'           => 'dashicons-images-alt2',
    'menu_position'       => 5,
    'has_archive'         => true,
    'rewrite'             => array('slug' => 'banner'),
    'show_in_rest'        => true,
  );

  register_post_type('banner', $args);
}
add_action('init', 'register_banner_post_type');

// Add Custom Meta Box for URL
function banner_url_meta_box()
{
  add_meta_box('banner_url', 'Banner URL', 'banner_url_callback', 'banner', 'normal', 'high');
}
add_action('add_meta_boxes', 'banner_url_meta_box');

function banner_url_callback($post)
{
  wp_nonce_field('banner_url_save', 'banner_url_nonce');
  $url = get_post_meta($post->ID, 'banner_url', true);
  echo '<input type="text" name="banner_url" value="' . esc_attr($url) . '" style="width: 100%;" placeholder="Enter the banner URL">';
}

// Save Custom Meta Box Data
function save_banner_url_meta_data($post_id)
{
  if (!isset($_POST['banner_url_nonce']) || !wp_verify_nonce($_POST['banner_url_nonce'], 'banner_url_save')) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (isset($_POST['banner_url'])) {
    $url = sanitize_text_field($_POST['banner_url']);
    update_post_meta($post_id, 'banner_url', $url);
  }
}
add_action('save_post_banner', 'save_banner_url_meta_data');

// Register Taxonomy Position
function register_banner_position_taxonomy()
{
  $labels = array(
    'name'                       => 'Positions',
    'singular_name'              => 'Position',
    'menu_name'                  => 'Position',
    'all_items'                  => 'All Positions',
    'edit_item'                  => 'Edit Position',
    'view_item'                  => 'View Position',
    'update_item'                => 'Update Position',
    'add_new_item'               => 'Add New Position',
    'new_item_name'              => 'New Position Name',
    'parent_item'                => 'Parent Position',
    'parent_item_colon'          => 'Parent Position:',
    'search_items'               => 'Search Positions',
    'popular_items'              => 'Popular Positions',
    'separate_items_with_commas' => 'Separate positions with commas',
    'add_or_remove_items'        => 'Add or remove positions',
    'choose_from_most_used'      => 'Choose from the most used positions',
    'not_found'                  => 'No positions found',
  );

  $args = array(
    'labels'            => $labels,
    'public'            => true,
    'show_in_rest'      => true,
    'hierarchical'      => true,
  );

  register_taxonomy('banner-position', 'banner', $args);
}
add_action('init', 'register_banner_position_taxonomy');

// Insert Default Position Terms
function insert_banner_position_terms()
{
  $terms = array('Header', 'Sidebar');
  foreach ($terms as $term) {
    wp_insert_term($term, 'banner-position');
  }
}
add_action('init', 'insert_banner_position_terms');
