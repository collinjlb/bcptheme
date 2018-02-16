<?php
/**
* Template Name: Page
*
* page.php (the Template for displaying all single posts)
*
*/
get_header(); ?>

<div id="primary" class="content-area">
  <div id="content" class="site-content" role="main">
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
