<?php
$query = new WP_Query($args['query']);
$posts = $query->get_posts();
?>
<div class="bg-background-200/30 dark:bg-background-925 p-4 rounded">
  <div class="mb-3 flex justify-between">
    <div>
      <h5><?= $args["title"] ?></h5>
      <div class="bg-primary-600 h-1 w-20 mt-1"></div>
    </div>
    <a href="#">
      <h6>LIHAT SEMUA</h6>
    </a>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
    <?php foreach ($posts as $post) : setup_postdata($post); ?>
      <?= get_template_part("template-parts/component/card/card-vertical-1") ?>
    <?php endforeach; ?>
  </div>
</div>
<?php wp_reset_postdata(); ?>