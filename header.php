<?php
/**
 * @package WordPress
 * @subpackage Clean-Wordpress-Reset-Theme
 * @since Clean Wordpress Reset 1.0
 */
?><!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<!--[if IE ]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		if (is_search())
			echo '<meta name="robots" content="noindex, nofollow" />';
	?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="header" role="banner">
		<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		<div class="description"><?php bloginfo( 'description' ); ?></div>
	</header>

	<nav id="nav" role="navigation">
		<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
	</nav>

