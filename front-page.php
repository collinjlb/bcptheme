<?php
/**
* Template Name: Home Page
*
* home-page-template.php
*
*/
get_header(); ?>

<div id="primary" class="content-area home-page-template">
  <div id="content" class="site-content" role="main">
    <!--- Content Goes Here -->


    <section class="hero">
      <video id="videobcp" autoplay muted loop>
       <source src="<?php the_field('hero_video'); ?>" type="video/mp4">
      </video>
      <div class="overlay black-o"></div>
      <h1 class="hero-heading"><?php the_field('hero_heading'); ?></h1>
    </section>


    <!-- First content section -->
    <section class="one">
      <div class="heading-section">
        <h2 class="one-heading"><?php the_field('one_heading'); ?></h2>
        <div class="my-divider"></div>
      </div>
      <div class="one-content">
        <p><?php the_field('one_content'); ?></p>
      </div>
    </section>


    <!-- Map & Location Section -->
    <section class="two" style="background-image: url('<?php the_field('two_background'); ?>');">

      <!-- Shortcode to call in mapSVG -->
      <div class="bcp-map" id="#bcpmap">
        <?php echo do_shortcode('[mapsvg id="60"]'); ?>
      </div>

      <!-- Invisible Tabs to target on state selection -->
      <div class="map-content">
        <?php if ( have_rows('locations','option') ): ?>
          <ul class="nav nav-tabs" id="myTab" role="tablist" style="display: none;">
            <?php while ( have_rows('locations','option') ): the_row();
              // vars
              $id = get_sub_field('id');
            ?>
            <li class='nav-item'>
              <a class="nav-link <?php echo $id; ?>" data-toggle="tab" href="#tab-<?php echo $id; ?>" role="tab" aria-controls="tab-<?php echo $id;?>"><?php echo $id; ?></a>
            </li>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          </ul>

          <!-- This needs to be separate from tab-pane -->
          <!-- Mobile select dropdown to target locations page -->
          <div class="map-select mobile">
            <h4 class="mobile">our locations in</h4>
            <select class="state-title mobile" name="state-title selection">
              <option value="" selected>Select A State</option>
              <?php if ( have_rows('locations','option') ): ?>
                <?php while ( have_rows('locations','option') ): the_row();
                // vars
                  $id = get_sub_field('id');
                  $state = get_sub_field('state');
                ?>
                  <option value="<?php echo $id; ?>" href="https://google.com"><?php echo $state; ?></option>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>
            </select>
          </div>


          <!-- State Tab Panes to display companies and any other state information -->
          <div class="tab-content">
            <?php while ( have_rows('locations','option') ): the_row();
              // vars
              $id = get_sub_field('id');
              $state = get_sub_field('state');
            ?>

              <div class="tab-pane" id="tab-<?php echo $id; ?>" role="tabpanel">
                <h4 class="desktop">our locations in</h4>
                <h2 class="state-title desktop"><?php echo $state; ?></h2>
                <div class="state-border"></div>

                <!-- logos loop here -->
                <?php if ( have_rows('companies') ): ?>
                <div class="companies">

                  <?php while ( have_rows('companies') ): the_row();
                  // vars
                    $company = get_sub_field('company');
                  ?>

                    <div class="company-logo">
                      <?php echo $company['value']; ?>
                    </div>

                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                </div>
                <?php endif; ?>

              </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
          <?php endif; ?>
          </div>
          <script>
            $(function () {
              $('#myTab .nav-item .US-TN').tab('show');
            })
          </script>
      </div>

    </section>



    <!-- A craaaaazy blog layout -->
    <section class="three">
      <?php
      // vars
        $args = array('posts_per_page' => '3', 'category' => 'news');
        $query = new WP_Query( $args );
      ?>
      <?php if ( $query->have_posts() ) : ?>
        <?php $count = 0; ?>

        <div class="post-view">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <?php $count++; ?>

            <?php if ($count == 1) : ?>
              <div class="most-recent">
                <div class="left-column">
                  <div class="top-left">
                    <h5><?php the_time('M'); ?></h5>
                    <div class="date-border"></div>
                    <h5><?php the_time('d'); ?></h5>
                  </div>
                  <div class="bottom-left" style="background-image: url('http://jlbdev1.net/bcpgroup/public_html/wp-content/uploads/2018/02/Recent-Press.jpg')">
                    <img src="http://jlbdev1.net/bcpgroup/public_html/wp-content/uploads/2018/02/corner-pattern.png" alt="smudge">
                  </div>
                </div>
                <div class="right-column" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" title="<?php echo the_title(); ?>">
                  <div class="overlay grey-o2"></div>
                  <div class="right-bottom">
                    <div class="bottom-left">
                      <?php the_excerpt(); ?>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="read-more">
                      <h6>read more</h6>
                    </a>
                  </div>
                </div>
              </div>
            <?php endif; ?>
            <?php if ($count == 2) : ?>
              <div class="right-container">
                <a href="<?php echo the_permalink(); ?>" class="second-recent" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" title="<?php echo the_title(); ?>">
                  <div class="overlay grey-o"></div>
                  <div class="top-right">
                    <h4><?php the_time('M'); ?> | <?php the_time('d'); ?></h4>
                  </div>
                  <h3><?php the_title(); ?></h3>
                </a>
              <?php endif; ?>
              <?php if ($count == 3) : ?>
                <div class="third-container">
                  <a href="<?php echo the_permalink(); ?>" class="third-recent" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');" title="<?php echo the_title(); ?>">
                    <div class="overlay blue-o"></div>
                  </a>
                  <a class="go-blog" href="<?php echo home_url(); ?>/blog/">
                    <div class="arrow" style="background-image: url('http://jlbdev1.net/bcpgroup/public_html/wp-content/uploads/2018/01/MORE-POSTS.png');"></div>
                  </a>
                </div>
              </div>
            <?php endif; ?>

          <?php endwhile; ?>
        </div>
      <?php endif; ?>

    </section>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer();?>
