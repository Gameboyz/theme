<div id="gb-review-wrap">




      <?php 
        $image = '';
        $post_image_id = get_post_thumbnail_id($post->ID);
        
        if($post_image_id) {
          $image = wp_get_attachment_image_src($post_image_id, 'post-large', false);
          if ($image) (string)$image = $image[0];
        }
        
        if(!empty($image)) : ?>
          <div class="gb-review-img" style="background-image: url('<?php echo $image; ?>');" >
        <?php endif; ?>


      <section class="gb-review-header">

        <h2 class="gb-review-title title"><?php the_title(); ?></h2>

        <div class="postmeta"><?php momentous_display_postmeta(); ?></div>

      </section>

    </div>

</div>

<div id="wrap" class="container clearfix">

  <section id="content" class="primary" role="main">

  	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

      <div class="gb-game-info-wrap">

        <?php the_title(); ?>

          <div class="gb-game-info">(dev,pub,plat)</div>

      </div>

		<div class="entry clearfix">

			<?php the_content(); ?>

			<div class="page-links"><?php wp_link_pages(); ?></div>

		</div>

		<div class="postinfo clearfix"><?php momentous_display_postinfo_single(); ?></div>

	  </article>

	</section>

</div>

