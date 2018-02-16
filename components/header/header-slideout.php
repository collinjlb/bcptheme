<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="viewport" content="initial-scale=1.0">
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo home_url(); ?>">
	<link rel="apple-touch-icon" href="<?php echo home_url(); ?>"/>
	<title><?php bloginfo('name'); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container-fluid">
			<div class="row">
				<div class="titt-menu-btn-wrapper titt-menu-btn">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</div>
		</div>
		<div class="titt-menu">
			<?php wp_nav_menu( array(
				'container_id' => 'slide-out-menu'
			) ); ?>
		</div>
	</header>


	<div class="body-container">
