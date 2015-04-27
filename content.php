<div class="gb-post clearfix">

	<article id="post-<?php the_ID(); ?>" <?php post_class('gb-post-info'); ?>>

		<h2 class="post-title">
			<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>

		</h2>

		<div class="entry clearfix">
			<?php the_excerpt(); ?>
		</div>

	</article>

	<a href="<?php esc_url(the_permalink()) ?>" class="gb-img-link" >
		<?php
		$thumbnail = '';
		$post_image_id = get_post_thumbnail_id($post->ID);

		if ($post_image_id) {
			$thumbnail = wp_get_attachment_image_src($post_image_id, 'post-thumbnail', false);
			if ($thumbnail) (string)$thumbnail = $thumbnail[0];
		}

		if (!empty($thumbnail)) : ?>

		<div class="gb-tile-img" style="background-image: url('<?php echo $thumbnail; ?>');" >

		<?php else: ?>

		<div class="no-thumbnail">

		<?php endif; ?>

		</div>
	</a>
</div>