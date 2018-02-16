<?php
/**
* Template Name: Home
*
* home.php (the Template for displaying all single posts)
*
*/
get_header(); ?>

<div id="primary">
  <div id="content" class="blogPage">
    <div class="child-header" style="background-image: url('<?php the_field('child_header_background','option'); ?>');">
      <div class="overlay grey-o"></div>
      <h2>Press</h2>
    </div>

    <div class="blog-container">

      <?php
        $args = array( 'category' => 'news', 'posts_per_page' => '12' );
        $query = new WP_Query( $args );
      ?>
      <?php if ( $query->have_posts() ): ?>
        <?php while ( $query->have_posts() ): $query->the_post() ?>
            <a class="blog-post" href="<?php the_permalink(); ?>">
              <div class="featured-image" style="background-image:url('<?php if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail_url();
              } else { ?>
                <?php the_field('child_header_background','option'); ?>
              <?php } ?>');">
                <div class="overlay blue-o"></div>
                <?php the_excerpt(); ?>
              </div>
              <div class="content">
                <h4 class="title"><?php the_title(); ?></h4>
                <h6 class="author"><?php the_author(); ?></h6>
                <div class="time">
                  <h5 class="number"><?php the_time('d'); ?></h5>
                  <h5 class="month"><?php the_time('M'); ?></h5>
                </div>
              </div>
            </a>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
