<?php
// Template Name: Default
/**
 * The template for displaying Archive pages
 **/

get_header(); ?>

<div id="primary">
  <div id="content" class="archivePage">
    <div class="blog-container">

      <?php
        $args = array( 'category' => 'news', 'posts_per_page' => '-1' );
        $query = new WP_Query( $args );
      ?>
      <?php if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post() ?>

          <div class="blog-post">
            <h3><?php the_title(); ?></h3>
            <h5><?php the_author(); ?></h5>
            <?php the_excerpt(); ?>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>

    </div>
  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
