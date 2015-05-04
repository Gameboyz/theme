
	<div class="post-wrap clearfix">
	
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
			<?php momentous_display_thumbnail_index(); ?>

			<h2 class="review-title"><a href="<?php esc_url(the_permalink()) ?>" rel="bookmark"><?php the_title(); ?></a></h2>

			<div class="entry clearfix">
				<?php the_excerpt(); ?>
			</div>

		</article>
		
	</div>