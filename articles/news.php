<?php get_template_part('articles/article','header'); ?>

<div id="wrap" class="container clearfix">

	<section id="content" class="primary" role="main">

  		<article id="post-<?php the_ID(); ?>" <?php post_class('gb-article'); ?> >

			<div class="entry clearfix">

				<?php the_content(); ?>

				<div class="page-links"><?php wp_link_pages(); ?></div>

			</div>

			<div class="postinfo clearfix"><?php momentous_display_postinfo_single(); ?></div>

		</article>

	</section>

</div>
