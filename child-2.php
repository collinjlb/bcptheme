<?php
/**
* Template Name: Child 2
*
* child-2.php
*
*/
get_header(); ?>

<div id="primary" class="content-area child-2">
  <div id="content" class="site-content" role="main">
    <?php get_template_part('/components/header/child-header'); ?>

    <?php
    if (have_posts()) :
    	while (have_posts()) : the_post(); ?>
    		<?php the_content(); ?>
    	<?php endwhile;

    else :
    	echo '<p>No content found</p>';

    endif;
    ?>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer();?>
