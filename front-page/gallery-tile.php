
<article id="post-<?php the_ID(); ?>" <?php post_class('gb-post-info');?> >
	
	<h2 class="gb-post-text post-title" >
		<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
			<?php the_title(); ?>
		</a>
	</h2>

	<div class="gb-post-text entry clearfix" >
		<?php the_excerpt(); ?>
	</div>

<?php
$image = '';
$post_image_id = get_post_thumbnail_id($post->ID);

if ($post_image_id) {
	$image = wp_get_attachment_image_src($post_image_id, null, false);
	if ($image) (string)$image = $image[0];
}

if (!empty($image)) : ?>
	<div class="gb-tile-img" style="background-image: url('<?php echo $image; ?>');" >

<?php 
else: ?>
	<div class="no-thumbnail">

<?php 
endif; ?>
	
	</div>

</article>