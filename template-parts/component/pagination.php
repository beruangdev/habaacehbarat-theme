<?php
global $wp_query;

$total_pages = $wp_query->max_num_pages;
$current_page = max(1, get_query_var('paged'));

$prev_page = max(1, $current_page - 1);
$next_page = min($total_pages, $current_page + 1);

$show_pages = 3;
$start_page = max(1, $current_page - floor($show_pages / 2));
$end_page = min($total_pages, $start_page + $show_pages - 1);

?>
<?php if ($total_pages > 1) : ?>
  <div class="mt-6 flex justify-between items-center gap-3">
    <?php if (get_previous_posts_link()) : ?>
      <div>
        <?php previous_posts_link('<span class="px-3 py-2 rounded-md text-gray-700 hover:bg-gray-300 dark:hover:bg-background-950 no-underline">' . __('Previous', 'textdomain') . '</span>'); ?>
      </div>
    <?php endif; ?>

    <div class="flex gap-3">
      <?php if ($start_page > 1) : ?>
        <a href="<?php echo get_pagenum_link(1); ?>" class="px-3 py-1 rounded-md text-gray-700 hover:bg-gray-300 dark:hover:bg-background-950 no-underline">1</a>
      <?php endif; ?>

      <?php for ($i = $start_page; $i <= $end_page; $i++) : ?>
        <?php if ($i === $current_page) : ?>
          <a href="<?php echo get_pagenum_link($i); ?>" class="px-3 py-1 rounded-md text-white bg-primary-700 hover:bg-primary-900 no-underline"><?php echo $i; ?></a>
        <?php else : ?>
          <a href="<?php echo get_pagenum_link($i); ?>" class="px-3 py-1 rounded-md text-gray-700 hover:bg-gray-300 dark:hover:bg-background-950 no-underline"><?php echo $i; ?></a>
        <?php endif; ?>
      <?php endfor; ?>

      <?php if ($end_page < $total_pages) : ?>
        <a href="<?php echo get_pagenum_link($total_pages); ?>" class="px-3 py-1 rounded-md text-gray-700 hover:bg-gray-300 dark:hover:bg-background-950 no-underline"><?php echo $total_pages; ?></a>
      <?php endif; ?>
    </div>

    <?php if (get_next_posts_link()) : ?>
      <div>
        <?php next_posts_link('<span class="px-3 py-2 rounded-md text-gray-700 hover:bg-gray-300 dark:hover:bg-background-950">' . __('Next', 'textdomain') . '</span>'); ?>
      </div>
    <?php endif; ?>
  </div>
<?php endif; ?>