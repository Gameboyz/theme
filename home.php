<?php get_header(); ?>

	<?php $theme_options = momentous_theme_options(); ?>

	<?php get_template_part( 'gallery', 'newest-posts' ); ?>

	<div id="wrap" class="container clearfix">
	
		<section id="content" class="primary" role="main">
	
			<?php get_template_part( 'gallery', 'posts'); ?>
			
			<?php momentous_display_pagination(); // Display Pagination ?>
			
		</section>

	</div>
	
<?php get_footer(); ?>	