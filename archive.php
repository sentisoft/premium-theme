<?php get_header(); ?>

<div id="main" class="site-main">

  <div id="content" class="site-content archive-page" role="main">
    <?php if(have_posts()): ?>
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php /* If this is a category archive */ if (is_category()) { ?>
      <h2 class="title">Archive for the '<?php single_cat_title(); ?>' Category</h2>
    <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
      <h2 class="title">Posts Tagged '<?php single_tag_title(); ?>'</h2>
    <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
      <h2 class="title">Archive for <?php the_time('F jS, Y'); ?></h2>
    <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
      <h2 class="title">Archive for <?php the_time('F, Y'); ?></h2>
    <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
      <h2 class="title">Archive for <?php the_time('Y'); ?></h2>
    <?php /* If this is an author archive */ } elseif (is_author()) { ?>
      <h2 class="title">Author Archive</h2>
    <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
      <h2 class="title">Blog Archives</h2>
    <?php } ?>
    <?php while(have_posts()) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <h3 class="title"><?php the_title(); ?></h3>
        <p class="meta icon">
          Posted by <?php the_author() ?> on <?php the_time('F j Y') ?> <a href="<?php the_permalink() ?>#comment"><?php comments_number('Add Comments','one Commented','% Commented'); ?></a>
        </p>
        <div class="entry">
          <?php the_excerpt(); ?>
        </div>
      </article><!-- #post -->

    <?php endwhile ?>

      <div class="navigation">
        <div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
        <div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
      </div>

    <?php else: ?>
      <?php get_template_part( 'content', 'none' ); ?>
    <?php endif ?>
  </div>

</div><!-- #main -->

<?php get_footer(); ?>

