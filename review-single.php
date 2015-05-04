        <div class="review-inner-title">
            <h2 class="review-title"><?php the_title(); ?></h2>
            <div class="postmeta"><?php momentous_display_postmeta(); ?></div>
        </div>

           <div class="review-header"><?php momentous_display_thumbnail_single(); ?></div>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="entry clearfix">
			<?php the_content(); ?>
			<!-- <?php trackback_rdf(); ?> -->
			<div class="page-links"><?php wp_link_pages(); ?></div>
		</div>
			
		<div class="postinfo clearfix"><?php momentous_display_postinfo_single(); ?></div>

	</article>