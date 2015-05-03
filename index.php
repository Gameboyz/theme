<?php get_header(); ?>

	<div id="wrap" class="container clearfix">
		
		<section id="content" class="primary" role="main">
		
			<div><p>where does this show up? if it does, it's in index.php</p></div>
		
		<?php if (have_posts()) : while (have_posts()) : the_post();

			get_template_part( 'content', 'page' );

			endwhile;

		endif; ?>
		
		<?php comments_template(); ?>
		
		</section>
		
	</div>
	
<?php get_footer(); ?>	