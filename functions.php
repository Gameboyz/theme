<?php

/*==================================== THEME SETUP ====================================*/

// Load default style.css and Javascripts
add_action('wp_enqueue_scripts', 'momentous_enqueue_scripts');

if ( ! function_exists( 'momentous_enqueue_scripts' ) ):
function momentous_enqueue_scripts() { 
	
	// Register and Enqueue Stylesheet
	wp_enqueue_style('momentous-lite-stylesheet', get_stylesheet_uri());
	
	// Register Genericons
	wp_enqueue_style('momentous-lite-genericons', get_template_directory_uri() . '/css/genericons/genericons.css');

	// Register and enqueue navigation.js
	wp_enqueue_script('momentous-lite-jquery-navigation', get_template_directory_uri() .'/js/navigation.js', array('jquery'));
	
	// User Menu UI
	wp_enqueue_script('gb-user-menu', get_template_directory_uri() .'/js/usermenu.js', array('jquery'));
	
	// Get Theme Options from Database
	$theme_options = momentous_theme_options();
	
	// Register and Enqueue Masonry JS for two column post layout
	if ( isset($theme_options['post_layout']) and $theme_options['post_layout'] == 'index' ) :
	
		// Register and enqueue masonry script
		wp_enqueue_script('masonry');
		wp_enqueue_script('momentous-lite-masonry', get_template_directory_uri() .'/js/masonry-init.js', array('jquery', 'masonry'));
		
	endif;
	
	// Register and Enqueue Font
	wp_enqueue_style('momentous-lite-default-fonts', momentous_fonts_url(), array(), null );
	
}
endif;

// Load comment-reply.js if comment form is loaded and threaded comments activated
add_action( 'comment_form_before', 'momentous_enqueue_comment_reply' );
	
function momentous_enqueue_comment_reply() {
	if( get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

// Embed HTML5shiv to support HTML5 elements in older IE versions plus CSS Backgrounds
add_action('wp_head', 'momentous_enqueue_html5shiv');

function momentous_enqueue_html5shiv(){  ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js" type="text/javascript"></script>
	<![endif]-->
<?php
}

/*
* Retrieve Font URL to register default Google Fonts
* Source: http://themeshaper.com/2014/08/13/how-to-add-google-fonts-to-wordpress-themes/
*/
function momentous_fonts_url() {
    $fonts_url = '';

	// Get Theme Options from Database
	$theme_options = momentous_theme_options();
	
	// Only embed Google Fonts if not deactivated
	if ( ! ( isset($theme_options['deactivate_google_fonts']) and $theme_options['deactivate_google_fonts'] == true ) ) :
		
		// Set Default Fonts
		$font_families = array('Average Sans:400,700', 'Fjalla One');
		 
		// Set Google Font Query Args
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		
		// Create Fonts URL
		$fonts_url = add_query_arg( $query_args, '//fonts.googleapis.com/css' );
		
	endif;
	
	return apply_filters( 'momentous_google_fonts_url', $fonts_url );
	
}


// Setup Function: Registers support for various WordPress features
add_action( 'after_setup_theme', 'momentous_setup' );

if ( ! function_exists( 'momentous_setup' ) ):
function momentous_setup() { 
	
	// Set Content Width
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 860;
		
	// init Localization
	load_theme_textdomain('momentous-lite', get_template_directory() . '/languages' );
	
	// Add Theme Support
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_editor_style();

	// Add Custom Background
	add_theme_support('custom-background', array('default-color' => 'cccccc'));

	// Add Custom Header
	add_theme_support('custom-header', array(
		'header-text' => false,
		'width'	=> 1310,
		'height' => 240,
		'flex-height' => true));
	
	// Add Theme Support for Momentous Pro Plugin
	add_theme_support( 'momentous-pro' );
		
	// Register Navigation Menus
	register_nav_menus( array(
		'primary'   => __('Main Navigation', 'momentous-lite'),
		'secondary' => __('Top Navigation', 'momentous-lite'),
		'social' => __('Social Icons', 'momentous-lite'),
		) 
	);
	
}
endif;


// Add custom Image Sizes
add_action( 'after_setup_theme', 'momentous_add_image_sizes' );

if ( ! function_exists( 'momentous_add_image_sizes' ) ):
function momentous_add_image_sizes() { 
	
	// Add Custom Header Image Size
	add_image_size( 'custom_header_image', 1300, 240, true);
	
	// Add Featured Image Size
	add_image_size( 'post-thumbnail', 500, 500, true);

}
endif;


// Register Sidebars
add_action( 'widgets_init', 'momentous_register_sidebars' );

if ( ! function_exists( 'momentous_register_sidebars' ) ):
function momentous_register_sidebars() {
	
	// Register Sidebars
	register_sidebar( array(
		'name' => __( 'Sidebar', 'momentous-lite'),
		'id' => 'sidebar',
		'description' => __( 'Appears on posts and pages except front page and fullwidth template.', 'momentous-lite'),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widgettitle"><span>',
		'after_title' => '</span></h3>',
	));
	
}
endif;


// Add title tag for older WordPress versions
if ( ! function_exists( '_wp_render_title_tag' ) ) :

	add_action( 'wp_head', 'momentous_wp_title' );
	function momentous_wp_title() { ?>
		
		<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php
    }
    
endif;


// Add Default Menu Fallback Function
function momentous_default_menu() {
	echo '<ul id="mainnav-menu" class="menu">'. wp_list_pages('title_li=&echo=0') .'</ul>';
}


// Get Featured Posts
function momentous_get_featured_content() {
	return apply_filters( 'momentous_get_featured_content', false );
}


// Check if featured posts exists
function momentous_has_featured_content() {
	return ! is_paged() && (bool) momentous_get_featured_content();
}


// Change Excerpt Length
add_filter('excerpt_length', 'momentous_excerpt_length');
function momentous_excerpt_length($length) {
    return 25;
}

// Slideshow Excerpt Length
function  momentous_featured_content_excerpt_length($length) {
    return 40;
}


// Change Excerpt More
add_filter('excerpt_more', 'momentous_excerpt_more');
function momentous_excerpt_more($more) {
    
	// Get Theme Options from Database
	$theme_options = momentous_theme_options();

	// Return Excerpt Text
	if ( isset($theme_options['excerpt_text']) and $theme_options['excerpt_text'] == true ) :
		return ' [...]';
	else :
		return '';
	endif;
}


// Custom Template for comments and pingbacks.
if ( ! function_exists( 'momentous_list_comments' ) ):
function momentous_list_comments($comment, $args, $depth) {
	
	$GLOBALS['comment'] = $comment;
	
	if( $comment->comment_type == 'pingback' or $comment->comment_type == 'trackback' ) : ?>
	
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
			<p><?php _e( 'Pingback:', 'momentous-lite'); ?> <?php comment_author_link(); ?> 
			<?php edit_comment_link( __( '(Edit)', 'momentous-lite'), '<span class="edit-link">', '</span>' ); ?>
			</p>
	
	<?php else : ?>
	
		<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

			<div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			
				<div class="comment-meta">
				
					<div class="comment-author vcard">
						<?php echo get_avatar( $comment, 56 ); ?>
						<?php printf(__('<span class="fn">%s</span>', 'momentous-lite'), get_comment_author_link()) ?>
					</div>

					<div class="commentmetadata">
						<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php printf(__('%1$s at %2$s', 'momentous-lite'), get_comment_date(),  get_comment_time()) ?></a>
						<?php edit_comment_link(__('(Edit)', 'momentous-lite'),'  ','') ?>
					</div>
					
				</div>
				
				<div class="comment-content">
					
					<?php comment_text(); ?>
					
					<?php if ($comment->comment_approved == '0') : ?>
						<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'momentous-lite'); ?></p>
					<?php endif; ?>
					
					<div class="reply">
						<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
					</div>

				</div>
				
				
			</div>
<?php
	endif;
	
}
endif;

/**
 * Get post meta info
 * 
 * Meta info is attatched to the post object
 * This happens for every post in the database after it's queried
 * json_decode call needs a string with all escaped characters un-escaped.
 * 
 * @param object $post The post object, it's needed to create a new member for the meta object
 * 
 */
if ( !function_exists('gb_article_meta') ) :
function gb_article_meta($post)
{
	$post->meta = json_decode(stripcslashes(get_post_meta($post->ID, 'article_meta', true)),true);
}
endif;

add_action("the_post", "gb_article_meta");


/* Posting Articles Meta Box | Wordpress Post Interface
*******************************************************************************************/

/**
 * Gameboyz Article Meta Info
 *  
 * Create meta boxes on post page
 */
if ( !function_exists('gb_meta_boxes') ) :
function gb_meta_boxes()
{
    add_meta_box("gb_article_info", "Article Info", "gb_article_info_box", "post", "normal", "high", null);
}
endif;

add_action("add_meta_boxes", "gb_meta_boxes");

/**
 * Gameboyz Meta Markup
 * 
 * Markup for meta box on post page
 * 
 */
if ( !function_exists('gb_article_info_box') ) :
function gb_article_info_box($currentPost)
{ 
	wp_nonce_field(basename(__FILE__), "gb-review-meta");
	
	// Need to remove the slashes of the escaped characters for the json to be decoded
	$articleMeta = stripcslashes(get_post_meta($currentPost->ID, "article_meta", true));
	$articleMeta = json_decode($articleMeta, true);

	/** 
	 * Creates a block with textbox input and button to remove the block.
	 * 
	 * Intended use to be for pros and cons in a game review
	 * 
	 * @param string $articleType If $articleType is 'news', when the input box is created, 
	 * 	 							it needs to be disable so no values are passed when the article is published or saved.
	 * @param string $type Determinds if it's for pro or con input.
	 * @param string $value Optional. Include only if there's data avaliable to place in the textbox.
	 */
	function gb_pros_cons_input($articleType, $type, $value = '') 
	{
		?>
		<div>
			<input class="form-input-tip" type="text" name="<?php echo $type . '[]' ?>" value="<?php echo $value ?>" <?php if ($articleType == 'news') echo 'disabled' ?> />
			<button type="button" class="button" onclick="removeTraitBox(this);"><b>-</b></button>
		</div>
		<?php
	}

	/**
	 * Creates the wrapper for pros or cons in a game reviews bottomline
	 * 
	 * @see gb_pros_cons_input()
	 * 
	 * @param string $articleType Excepts either 'review' or 'news'. Needed to pass to gb_pros_cons_input()
	 * @param string $type Excepts either 'pros' or 'cons'.
	 * @param array $typeList Optional. If there's a an array, the items in the array get passed to gb_pros_cons_input()
	 */
	function gb_wrap_pros_cons($articleType, $type, $typeList = [])
	{ 
		?>	
		<div id="<?php echo $type ?>-wrap">					
			<button type="button" class="button add" onclick="addTraitBox(this, <?php echo '\'' . $type . '\'' ?>);"><b>+</b></button>
		<?php

		if ( empty($typeList) ) {
			gb_pros_cons_input($articleType, $type);
			?></div><?php
			return;
		}

		foreach ( $typeList as $value ) {
			gb_pros_cons_input($articleType, $type, $value);
		}
				
		?>

		</div>

		<?php
	}

	?>

	<style>
	#gb-review-bottomline {
		display: inline-block;
		width: 98%;
	}
	fieldset {
		padding: 1em 0.5em;
	}
	fieldset * {
		margin-left: 1em;
	}
	legend {
		margin-top: 1em;
		margin-left: -0.5em;
	}
	#game-info .one-liner {
		width: 95%;
	}
	#article-type label {
		margin-left: -0.25em;
	}
	#platforms {
		display: inline-block;
	}
	#platforms div {
		width: 80px;
		float: left;
	}
	#review, #news {
		margin-left: 1em;
	}
	#gb-review-bottomline span{
		display: inline-block;
		float: left;
		margin-top: 12px;
		width: 50%;
	}
	#pros-wrap, #cons-wrap {
		display: inline-block;
		float: left;
		margin-top: 4px;
		margin: 4px 4px 0 4px;
		width: 48%;
	}
	#pros-wrap div, #cons-wrap div {
		display: inline-block;
		padding-top: 0.5em;
		width: 100%;
	}
	#pros-wrap > div input, #cons-wrap > div input {
		float: left;
		width: 88%;
	}
	#pros-wrap > div button, #cons-wrap > div button {
		float: right;
		margin-top: 2px;
		width: 9%;
	}
	#score {
		display: block;
	}
	.add {
		width: 100%;
	}
	</style>

	<script>
	function articleChooser(state) {
		jQuery("#article-meta-wrap :input").prop( { disabled: !state } );
		var articleWrap = jQuery("#article-meta-wrap");
		if (state) 
			articleWrap.css( { "visibility": "visible", "height": "" } );
		else
			articleWrap.css( { "visibility": "hidden", "height": "0" } );
	}

	function addTraitBox(button, type) {
		if (button.parentNode.childElementCount <= 5) {
			var inputDiv = '<div><input class="form-input-tip" type="text" /><button type="button" class="button" onclick="removeTraitBox(this);"><b>-</b></button></div>';
			jQuery(button).parent().append(inputDiv).children().last().children().first().attr("name", type + "[]");
		}
	}
	function removeTraitBox(button) {
		jQuery(button).parent().remove();
	}
	</script>

	<section id="article-chooser" >

		<fieldset id="article-type">
		<legend>Article Type</legend>

			<input id="review" type="radio" name="article_type" value="review" onclick="articleChooser(true);" 
			<?php if ($articleMeta['article_type'] == 'review') echo 'checked' ?> required />
			<label for="review">Review</label>
		
			<input id="news" type="radio" name="article_type" value="news" onclick="articleChooser(false);" 
			<?php if ($articleMeta['article_type'] == 'news') echo 'checked' ?> required />
			<label for="news">News</label>

		</fieldset>
	
		<div id="article-meta-wrap"
		style="<?php if($articleMeta['article_type'] == 'news') echo 'visibility:hidden; height:0;' ?>">

			<fieldset id="game-info">
			<legend>Game Info:</legend>

				<label for="developer">Developer:</label>
				<input id="developer" class="form-input-tip one-liner" type="text" name="developer" size="16" 
				value="<?php if (isset($articleMeta['developer'])) echo $articleMeta['developer'] ?>" 
				<?php if($articleMeta['article_type'] == 'news') echo 'disabled=""' ?>
				required />

				<label for="publisher">Publisher:</label>
				<input id="publisher" class="form-input-tip one-liner" type="text" name="publisher" size="16" 
				value="<?php if (isset($articleMeta['publisher'])) echo $articleMeta['publisher'] ?>" 
				<?php if($articleMeta['article_type'] == 'news') echo 'disabled=""' ?>
				required />

				<label for="release-date">Release Date:</label>
				<input id="release-date" class="form-input-tip one-liner" type="text" name="release_date" pattern="" 
				value="<?php if (isset($articleMeta['release_date'])) echo $articleMeta['release_date'] ?>" 
				<?php if($articleMeta['article_type'] == 'news') echo 'disabled=""' ?>
				/>

				<fieldset id="platforms">
					<legend>Platforms:</legend>
					<?php
					$platforms = [
						"PS4" => "Playstation 4", 
						"XBONE" => "Xbox One", 
						"WIIU" => "Nintendo Wii U",
						"3DS" => "Nintendo 3DS",
						"PSVITA" => "Playstation Vita",
						"WIN" => "Windows", 
						"OSX" => "Apple OS X",
						"LINUX" => "Linux",
						"ANDR" => "Android",
						"IOS" => "iOS"
					];

					foreach ($platforms as $key => $value) {
						?><div><input class="" type="checkbox" name="platforms[<?php echo $key ?>]" value="<?php echo $value ?>" 
						<?php 

						if( isset($articleMeta['platforms'][$key]) ) {
							echo 'checked'; 
						}
						
						if( $articleMeta['article_type'] == 'news' ) {
							echo 'disabled'; 
						}
						
						echo ' />' . $key . '</div>';
					} ?>

				</fieldset>

			</fieldset>

			<section id="gb-review-bottomline">

				<label for="score">Score:</label>
				<input id="score" class="form-input-tip" type="text" name="score" pattern="[0-5]" placeholder="Number from 1 to 5"
				value="<?php if(isset($articleMeta['score'])) echo $articleMeta['score']; ?>" 
				<?php if($articleMeta['article_type'] == 'news') echo ' disabled=""' ?>
				required />

				<span>Pros:</span>
				<span>Cons:</span>

				<?php
				foreach ( ['pros', 'cons'] as $type ) {
					if ( isset($articleMeta[$type]) )
						gb_wrap_pros_cons($articleMeta['article_type'], $type, $articleMeta[$type]);
					else
						gb_wrap_pros_cons($articleMeta['article_type'], $type);
				}
				?>

			</section>

		</div>
	
	</section>

<?php	
} 
endif;
 
/**
 * 
 * Gameboyz Save Meta Info
 * 
 * Save meta data on post publish/save draft action
 * 
 * @param int $postID Post's id number,
 * @param object $post The Post object
 */
if( !function_exists('save_gb_review_meta') ) :
function save_gb_review_meta($postID, $post) 
{
	if ( !isset($_POST["gb-review-meta"]) || !wp_verify_nonce($_POST["gb-review-meta"], basename(__FILE__)) ) {
		return $postID;
	}

	if ( !current_user_can("edit_post", $postID) ) {
		return $postID;
	}

	if ( defined("DOING_AUTOSAVE") && DOING_AUTOSAVE ) {
		return $postID;
	}

	$slug = "post";

	if ( $slug != $post->post_type ) {
		return $postID;
	}

	$inputTypes = ['article_type', 'developer', 'publisher', 'platforms', 'release_date', 'score', 'pros', 'cons'];

	$reviewMeta = [];

	foreach ( $inputTypes as $value ) {

		if ( !isset($_POST[$value]) ) {
			continue;
		}

		if ( is_array($_POST[$value]) ) {

			foreach ( $_POST[$value] as $key => $innerValue ) {
				$reviewMeta[$value][$key] = sanitize_text_field($_POST[$value][$key]); 
			} 

		} else {
			$reviewMeta[$value] = sanitize_text_field($_POST[$value]);
		}	
			
	}

	$jsonReviewMeta = json_encode($reviewMeta);

	update_post_meta($postID, 'article_meta', $jsonReviewMeta);
	
}
endif;

add_action("save_post", "save_gb_review_meta", 10, 3);

/**
 * Gameboyz Delete Meta Info
 * 
 * Delete meta data when original post is deleted
 * 
 * @param int $postID The Post's id nubmer
 */
if (!function_exists('delete_article_meta')) :
function delete_article_meta($postID) 
{
	delete_post_meta($postID, 'article_meta');
}
endif;

add_action("delete_post", "delete_article_meta");



/*==================================== INCLUDE FILES ====================================*/

// include Theme Info page
require( get_template_directory() . '/inc/theme-info.php' );

// include Theme Customizer Options
require( get_template_directory() . '/inc/customizer/customizer.php' );
require( get_template_directory() . '/inc/customizer/default-options.php' );

// include Customization Files
require( get_template_directory() . '/inc/customizer/frontend/custom-layout.php' );

// include Template Functions
require( get_template_directory() . '/inc/template-tags.php' );

// Include Featured Content class
require get_template_directory() . '/inc/featured-content.php';


?>