<?php
// Columns
function mymagpie_grid_column( $atts, $content = null, $shortcodename = '' ) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	extract(shortcode_atts(array(
		'custom_class'  => ''
	), $atts));
	// add divs to the content
	$return = '<div class="' . $shortcodename . ' ' . $custom_class . '">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'span1', 'mymagpie_grid_column' );
add_shortcode( 'span2', 'mymagpie_grid_column' );
add_shortcode( 'span3', 'mymagpie_grid_column' );
add_shortcode( 'span4', 'mymagpie_grid_column' );
add_shortcode( 'span5', 'mymagpie_grid_column' );
add_shortcode( 'span6', 'mymagpie_grid_column' );
add_shortcode( 'span7', 'mymagpie_grid_column' );
add_shortcode( 'span8', 'mymagpie_grid_column' );
add_shortcode( 'span9', 'mymagpie_grid_column' );
add_shortcode( 'span10', 'mymagpie_grid_column' );
add_shortcode( 'span11', 'mymagpie_grid_column' );
add_shortcode( 'span12', 'mymagpie_grid_column' );


// Fluid Columns
// one_half
function one_half_column($atts, $content = null) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	// add divs to the content
	$return = '<div class="span6">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'one_half', 'one_half_column' );

// one_third
function one_third_column( $atts, $content = null ) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	// add divs to the content
	$return = '<div class="span4">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'one_third', 'one_third_column' );

// two_third
function two_third_column( $atts, $content = null ) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	// add divs to the content
	$return = '<div class="span8">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'two_third', 'two_third_column' );

// one_fourth
function one_fourth_column( $atts, $content = null ) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	// add divs to the content
	$return = '<div class="span3">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'one_fourth', 'one_fourth_column' );

// three_fourth
function three_fourth_column( $atts, $content = null) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	// add divs to the content
	$return = '<div class="span9">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'three_fourth', 'three_fourth_column' );

// one_sixth
function one_sixth_column( $atts, $content = null ) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	// add divs to the content
	$return = '<div class="span2">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'one_sixth', 'one_sixth_column' );

// five_sixth
function five_sixth_column( $atts, $content = null ) {
	//remove wrong nested <p>
	$content = remove_invalid_tags( $content, array('p') );

	// add divs to the content
	$return = '<div class="span10">';
	$return .= do_shortcode( $content );
	$return .= '</div>';

	return $return;
}
add_shortcode( 'five_sixth', 'five_sixth_column' );
?>