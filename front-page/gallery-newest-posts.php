<div id="gb-new-wrapper" class="clearfix">

<?php

	$newest_post = 1; // used for taking the 4 newest posts to display specially

	if ( have_posts() ) : 

		while ( have_posts() && ($newest_post <= 4) ) : 

			the_post(); ?>

			<div id="<?php echo "gb-new-$newest_post" ?>" class="gb-newest clearfix">

				<?php get_template_part( 'front-page/gallery', 'tile' ); ?>

			</div>

			<?php 

			$newest_post++;

		endwhile;

	endif; ?>

</div>