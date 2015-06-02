<?php get_template_part('articles/article','header'); ?>

<div id="wrap" class="container clearfix">

	<section id="content" class="primary" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class('gb-article'); ?> >

			<div class="gb-game-info-wrap">

				<div id="dev" class="gb-game-info"><span>Developed by:</span><p><?php if(isset($post->meta['developer'])) echo $post->meta['developer']; ?></p></div>
				<div id="pub" class="gb-game-info"><span>Published by:</span><p><?php if(isset($post->meta['publisher'])) echo $post->meta['publisher']; ?></p></div>
				<div id="plat" class="gb-game-info"><span>Avaliable on:</span>

					<div>

					<?php
					if ( isset($post->meta['platforms']) ) {
						foreach ( $post->meta['platforms'] as $key => $value ) {
							?>
							<div> <?php echo $post->meta['platforms'][$key]; ?> </div>
						<?php
						}
					}
					?>

					</div>

				</div>
				
				<div id="rel" class="gb-game-info"><span>Release Date:</span><p><?php if(isset($post->meta['release_date'])) echo $post->meta['release_date']; ?></p></div>

			</div>

			<div id="gb-ad-wrap">

				<?php if(function_exists('the_ad')) the_ad(115); ?>

			</div>

			<div class="entry clearfix">

				<?php the_content(); ?>

			</div>

			<section id="gb-bottomline">

				<div id="score-wrap">

					<div class="score-widget"><?php if(isset($post->meta['score'])) echo $post->meta['score']; ?></div>

				</div>
				
				<?php

				foreach (['pros','cons'] as $type) {
					?>

					<div id="<?php echo $type ?>-wrap" class="gb-bottomline-list">
						
						<span><?php echo ucfirst($type) ?>:</span>
						
						<ul id="<?php echo $type?>-list" class="clearfix">

							<?php
							if ( isset($post->meta[$type]) ) {
								foreach ( $post->meta[$type] as $value ) {
								?>

									<li> <?php echo $value ?> </li>
								<?php
								}
							}
							?>
						
						</ul>

					</div>
					<?php

				}

				?>

			</section>

		</article>

	</section>

</div>

