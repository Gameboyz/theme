
<article id="post-<?php the_ID(); ?>" <?php post_class('gb-post-inner');?> >
	
	<div id="gb-post-info-wrap" class="gb-tile">

		<div id="gb-post-title-wrap">
			
			<h2 class="gb-post-title title" >
				
				<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
					
					<?php the_title(); ?>
				
				</a>
			
			</h2>
		
		</div>

		<div id="gb-post-meta">

			<?php momentous_display_postmeta(); ?>

		</div>

		<a class="gb-tile-link" href="<?php esc_url(the_permalink()) ?>">

			<div id="gb-post-text" class="entry clearfix" >
			
				<?php the_excerpt(); ?>
			
			</div>
			
		</a>

	</div>
	
	<div class="gb-tile-filter gb-tile"></div>

	<?php gb_get_article_image($post->ID, 'tile'); ?>

</article>