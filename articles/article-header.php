<div id="gb-header-wrap">

	<?php
	$container = '';

	if ( $post->meta['article_type'] == 'news' ) {
		$container = 'container ';
	}

	?>

	<div class="<?php echo $container ?>clearfix">

		<?php gb_get_article_image($post->ID, '' , $post->meta['article_type']); ?>

		<section id="gb-header-info" class="<?php echo 'gb-' . $post->meta['article_type'] . '-info' ?>">

			<h2 class="gb-title title"><?php the_title(); ?></h2>

			<div class="postmeta"><?php momentous_display_postmeta(); ?></div>

		</section>

	</div>

</div>