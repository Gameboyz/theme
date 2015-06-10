<?php get_header(); ?>

<?php

	if( have_posts() ) :

		while( have_posts() ) :

			the_post(); 

			if ( !$post->meta ) {
				get_template_part('503');
				continue;
			}

			if ( $post->meta['article_type'] == 'news') {
				get_template_part('articles/news');
			}

			if ( $post->meta['article_type'] == 'review' ) {
				get_template_part('articles/review');
			}

		endwhile;

	endif; ?>

<?php if ( function_exists('the_ad') ) the_ad(116); ?>

<div id="youneeq-container" class="container">

	<?php gb_get_youneeq(-2, 4, 'end', 'container') ?>

</div>

<div id="comments-wrap" class="container">

	<?php comments_template(); ?>

</div>

<?php get_footer(); ?>