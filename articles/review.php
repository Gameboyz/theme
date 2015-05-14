<?php get_template_part('articles/article','header'); ?>

<div id="wrap" class="container clearfix">

	<section id="content" class="primary" role="main">

		<article id="post-<?php the_ID(); ?>" <?php post_class('gb-article'); ?> >

			<div class="gb-game-info-wrap">

				<div id="dev" class="gb-game-info"><span>Developed by:</span><p>Team Sanic</p></div>
				<div id="pub" class="gb-game-info"><span>Published by:</span><p>Sega</p></div>
				<div id="plat" class="gb-game-info"><span>Avaliable on:</span><p>Mega Drive</p></div>
				<div id="rel" class="gb-game-info"><span>Release Date:</span><p>the 90\'s</p></div>

			</div>

		<div class="entry clearfix">

			<?php the_content(); ?>
      <h4></h4>
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

