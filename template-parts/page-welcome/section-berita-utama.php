<?php
$args = [
  'post_type' => 'post',
  'posts_per_page' => 9,
  'tax_query' =>
  [
    [
      'taxonomy' => 'position',
      'field' => 'slug',
      'terms' => 'berita-utama'
    ]
  ]
];

$query = new WP_Query($args);
$posts = $query->get_posts();
?>

<div class="container">
  <div class="mb-3">
    <h4>BERITA UTAMA</h4>
    <div class="bg-primary-600 h-1 w-20 mt-1"></div>
  </div>

  <div class="swiper slide-berita-utama">
    <div class="swiper-wrapper pb-6">
      <?php foreach ($posts as $post) : setup_postdata($post); ?>
        <div class="w-48 inline-block swiper-slide">
          <?= get_template_part("template-parts/component/card/card-vertical-1", null, []) ?>
        </div>
      <?php endforeach; ?>
    </div>
    <div class="swiper-scrollbar"></div>
  </div>
</div>

<?php wp_reset_postdata(); ?>