<?php
$args = [
  'post_type' => 'post',
  'posts_per_page' => 20,
];

$query = new WP_Query($args);
$posts = $query->get_posts();
?>

<div class="">
  <div class="mb-3 flex justify-between">
    <div>
      <h5>BERITA TERBARU</h5>
      <div class="bg-primary-600 h-1 w-20 mt-1"></div>
    </div>
  </div>

  <div class="flex flex-col space-y-3">
    <?php foreach ($posts as $index => $post) : setup_postdata($post); ?>
      <div>
        <?= get_template_part("template-parts/component/card/card-horizontal-3") ?>
      </div>
      <?php if ($index === 5) : ?>
        <?= get_template_part('template-parts/component/post-list-horizontal', null, [
          "title" => "LAPORAN INTERAKTIF",
          "query" => [
            'post_type' => 'post',
            'posts_per_page' => wp_is_mobile() ? 2 : 3,
            'tax_query' =>
            [
              [
                'taxonomy' => 'position',
                'field' => 'slug',
                'terms' => 'laporan-interaktif'
              ]
            ]
          ]
        ]); ?>
      <?php endif; ?>
      <?php if ($index === 10) : ?>
        <?= get_template_part('template-parts/component/post-list-horizontal-2', null, [
          "title" => "REKOMENDASI UNTUK ANDA",
          "query" => [
            'post_type' => 'post',
            'posts_per_page' => wp_is_mobile() ? 4 : 6,
            'tax_query' =>
            [
              [
                'taxonomy' => 'position',
                'field' => 'slug',
                'terms' => 'rekomendasi'
              ]
            ]
          ]
        ]); ?>
      <?php endif; ?>
      <?php if ($index === 15) : ?>
        <?= get_template_part('template-parts/component/post-list-horizontal', null, [
          "title" => "GALERI FOTO",
          "query" => [
            'post_type' => 'post',
            'posts_per_page' => wp_is_mobile() ? 2 : 3,
            'tax_query' =>
            [
              [
                'taxonomy' => 'position',
                'field' => 'slug',
                'terms' => 'berita-utama'
              ]
            ]
          ]
        ]); ?>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>
<?php wp_reset_postdata(); ?>