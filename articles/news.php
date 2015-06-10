<?php get_template_part('articles/article','header'); ?>

<div id="wrap" class="container clearfix">

	<section id="content" class="primary" role="main">

  		<article id="post-<?php the_ID(); ?>" <?php post_class('gb-article'); ?> >

			<div class="entry clearfix">

				<?php gb_get_youneeq(-1, 1, 'content'); ?>

				<?php the_content(); ?>

			</div>

		</article>

	</section>

</div>
