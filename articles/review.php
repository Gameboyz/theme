<?php get_template_part('articles/article','header'); ?>

<div id="wrap" class="container clearfix">

	<section id="content" class="primary" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class('gb-article'); ?> >

			<div class="gb-game-info-wrap">

				<div id="dev" class="gb-game-info"><span>Developed by:</span><p><?php if(isset($post->meta['developer'])) echo $post->meta['developer']; ?></p></div>
				<div id="pub" class="gb-game-info"><span>Published by:</span><p><?php if(isset($post->meta['publisher'])) echo $post->meta['publisher']; ?></p></div>
				<div id="plat" class="gb-game-info"><span>Avaliable on:</span><p>

					<?php
					if ( isset($post->meta['platforms']) ) {
						foreach ( $post->meta['platforms'] as $key => $value ) {
							?>
							<span> <?php echo $post->meta['platforms'][$key]; ?> </span>
						<?php
						}
					}
					?>

				</p></div>
				<div id="rel" class="gb-game-info"><span>Release Date:</span><p><?php if(isset($post->meta['release_date'])) echo $post->meta['release_date']; ?></p></div>

			</div>

		<div class="entry clearfix">

			<?php the_content(); ?>
      <h4></h4>
			<div class="page-links"><?php wp_link_pages(); ?></div>

		</div>

		<section id="gb-bottomline">

			<div id="score-wrap">
				<div class="score-widget"><?php if(isset($post->meta['score'])) echo $post->meta['score']; ?></div>
			</div>

			<div id="pros-wrap" class="gb-bottomline-list">
				<span>Pros:</span>
				<ul id="pros-list" class="clearfix">

					<?php
					if ( isset($post->meta['pros']) ) {
						foreach ( $post->meta['pros'] as $value ) {
						?>
							<li> <?php echo $value ?> </li>
						<?php
						}
					}
					?>
				</ul>
			</div>

			<div id="cons-wrap" class="gb-bottomline-list">
				<span>Cons:</span>
				<ul id="cons-list" class="clearfix">

					<?php
					if ( isset($post->meta['cons']) ) {
						foreach ( $post->meta['cons'] as $value ) {
						?>
							<li> <?php echo $value ?> </li>
						<?php
						}
					}
					?>

				</ul>

			</div>

		</section>

		<div class="postinfo clearfix"><?php momentous_display_postinfo_single(); ?></div>

		</article>

	</section>

</div>

