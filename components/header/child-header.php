<?php
/**
* Template Name: Child Header
*
* child-header.php
*
*/
get_header(); ?>

<div class="child-header" style="background-image: url('<?php the_field('child_header_background','option'); ?>')">
  <div class="overlay grey-o"></div>
  <h2><?php echo get_the_title(); ?></h2>
</div>
