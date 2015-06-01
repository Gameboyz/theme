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

<?php if ( function_exists('\Youneeq_Panel\recommend') ) : ?>

<div id="youneeq-wrap-end" class="container">

	<?php \Youneeq_Panel\recommend(-2, ['title' => 'Also checkout:', 'count' => 4]); ?>

</div>

<?php endif; ?>

<div id="comments-wrap" class="container">

	<?php comments_template(); ?>
	
</div>

<?php get_footer(); ?>