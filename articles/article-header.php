<?php
	$articleType = $post->meta->article_type;

	if ( $articleType == 'news') : ?>
		<div id="gb-header-wrap" class="gb-news-header container clearfix">
	<?php
	elseif ( $articleType == 'review') : ?>
		<div id="gb-header-wrap" class="gb-review-header clearfix">
	<?php
	endif;

?>

	<?php gb_get_article_image($post->ID); ?>

	<section id="gb-header-info" class="<?php echo 'gb-' . $articleType . '-info' ?>">

		<h2 class="gb-title title"><?php the_title(); ?></h2>

		<div class="postmeta"><?php momentous_display_postmeta(); ?></div>

	</section>

</div>