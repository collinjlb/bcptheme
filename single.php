<?php
/**
* Template Name: Single Post
*
* single-post.php (the Template for displaying all single posts)
*
*/
get_header(); ?>

<div id="primary" class="content-area single-post-page">
  <div id="content" class="site-content" role="main">
    <div class="child-header" style="background-image:url('<?php the_field('child_header_background','option'); ?>');">
      <div class="overlay grey-o"></div>
      <h2><a href="javascript:history.back();"><?php the_title(); ?></a></h2>
    </div>

    <?php
    if (have_posts()) :
     	while (have_posts()) : the_post(); ?>
    		<div class="single-post">
          <div class="time">
            <h5><?php the_time('d'); ?></h5>
            <h5><?php the_time('M'); ?></h5>
          </div>
     			<?php the_content(); ?>
          <h6>Published by <?php the_author(); ?></h6>
     		</div>
     	<?php endwhile;

    else :
    	echo '<p>No content found</p>';

    endif;
    ?>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>
