<?php
//************************************* Line Break
function op_custom_line_break( $atts, $content = null ) {
   return '<BR/>';
}
add_shortcode('line_break', 'op_custom_line_break');

//************************************* Divider Style

function op_custom_divider_bar( $atts, $content = null ) {
   return '<div class="dividerbar"></div>';
}
add_shortcode('divider_bar', 'op_custom_divider_bar');

function op_custom_divider_bar_wide( $atts, $content = null ) {
   return '<div class="dividerbar-wide"></div>';
}
add_shortcode('divider_bar_wide', 'op_custom_divider_bar_wide');

function op_custom_divider_line( $atts, $content = null ) {
   return '<div class="dividerline"></div>';
}
add_shortcode('divider_line', 'op_custom_divider_line');

function op_custom_divider_line_dashed( $atts, $content = null ) {
   return '<div class="dividerline_dashed"></div>';
}
add_shortcode('divider_line_dashed', 'op_custom_divider_line_dashed');

//************************************* Headlines
function op_custom_headline_cufon_font_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large subheadcufonfont" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_cufon_font_centered', 'op_custom_headline_cufon_font_centered');

function op_custom_headline_cufon_font_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large-left subheadcufonfont" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_cufon_font_left', 'op_custom_headline_cufon_font_left');

function op_custom_headline_arial_extra_large_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-extra-large-arial" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_extra_large_left', 'op_custom_headline_arial_extra_large_left');

function op_custom_headline_arial_large_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large-arial" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_large_left', 'op_custom_headline_arial_large_left');
function op_custom_headline_arial_medium_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-medium-arial" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_medium_left', 'op_custom_headline_arial_medium_left');

function op_custom_headline_arial_small_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-small-arial" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_small_left', 'op_custom_headline_arial_small_left');

function op_custom_headline_arial_extra_large_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-extra-large-arial-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_extra_large_centered', 'op_custom_headline_arial_extra_large_centered');

function op_custom_headline_arial_large_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large-arial-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_large_centered', 'op_custom_headline_arial_large_centered');

function op_custom_headline_arial_medium_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-medium-arial-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_medium_centered', 'op_custom_headline_arial_medium_centered');

function op_custom_headline_arial_small_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-small-arial-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_arial_small_centered', 'op_custom_headline_arial_small_centered');

function op_custom_headline_georgia_extra_large_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-extra-large-georgia" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_extra_large_left', 'op_custom_headline_georgia_extra_large_left');

function op_custom_headline_georgia_large_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large-georgia" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_large_left', 'op_custom_headline_georgia_large_left');

function op_custom_headline_georgia_medium_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-medium-georgia" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_medium_left', 'op_custom_headline_georgia_medium_left');

function op_custom_headline_georgia_small_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-small-georgia" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_small_left', 'op_custom_headline_georgia_small_left');

function op_custom_headline_georgia_extra_large_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-extra-large-georgia-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_extra_large_centered', 'op_custom_headline_georgia_extra_large_centered');

function op_custom_headline_georgia_large_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large-georgia-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_large_centered', 'op_custom_headline_georgia_large_centered');

function op_custom_headline_georgia_medium_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-medium-georgia-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_medium_centered', 'op_custom_headline_georgia_medium_centered');

function op_custom_headline_georgia_small_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-small-georgia-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_georgia_small_centered', 'op_custom_headline_georgia_small_centered');

function op_custom_headline_tahoma_extra_large_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-extra-large-tahoma" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_extra_large_left', 'op_custom_headline_tahoma_extra_large_left');

function op_custom_headline_tahoma_large_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large-tahoma" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_large_left', 'op_custom_headline_tahoma_large_left');

function op_custom_headline_tahoma_medium_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-medium-tahoma" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_medium_left', 'op_custom_headline_tahoma_medium_left');

function op_custom_headline_tahoma_small_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-small-tahoma" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_small_left', 'op_custom_headline_tahoma_small_left');

function op_custom_headline_tahoma_extra_large_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-extra-large-tahoma-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_extra_large_centered', 'op_custom_headline_tahoma_extra_large_centered');

function op_custom_headline_tahoma_large_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-large-tahoma-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_large_centered', 'op_custom_headline_tahoma_large_centered');

function op_custom_headline_tahoma_medium_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-medium-tahoma-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_medium_centered', 'op_custom_headline_tahoma_medium_centered');

function op_custom_headline_tahoma_small_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));
	
	$out .= '<div class="headline1-small-tahoma-centered" style="color:' .$color. '">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('headline_tahoma_small_centered', 'op_custom_headline_tahoma_small_centered');
//************************************* Content Box Styles
function op_custom_content_box( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box', 'op_custom_content_box');

function op_custom_content_box_blue( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-blue" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_blue', 'op_custom_content_box_blue');

function op_custom_content_box_light_blue( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-light-blue" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_light_blue', 'op_custom_content_box_light_blue');

function op_custom_content_box_azure_blue( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-azure-blue" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_azure_blue', 'op_custom_content_box_azure-blue');

function op_custom_content_box_green( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-green" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_green', 'op_custom_content_box_green');

function op_custom_content_box_light_green( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-light-green" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_light_green', 'op_custom_content_box_light_green');

function op_custom_content_box_yellow( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-yellow" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_yellow', 'op_custom_content_box_yellow');

function op_custom_content_box_red( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-red" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_red', 'op_custom_content_box_red');

function op_custom_content_box_paper_white( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-paper-white" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_paper_white', 'op_custom_content_box_paper_white');
function op_custom_content_box_grey( $atts, $content = null ) {
extract(shortcode_atts(array(
        'width'      => '75%',
    ), $atts));
	
	$out .= '<div class="contentbox2 contentbox-grey" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('content_box_grey', 'op_custom_content_box_grey');

//************************************* Feature Box Styles
function op_custom_features_box_blue( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));
	
	$out .= '<div class="features-box-azure-blue features-box-blue" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_blue', 'op_custom_features_box_blue');

function op_custom_features_box_light_blue( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '1px',
    ), $atts));
	
	$out .= '<div class="features-box-azure-blue features-box-light-blue" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_light_blue', 'op_custom_features_box_light_blue');

function op_custom_features_box_azure_blue( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));	
	$out .= '<div class="features-box-azure-blue" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
   return $out;
}
add_shortcode('features_box_azure_blue', 'op_custom_features_box_azure_blue');

function op_custom_features_box_green( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));
	
	$out .= '<div class="features-box-green" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_green', 'op_custom_features_box_green');

function op_custom_features_box_light_green( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));
	
	$out .= '<div class="features-box-light-green" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_light_green', 'op_custom_features_box_light_green');

function op_custom_features_box_yellow( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));
	
	$out .= '<div class="features-box-yellow" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_yellow', 'op_custom_features_box_yellow');

function op_custom_features_box_red( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));
	
	$out .= '<div class="features-box-red" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_red', 'op_custom_features_box_red');

function op_custom_features_box_paper_white( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));
	
	$out .= '<div class="features-box-paper-white" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_paper_white', 'op_custom_features_box_paper_white');

function op_custom_features_box_grey( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '75%',
		'border'     => '2px',
    ), $atts));
	
	$out .= '<div class="features-box-grey" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('features_box_grey', 'op_custom_features_box_grey');

//************************************* Order Box Styles

function op_custom_order_box_1( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '60%',
		'border'     => '4px',
    ), $atts));
	
	$out .= '<div class="order_box_1" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('order_box_1', 'op_custom_order_box_1');
function op_custom_order_box_2( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '60%',
		'border'     => '4px',
    ), $atts));
	
	$out .= '<div class="order_box_1 order_box_2" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('order_box_2', 'op_custom_order_box_2');
   
   
   function op_custom_order_box_3( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '60%',
		'border'     => '4px',
    ), $atts));
	
	$out .= '<div class="order_box_1 order_box_3" style="width:'.$width.';border-width:'.$border.'!important;">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('order_box_3', 'op_custom_order_box_3');



//************************************* NEW Title Bar Styles
function op_custom_text_bar_1( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
		'width'			  => '100%',
    ), $atts));
	
	$out .= '<div class="textbar_1" style="background-color:' .$background. ';width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('text_bar_1', 'op_custom_text_bar_1');
function op_custom_text_bar_2( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'width'			  => '100%',
    ), $atts));
	
	$out .= '<div class="textbar_2" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('text_bar_2', 'op_custom_text_bar_2');

function op_custom_text_bar_1_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'background'      => '#444444',
		'width'			  => '100%',
    ), $atts));
	
	$out .= '<div class="textbar_1_left" style="background-color:' .$background. ';width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('text_bar_1_left', 'op_custom_text_bar_1_left');
function op_custom_text_bar_2_left( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'width'			  => '100%',
    ), $atts));
	
	$out .= '<div class="textbar_2_left" style="width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('text_bar_2_left', 'op_custom_text_bar_2_left');

function op_custom_text_bar_3( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'width'			  => '100%',
		'background'      => '#F0F0F0',
    ), $atts));
	
	$out .= '<div class="textbar_3" style="background-color:' .$background. ';width:'.$width.'">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('text_bar_3', 'op_custom_text_bar_3');

//************************************* List Styles

function op_custom_black_arrow_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="black_arrow_list">', do_shortcode($content));
	$out .= '</div>';
	
   return str_replace("<p>", "", $out);
}
add_shortcode('black_arrow_list', 'op_custom_black_arrow_list');

function op_custom_black_tick_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="black_tick_list">', do_shortcode($content));
	$out .= '</div>';
	
   return str_replace("<p>", "", $out);
}
add_shortcode('black_tick_list', 'op_custom_black_tick_list');

function op_custom_red_arrow_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="red_arrow_list">', do_shortcode($content));
	$out .= '</div>';
	
   return str_replace("<p>", "", $out);
}
add_shortcode('red_arrow_list', 'op_custom_red_arrow_list');

function op_custom_red_tick_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="red_tick_list">', do_shortcode($content));
	$out .= '</div>';
	
   return str_replace("<p>", "", $out);
}
add_shortcode('red_tick_list', 'op_custom_red_tick_list');

function op_custom_green_plus_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="green_plus_list">', do_shortcode($content));
	$out .= '</div>';
	
   return str_replace("<p>", "", $out);
}
add_shortcode('green_plus_list', 'op_custom_green_plus_list');

function op_custom_green_plus_2_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="green_plus_2_list">', do_shortcode($content));
	$out .= '</div>';
	
   return $out;
}
add_shortcode('green_plus_2_list', 'op_custom_green_plus_2_list');
function op_custom_green_tick_1_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="green_tick_1_list">', do_shortcode($content));
	$out .= '</div>';
	
   return str_replace("<p>", "", $out);
}
add_shortcode('green_tick_1_list', 'op_custom_green_tick_1_list');
function op_custom_green_tick_2_list( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'width'      => '100%',
    ), $atts));
	
	$out .= '<div style="width:' .$width. ';margin:0px auto;">';
	$out .= str_replace('<ul>', '<ul class="green_tick_2_list">', do_shortcode($content));
	$out .= '</div>';
	
   return $out;
}
add_shortcode('green_tick_2_list', 'op_custom_green_tick_2_list');
//************************************* Testimonial Boxes

function op_custom_testimonial1( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'author'      => '',
    ), $atts));
	
	$out .= '<div id="testimonialbox1"><div id="testimonialbox1text">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	$out .= '<div id="testimonialbox1name">' .$author. '</div>';
	$out .= '</div>';
	
   return $out;
}
add_shortcode('testimonial1', 'op_custom_testimonial1');
function op_custom_testimonial1_arial( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'author'      => '',
    ), $atts));
	
	$out .= '<div id="testimonialbox1b"><div id="testimonialbox1btext">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	$out .= '<div id="testimonialbox1bname">' .$author. '</div>';
	$out .= '</div>';
	
   return $out;
}
add_shortcode('testimonial1_arial', 'op_custom_testimonial1_arial');
function op_custom_testimonial2( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'author'      => '',
		'pic'      => '',
    ), $atts));
	
	$out .= '<div id="testimonialbox2">';
	$out .= '<img src="'.$pic.'" width:88px; height:101px;  style="border:1px solid #666666;width:88px;height:101px;" />';
	$out .= '<div id="testimonialbox2side"><div id="testimonialbox2text">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	$out .= '<div id="testimonialbox2name">' .$author. '</div>';
	$out .= '</div><div class="aclear"></div></div>';

	
   return $out;
}
add_shortcode('testimonial2', 'op_custom_testimonial2');
function op_custom_testimonial3( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'author'      => '',
		'pic'      => '',
    ), $atts));
	
	$out .= '<div id="testimonialbox3">';
	$out .= '<img src="'.$pic.'" width:88px; height:101px; style="border:1px solid #666666;width:88px;height:101px;" />';
	$out .= '<div id="testimonialbox3side"><div id="testimonialbox3text">';
	$out .= do_shortcode($content);
	$out .= '</div>';
	$out .= '<div id="testimonialbox3name">' .$author. '</div>';
	$out .= '</div><div class="aclear"></div></div>';
	
   return $out;
}
add_shortcode('testimonial3', 'op_custom_testimonial3');

//************************************* Order Boxes
function op_custom_risk_free_order_box_1( $atts, $content = null ) {
	
	$out .= '<div class="orderbox1top"></div>';
	$out .= '<div class="orderboxbk">' .do_shortcode($content);'</div>';
	$out .= '</div><div class="orderboxbtm"></div>';
	
   return $out;
}
add_shortcode('risk_free_order_box_1', 'op_custom_risk_free_order_box_1');

function op_custom_risk_free_order_box_2( $atts, $content = null ) {
	$out .= '<div class="orderbox2top"></div>';
	$out .= '<div class="orderboxbk">' .do_shortcode($content);'</div>';
	$out .= '</div><div class="orderboxbtm"></div>';
   return $out;
}
add_shortcode('risk_free_order_box_2', 'op_custom_risk_free_order_box_2');

function op_custom_secure_order_form_box_1( $atts, $content = null ) {
	$out .= '<div class="orderbox3top"></div>';
	$out .= '<div class="orderboxbk">' .do_shortcode($content);'</div>';
	$out .= '</div><div class="orderboxbtm"></div>';
	
   return $out;
}
add_shortcode('secure_order_form_box_1', 'op_custom_secure_order_form_box_1');

function op_custom_secure_order_form_box_2( $atts, $content = null ) {
	$out .= '<div class="orderbox4top"></div>';
	$out .= '<div class="orderboxbk">' .do_shortcode($content);'</div>';
	$out .= '</div><div class="orderboxbtm"></div>';
	
   return $out;
}
add_shortcode('secure_order_form_box_2', 'op_custom_secure_order_form_box_2');

//************************************* Guarantee Boxes

function op_custom_guarantee_box_1( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'title'      => '',
    ), $atts));
	
	$out .= '<div id="guaranteebox1">';
	$out .= '<div id="guaranteeboximage"></div>';
	$out .= '<h3>' .$title. '</h3>';
	$out .= do_shortcode($content);
	$out .= '</div>';
	
   return $out;
}
add_shortcode('guarantee_box_1', 'op_custom_guarantee_box_1');

function op_custom_guarantee_bar_30Day( $atts, $content = null ) {
   return '<div class="guaranteebar1-30day"></div>';
}
add_shortcode('guarantee_bar_30Day', 'op_custom_guarantee_bar_30Day');

function op_custom_guarantee_bar_60Day( $atts, $content = null ) {
   return '<div class="guaranteebar1-60day"></div>';
}
add_shortcode('guarantee_bar_60Day', 'op_custom_guarantee_bar_60Day');

function op_custom_guarantee_bar_90Day( $atts, $content = null ) {
   return '<div class="guaranteebar1-90day"></div>';
}
add_shortcode('guarantee_bar_90Day', 'op_custom_guarantee_bar_90Day');

//************************************* Membership Page Functions

function op_custom_membership_headline( $atts, $content = null ) {
   return '<div class="memberstitle1">' . do_shortcode($content) . '</div>';
}
add_shortcode('membership_headline', 'op_custom_membership_headline');
function op_custom_membership_headline_small( $atts, $content = null ) {
   return '<div class="memberstitle2">' . do_shortcode($content) . '</div>';
}
add_shortcode('membership_headline_small', 'op_custom_membership_headline_small');


function op_custom_membership_downloads_box( $atts, $content = null ) {
	extract(shortcode_atts(array(			 
	'title'	=> 'Your Downloads',
    ), $atts));
	
	$out .= '<div id="dlbox">';
	$out .= '<div class="dlboxheader dlboxheader-left">';
	$out .= '<h4 class="dlbox1">'.$title.'</h4>';
	$out .= '</div><p>';
	$out .= do_shortcode($content);
	$out .= '</p></div>';
	
   return $out;
}
add_shortcode('membership_downloads_box', 'op_custom_membership_downloads_box');


function op_custom_membership_download_item_pdf( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditempdf"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_pdf', 'op_custom_membership_download_item_pdf');


function op_custom_membership_download_item_zip( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemzip"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_zip', 'op_custom_membership_download_item_zip');


function op_custom_membership_download_item_mp3( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemmp3"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_mp3', 'op_custom_membership_download_item_mp3');


function op_custom_membership_download_item_audio( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemaudio"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_audio', 'op_custom_membership_download_item_audio');

function op_custom_membership_download_item_mov( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemmov"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_mov', 'op_custom_membership_download_item_mov');

function op_custom_membership_download_item_video( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemvideo"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_video', 'op_custom_membership_download_item_video');

function op_custom_membership_download_item_txt( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemtxt"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_txt', 'op_custom_membership_download_item_txt');


function op_custom_membership_download_item_doc( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemdoc"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_doc', 'op_custom_membership_download_item_doc');


function op_custom_membership_download_item_excel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemexcel"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_excel', 'op_custom_membership_download_item_excel');


function op_custom_membership_download_item_ppt( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemppt"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_ppt', 'op_custom_membership_download_item_ppt');



function op_custom_membership_download_item_mindmanager( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => '#',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="downloaditem">';
	$out .= '<div class="downloaditemmm"></div>';
	$out .= '<div class="downloaditemtext"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	$out .= '</div><div class="aclear"></div>';
	
   return $out;
}
add_shortcode('membership_download_item_mindmanager', 'op_custom_membership_download_item_mindmanager');

//************************************* Hyperlink Styles

function op_custom_hyperlink_large_centered( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'link'      => 'http://www.checkoutURL.com',
		'target'	=> '_self',
    ), $atts));
	
	$out .= '<div class="hyperlink_large_centered"><a href="'.$link.'" target="'.$target.'">';
	$out .= do_shortcode($content);
	$out .= '</a></div>';
	
   return $out;
}
add_shortcode('hyperlink_large_centered', 'op_custom_hyperlink_large_centered');

//************************************* Other Elements
function op_custom_date_today( $atts, $content = null ) {
	extract(shortcode_atts(array(), $atts));
	
	$out .= '<SCRIPT LANGUAGE="Javascript">var dayNames = new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");var monthNames = new Array("January","February","March","April","May","June","July",
"August","September","October","November","December");var now = new Date();document.write(dayNames[now.getDay()] + ", " + monthNames[now.getMonth()] + " " + now.getDate() + ", " + now.getFullYear());</SCRIPT>';
	
   return $out;
}
add_shortcode('date_today', 'op_custom_date_today');
//********* VIDEO CODE

function op_custom_video( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'video_url'     => 'http://www.videourl.com',
		'width'			=> '500',
		'height'		=> '300',
		'video_id'		=> 'video1',
		'video_image'	=> 'http://www.videoimageurl.com',
		'controlbar'	=> 'bottom',
	), $atts));
	
	$out .= '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="'.$width.'" height="'.$height.'" id="'.$video_id.'" name="'.$video_id.'">';
	$out .= '<param name="movie" value="'.get_bloginfo('template_directory').'/js/player.swf">';
	$out .= '<param name="allowfullscreen" value="true">';
	$out .= '<param name="allowscriptaccess" value="always">';
	$out .= '<param name="stretching" value="exactfit">';
	$out .= '<param name="image" value="'.$video_image.'">';
	$out .= '<param name="stretching" value="exactfit">';
	$out .= '<param name="wmode" value="transparent">';
	$out .= '<param name="controlbar" value="'.$controlbar.'">';
	$out .= '<param name="flashvars" value="file='.$video_url.'&stretching=fill&image='.$video_image.'&controlbar='.$controlbar.'">';
	$out .= '<embed id="'.$video_id.'" name="'.$video_id.'" wmode="transparent" src="'.get_bloginfo('template_directory').'/js/player.swf" width="'.$width.'" height="'.$height.'" allowscriptaccess="always" allowfullscreen="true" flashvars="file='.$video_url.'&stretching=exactfit&image='.$video_image.'&controlbar='.$controlbar.'&screencolor=FFFFFF&backcolor=1b1b1b&frontcolor=FFFFFF&lightcolor=1173ba"/>';
	$out .= '</object>';
	$out .= do_shortcode($content);
   return $out;
}
add_shortcode('video', 'op_custom_video');




//********* NEW VIDEO CODES

function op_custom_new_video_with_placeholder( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'video_url'     => 'http://www.videourl.com',
		'width'			=> '500',
		'height'		=> '300',
		'video_id'		=> 'video1',
		'video_image'	=> 'http://www.videoimageurl.com',
	), $atts));
	
	$out .= '<div style="margin:0px auto;width:'.$width.'px;"><a href="'.$video_url.'" style="display:block;width:'.$width.'px;height:'.$height.'px" id="'.$video_id.'"><img src="'.$video_image.'" width="'.$width.'px" height="'.$height.'px"></a></div>';
	$out .= '<script>$f("'.$video_id.'", "'.get_bloginfo('template_directory').'/js/flowplayer-3.2.11.swf", {clip: {autoPlay: true, autoBuffering: false, wmode: "opaque",}}).ipad();</script>';
	$out .= do_shortcode($content);

   return $out;
}
add_shortcode('new_video_with_placeholder', 'op_custom_new_video_with_placeholder');

function op_custom_new_video_with_autoplay( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'video_url'     => 'http://www.videourl.com',
		'width'			=> '500',
		'height'		=> '300',
		'video_id'		=> 'video1',
		'video_image'	=> 'http://www.videoimageurl.com',
		'autoplay'		=> 'true',
	), $atts));
	
	$out .= '<div style="margin:0px auto;width:'.$width.'px;"><a href="'.$video_url.'" style="display:block;width:'.$width.'px;height:'.$height.'px" id="'.$video_id.'"></a></div>';
	$out .= '<script>$f("'.$video_id.'", "'.get_bloginfo('template_directory').'/js/flowplayer-3.2.11.swf", {clip: {autoPlay: '.$autoplay.', autoBuffering: true, wmode: "opaque",}}).ipad();</script>';
	$out .= do_shortcode($content);

   return $out;
}
add_shortcode('new_video_with_autoplay', 'op_custom_new_video_with_autoplay');



//********* Social Sharing Shortcodes
function op_custom_sharebox( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'sharetext'     => 'Share This Page',
	), $atts));
	
	$out .= '<div style="height:20px;background: #fafafa;border: 1px solid #DDDDDD;display: block;margin-left: auto;margin-right: auto;padding: 10px;text-align: center;vertical-align: middle;width: 470px;-moz-border-radius: 4px;-webkit-border-radius: 4px;margin-bottom:15px;"><span style="font-weight:bold;font-size:14px;vertical-align:top;padding-right:20px;color:#444444;padding-top:1px;text-transform:uppercase;text-align:center;">'.$sharetext.'</span><iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink().'&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe><span style="height:20px;width:110px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><span style="height:20px;width:100px;vertical-align:top;padding-bottom:10px;display: inline-block;text-align:left;"><a name="fb_share" type="button_count"></a></span></div>';
$out .= do_shortcode($content);
	
	
   return $out;
}
add_shortcode('sharebox', 'op_custom_sharebox');

function op_custom_sharebox2( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'sharetext'     => 'Share This Page',
	), $atts));
	
	$out .= '<div style="height:95px;background: #fafafa;border: 1px solid #DDDDDD;-moz-border-radius: 7px;-webkit-border-radius: 7px;display: block;margin-left: auto;margin-right: auto;padding-bottom:10px;padding-top:7px;text-align: center;vertical-align: middle;width: 280px;margin-bottom:15px;">
	<div style="margin:0px auto;font-weight:bold;font-size:14px;vertical-align:middle;padding-right:20px;width:270px;padding-bottom:8px;color:#444444;padding-top:1px;text-transform:uppercase;text-align:center;">'.$sharetext.'</div>
<iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink().'&amp;layout=box_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:62px;" allowTransparency="true"></iframe><span style="height:20px;width:77px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><span style="height:62px;width:65px;vertical-align:top;padding-bottom:10px;display: inline-block;text-align:left;"><a name="fb_share" type="box_count"></a></span></div>';
$out .= do_shortcode($content);
	
	
   return $out;
}
add_shortcode('sharebox2', 'op_custom_sharebox2');

function op_custom_sharebox3_no_text( $atts, $content = null ) {
	extract(shortcode_atts(array(
	), $atts));
	
	$out .= '<div style="height:65px;background: #fafafa;border: 1px solid #DDDDDD;-moz-border-radius: 7px;-webkit-border-radius: 7px;display: block;margin-left: auto;margin-right: auto;padding-bottom:8px;padding-top:10px;text-align: center;vertical-align: middle;width: 280px;margin-bottom:15px;">
<iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink().'&amp;layout=box_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:62px;" allowTransparency="true"></iframe><span style="height:20px;width:77px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><span style="height:62px;width:65px;vertical-align:top;display: inline-block;text-align:left;"><a name="fb_share" type="box_count"></a></span></div>';
$out .= do_shortcode($content);
	
	
   return $out;
}
add_shortcode('sharebox3_no_text', 'op_custom_sharebox3_no_text');



function op_custom_sharebox4( $atts, $content = null ) {
	extract(shortcode_atts(array(
	'sharetext'     => 'Share This Page',
	), $atts));
	
	$content = do_shortcode( shortcode_unautop( $content ) );
	if ( '</p>' == substr( $content, 0, 4 )
	and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
	
	$out .= '<div style="height:20px;background: #fafafa;border: 1px solid #DDDDDD;display: block;margin-left: auto;margin-right: auto;padding: 10px;text-align: center;vertical-align: middle;width: 535px;-moz-border-radius: 4px;-webkit-border-radius: 4px;margin-bottom:15px;"><span style="font-weight:bold;font-size:14px;vertical-align:top;padding-right:20px;color:#444444;padding-top:1px;text-transform:uppercase;text-align:center;">'.$sharetext.'</span><iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink().'&amp;layout=button_count&amp;show_faces=false&amp;width=100&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe><span style="height:20px;width:110px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="horizontal">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><span style="height:20px;width:75px;vertical-align:top;padding-bottom:10px;display: inline-block;text-align:left;"><g:plusone size="medium"></g:plusone><script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;po.src = "https://apis.google.com/js/plusone.js";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);})();</script></span><script src="http://platform.linkedin.com/in.js" type="text/javascript"></script><script type="IN/Share" data-counter="right"></script></div>';
$out .= $content;
	
	
   return $out;
}
add_shortcode('sharebox4', 'op_custom_sharebox4');





function op_custom_sharebox5_no_text( $atts, $content = null ) {
	extract(shortcode_atts(array(
	), $atts));
	
	$content = do_shortcode( shortcode_unautop( $content ) );
	if ( '</p>' == substr( $content, 0, 4 )
	and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
	
	$out .= '<div style="height:65px;background: #fafafa;border: 1px solid #DDDDDD;-moz-border-radius: 7px;-webkit-border-radius: 7px;display: block;margin-left: auto;margin-right: auto;padding-bottom:8px;padding-top:10px;text-align: center;vertical-align: middle;width: 330px;margin-bottom:15px;">
<iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink().'&amp;layout=box_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:62px;" allowTransparency="true"></iframe><span style="height:20px;width:70px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><g:plusone size="tall"></g:plusone><script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;po.src ="https://apis.google.com/js/plusone.js";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);})();</script></span><span style="height:20px;width:70px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="top"></script></div>';
$out .= $content;
	
   return $out;
}
add_shortcode('sharebox5_no_text', 'op_custom_sharebox5_no_text');




function op_custom_sharebox5_no_border( $atts, $content = null ) {
	extract(shortcode_atts(array(
	), $atts));
	
	$content = do_shortcode( shortcode_unautop( $content ) );
	if ( '</p>' == substr( $content, 0, 4 )
	and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
	
	$out .= '<div style="height:65px;display: block;margin-left: auto;margin-right: auto;padding-bottom:8px;padding-top:8px;text-align: center;vertical-align: middle;width: 330px;margin-bottom:15px;">
<iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink().'&amp;layout=box_count&amp;show_faces=false&amp;width=70&amp;action=like&amp;font=lucida+grande&amp;colorscheme=light&amp;height=62" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:70px; height:62px;" allowTransparency="true"></iframe><span style="height:20px;width:70px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><g:plusone size="tall"></g:plusone><script type="text/javascript">(function() {var po = document.createElement("script"); po.type = "text/javascript"; po.async = true;po.src ="https://apis.google.com/js/plusone.js";var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(po, s);})();</script></span><span style="height:20px;width:70px;vertical-align:top;padding-bottom:1px;display: inline-block;text-align:left;"><a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter="top"></script></div>';
$out .= $content;
	
   return $out;
}
add_shortcode('sharebox5_no_border', 'op_custom_sharebox5_no_border');




function op_custom_google_website_optimizer( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'section'      => 'Add Your Section ID Here',
    ), $atts));
	
	$out .= '<script>utmx_section("' .$section. '")</script>' .$content. '</noscript>';
	
   return $out;
}
add_shortcode('google_website_optimizer', 'op_custom_google_website_optimizer');

//************************************* Delay Content
function op_custom_delay_content( $atts, $content = null ) {
	extract(shortcode_atts(array(
        'id'      => 'unique',
        'delay'      => '5',
    ), $atts));

	$delay = $delay*1000;

	$content = do_shortcode( shortcode_unautop( $content ) );
	if ( '</p>' == substr( $content, 0, 4 )
	and '<p>' == substr( $content, strlen( $content ) - 3 ) )
	$content = substr( $content, 4, strlen( $content ) - 7 );
	
	$out .= '<script type="text/javascript">
	jQuery(document).ready(function() {
		setTimeout(function(){jQuery("#'.$id.'").show()}, '.$delay.');
	});
    </script>';	
	$out .= '<div id="'.$id.'">';
	$out .= $content;
	$out .= '</div>';
	
   return $out;
}
add_shortcode('delay_content', 'op_custom_delay_content');

//************************************* Two Column Div Content
function op_custom_two_columns( $atts, $content = null ) {
}
add_shortcode('two_columns', 'op_custom_two_columns');

//************************************* Three Column Div Content
function op_custom_three_columns( $atts, $content = null ) {
}
add_shortcode('three_columns', 'op_custom_three_columns');

//************************************* Four Column Div Content
function op_custom_four_columns( $atts, $content = null ) {
}
add_shortcode('four_columns', 'op_custom_four_columns');