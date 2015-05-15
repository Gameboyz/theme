
<article id="post-<?php the_ID(); ?>" <?php post_class('gb-post-info');?> >
	
	<h2 class="gb-post-text post-title" >
		<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h2>

	<div class="gb-post-text entry clearfix" >
		<?php the_excerpt(); ?>
	</div>

	<?php gb_get_article_image($post->ID, 'tile'); ?>
	

</article>