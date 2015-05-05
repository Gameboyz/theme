<?php get_header(); ?>

	<?php get_template_part( 'front-page/gallery', 'newest-posts' ); ?>

	<div id="wrap" class="container clearfix">
	
		<section id="content" class="primary" role="main">
	
			<?php get_template_part( 'front-page/gallery', 'posts'); ?>
			
			<?php momentous_display_pagination(); // Display Pagination ?>
			
		</section>

	</div>
	
<?php get_footer(); ?>	