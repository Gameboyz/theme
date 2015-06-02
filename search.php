<?php get_header(); ?>

<div id="gb-search-wrap" >

	<div class="container clearfix">

		<h2 class="gb-cat-title title">Seaching for: <span><?php print(get_search_query()) ?></span></h2>

	</div>

</div>

<div id="wrap" class="container clearfix">
		
	<section id="content" class="primary" role="main">

<?php 

	if ( have_posts() ) :
	 
		get_template_part( 'front-page/gallery', 'posts' );
		
		momentous_display_pagination(); // Display Pagination	

	else : ?>

		<div class="post">
			
			<div class="entry">

				<p><?php _e('No matches. Please try again, or use the navigation menus to find what you search for.', 'momentous-lite'); ?></p>

			</div>
			
		</div>

<?php endif; ?>		

	</section>

</div>
	
<?php get_footer(); ?>	