<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
	
<?php 
	// Get Theme Options from Database
	$theme_options = momentous_theme_options();

	// Display Featured Posts on homepage
	if ( is_front_page() && momentous_has_featured_content() ) :
		
		// Include the featured content template.
		get_template_part( 'featured-content' );
		
	endif;
?>
		<section id="content" class="primary" role="main">
			
		<?php // Display Latest Posts Title
		if ( isset( $theme_options['latest_posts_title'] ) and $theme_options['latest_posts_title'] <> '' ) : ?>
					
			<h2 id="home-title" class="archive-title">
				<?php echo wp_kses_post($theme_options['latest_posts_title']); ?>
			</h2>
	
		<?php endif; ?>
			
			<div id="post-wrapper" class="clearfix">
		 
			<?php if (have_posts()) : while (have_posts()) : the_post();
		
				get_template_part( 'content', $theme_options['post_layout'] );
		
				endwhile; ?>
			
			</div>
			
			<?php // Display Pagination	
				momentous_display_pagination();

			endif; ?>
			
		</section>
		
		<?php get_sidebar(); ?>
		
	</div>
	
<?php get_footer(); ?>	