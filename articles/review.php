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

  	<article id="post-<?php the_ID(); ?>" <?php post_class('gb-review'); ?> >

      <div class="gb-game-info-wrap">

          <div id="dev" class="gb-game-info"><span>Developed by:</span><p>Team Sanic</p></div>
          <div id="pub" class="gb-game-info"><span>Published by:</span><p>Sega</p></div>
          <div id="plat" class="gb-game-info"><span>Avaliable on:</span><p>Mega Drive</p></div>
          <div id="rel" class="gb-game-info"><span>Release Date:</span><p>the 90's</p></div>

      </div>

		<div class="entry clearfix">

			<?php the_content(); ?>

			<div class="page-links"><?php wp_link_pages(); ?></div>

		</div>

    <section id="gb-bottomline">

      <div id="score-wrap">
        <div class="score-widget">Some fancy score widget here. 10/10</div>
      </div>

      <div id="pros-wrap" class="gb-bottomline-list">
        <span>Pros:</span>
        <ul id="pros-list" class="clearfix">
          <li>List of</li>
          <li>Pros here, (dont mind this part, making aaa some over extending text)</li>
          <li>about the game</li>
        </ul>
      </div>

      <div id="cons-wrap" class="gb-bottomline-list">
        <span>Cons:</span>
        <ul id="cons-list" class="clearfix">
          <li>List of</li>
          <li>Pros here,</li>
          <li>about the game</li>
        </ul>
      </div>

    </section>

		<div class="postinfo clearfix"><?php momentous_display_postinfo_single(); ?></div>

	  </article>

	</section>

</div>

