<?php
$image_id = get_post_thumbnail_id();
$image_src = wp_get_attachment_image_src($image_id, $args['imgSize'] ?? "thumbnail")[0];
$image_srcset = wp_get_attachment_image_srcset($image_id, $args['imgSize'] ?? "thumbnail");
?>

<!-- card horizontal 3 -->
<div class="group flex gap-3 w-full cursor-pointer relative">
  <a href="<?= get_permalink() ?>" class="absolute inset-0"></a>
  <a href="<?= get_permalink() ?>" class="min-w-[23%] w-[23%] md:min-w-[20%] md:w-[20%]">
    <div class="aspect-square md:aspect-[16/11] overflow-hidden w-full mb-3 rounded-md">
      <?= get_template_part("template-parts/component/image", null, [
        "src" => $image_src,
        "srcset" => $image_srcset,
        "alt" => get_the_title(),
        "class" => "w-full object-cover object-center group-hover:scale-110"
      ]) ?>
    </div>
  </a>
  <div class="flex flex-col justify-between pb-3 md:pt-2 pr-2">
    <a href="<?= get_permalink() ?>" class="no-underline hover:opacity-80 mb-3">
      <p class="leading-5 md:text-xl group-hover:text-primary-700 group-hover:dark:text-primary-500"><?= get_the_title(); ?></p>
    </a>

    <div class="opacity-90">
      <div class="text-xs flex gap-x-2">
        <p class="flex items-center gap-1">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <?= human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
        </p>
      </div>
      <?php $categories = get_the_category();
      if ($categories) : ?>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3.5 h-3.5">
          <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
        </svg>
        <?php foreach ($categories as $category) : ?>
          <a href="<?= esc_url(get_category_link($category->term_id)); ?>" class="text-xs"><?= esc_html($category->name); ?></a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>