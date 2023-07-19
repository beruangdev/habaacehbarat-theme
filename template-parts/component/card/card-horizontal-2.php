<?php
$image_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src($image_id, $args['imgSize'] ?? "medium");
$image_srcset = wp_get_attachment_image_srcset($image_id, $args['imgSize'] ?? "medium");
?>

<div class="group flex gap-3 rounded-md border hover:bg-background-200/30 dark:hover:bg-background-925/50 w-full cursor-pointer relative">
  <a href="<?= get_permalink() ?>" class="absolute inset-0"></a>
  <a href="<?= get_permalink() ?>" class="min-w-[25%] w-[25%]">
    <div class="aspect-[16/11] overflow-hidden w-full h-full mb-3 rounded-l-md">
      <img class="w-full h-full object-cover object-center group-hover:scale-110" src="<?= $image_src ?>" srcset="<?= $image_srcset ?>" alt="">
    </div>
  </a>
  <div class="flex flex-col justify-between pb-1 pt-2 pr-2">
    <a href="<?= get_permalink() ?>" class="no-underline hover:opacity-80 mb-3">
      <h6 class="leading-5 group-hover:text-primary-700 group-hover:dark:text-primary-500"><?= get_the_title(); ?></h6>
    </a>

    <div class="opacity-90">
      <div class="text-xs flex gap-x-2">
        <p class="flex items-center gap-1"><i data-feather="user" class="h-3.5"></i><?= get_the_author(); ?></p>
        <p class="flex items-center gap-1"><i data-feather="clock" class="h-3.5"></i><?= human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?></p>
      </div>
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