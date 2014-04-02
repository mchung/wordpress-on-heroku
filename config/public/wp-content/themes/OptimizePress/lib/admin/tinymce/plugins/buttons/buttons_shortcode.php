<?php
function op_buttons_addtocart_style1( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',

    ), $atts));

	$out = "<center><a href=\"" .$link. "\" target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/addtocart-style1.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('add_to_cart_btn_style_1', 'op_buttons_addtocart_style1');


function op_buttons_addtocart_style1_nopp( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\" target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/addtocart-style1-nopp.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('add_to_cart_btn_style_1_no_paypal', 'op_buttons_addtocart_style1_nopp');


function op_buttons_addtocart_style2( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\" target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/addtocart-style2.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('add_to_cart_btn_style_2', 'op_buttons_addtocart_style2');


function op_buttons_addtocart_style2_nopp( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\" target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/addtocart-style2-nopp.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('add_to_cart_btn_style_2_no_paypal', 'op_buttons_addtocart_style2_nopp');


function op_buttons_addtocart_style3( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\" target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/addtocart-style3.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('add_to_cart_btn_style_3', 'op_buttons_addtocart_style3');


function op_buttons_addtocart_style3_nopp( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\" target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/addtocart-style3-nopp.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('add_to_cart_btn_style_3_no_paypal', 'op_buttons_addtocart_style3_nopp');

//************************************* Large High Impact Buttons

function op_buttons_large_addtocart( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-addtocart.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_add_to_cart', 'op_buttons_large_addtocart');


function op_buttons_large_downloadnow( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-downloadnow.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_download_now', 'op_buttons_large_downloadnow');


function op_buttons_large_ordernow( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-ordernow.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_order_now', 'op_buttons_large_ordernow');



function op_buttons_large_registernow( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-registernow.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_register_now', 'op_buttons_large_registernow');


function op_buttons_large_signupnow( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-signupnow.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_sign_up_now', 'op_buttons_large_signupnow');



function op_buttons_large_checkout( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-checkout.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_checkout', 'op_buttons_large_checkout');


function op_buttons_large_getaccessnow( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-getaccessnow.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_get_access_now', 'op_buttons_large_getaccessnow');


function op_buttons_large_getinstantaccess( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-getinstantaccess.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_get_instant_access', 'op_buttons_large_getinstantaccess');


function op_buttons_large_letmeinnow( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-letmeinnow.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_let_me_in_now', 'op_buttons_large_letmeinnow');


//************************************* Large High Impact Buttons (Silver)

function op_buttons_large_addtocartg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-addtocartg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_add_to_cart_silver', 'op_buttons_large_addtocartg');


function op_buttons_large_downloadnowg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-downloadnowg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_download_now_silver', 'op_buttons_large_downloadnowg');


function op_buttons_large_ordernowg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-ordernowg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_order_now_silver', 'op_buttons_large_ordernowg');



function op_buttons_large_registernowg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-registernowg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_register_now_silver', 'op_buttons_large_registernowg');


function op_buttons_large_signupnowg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-signupnowg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_sign_up_now_silver', 'op_buttons_large_signupnowg');



function op_buttons_large_checkoutg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-checkoutg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_checkout_silver', 'op_buttons_large_checkoutg');


function op_buttons_large_getaccessnowg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-getaccessnowg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_get_access_now_silver', 'op_buttons_large_getaccessnowg');


function op_buttons_large_getinstantaccessg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-getinstantaccessg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_get_instant_access_silver', 'op_buttons_large_getinstantaccessg');


function op_buttons_large_letmeinnowg( $atts, $content = null ) {
    extract(shortcode_atts(array(
        'link'      => '#',
		'target'	=> '_self',
    ), $atts));

	$out = "<center><a href=\"" .$link. "\"  target=\"" .$target. "\"><img src=" .get_bloginfo('template_directory'). "/images/large-letmeinnowg.png>" .do_shortcode($content). "</a></center>";
    
    return $out;
}
add_shortcode('high_impact_btn_let_me_in_now_silver', 'op_buttons_large_letmeinnowg');
