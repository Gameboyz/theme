<?php
/**
 * Featured Post Slider
 *
 */

// Get our Featured Content posts
$slider_posts = momentous_get_featured_content(); 

// Limit the number of words in slideshow post excerpts
add_filter('excerpt_length', 'momentous_featured_content_excerpt_length');

// Set loop count
$loop_count = 1;

?>
		
	<div id="featured-content" class="clearfix">

		<?php // Display Featured Content
		foreach ( $slider_posts as $post ) : setup_postdata( $post ); 
		
			// Display first featured post (big)
			if(isset($loop_count) and $loop_count == 1) : ?>
			
			<div class="featured-content-left">
	
				<div class="featured-post-wrap clearfix">
				
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						
						<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
							<?php the_post_thumbnail('post-thumbnail'); ?>
						</a>
						
						<div class="post-content">

							<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
							<div class="postmeta clearfix"><?php momentous_display_postmeta(); ?></div>
							
							<div class="entry clearfix">
								<?php the_excerpt(); ?>
								<a href="<?php esc_url(the_permalink()) ?>" class="more-link"><?php _e('Continue reading &raquo;', 'momentous-lite'); ?></a>
							</div>
							
							<div class="postinfo clearfix"><?php momentous_display_postinfo_index(); ?></div>
					
						</div>

					</article>
					
				</div>
				
			</div>
			
			<div class="featured-content-right clearfix">
			
		<?php // Display second featured post on the right side
			else: ?>
			
				<div class="featured-post-wrap clearfix">
				
					<article id="post-<?php the_ID(); ?>" <?php post_class('first-post'); ?>>
						
						<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
							<?php the_post_thumbnail('post-thumbnail'); ?>
						</a>
						
						<div class="post-content">

							<h2 class="post-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							
							<div class="postmeta clearfix"><?php momentous_display_postmeta(); ?></div>
					
						</div>

					</article>
				
			</div>
				
		<?php	
			endif;
			
			// Increase Loop count
			$loop_count++;
			
		endforeach;
		?>
			</div><!-- end .featured-content-right -->
	
	</div><!-- end #featured-content -->

<?php

// Remove excerpt filter
remove_filter('excerpt_length', 'momentous_featured_content_excerpt_length');

// Reset Postdata
wp_reset_postdata();

?>