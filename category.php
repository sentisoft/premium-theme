<?php get_header(); ?>

<div id="main" class="site-main">

  <div id="content" class="site-content category-page" role="main">
    <?php /* The loop */ ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h2 class="title"><?php the_title(); ?></h2>
      <div class="entry-content">
        <p><?php truncate_post('80'); ?></p>
      </div>
      <div class="entry-meta">
        <a class="more-link" href="<?php the_permalink() ?>#more"><?php _e( 'read more', 'themedomain' ); ?></a>
      </div>
    </article><!-- #post -->
    <?php endwhile; ?>
    <?php else : ?>
      <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>
  </div><!-- #content -->

</div><!-- #main -->

<?php get_footer(); ?>
