
<article id="post-<?php the_ID(); ?>" <?php post_class('gb-post-info');?> >
	
	<div id="gb-post-title-wrap">
		<h2 class="gb-post-title title" >
			<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h2>
	</div>

	<div class="gb-post-text entry clearfix" >
		<?php the_excerpt(); ?>
	</div>

	<?php gb_get_article_image($post->ID, 'tile'); ?>
	

</article>