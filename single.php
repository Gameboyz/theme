<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">
		
		<?php if (have_posts()) : while (have_posts()) : the_post();
		
			get_template_part( 'review', 'single' );

			endwhile;
		
		endif; ?>
			
		<?php //comments_template(); ?>
		
		</section>
		

	</div>
	
<?php get_footer(); ?>	