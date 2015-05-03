
<article id="gb-new-wrapper" class="clearfix">

<?php

	$newest_post = 0; // used for taking the 4 newest posts to display specially

	if ( have_posts() ) : 

		while ( have_posts() && ($newest_post < 4) ) : 

			the_post(); ?>

	<div class="gb-new-post clearfix">

		<?php get_template_part( 'gallery', 'tile' ); ?>

	</div>

	<?php 

		$newest_post++;

		endwhile;

	endif; ?>

</article>