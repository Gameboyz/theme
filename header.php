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
				<p id="mainnav-icon-tablet" class="mainnav-icon"></p><p id="mainnav-icon-phone" class="mainnav-icon"></p><p id="social-menu-icon"></p>
				<script>
					function test(account) {
						var allItems = $(account).children().first();
						if(allItems.css('display') == 'none')
							allItems.css('display') == 'inline');
						else
							allItems.css('display') == 'none');
					}
				</script>
  			<div style="float:right;margin-left:2em;">
            <?php
		            if (is_user_logged_in()) {
		            		global $current_user;
										global $wc_core;

		                $user_url = get_author_posts_url($current_user->ID);
										//$avatar = um_user_profile_url() . um_profile('profile_photo');
										$avatar = um_get_avatar_uri(get_avatar(um_user('ID')), 'original');
		                ?>
										<div id="account-menu-wrap" style="background-image:url(<?php echo $avatar ?>)" onclick="test(this);">

											<ul>

												 <li><a id="username" href="http://localhost/user/<?php echo $current_user->user_login ?>"><?php echo $current_user->user_login ?></a></li>

												 <li><a id="account-link" href="http://localhost/account/<?php echo $current_user->user_login ?>">My Account</a></li>

												 <li><?php
												  	 	$logout = wp_loginout(add_query_arg( $wp->query_string, '', home_url( $wp->request ) ),false) ;
	         										$logout = preg_replace('!>([^<]+)!is','>'.$wc_core->wc_options_serialized->wc_phrases['wc_log_out'], $logout);
	              							echo '<a href="' . $user_url . '"></a>'. $logout;
												 ?></li>

											</ul> 
										</div>


										<?php

									} else {
		          	?>
	                <div id="account-menu-wrap" style="background-image:url(http://www.dagameboyz.com/wp-content/uploads/2015/05/1cc.png)" onclick="test(this);">
                  	<ul>

			            		<li><a href="<?php echo esc_url( wp_login_url() ); ?>"><?php _e('Log in') ?></a></li>
			            		<li><?php do_action( 'wordpress_social_login' ); ?></li>

										</ul> 
									</div>
			            <?php

								}
	       		 			?>

      </div>
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
		