<?php get_header(); ?>

<div class="container grid grid-cols-12">
  <div class="col-span-12 md:col-span-8">
    <?php if (have_posts()) : the_post(); ?>
      <div class="flex gap-3">
        <?php if (has_category()) : ?>
          <p class="category">
            <?php esc_html_e('# ', 'your-theme'); ?> <?php the_category(', '); ?>
          </p>
        <?php endif; ?>
      </div>
      <h1><?php the_title(); ?></h1>
      <div class="mb-4 flex flex-col">
        <div class="flex gap-3">
          <p class="date">
            <?php esc_html_e('Published on', 'your-theme'); ?> <?php the_date(); ?>
          </p>

          <p class="author">
            <?php esc_html_e('By', 'your-theme'); ?> <?php the_author(); ?>
          </p>
        </div>
      </div>

      <div>
        <?php if (has_post_thumbnail()) : ?>
          <div class="post-thumbnail mb-8">
            <?php the_post_thumbnail('large', ['class' => 'w-full']); ?>
          </div>
        <?php endif; ?>

        <div class="content mb-4">
          <?php the_content(); ?>
        </div>

        <?php if (has_tag()) : ?>
          <p class="tags">
            <?php esc_html_e('Tags:', 'your-theme'); ?> <?php the_tags('', ', '); ?>
          </p>
        <?php endif; ?>
      </div>
    <?php else : ?>
      <p><?php esc_html_e('No content found.', 'your-theme'); ?></p>
    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>