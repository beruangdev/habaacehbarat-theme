<?php
$args = [
  'post_type' => 'post',
  'posts_per_page' => 3,
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

<div class="bg-background-200/30 p-4 rounded">
  <div class="mb-3 flex justify-between">
    <div>
      <h5>PEMILU 2024</h5>
      <div class="bg-primary-600 h-1 w-20 mt-1"></div>
    </div>
    <a href="#">
      <h6>LIHAT SEMUA</h6>
    </a>
  </div>

  <div class="grid grid-cols-3 gap-4">
    <?php foreach ($posts as $post) : setup_postdata($post); ?>
      <div>
        <?= get_template_part("template-parts/component/card/card-vertical-1") ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<?php wp_reset_postdata(); ?>