<?php
/**
 * Get all our options from the database
 */
global $options, $shortname;
$get_options = get_option($shortname.'_general_settings');
foreach ($options as $value) {
    if (isset($value['id']) && $get_options[ $value['id'] ] == FALSE && isset($value['std'])) {
            $$value['id'] = $value['std'];
	}
    elseif (isset($value['id'])) { $$value['id'] = $get_options[ $value['id'] ]; }
}
$launchheader = (!empty($get_options['header_img_images'])) ? $get_options['header_img_images'] : get_option('header_img_images');
$launchheaderlogo = (!empty($get_options['custom_logo_upload_images'])) ? $get_options['custom_logo_upload_images'] : get_option('custom_logo_upload_images');

/* Funnel Config added Nick 03162011*/
  $currentsalespagenavcolor = get_option($shortname.'_currentsalespagenavcolor');
  $currentsalespagetitletxt = get_option($shortname.'_currentsalespagetitletxt');
  $showcurrentsalespagetitletxt = get_option($shortname.'_showcurrentsalespagetitletxt');

$seo_options = array (
		array( "id" => "seodisableseo"),
		array( "id" => "seohometitle"),
		array( "id" => "seohomedesc"),
		array( "id" => "seohomekeywords"),
		array( "id" => "seousecanonicalurl"),
		array( "id" => "seoauto301redir"),
		array( "id" => "seopost_title_format"),
		array( "id" => "seopage_title_format"),
		array( "id" => "seoauthor_title_format"),
		array( "id" => "seocat_title_format"),
		array( "id" => "seoarchive_title_format"),
		array( "id" => "seotag_title_format"),
		array( "id" => "seosearch_title_format"),
		array( "id" => "seo404_title_format")
);
 
$mmb_options = array (
		array( "id" => "membershippagelogourl"),
		array( "id" => "membershippagebgcolor"),
		array( "id" => "membershipheader"),
		array( "id" => "membershipheaderbg"),
		array( "id" => "membershipheaderheight"),
		array( "id" => "membershiplogo"),
		array( "id" => "membershipnavbaralignment"),
		array( "id" => "membershipnavbartextcolor"),
		array( "id" => "membershipnavbartextshadow"),
		array( "id" => "membershipnavbartexthovercolor"),
		array( "id" => "membershipnavbartexthovercolorshadow"),
		array( "id" => "membershipnavbarsubtextcolor"),
		array( "id" => "membershipnavbarsubtextshadow"),
		array( "id" => "membershipnavbarmainbggradienttopcolor"),
		array( "id" => "membershipnavbarmainbggradientbotcolor"),
		array( "id" => "membershipnavbarsubbggradienttopcolor"),
		array( "id" => "membershipnavbarsubbggradientbotcolor"),
		array( "id" => "membershipnavbarmainbggradienthovertopcolor"),
		array( "id" => "membershipnavbarmainbggradienthoverbotcolor"),
		array( "id" => "membershipnavbarbottomlinecolor"),
		array( "id" => "membershipnavbarfontsize"),
		array( "id" => "membershipnavbarbottomlinethickness"),
		array( "id" => "membershipdashwelcomebar"),
		array( "id" => "membershipsidebartitle"),
		array( "id" => "membershiploginpagetext"),
		array( "id" => "membershipnavbartext1"),
		array( "id" => "membershipnavbarlink1"),
		array( "id" => "showcommentstatsonmodulepages")
);

$get_options = (get_option($shortname.'_mmb_settings')!="") ? get_option($shortname.'_mmb_settings') : get_option($shortname.'_general_settings');
foreach ($mmb_options as $value) {
//	if ($get_options[ $value['id'] ] == false) { $$value['id'] = $value['std'];
//	} else { $$value['id'] = $get_options[ $value['id'] ]; }
    if (isset($value['id']) && $get_options[ $value['id'] ] == FALSE && isset($value['std'])) {
            $$value['id'] = $value['std'];
	}
    elseif (isset($value['id'])) { $$value['id'] = $get_options[ $value['id'] ]; }
}

$blg_options= array (
		array( "id" => "blogheader"),
		array( "id" => "blogheaderheight"),
		array( "id" => "bloglogo"),
		array( "id" => "blogheaderhyperlink"),
		array( "id" => "blogbgcolor"),
		array( "id" => "blogbgimageurl"),
		array( "id" => "blogbgimgtiling"),
		array( "id" => "bloghyperlinkcolor"),
		array( "id" => "blognavbartextcolor"),
		array( "id" => "blognavbartextshadow"),
		array( "id" => "blognavbartexthovercolor"),
		array( "id" => "blognavbartexthovercolorshadow"),
		array( "id" => "blognavbarsubtextcolor"),
		array( "id" => "blognavbarsubtextshadow"),
		array( "id" => "blognavbarmainbggradienttopcolor"),
		array( "id" => "blognavbarmainbggradientbotcolor"),
		array( "id" => "blognavbarsubbggradienttopcolor"),
		array( "id" => "blognavbarsubbggradientbotcolor"),
		array( "id" => "blognavbarmainbggradienthovertopcolor"),
		array( "id" => "blognavbarmainbggradienthoverbotcolor"),
		array( "id" => "blognavbarbottomlinecolor"),
		array( "id" => "blognavbarfontsize"),
		array( "id" => "blognavbarbottomlinethickness"),
		array( "id" => "blogfbcomments"),
		array( "id" => "blogpagefbcomments"),
		array( "id" => "blogpagedeactivatecomments"),
		array( "id" => "blogfbappid"),
		array( "id" => "blogactivateheadertext"),
		array( "id" => "blogheadertextfont"),
		array( "id" => "blogheadertext"),
		array( "id" => "blogheadertextsize"),
		array( "id" => "blogheadertextcolor"),
		array( "id" => "blogheadertextshadowcolor"),
		array( "id" => "blogdisablecommentstats"),
		array( "id" => "blogdeactivatecomments"),
		array( "id" => "bloghidesocialmediaicons"),
		array( "id" => "bloghidepostthumb"),
		array( "id" => "bloghidepostthumbsetpages")
);

$get_options = (get_option($shortname.'_blg_settings')!="") ? get_option($shortname.'_blg_settings') : get_option($shortname.'_general_settings');
foreach ($blg_options as $value) {
//	if ($get_options[ $value['id'] ] == false) { $$value['id'] = $value['std'];
//	} else { $$value['id'] = $get_options[ $value['id'] ]; }
    if (isset($value['id']) && $get_options[ $value['id'] ] == FALSE && isset($value['std'])) {
            $$value['id'] = $value['std'];
	}
    elseif (isset($value['id'])) { $$value['id'] = $get_options[ $value['id'] ]; }
}

$sln_options= array (
		array( "id" => "salesletternavbaralignment"),
		array( "id" => "salesletternavbartextcolor"),
		array( "id" => "salesletternavbartextshadow"),
		array( "id" => "salesletternavbartexthovercolor"),
		array( "id" => "salesletternavbartexthovercolorshadow"),
		array( "id" => "salesletternavbarsubtextcolor"),
		array( "id" => "salesletternavbarsubtextshadow"),
		array( "id" => "salesletternavbarmainbggradienttopcolor"),
		array( "id" => "salesletternavbarmainbggradientbotcolor"),
		array( "id" => "salesletternavbarsubbggradienttopcolor"),
		array( "id" => "salesletternavbarsubbggradientbotcolor"),
		array( "id" => "salesletternavbarmainbggradienthovertopcolor"),
		array( "id" => "salesletternavbarmainbggradienthoverbotcolor"),
		array( "id" => "salesletternavbarbottomlinecolor"),
		array( "id" => "salesletternavbarfontsize"),
		array( "id" => "salesletternavbarbottomlinethickness"),
		array( "id" => "salesletterpagenavbarheight"),
		array( "id" => "salesletterpagenavbarfontw8")
);

$get_options = (get_option($shortname.'_sln_settings')!="") ? get_option($shortname.'_sln_settings') : get_option($shortname.'_general_settings');
foreach ($sln_options as $value) {
//	if ($get_options[ $value['id'] ] == false) { $$value['id'] = $value['std'];
//	} else { $$value['id'] = $get_options[ $value['id'] ]; }
    if (isset($value['id']) && $get_options[ $value['id'] ] == FALSE && isset($value['std'])) {
            $$value['id'] = $value['std'];
	}
    elseif (isset($value['id'])) { $$value['id'] = $get_options[ $value['id'] ]; }
}

$spn_options= array (
		array( "id" => "squeezepagenavbaralignment"),
		array( "id" => "squeezepagenavbartextcolor"),
		array( "id" => "squeezepagenavbartextshadow"),
		array( "id" => "squeezepagenavbartexthovercolor"),
		array( "id" => "squeezepagenavbartexthovercolorshadow"),
		array( "id" => "squeezepagenavbarsubtextcolor"),
		array( "id" => "squeezepagenavbarsubtextshadow"),
		array( "id" => "squeezepagenavbarmainbggradienttopcolor"),
		array( "id" => "squeezepagenavbarmainbggradientbotcolor"),
		array( "id" => "squeezepagenavbarsubbggradienttopcolor"),
		array( "id" => "squeezepagenavbarsubbggradientbotcolor"),
		array( "id" => "squeezepagenavbarmainbggradienthovertopcolor"),
		array( "id" => "squeezepagenavbarmainbggradienthoverbotcolor"),
		array( "id" => "squeezepagenavbarbottomlinecolor"),
		array( "id" => "squeezepagenavbarfontsize"),
		array( "id" => "squeezepagenavbarbottomlinethickness"),
		array( "id" => "squeezepagenavbarheight"),
		array( "id" => "squeezepagenavbarfontw8")
);

$get_options = (get_option($shortname.'_spn_settings')!="") ? get_option($shortname.'_spn_settings') : get_option($shortname.'_general_settings');
foreach ($spn_options as $value) {
//	if ($get_options[ $value['id'] ] == false) { $$value['id'] = $value['std'];
//	} else { $$value['id'] = $get_options[ $value['id'] ]; }
    if (isset($value['id']) && $get_options[ $value['id'] ] == FALSE && isset($value['std'])) {
            $$value['id'] = $value['std'];
	}
    elseif (isset($value['id'])) { $$value['id'] = $get_options[ $value['id'] ]; }
}

?>