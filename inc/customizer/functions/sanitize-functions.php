<?php
/**
 * Theme Customizer Functions
 *
 */

/*========================== CUSTOMIZER SANITIZE FUNCTIONS ==========================*/

// Sanitize checkboxes
function momentous_sanitize_checkbox( $value ) {

	if ( $value == 1) :
        return 1;
	else:
		return '';
	endif;
}


// Sanitize the layout sidebar value.
function momentous_sanitize_layout( $value ) {

	if ( ! in_array( $value, array( 'left-sidebar', 'right-sidebar', 'fullwidth' ) ) ) :
        $value = 'right-sidebar';
	endif;

    return $value;
}


// Sanitize the post archive layout value.
function momentous_sanitize_post_layout( $value ) {

	if ( ! in_array( $value, array( 'index', 'one-column' ), true ) ) :
        $value = 'index';
	endif;

    return $value;
}


// Sanitize footer content textarea
function momentous_sanitize_footer_text( $value ) {

	if ( current_user_can('unfiltered_html') ) :
		return $value;
	else :
		return stripslashes( wp_filter_post_kses( addslashes($value) ) );
	endif;
}


?>