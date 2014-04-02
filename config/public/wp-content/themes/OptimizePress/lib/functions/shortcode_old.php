<?php



function black_arrow_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="black_arrow_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('black_arrow_list_small', 'black_arrow_list_small');


function red_arrow_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="red_arrow_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('red_arrow_list_small', 'red_arrow_list_small');


function green_plus_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="green_plus_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('green_plus_list_small', 'green_plus_list_small');


function green_plus_2_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="green_plus_2_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('green_plus_2_list_small', 'green_plus_2_list_small');



function green_tick_1_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="green_tick_1_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('green_tick_1_list_small', 'green_tick_1_list_small');


function green_tick_2_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="green_tick_2_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('green_tick_2_list_small', 'green_tick_2_list_small');


function black_tick_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="black_tick_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('black_tick_list_small', 'black_tick_list_small');



function red_tick_list_small( $atts, $content = null ) {
	$content = str_replace('<ul>', '<ul class="red_tick_list_small">', do_shortcode($content));
	return $content;
	
}
add_shortcode('red_tick_list_small', 'red_tick_list_small');







function content_box_50Percent( $atts, $content = null ) {
   return '<div class="contentbox-50">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_50Percent', 'content_box_50Percent');



function content_box_75Percent( $atts, $content = null ) {
   return '<div class="contentbox-75">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_75Percent', 'content_box_75Percent');


function content_box_yellow_50Percent( $atts, $content = null ) {
   return '<div class="contentbox-yellow-50">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_yellow_50Percent', 'content_box_yellow_50Percent');

function content_box_yellow_75Percent( $atts, $content = null ) {
   return '<div class="contentbox-yellow-75">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_yellow_75Percent', 'content_box_yellow_75Percent');

function content_box_blue_50Percent( $atts, $content = null ) {
   return '<div class="contentbox-blue-50">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_blue_50Percent', 'content_box_blue_50Percent');


function content_box_blue_75Percent( $atts, $content = null ) {
   return '<div class="contentbox-blue-75">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_blue_75Percent', 'content_box_blue_75Percent');


function content_box_blue_2_50Percent( $atts, $content = null ) {
   return '<div class="contentbox-blue2-50">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_blue_2_50Percent', 'content_box_blue_2_50Percent');


function content_box_blue_2_75Percent( $atts, $content = null ) {
   return '<div class="contentbox-blue2-75">' . do_shortcode($content) . '</div>';
}
add_shortcode('content_box_blue_2_75Percent', 'content_box_blue_2_75Percent');






function textbar_100percent_1( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
    ), $atts));
	
	$out .= '<div class="textbar_100percent_1" style="background-color:' .$background. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('textbar_100percent_1', 'textbar_100percent_1');



function textbar_100percent_2( $atts, $content = null ) {
   return '<div class="textbar_100percent_2">' . do_shortcode($content) . '</div>';
}
add_shortcode('textbar_100percent_2', 'textbar_100percent_2');



function textbar_75percent_1( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
    ), $atts));
	
	$out .= '<div class="textbar_75percent_1" style="background-color:' .$background. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('textbar_75percent_1', 'textbar_75percent_1');


function textbar_75percent_2( $atts, $content = null ) {
   return '<div class="textbar_75percent_2">' . do_shortcode($content) . '</div>';
}
add_shortcode('textbar_75percent_2', 'textbar_75percent_2');



function textbar_50percent_1( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
    ), $atts));
	
	$out .= '<div class="textbar_50percent_1" style="background-color:' .$background. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('textbar_50percent_1', 'textbar_50percent_1');



function textbar_50percent_2( $atts, $content = null ) {
   return '<div class="textbar_50percent_2">' . do_shortcode($content) . '</div>';
}
add_shortcode('textbar_50percent_2', 'textbar_50percent_2');



//************************************* Title Bar Styles Left Aligned



function textbar_100percent_1_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
    ), $atts));
	
	$out .= '<div class="textbar_100percent_1_left" style="background-color:' .$background. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('textbar_100percent_1_left', 'textbar_100percent_1_left');



function textbar_100percent_2_left( $atts, $content = null ) {
   return '<div class="textbar_100percent_2_left">' . do_shortcode($content) . '</div>';
}
add_shortcode('textbar_100percent_2_left', 'textbar_100percent_2_left');



function textbar_75percent_1_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
    ), $atts));
	
	$out .= '<div class="textbar_75percent_1_left" style="background-color:' .$background. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('textbar_75percent_1_left', 'textbar_75percent_1_left');


function textbar_75percent_2_left( $atts, $content = null ) {
   return '<div class="textbar_75percent_2_left">' . do_shortcode($content) . '</div>';
}
add_shortcode('textbar_75percent_2_left', 'textbar_75percent_2_left');



function textbar_50percent_1_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
    ), $atts));
	
	$out .= '<div class="textbar_50percent_1_left" style="background-color:' .$background. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('textbar_50percent_1_left', 'textbar_50percent_1_left');



function textbar_50percent_2_left( $atts, $content = null ) {
   return '<div class="textbar_50percent_2_left">' . do_shortcode($content) . '</div>';
}
add_shortcode('textbar_50percent_2_left', 'textbar_50percent_2_left');




?>