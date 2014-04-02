function init() {
	tinyMCEPopup.resizeToInnerSize();
}

function getCheckedValue(radioObj) {
	if(!radioObj)
		return "";
	var radioLength = radioObj.length;
	if(radioLength == undefined)
		if(radioObj.checked)
			return radioObj.value;
		else
			return "";
	for(var i = 0; i < radioLength; i++) {
		if(radioObj[i].checked) {
			return radioObj[i].value;
		}
	}
	return "";
}

function insertOptPressLink() {
	
	var tagtext;
	
	var portfolio = document.getElementById('portfolio_panel');
	var style = document.getElementById('style_panel');
	var contact = document.getElementById('contact_panel');
	
	// who is active ?
	if (portfolio.className.indexOf('current') != -1) {
		var catid = document.getElementById('portfolio_category').value;
		var max = document.getElementById('portfolio_max').value;
		var showtype = getCheckedValue(document.getElementsByName('showtype'));
		if (catid != 0 )
			tagtext = "[portfolio cat="+ catid + " style=" + showtype + " max=" + max + "]";
		else
			tinyMCEPopup.close();
	}

	if (style.className.indexOf('current') != -1) {
		var styleid = document.getElementById('style_shortcode').value;
		if (styleid != 0 ){
			tagtext = "["+ styleid + "]Insert Your Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'delay_content' ){
			tagtext = "["+ styleid + " id=\"uniqueID\" delay=\"5\"]Enter Your Content Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'two_columns' ){
			tagtext = "["+ styleid + "_1]Content 1 Here[/" + styleid + "_1]\n";
			tagtext += "["+ styleid + "_2]Content 2 Here[/" + styleid + "_2]";
		}
		if (styleid != 0 && styleid == 'three_columns' ){
			tagtext = "["+ styleid + "_1]Content 1 Here[/" + styleid + "_1]\n";
			tagtext += "["+ styleid + "_2]Content 2 Here[/" + styleid + "_2]\n";
			tagtext += "["+ styleid + "_3]Content 3 Here[/" + styleid + "_3]";
		}
		if (styleid != 0 && styleid == 'four_columns' ){
			tagtext = "["+ styleid + "_1]Content 1 Here[/" + styleid + "_1]\n";
			tagtext += "["+ styleid + "_2]Content 2 Here[/" + styleid + "_2]\n";
			tagtext += "["+ styleid + "_3]Content 3 Here[/" + styleid + "_3]\n";
			tagtext += "["+ styleid + "_4]Content 4 Here[/" + styleid + "_4]";
		}
		if (styleid != 0 && styleid == 'divider_bar' ){
			tagtext = "["+ styleid + "]divider[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'divider_bar_wide' ){
		tagtext = "["+ styleid + "]divider [/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'guarantee_bar_30Day' ){
		tagtext = "["+ styleid + "]guarantee bar [/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'guarantee_bar_60Day' ){
		tagtext = "["+ styleid + "]guarantee bar [/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'guarantee_bar_90Day' ){
		tagtext = "["+ styleid + "]guarantee bar [/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'text_bar_1' ){
			tagtext = "["+ styleid + " background=\"#444444\" + width=\"100%\"]Enter Your Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'text_bar_2' ){
			tagtext = "["+ styleid + " + width=\"100%\"]Enter Your Text Here[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'text_bar_1_left' ){
			tagtext = "["+ styleid + " background=\"#444444\" + width=\"100%\"]Enter Your Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'text_bar_2_left' ){
			tagtext = "["+ styleid + " + width=\"100%\"]Enter Your Text Here[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'text_bar_3' ){
			tagtext = "["+ styleid + " background=\"#F0F0F0\" + width=\"100%\"]Enter Your Text Here[/" + styleid + "]";
		}
		
		
		if (styleid != 0 && styleid == 'headline_arial_extra_large_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_arial_large_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_arial_medium_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_arial_small_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_arial_extra_large_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_arial_large_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_arial_medium_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_arial_small_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_extra_large_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_large_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_medium_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_small_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_extra_large_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_large_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_medium_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_georgia_small_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_extra_large_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_large_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_medium_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_small_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_extra_large_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_large_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_medium_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_tahoma_small_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_cufon_font_left' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'headline_cufon_font_centered' ){
			tagtext = "["+ styleid + " color=\"#000000\"]Enter Your Headline Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'guarantee_box_1' ){
			tagtext = "["+ styleid + " title=\"Our 30/60/90 Day 100% Money Back Guarantee\"]Add Your Guarantee Text Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'testimonial1' ){
			tagtext = "["+ styleid + " author=\"Author Name & Company\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'testimonial1_arial' ){
			tagtext = "["+ styleid + " author=\"Author Name & Company\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'testimonial2' ){
			tagtext = "["+ styleid + " author=\"Author Name & Company\" + pic=\"http://www.picurl.com\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'testimonial3' ){
			tagtext = "["+ styleid + " author=\"Author Name & Company\" + pic=\"http://www.picurl.com\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'testimonialname' ){
			tagtext = "["+ styleid + "]Author Name, Company Name/Website Name [/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'add_to_cart_btn_style_1' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'add_to_cart_btn_style_2' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'add_to_cart_btn_style_3' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'add_to_cart_btn_style_1_no_paypal' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'add_to_cart_btn_style_2_no_paypal' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'add_to_cart_btn_style_3_no_paypal' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_get_access_now' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_download_now' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_order_now' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_checkout' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_sign_up_now' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_add_to_cart' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_let_me_in_now' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_get_instant_access' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_buy_now' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";		
		}
	if (styleid != 0 && styleid == 'high_impact_btn_register_now' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		
		
			if (styleid != 0 && styleid == 'high_impact_btn_get_access_now_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_download_now_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_order_now_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_checkout_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_sign_up_now_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_add_to_cart_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_let_me_in_now_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_get_instant_access_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		if (styleid != 0 && styleid == 'high_impact_btn_buy_now_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
	if (styleid != 0 && styleid == 'high_impact_btn_register_now_silver' ){
			tagtext = "["+ styleid + " link=\"#\" + target=\"_self\"] [/" + styleid + "]";	
		}
		
		
		if (styleid != 0 && styleid == 'features_box_green' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_light_green' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_blue' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_azure_blue' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_light_blue' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"1px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_paper_white' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_grey' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_yellow' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'features_box_red' ){
			tagtext = "["+ styleid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + styleid + "]";
		}
		
		
		if (styleid != 0 && styleid == 'content_box' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_blue' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_azure_blue' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_light_blue' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_green' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_light_green' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_grey' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_paper_white' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_yellow' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'content_box_red' ){
			tagtext = "["+ styleid + " width=\"75%\"]Add your content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'sharebox' ){
			tagtext = "["+ styleid + " sharetext=\"Share This Page\"] [/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'sharebox2' ){
			tagtext = "["+ styleid + " sharetext=\"Share This Page\"] [/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'sharebox3_no_text' ){
			tagtext = "["+ styleid + "] [/" + styleid + "]";
		}


if (styleid != 0 && styleid == 'order_box_1' ){
			tagtext = "["+ styleid + " width=\"60%\" + border=\"4px\"]Add your order box content here...[/" + styleid + "]";
		}
		
		
if (styleid != 0 && styleid == 'order_box_2' ){
			tagtext = "["+ styleid + " width=\"60%\" + border=\"4px\"]Add your order box content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'order_box_3' ){
			tagtext = "["+ styleid + " width=\"60%\" + border=\"4px\"]Add your order box content here...[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'video' ){
			tagtext = "["+ styleid + " video_url=\"http://www.videourl.com\" + width=\"640\" + height=\"360\" + video_id=\"video1\" + video_image=\"http://www.videoimageurl.com\" + controlbar=\"bottom\"] [/" + styleid + "]";
		}
		
		if (customid != 0 && customid == 'new_video_with_placeholder' ){
			tagtext = "["+ customid + " video_url=\"http://www.videourl.com\" + width=\"640\" + height=\"360\" + video_id=\"video1\" + video_image=\"http://www.videoimageurl.com\" + autoplay=\"true\"] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'new_video_with_autoplay' ){
			tagtext = "["+ customid + " video_url=\"http://www.videourl.com\" + width=\"640\" + height=\"360\" + video_id=\"video1\" + autoplay=\"true\"] [/" + customid + "]";
		}
		
	
		if (styleid != 0 && styleid == 'black_arrow_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'red_arrow_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'black_arrow_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
	
			if (styleid != 0 && styleid == 'red_arrow_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'green_plus_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'green_plus_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'green_plus_2_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
			if (styleid != 0 && styleid == 'green_plus_2_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'green_tick_1_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'green_tick_1_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'green_tick_2_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'green_tick_2_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'black_tick_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'black_tick_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'red_tick_list' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'red_tick_list_small' ){
			tagtext = "["+ styleid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + styleid + "]";
		}
		
		
		
		if (styleid != 0 && styleid == 'membership_downloads_box' ){
			tagtext = "["+ styleid + " title=\"Your Downloads\"]You may need to right-click the following links and select Save Link As to download the file to your computer[/" + styleid + "]";
		}	
		if (styleid != 0 && styleid == 'membership_download_item_pdf' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		
		
		
		if (styleid != 0 && styleid == 'membership_download_item_mov' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'membership_download_item_txt' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'membership_download_item_doc' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'membership_download_item_video' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'membership_download_item_mindmanager' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'membership_download_item_mp3' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'membership_download_item_audio' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		if (styleid != 0 && styleid == 'membership_download_item_zip' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'membership_download_item_excel' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
			
		if (styleid != 0 && styleid == 'membership_download_item_ppt' ){
			tagtext = "["+ styleid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'hyperlink_large_centered' ){
			tagtext = "["+ styleid + " link=\"http://www.checkouturl.com\" + target=\"_self\"]Enter Your Call To Action Text[/" + styleid + "]";
		}
		
		if (styleid != 0 && styleid == 'google_website_optimizer' ){
			tagtext = "["+ styleid + " section=\"Add Your Section ID Here\"]Add your content to test here[/" + styleid + "]";
		}
		
		if ( styleid == 0 ){
			tinyMCEPopup.close();
		}
	}

	if (contact.className.indexOf('current') != -1) {
		var email = document.getElementById('contact_email').value;
		if (email != 0 )
			tagtext = "[contactform email="+ email + "]";
		else
			tinyMCEPopup.close();
		}
	
	if(window.tinyMCE) {
		//TODO: For QTranslate we should use here 'qtrans_textarea_content' instead 'content'
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		//Peforms a clean up of the current editor HTML. 
		//tinyMCEPopup.editor.execCommand('mceCleanup');
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}

function insertButtonOPLink() {
	
	var tagtext;
	
	var button = document.getElementById('button_panel');
	
	var buttonid = getCheckedValue(document.getElementsByName('buttonstyle'));

		if (buttonid != 0 && buttonid == 'add_to_cart_btn_style_1' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'add_to_cart_btn_style_2' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'add_to_cart_btn_style_3' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'add_to_cart_btn_style_1_no_paypal' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'add_to_cart_btn_style_2_no_paypal' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'add_to_cart_btn_style_3_no_paypal' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}		
		if (buttonid != 0 && buttonid == 'high_impact_btn_get_access_now' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_download_now' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_order_now' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_checkout' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_sign_up_now' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_add_to_cart' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_let_me_in_now' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_get_instant_access' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_buy_now' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";		
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_register_now' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_get_access_now_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_download_now_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_order_now_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_checkout_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_sign_up_now_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_add_to_cart_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_let_me_in_now_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_get_instant_access_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_buy_now_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		if (buttonid != 0 && buttonid == 'high_impact_btn_register_now_silver' ){
			tagtext = "["+ buttonid + " link=\"#\" + target=\"_self\"] [/" + buttonid + "]";	
		}
		
		if ( buttonid == 0 ){
			tinyMCEPopup.close();
		}

	if(window.tinyMCE) {
		//TODO: For QTranslate we should use here 'qtrans_textarea_content' instead 'content'
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		//Peforms a clean up of the current editor HTML. 
		//tinyMCEPopup.editor.execCommand('mceCleanup');
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}

function insertCustomOPLink() {
	
	var tagtext;
	
	var custom = document.getElementById('custom_panel');
	
	var customid = getCheckedValue(document.getElementsByName('customstyle'));
		if (customid != 0 ){
			tagtext = "["+ customid + "]Insert Your Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_extra_large_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'delay_content' ){
			tagtext = "["+ customid + " id=\"uniqueID\" delay=\"5\"]Enter Your Content Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'two_columns' ){
			tagtext = "["+ customid + "_1]Content 1 Here[/" + customid + "_1]\n";
			tagtext += "["+ customid + "_2]Content 2 Here[/" + customid + "_2]";
		}
		if (customid != 0 && customid == 'three_columns' ){
			tagtext = "["+ customid + "_1]Content 1 Here[/" + customid + "_1]\n";
			tagtext += "["+ customid + "_2]Content 2 Here[/" + customid + "_2]\n";
			tagtext += "["+ customid + "_3]Content 3 Here[/" + customid + "_3]";
		}
		if (customid != 0 && customid == 'four_columns' ){
			tagtext = "["+ customid + "_1]Content 1 Here[/" + customid + "_1]\n";
			tagtext += "["+ customid + "_2]Content 2 Here[/" + customid + "_2]\n";
			tagtext += "["+ customid + "_3]Content 3 Here[/" + customid + "_3]\n";
			tagtext += "["+ customid + "_4]Content 4 Here[/" + customid + "_4]";
		}
		if (customid != 0 && customid == 'divider_bar_wide' ){
			tagtext = "["+ customid + "]divider [/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_extra_large_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_large_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_medium_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_small_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_extra_large_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_large_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_medium_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_arial_small_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_extra_large_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_large_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_medium_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_small_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_extra_large_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_large_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_medium_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_georgia_small_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_extra_large_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_large_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_medium_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_small_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_extra_large_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_large_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_medium_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_tahoma_small_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_cufon_font_left' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'headline_cufon_font_centered' ){
			tagtext = "["+ customid + " color=\"#000000\"]Enter Your Headline Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_blue' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_azure_blue' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_light_blue' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_green' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_light_green' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_grey' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_paper_white' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_yellow' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'content_box_red' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		if (customid != 0 && customid == 'guarantee_bar_30Day' ){
			tagtext = "["+ customid + "]guarantee bar [/" + customid + "]";
		}
		if (customid != 0 && customid == 'guarantee_bar_60Day' ){
			tagtext = "["+ customid + "]guarantee bar [/" + customid + "]";
		}
		if (customid != 0 && customid == 'guarantee_bar_90Day' ){
			tagtext = "["+ customid + "]guarantee bar [/" + customid + "]";
		}

		if (customid != 0 && customid == 'guarantee_box_1' ){
			tagtext = "["+ customid + " title=\"Our 30/60/90 Day 100% Money Back Guarantee\"]Add Your Guarantee Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'testimonial1' ){
			tagtext = "["+ customid + " author=\"Author Name & Company\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + customid + "]";
		}
		if (customid != 0 && customid == 'testimonial1_arial' ){
			tagtext = "["+ customid + " author=\"Author Name & Company\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + customid + "]";
		}
		if (customid != 0 && customid == 'testimonial2' ){
			tagtext = "["+ customid + " author=\"Author Name & Company\" + pic=\"http://www.picurl.com\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + customid + "]";
		}
		if (customid != 0 && customid == 'testimonial3' ){
			tagtext = "["+ customid + " author=\"Author Name & Company\" + pic=\"http://www.picurl.com\"]&#8220;Add Your Testimonial Text Here...&#8221;[/" + customid + "]";
		}
		if (customid != 0 && customid == 'testimonialname' ){
			tagtext = "["+ customid + "]Author Name, Company Name/Website Name [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'text_bar_1' ){
			tagtext = "["+ customid + " background=\"#444444\" + width=\"100%\"]Enter Your Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'text_bar_2' ){
			tagtext = "["+ customid + " + width=\"100%\"]Enter Your Text Here[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'text_bar_1_left' ){
			tagtext = "["+ customid + " background=\"#444444\" + width=\"100%\"]Enter Your Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'text_bar_2_left' ){
			tagtext = "["+ customid + " + width=\"100%\"]Enter Your Text Here[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'text_bar_3' ){
			tagtext = "["+ customid + " background=\"#F0F0F0\" + width=\"100%\"]Enter Your Text Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'features_box_green' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_light_green' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_blue' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_azure_blue' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_light_blue' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"1px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_paper_white' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_grey' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_yellow' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'features_box_red' ){
			tagtext = "["+ customid + " width=\"75%\" + border=\"2px\"]Add your content here...[/" + customid + "]";
		}
		
		
		if (customid != 0 && customid == 'content_box' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_blue' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_azure_blue' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_light_blue' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_green' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_light_green' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_grey' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_paper_white' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_yellow' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'content_box_red' ){
			tagtext = "["+ customid + " width=\"75%\"]Add your content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'sharebox' ){
			tagtext = "["+ customid + " sharetext=\"Share This Page\"] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'sharebox2' ){
			tagtext = "["+ customid + " sharetext=\"Share This Page\"] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'sharebox3_no_text' ){
			tagtext = "["+ customid + "] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'sharebox4' ){
			tagtext = "["+ customid + " sharetext=\"Share This Page\"] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'sharebox5_no_text' ){
			tagtext = "["+ customid + "] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'sharebox5_no_border' ){
			tagtext = "["+ customid + "] [/" + customid + "]";
		}



		if (customid != 0 && customid == 'order_box_1' ){
			tagtext = "["+ customid + " width=\"60%\" + border=\"4px\"]Add your order box content here...[/" + customid + "]";
		}
		
		
		if (customid != 0 && customid == 'order_box_2' ){
			tagtext = "["+ customid + " width=\"60%\" + border=\"4px\"]Add your order box content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'order_box_3' ){
			tagtext = "["+ customid + " width=\"60%\" + border=\"4px\"]Add your order box content here...[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'video' ){
			tagtext = "["+ customid + " video_url=\"http://www.videourl.com\" + width=\"640\" + height=\"360\" + video_id=\"video1\" + video_image=\"http://www.videoimageurl.com\" + controlbar=\"bottom\"] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'new_video_with_placeholder' ){
			tagtext = "["+ customid + " video_url=\"http://www.videourl.com\" + width=\"640\" + height=\"360\" + video_id=\"video1\" + video_image=\"http://www.videoimageurl.com\" + autoplay=\"true\"] [/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'new_video_with_autoplay' ){
			tagtext = "["+ customid + " video_url=\"http://www.videourl.com\" + width=\"640\" + height=\"360\" + video_id=\"video1\" + autoplay=\"true\"] [/" + customid + "]";
		}
		
	
		if (customid != 0 && customid == 'black_arrow_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'red_arrow_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'black_arrow_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
	
		if (customid != 0 && customid == 'red_arrow_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_plus_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_plus_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_plus_2_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_plus_2_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_tick_1_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_tick_1_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_tick_2_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'green_tick_2_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'black_tick_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'black_tick_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'red_tick_list' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		if (customid != 0 && customid == 'red_tick_list_small' ){
			tagtext = "["+ customid + " width=\"100%\"]<ul>\r<li>Item #1</li>\r<li>Item #2</li>\r<li>Item #3</li>\r</ul>[/" + customid + "]";
		}
		
		
		
		if (customid != 0 && customid == 'membership_downloads_box' ){
			tagtext = "["+ customid + " title=\"Your Downloads\"]You may need to right-click the following links and select Save Link As to download the file to your computer[/" + customid + "]";
		}	
		if (customid != 0 && customid == 'membership_download_item_pdf' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		
		
		
		if (customid != 0 && customid == 'membership_download_item_mov' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'membership_download_item_txt' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'membership_download_item_doc' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'membership_download_item_video' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'membership_download_item_mindmanager' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'membership_download_item_mp3' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'membership_download_item_audio' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'membership_download_item_zip' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		if (customid != 0 && customid == 'membership_download_item_excel' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'membership_download_item_ppt' ){
			tagtext = "["+ customid + " link=\"http://www.downloadlink.com\" + target=\"_self\"]Your Download Item Name Here[/" + customid + "]";
		}
		
			
		if (customid != 0 && customid == 'hyperlink_large_centered' ){
			tagtext = "["+ customid + " link=\"http://www.checkouturl.com\" + target=\"_self\"]Enter Your Call To Action Text[/" + customid + "]";
		}
		
		if (customid != 0 && customid == 'google_website_optimizer' ){
			tagtext = "["+ customid + " section=\"Add Your Section ID Here\"]Add your content to test here[/" + customid + "]";
		}

		if ( customid == 0 ){
			tinyMCEPopup.close();
		}

	if(window.tinyMCE) {
		//TODO: For QTranslate we should use here 'qtrans_textarea_content' instead 'content'
		window.tinyMCE.execInstanceCommand('content', 'mceInsertContent', false, tagtext);
		//Peforms a clean up of the current editor HTML. 
		//tinyMCEPopup.editor.execCommand('mceCleanup');
		//Repaints the editor. Sometimes the browser has graphic glitches. 
		tinyMCEPopup.editor.execCommand('mceRepaint');
		tinyMCEPopup.close();
	}
	return;
}