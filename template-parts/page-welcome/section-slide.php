<?php
$args = array(
  'post_type' => 'post',
  'posts_per_page' => 9,
  'tax_query' => array(
    array(
      'taxonomy' => 'position',
      'field' => 'slug',
      'terms' => 'slide-welcome-page'
    )
  )
);

$query = new WP_Query($args);
$posts = $query->get_posts();
$chunks = array_chunk($posts, 5);
$slide_posts = $chunks[0] ?? [];
$post_list_posts = $chunks[1] ?? [];
?>

<div class="grid grid-cols-12 gap-6 container">
  <!-- slide -->
  <div class="col-span-12 md:col-span-7">
    <div class="swiper slide-welcome">
      <div class="swiper-wrapper">
        <?php foreach ($slide_posts as $post) : setup_postdata($post); ?>
          <div class="swiper-slide relative">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="Slide Image" class="w-full aspect-video">
            </a>
            <div class="absolute bottom-0 inset-x-0 pt-10 px-4 pb-6 bg-gradient-to-t from-background-100 dark:from-background-900 from-10% via-background-100/50  dark:via-background-900/50 via-60% to-transparent bg-opacity-50">
              <a href="<?= get_permalink() ?>" class="absolute inset-0"></a>
              <div class="flex items-center mb-3 gap-2 relative w-fit">
                <?php foreach (get_the_category() as $category) : ?>
                  <a href="<?= get_category_link($category->term_id) ?>" class="text-sm font-semibold"><?= esc_html($category->name) ?></a>
                <?php endforeach; ?>
              </div>
              <a href="<?php the_permalink(); ?>" class="no-underline hover:opacity-75 relative">
                <h3 class="border-l-4 border-background-900 dark:border-background-100 pl-2 hover:border-primary-700 dark:hover:border-primary-700"><?php the_title(); ?></h2>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>

  <!-- post list -->
  <div class="col-span-12 md:col-span-5 space-y-1">
    <?php foreach ($post_list_posts as $post) : setup_postdata($post); ?>
      <? get_template_part("template-parts/component/card/card-horizontal-2") ?>
    <?php endforeach; ?>
  </div>
</div>

<?php wp_reset_postdata(); ?>