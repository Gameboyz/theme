<?php get_template_part('articles/article','header'); ?>

<div id="wrap" class="container clearfix">

	<section id="content" class="primary" role="main">

  		<article id="post-<?php the_ID(); ?>" <?php post_class('gb-article'); ?> >

			<div class="entry clearfix">

				<?php the_content(); ?>

			</div>

		</article>

		<?php if ( function_exists('\Youneeq_Panel\recommend') ) : ?>

		<div id="youneeq-wrap-content">

			<?php \Youneeq_Panel\recommend(-1, ['count' => 1]); ?>

		</div>

		<?php endif; ?>

	</section>


	<?php // if ( function_exists('\Youneeq_Panel\recommend') ) : ?>

	<div id="youneeq-wrap-end">

		<?php // \Youneeq_Panel\recommend(-2, ['title' => 'Also checkout:', 'count' => 4]); ?>

	</div>

	<?php endif; ?>

</div>
