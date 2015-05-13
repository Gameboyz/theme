<?php get_header(); ?>

    <?php

      if(have_posts() ) :

        while( have_posts() ) :

      		the_post(); 

      		$articleMeta = json_decode(get_post_meta($post->ID, 'article_meta', true));

      		if ( $articleMeta->article_type == 'news' ) {
      			get_template_part('articles/news');
      		}
      		elseif ( $articleMeta->article_type == 'review' ) {
	            get_template_part('articles/review');      			
      		}
      		else {
      			echo 'failed';
      		}

         endwhile;

      endif; ?>

<?php get_footer(); ?>

