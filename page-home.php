<?php
/*
Template Name: Home Template
*/
?>
<?php get_header(); ?>

<div id="main" class="site-main home-page">

  <div id="content" class="site-content template-page" role="main">

    <?php
    /* The Main loop */ ?>
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <div class="top-intro">
        <a href="#" class="logo-home"><img src="<?php bloginfo('template_directory'); ?>/images/logo-home.png" alt="<?php the_title(); ?>"></a>
        <div class="entry-content">
          <?php
          $book_now = get_post_meta( $post->ID, 'book_now', true );
            if ( $book_now ) {
              echo '<a href="'.$book_now.'" class="button light">'. __( 'Book Now', 'twentyfifteen' ) .'</a>';
            } else {
          }; ?>
          <?php the_content(''); ?>
        </div>
      </div>
    <?php endwhile; ?>
    <?php else : ?>
      <?php get_template_part( 'content', 'none' ); ?>
    <?php endif; ?>

    <?php
    /* Query for 4 featured post */
    $featured_query = new WP_Query( array( 'category_name' => 'featured', 'posts_per_page' => 4, 'order' => 'DESC' ) ); ?>
    <?php if ( $featured_query->have_posts() ) : ?>
      <?php $counter = 0; // postcounter ?>
      <ul class="featured-intro">
        <?php while ( $featured_query->have_posts() ) : $featured_query->the_post(); ?>
          <?php $counter++; // postcounter + 1 ?>
          <?php
            $featured_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
          ?>
          <li style="background-image: url(<?php echo $featured_image; ?>);" class="postcounter-<?php echo $counter; ?>">
            <div class="entry-content">
              <div class="inner">
                <?php the_title( '<h2>', '</h2>' ); ?>
                <?php the_content(''); ?>
                <?php
                $book_now = get_post_meta( $post->ID, 'book_now', true );
                if ( $book_now ) {
                  echo '<a href="'.$book_now.'" class="button light">'. __( 'Book Now', 'twentyfifteen' ) .'</a>';
                } else { // button not showing
                }; ?>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php wp_reset_postdata(); ?>
    <?php else: endif; ?>

  </div><!-- #content -->

</div><!-- #main -->
