<?php get_template_part('articles/article','header'); ?>

<div id="wrap" class="container clearfix">

	<section id="content" class="primary" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class('gb-article'); ?> >

			<?php gb_get_review_game_info($post->meta); ?>

			<div class="entry clearfix">

				<?php the_content(); ?>

			</div>

			<?php gb_get_review_bottomline($post->meta); ?>

		</article>

	</section>

</div>

