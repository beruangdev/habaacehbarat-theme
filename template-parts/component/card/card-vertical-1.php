<?php
$image_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src($image_id, $args['imgSize'] ?? "medium");
$image_srcset = wp_get_attachment_image_srcset($image_id, $args['imgSize'] ?? "medium");
?>

<div class="flex flex-col flex-wrap">
  <a href="<?= get_permalink() ?>" class="no-underline hover:opacity-80 h-fit">
    <div class="aspect-video overflow-hidden w-full mb-2">
      <img class="w-full object-cover object-center group-hover:scale-110" src="<?= $image_src ?>" srcset="<?= $image_srcset ?>" alt="">
    </div>
  </a>
  <div class="flex flex-col flex-1 relative">
    <a href="<?= get_permalink() ?>" class="absolute inset-0"></a>
    <a href="<?= get_permalink() ?>" class="no-underline hover:opacity-80">
      <h6 class="leading-5 mb-4 text-sm group-hover:text-primary-700 group-hover:dark:text-primary-500"><?= get_the_title(); ?></h6>
    </a>
    <div class="opacity-90 w-fit mt-auto">
      <div class="text-xs flex gap-x-2">
        <p class="flex items-center gap-1"><i data-feather="user" class="h-3.5"></i><?= get_the_author(); ?></p>
        <p class="flex items-center gap-1"><i data-feather="clock" class="h-3.5"></i><?= human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></p>
      </div>
    </div>

    <div class="opacity-90 w-fit">
      <?php $categories = get_the_category();
      if ($categories) : ?>
        <i data-feather="hash" class="h-3.5"></i>
        <?php foreach ($categories as $category) : ?>
          <a href="<?= esc_url(get_category_link($category->term_id)); ?>" class="text-xs"><?= esc_html($category->name); ?></a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>