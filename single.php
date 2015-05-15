<?php get_header(); ?>

<?php

	if( have_posts() ) :

		while( have_posts() ) :

			the_post(); 

			if ( !$post->meta ) {
				get_template_part('503');
				continue;
			}

			if ( $post->meta->article_type == 'news') {
				get_template_part('articles/news');
			}

			if ( $post->meta->article_type == 'review' ) {
				get_template_part('articles/review');
			}

		endwhile;

	endif; ?>

<?php get_footer(); ?>