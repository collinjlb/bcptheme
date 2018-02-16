<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="initial-scale=1.0">
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url(); ?>/wp-content/uploads/2018/01/BCP-favicon-02.png">
		<link rel="apple-touch-icon" href="<?php echo home_url(); ?>/wp-content/uploads/2018/01/BCP-favicon-02.png"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<title><?php wp_title(''); ?></title>
		<?php wp_head(); ?>
	<noscript>
		<style>
			.hidden_animated {
				opacity: 1;
			}
		</style>
	</noscript>
	</head>
<body <?php body_class(); ?>>
<header>
  	<div class="header">
      <div class="header-left">
        <a class="logo-container" href="<?php echo home_url(); ?>">
          <div class="logo" style="background-image: url('<?php the_field('header_logo','option'); ?>');"></div>
        </a>
      </div><!-- Header Left -->
      <div class="header-right">
        <?php wp_nav_menu( array( 'menu' => 'Top Menu' ) ); ?>
      </div><!-- Header Right -->

      <!-- Button trigger modal -->
        <button type="button" class="mobile-button" onclick="myFunction(this)">
          <div class="nav-button">
            <div class="bar1 bar"></div>
            <div class="bar2 bar"></div>
            <div class="bar3 bar"></div>
          </div>
          <script>
            function myFunction(x) {
              x.classList.toggle("change");
            }
          </script>
        </button><!-- Button -->
      </div><!-- Header Bottom -->

		  <!-- Mobile Menu -->
      <div class="mobile-menu" id="mobileMenu">
        <div class="menu-container">
          <?php wp_nav_menu( array( 'menu' => 'Top Menu' ) ); ?>
        </div>
      </div><!-- Collapse -->
</header>

<div class="body-container">
