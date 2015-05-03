
<div id="gb-wrapper" class="clearfix">

<?php

	if ( have_posts() ) : 
		
		while ( have_posts() ) : 

			the_post(); ?>

	<div class="gb-post clearfix">

		<?php get_template_part( 'gallery', 'tile' ); ?>

	</div>

	<?php 

		endwhile;

	endif; ?>
	
</div>