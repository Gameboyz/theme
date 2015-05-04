<?php get_header();
 ?>

        <div class="review-header"><?php momentous_display_thumbnail_single(); ?>
        
            <div class="review-inner-title">
              <h2 class="review-title"><?php the_title(); ?></h2>
              <div class="postmeta"><?php momentous_display_postmeta(); ?></div>
            </div>
        </div>
	<div id="wrap" class="container clearfix">

		<section id="content" class="primary" role="main">
		
		<?php if (have_posts()) : while (have_posts()) : the_post();

			get_template_part( 'review', 'single' ); 

			endwhile;  

		endif; ?>

		<?php //comments_template(); ?>

		</section>


	</div>
	
<?php get_footer(); ?>	

