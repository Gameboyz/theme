
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="game-info">
                  <?php the_title(); ?><br>
                  <b class="game-info-text">(dev,pub,plat)</b>
                  <br>&nbsp;

                </div>
                  <div class="temp-ad-div">
                     Buy League of Legends today 30% off! <img class="ad" src="http://localhost/wp-content/uploads/2015/05/1cc.png">
                  </div>   

		<div class="entry clearfix">
			<?php the_content(); ?>
			<!-- <?php trackback_rdf(); ?> -->
			<div class="page-links"><?php wp_link_pages(); ?></div>
		</div>
			
		<div class="postinfo clearfix"><?php momentous_display_postinfo_single(); ?></div>

	</article>