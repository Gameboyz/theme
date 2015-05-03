<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
	
<?php $theme_options = momentous_theme_options(); ?>
		<section id="content" class="primary" role="main">
	
			<?php get_template_part( 'gallery', 'newest-posts' ); ?>
			
			<?php get_template_part( 'gallery', 'posts'); ?>
			
			<?php momentous_display_pagination(); // Display Pagination ?>
			
		</section>

	</div>
	
<?php get_footer(); ?>	