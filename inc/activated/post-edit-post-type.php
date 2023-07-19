<?php

add_action('init', function () {
  $obj = get_post_type_object('post');
  $obj->rewrite['slug'] = 'news';
  $obj->has_archive = true;
  register_post_type('post', $obj);
}, 0);
