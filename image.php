<?php get_header(); ?>

	<div id="gb-wrapper" class="container clearfix">
		
		<section id="content" class="primary" role="main">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="entry clearfix" style="text-align:center;"><br/>
					<a href="<?php echo wp_get_attachment_url($post->ID); ?>"><?php echo wp_get_attachment_image( $post->ID, 'full' ); ?></a>
					
					<div id="image-nav" class="clearfix" >
						<span class="nav-previous"><?php previous_image_link( false, __( 'Previous' , 'momentous-lite') ); ?></span>
						<span class="nav-next"><?php next_image_link( false, __( 'Next' , 'momentous-lite') ); ?></span>
					</div>
					
					<?php if ( !empty($post->post_excerpt) ) the_excerpt(); ?>
					<?php the_content(); ?>
					
					<p class="nav-return"><a href="<?php echo esc_url( get_permalink( $post->post_parent )); ?>" title="<?php _e('Return to Gallery', 'momentous-lite'); ?>" rel="gallery">
					<?php _e('Return to', 'momentous-lite'); ?> <?php echo get_the_title( $post->post_parent ); ?></a></p>

				</div>
				
			</article>

		<?php

			endwhile;
		
		endif; ?>

		</section>


	</div>
	
<?php get_footer(); ?>	