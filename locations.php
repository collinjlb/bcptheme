<?php
/**
* Template Name: Locations
*
* locations.php
*
*/
get_header(); ?>

<div id="primary" class="content-area locations">
  <div id="content" class="site-content" role="main">
    <?php get_template_part('/components/header/child-header'); ?>


    <!-- Main Container -->
    <div class="locations-container">
      <?php if ( have_rows('locations','option') ): ?>


        <!-- Select Dropdown -->
        <div class="state-select">
          <h4 class="title">FIND A LOCATION</h4>
          <select class="state-title" name="state-title selection">
            <option value="" selected>Select A State</option>
            <?php if ( have_rows('locations','option') ): ?>
              <?php while ( have_rows('locations','option') ): the_row();
              // vars
                $id = get_sub_field('id');
                $state = get_sub_field('state');
              ?>
                <option value="<?php echo $id; ?>"><?php echo $state; ?></option>
              <?php endwhile; ?>
              <?php wp_reset_postdata(); ?>
            <?php endif; ?>
          </select>
        </div>

        <!-- Invisible Tabs to toggle state info panes -->
        <ul class="nav nav-tabs nav-fill" id="locationTab" role="tablist">
          <?php while ( have_rows('locations','option') ): the_row();
            // vars
            $id = get_sub_field('id');
            $state = get_sub_field('state');
          ?>

            <li class='nav-item'>
              <a class="nav-link <?php echo $id; ?>" data-toggle="tab" href="#<?php echo $id; ?>" role="tab" aria-controls="tab-<?php echo $id;?>"><?php echo $state; ?></a>
            </li>

          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </ul>

        <!-- Location content panes to shown after dropdown select -->
        <div class="tab-content">
          <?php while ( have_rows('locations','option') ): the_row();
            // vars
            $id = get_sub_field('id');
            $state = get_sub_field('state');
            $icons = get_sub_field('companies');
          ?>
            <div class="tab-pane" id="<?php echo $id; ?>" role="tabpanel">
              <h2 class="state-title"><?php echo $state; ?></h2>
              <div class="companies">
                <!-- logos loop here -->
                <?php if ( have_rows('companies') ): ?>
                  <div class="company-section">
                  <?php while ( have_rows('companies') ): the_row();
                  // vars
                    $company = get_sub_field('company');
                  ?>
                    <div class="company-holder">
                      <div class="company-logo">
                        <?php echo $company['value']; ?>
                      </div>
            				  <?php if ( have_rows('locations') ): ?>
                      <div class="company-content">
                        <hr>
          				  	<?php while ( have_rows('locations') ): the_row();
          				  	//vars
          				  		$map = get_sub_field('map');
          				  		$content = get_sub_field('content');
          				  	?>
                        <div class="location-holder">
                          <div class="map">
                            <?php echo $map; ?>
                          </div>
                          <div class="content">
                            <div class="info">
                              <?php echo $content; ?>
                            </div>
                          </div>
                        </div>
                        <hr>
          				 	  <?php endwhile; ?>

                      </div>
                    </div>
          				  <?php endif; ?>

                  <?php endwhile; ?>
                  </div>
                  <?php wp_reset_postdata(); ?>
                <?php endif; ?>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        </div>
        <script>
          $(function () {
            $('#locationTab .nav-item:first-child .nav-link').tab('show');
          })
        </script>
      <?php endif; ?>
    </div>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer();?>
