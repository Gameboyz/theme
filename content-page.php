
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry clearfix">
			<?php the_content(); ?>		
		</div>
		<?php wp_link_pages(); ?>

	</div>