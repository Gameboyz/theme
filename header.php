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

<a href="https://github.com/Gameboyz/theme/issues">

	<div id="gb-issues-wrap">

		<div id="gb-issues"><span>Pre-Alpha | Bug Tracker -></span><div id="github-issues"></div></div>

	</div>

</a>

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

				<?php

				/* Usermenu 
				---------------------------------------------------------------------------------- */

				if ( is_user_logged_in() && is_plugin_active('ultimate-member/index.php') ) {

					global $current_user;
					global $wc_core;

					$avatarImgNode = simplexml_load_string(um_user('profile_photo'));

					?>
					<div id="account-menu-wrap" style="background-image:url(<?php echo $avatarImgNode['src']; ?>)" onclick="gb_dropdown(this);">

						<ul>

							<li id="username" >
								
								<div>You are logged in as: </div>

								<a href="<?php echo site_url('/user/' . $current_user->user_login) ?>"><?php echo $current_user->user_login ?></a>

							</li>

							<li id="account">

								<a href="<?php echo site_url('/account/' . $current_user->user_login) ?>">My Account Settings</a>

							</li>

							<li id="logout">

								<a href="<?php echo wp_logout_url(get_permalink()); ?>">Logout</a>

							</li>

						</ul> 

					</div>

					<?php

				} else {					
					?>

					<div id="account-menu-wrap" style="background-image:url(<?php echo um_get_default_avatar_uri() ?>)" onclick="gb_dropdown(this);">

						<ul>
							
							<li id="register"><a href="<?php echo site_url('/wp-login.php?action=register'); ?>">Register</a></li>

							<li id="login"><a href="<?php echo esc_url(wp_login_url()); ?>">Login</a></li>

							<li id="social-login-wrap"><?php do_action('wordpress_social_login'); ?></li>

						</ul>

					</div>

					<?php
				}

				?>

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
		