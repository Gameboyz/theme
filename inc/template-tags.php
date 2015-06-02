<?php
/***
 * Template Tags
 *
 * This file contains several template functions which are used to print out specific HTML markup
 * in the theme. You can override these template functions within your child theme.
 *
 */


// Display Site Title
add_action( 'momentous_site_title', 'momentous_display_site_title' );

function momentous_display_site_title() { ?>

	<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
		<h1 class="site-title"><?php bloginfo('name'); ?></h1>
	</a>

<?php
}


// Display Custom Header
if ( ! function_exists( 'momentous_display_custom_header' ) ):
	
	function momentous_display_custom_header() {
					
		// Check if page is displayed and featured header image is used
		if( is_page() && has_post_thumbnail() ) :
		?>
			<div id="custom-page-header" class="header-image container">
				<?php the_post_thumbnail('custom_header_image'); ?>
			</div>
<?php
		// Check if there is a custom header image
		elseif( get_header_image() ) :
		?>
			<div id="custom-header" class="header-image container">
				<img src="<?php echo get_header_image(); ?>" />
			</div>
<?php 
		endif;

	}
	
endif;


// Display Postmeta Data
if ( ! function_exists( 'momentous_display_postmeta' ) ) :

	function momentous_display_postmeta() { ?>
		
		<span class="meta-date">
		<?php printf(__('Posted on <a href="%1$s" title="%2$s" rel="bookmark"><time datetime="%3$s">%4$s</time></a>', 'momentous-lite'), 
				esc_url( get_permalink() ),
				esc_attr( get_the_time() ),
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			);
		?>
		</span>
		
		<span class="meta-author">
		<?php printf(__('by <a href="%1$s" title="%2$s" rel="author">%3$s</a>', 'momentous-lite'), 
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_attr( sprintf( __( 'View all posts by %s', 'momentous-lite' ), get_the_author() ) ),
				get_the_author()
			);
		?>
		</span>

	<?php

	}
	
endif;


// Display Post Thumbnail on Archive Pages
function momentous_display_thumbnail_index() {
	
	// Get Theme Options from Database
	$theme_options = momentous_theme_options();
	
	// Display Post Thumbnail if activated
	if ( isset($theme_options['post_thumbnails_index']) and $theme_options['post_thumbnails_index'] == true ) : ?>

		<a href="<?php esc_url(the_permalink()) ?>" rel="bookmark">
			<?php the_post_thumbnail('post-thumbnail'); ?>
		</a>

<?php
	endif;

}


// Display Post Thumbnail on single posts
function momentous_display_thumbnail_single() {
	
	// Get Theme Options from Database
	$theme_options = momentous_theme_options();
	
	// Display Post Thumbnail if activated
	if ( isset($theme_options['post_thumbnails_single']) and $theme_options['post_thumbnails_single'] == true ) :

		the_post_thumbnail('post-thumbnail');

	endif;

}


// Display Postinfo Data on Archive Pages
if ( ! function_exists( 'momentous_display_postinfo_index' ) ) :

	function momentous_display_postinfo_index() {
		
		if ( comments_open() ) : ?>
		
			<div class="meta-comments">
				<?php comments_popup_link( '0', '1', '%' ); ?>
			</div>
		
	<?php 
		endif;
	?>
		<?php /* Will deal with this later, use for reference
		<span class="meta-category">
			<?php printf('%1$s', get_the_category_list(', ')); ?>
		</span>
        */ ?>

<?php

	}
	
endif;


// Display Postinfo Data
if ( ! function_exists( 'momentous_display_postinfo_single' ) ) :

	function momentous_display_postinfo_single() {
			
		if ( comments_open() ) : ?>
			
			<div class="meta-comments">
				<?php comments_popup_link( '0', '1', '%' ); ?>			
			</div>	
<?php 
		endif;
	?>
			
			<span class="meta-category">
				<?php printf('%1$s', get_the_category_list(', ')); ?>
			</span>
		
	<?php
		$tag_list = get_the_tag_list('', ', ');
		if ( $tag_list ) : ?>
			
			<span class="meta-tags">
				<?php printf('%1$s', $tag_list); ?>
			</span>
<?php 
		endif;
		
	}
	
endif;

	
// Display Content Pagination
if ( ! function_exists( 'momentous_display_pagination' ) ):
	
	function momentous_display_pagination() { 
		
		global $wp_query;

		$big = 999999999; // need an unlikely integer
		
		 $paginate_links = paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',				
				'current' => max( 1, get_query_var( 'paged' ) ),
				'total' => $wp_query->max_num_pages,
				'next_text' => '&raquo;',
				'prev_text' => '&laquo',
				'add_args' => false
			) );

		// Display the pagination if more than one page is found
		if ( $paginate_links ) : ?>
				
			<div class="post-pagination clearfix">
				<?php echo $paginate_links; ?>
			</div>
		
		<?php
		endif;
		
	}
	
endif;


// Display Footer Text
if ( ! function_exists( 'momentous_display_footer_text' ) ):

	function momentous_display_footer_text() { 

		// Get Theme Options from Database
		$theme_options = momentous_theme_options();

		if ( isset( $theme_options['footer_text'] ) and $theme_options['footer_text'] <> '' ) :
			
			echo do_shortcode(wp_kses_post($theme_options['footer_text']));
				
		endif; 
	}
	
endif;


// Display Credit Link
add_action( 'momentous_credit_link', 'momentous_display_credit_link' );

function momentous_display_credit_link() { 
		
	printf(__( 'Powered by %1$s and %2$s.', 'momentous-lite' ), 
		sprintf( '<a href="http://wordpress.org" title="WordPress">%s</a>', __( 'WordPress', 'momentous-lite' ) ),
		sprintf( '<a href="http://themezee.com/themes/momentous/" title="Momentous WordPress Theme">%s</a>', __( 'Momentous', 'momentous-lite' ) )
	); 
}


// Display Social Icons
function momentous_display_social_icons() {

	// Check if there is a social_icons menu
	if( has_nav_menu( 'social' ) ) :

		// Display Social Icons Menu
		wp_nav_menu( array(
			'theme_location' => 'social',
			'container' => false,
			'menu_id' => 'social-icons-menu',
			'echo' => true,
			'fallback_cb' => '',
			'before' => '',
			'after' => '',
			'link_before' => '<span class="screen-reader-text">',
			'link_after' => '</span>',
			'depth' => 1
			)
		);

	else: // Display Hint how to configure Social Icons ?>

		<p class="social-icons-hint">
			<?php _e('Please go to WP-Admin-> Appearance-> Menus and create a new custom menu with custom links to all your social networks. Then click on "Manage Locations" tab and assign your created menu to the "Social Icons" theme location.', 'momentous-lite'); ?>
		</p>
<?php
	endif;

}

/**
 * Get post header image. 
 * Can be called for use in News, Review, or Tile template
 * 
 * @param int $postID post's id number, used to get attachment for image source url
 * 					  if an image can't be found, url will be 'no image found' in the style attribute.
 * 
 * @param string $divClass Optional. Type of structure to use for image, pass in 'tile' for front page use.
 * 
 * @param string $divID Optional. Type of id for the image, expects 'review' or 'news'.
 * 	
 */
function gb_get_article_image($postID, $divClass = '', $divID = '') 
{
	if ( $post_image_id = get_post_thumbnail_id($postID) ) {
		$image = wp_get_attachment_image_src($post_image_id, null, false);
		(string)$image = $image[0];
	}

	 if ( $divClass == 'tile' ) {
		$divClass = 'class="gb-' . $divClass . '-img gb-tile gb-img"';
	} else {
		$divClass = 'class="gb-img"';
	}

	if ( $divID == 'review' ){
		$divID = 'id="gb-' . $divID . '-img"';
	} elseif ( $divID == 'news' ){
		$divID = 'id="gb-' . $divID . '-img"';
	}

	if ( isset($image) ) {
		?>

		<div <?php echo $divID ?> <?php echo $divClass ?> style="background-image: url('<?php echo $image; ?>');" ></div>
		
		<?php
	} else {
		?>

		<div <?php echo $divClass ?> style="height: 24em"></div>

		<?php
	}
}

/**
 * Get category title
 * Creates the structure for the category title when clicking on a category in the navbar.
 * Also can colour coordinate the category
 * 
 */
function gb_get_category_title()
{
	$cat_title = single_cat_title('', false);

	$bg_style = 'style="%s"';

	$style = '';

	switch ( trim(strtolower($cat_title)) ) {
		case 'microsoft':
		case 'xbox one':
			$style = sprintf($bg_style, 'background-color: #107C10;');
			break;

		case 'pc':
			$style = sprintf($bg_style, 'background-color: #EECA28;');
			break;

		case 'sony':
		case 'playstation 4':
		case 'ps vita':
			$style = sprintf($bg_style, ';');
			break;

		case 'nintendo':
		case 'wii u':
		case '3ds':
			$style = sprintf($bg_style, 'background-color: #2576BC;');
			break;
		default:
			$style = sprintf($bg_style, 'background-color: #282828;');
			break;

	}

	?>

	<div id="gb-category-wrap" <?php echo $style ?> >

		<div class="container clearfix">

			<h2 class="gb-cat-title title"><?php echo $cat_title ?></h2>

		</div>

	</div>

	<?php
}

/**
 * Simplify youneeq_panel recommend function call
 * If the youneeq plugin is not activated, the function will exit without printing anything
 * 
 * @param int $id Unique id, must be a negative number to conform to the plugin standard when calling the function from a template
 * @param int $amount Number of articles to recommend
 * @param string $type Determinds the id name for the node
 * @param string $class Optional. Add a class to the node
 *
 */
function gb_get_youneeq($id, $amount, $type, $class = '')
{
	if ( !function_exists('\Youneeq_Panel\recommend') ) {
		return;
	}

	?>

	<div id="youneeq-wrap-<?php echo $type ?>" <?php if($class != '') echo 'class="' . $class . '"'; ?>>

		<?php \Youneeq_Panel\recommend($id, ['count' => $amount]); ?>

	</div>

	<?php

}

?>
