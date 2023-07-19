<?php get_header() ?>
<div class="md:mt-8"></div>
<?= get_template_part('template-parts/page-welcome/section-slide'); ?>
<hr class="opacity-0">
<?= get_template_part('template-parts/page-welcome/section-berita-utama'); ?>
<hr class="opacity-0">
<div class="container">
  <div class="grid grid-cols-12 md:space-x-4">
    <div class="col-span-12 md:col-span-8 mb-6">
      <?= get_template_part('template-parts/component/post-list-horizontal', null, [
        "title" => "PEMILU 2024",
        "query" => [
          'post_type' => 'post',
          'posts_per_page' => wp_is_mobile() ? 2 : 4,
          'tax_query' =>
          [
            // [
            //   'taxonomy' => 'position',
            //   'field' => 'slug',
            //   'terms' => 'berita-utama'
            // ]
          ]
        ]
      ]); ?>
      <div class="mb-6"></div>
      <?= get_template_part('template-parts/page-welcome/section-terbaru'); ?>
    </div>
    <div class="col-span-12 md:col-span-4 space-y-3">
      <?php for ($i = 0; $i < 10; $i++) : ?>
        <div class="bg-red-800 text-white w-full aspect-[16/11] flex items-center justify-center">
          <h3>ADS</h3>
        </div>
      <?php endfor; ?>
    </div>
  </div>
</div>
<?php get_footer() ?>