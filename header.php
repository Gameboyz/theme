<!DOCTYPE html><!-- HTML 5 -->
<html <?php language_attributes(); ?>>

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php // Get Theme Options from Database
	$theme_options = momentous_theme_options();
?>

<div id="wrapper" class="hfeed">

	<div id="header-wrap">
	
		<?php // Display Search Form
		if ( isset($theme_options['header_search']) and $theme_options['header_search'] == true ) : ?>
			
			<div id="header-search-wrap">
			
				<div id="header-search" class="container clearfix">
					<?php get_search_form(true); ?>
				</div>
				
			</div>

		<?php endif; ?>
			
		<header id="header" class="container clearfix" role="banner">

			<div id="logo">
			
				<?php do_action('momentous_site_title'); ?>
				
				<?php // Display Tagline on header if activated
				if ( isset($theme_options['header_tagline']) and $theme_options['header_tagline'] == true ) : ?>			
					<h2 class="site-description"><?php echo bloginfo('description'); ?></h2>
				<?php endif; ?>
			
			</div>
			
			<div id="header-content" class="clearfix">

				<?php // Display Header Search Icon
				if ( isset($theme_options['header_search']) and $theme_options['header_search'] == true ) : ?>
					<div class="header-search-icon">
						<span class="genericon-search"></span>
					</div>
				<?php endif; ?>
				
				<?php // Display Top Navigation
				if ( has_nav_menu( 'secondary' ) ) : ?>
			
					<nav id="topnav" class="clearfix" role="navigation">
						<p id="topnav-icon"></p>
						<?php wp_nav_menu(	array(
							'theme_location' => 'secondary', 
							'container' => false, 
							'menu_id' => 'topnav-menu', 
							'fallback_cb' => '', 
							'depth' => 1)
						);
						?>
					</nav>
			
				<?php endif; ?>
			
			</div>

		</header>
		
		<div id="navigation-wrap">
			
			<div id="navigation" class="container clearfix">
				<p id="mainnav-icon-tablet" class="mainnav-icon"></p><p id="mainnav-icon-phone" class="mainnav-icon"></p><p id="social-menu-icon"></p>
				
				<?php // Display Social Icons in Navigation
					if ( isset($theme_options['header_icons']) and $theme_options['header_icons'] == true ) : ?>

						<div id="navi-social-icons" class="social-icons-wrap clearfix">
							<?php momentous_display_social_icons(); ?>
						</div>

				<?php endif; ?>
				
				
				<nav id="mainnav" class="clearfix" role="navigation">
					<?php // Display Main Navigation
						wp_nav_menu( array(
							'theme_location' => 'primary', 
							'container' => false, 
							'menu_id' => 'mainnav-menu', 
							'echo' => true, 
							'fallback_cb' => 'momentous_default_menu')
						);
					?>
				</nav>
				
			</div>
			
		</div>
	
	</div>

	<?php // Display Custom Header Image
		momentous_display_custom_header(); ?>
		