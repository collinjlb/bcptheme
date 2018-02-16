<?php
/**
* Template Name: Child 1
*
* child-1.php
*
*/
get_header(); ?>

<div id="primary" class="content-area child-1">
  <div id="content" class="site-content" role="main">
    <?php get_template_part('/components/header/child-header'); ?>

    <div class="child-container">
      <?php
      if (have_posts()) :
       	while (have_posts()) : the_post(); ?>
      		<?php the_content(); ?>
      	<?php endwhile;

      else :
      	echo '<p>No content found</p>';

      endif;
      ?>
    </div>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer();?>
