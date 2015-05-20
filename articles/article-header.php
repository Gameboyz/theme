<?php

	if ( $post->meta['article_type'] == 'news') : ?>
		<div id="gb-header-wrap" class="gb-news-header container clearfix">
	<?php
	elseif ( $post->meta['article_type'] == 'review') : ?>
		<div id="gb-header-wrap" class="gb-review-header clearfix">
	<?php
	endif;

?>

	<?php gb_get_article_image($post->ID); ?>

	<section id="gb-header-info" class="<?php echo 'gb-' . $post->meta['article_type'] . '-info' ?>">

		<h2 class="gb-title title"><?php the_title(); ?></h2>

		<div class="postmeta"><?php momentous_display_postmeta(); ?></div>

	</section>

</div>