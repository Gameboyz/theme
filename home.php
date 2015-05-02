<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
	
<?php $theme_options = momentous_theme_options(); ?>
		<section id="content" class="primary" role="main">
			
			<div id="post-wrapper" class="clearfix">
		 
	 	<?php $newest_post = 0  // used for taking the 4 newest posts to display specially ?>
	
		<?php 

		if (have_posts()) : while (have_posts()) : the_post();
				
				if ($newest_post < 4) : ?>

				<div><p>hello</p></div>
				
				<?php 

					$newest_post++;

				else : 

					get_template_part( 'content', $theme_options['post_layout'] );
			
				endif;

			endwhile; ?>
			
			</div>
			
			<?php // Display Pagination	
				
			momentous_display_pagination();

		endif; ?>
			
		</section>

	</div>
	
<?php get_footer(); ?>	