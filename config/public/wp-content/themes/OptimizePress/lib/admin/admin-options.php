<?php
$themename = "OptimizePress";
$shortname = "OptimizePress";
$page_handle = $shortname . '-options';

/* Get Categories */
$optpress_categories_obj = get_categories('hide_empty=0');
$optpress_categories = array();
$optpress_categories[] = '';
foreach ($optpress_categories_obj as $optpress_cat) {
	$optpress_categories[$optpress_cat->cat_ID] = $optpress_cat->cat_name;
}

/* Get Pages into a drop-down list */
$align_list = array('center'=>'Center', 'left'=>'Left');

/* Get Pages into a drop-down list */
$pages_list = get_pages();
$getpagnav = array();
foreach($pages_list as $apage) {
	$getpagnav[$apage->ID] = $apage->post_title;
}

/* Get Stylesheets into a drop-down list */
$styles = array();
if(is_dir(TEMPLATEPATH . "/styles/")) {
	if($open_dirs = opendir(TEMPLATEPATH . "/styles/")) {
		while(($style = readdir($open_dirs)) !== false) {
			if(stristr($style, ".css") !== false) {
				$styles[] = $style;
			}
		}
	}
}
$style_dropdown = $styles;

/* Get Launch Styles into a drop-down list */
$launch_styles = array("4" => "Clean Style", "5" => "Bold Style", "8" => "Bright Style", );

/* The Options*/
$options = array (
		
		array(	"type" => "openfieldset"),
		
		array(	"name" => "Activate Header Sitewide",
			"desc" => "Activate the header on all new pages. Note that this will not affect existing pages you have already published in Wordpress",
			"id" => "activate_header_sitewide",
			"value" => "true",
			"default" => "checked",
			"type" => "checkbox"),
			
		array(	"name" => "Header Upload",
			"desc" => "Enter the full URL of your header image (starting with http://), or upload an image from your computer by clicking the 'Upload Image' button.  Ensure your image is in PNG, JPG or GIF format (header width should be 977px)",
			"id" => "header_img_images",
			"type" => "upload"),
			
		array(	"name" => "Header Full Width Background",
			"desc" => "Enter the full URL of your header background image (starting with http://), or upload an image from your computer by clicking the 'Upload Image' button. The header background image should be a vertical slice from your header which will be tiled horizontally across your header when you use the full width templates.",
			"id" => "header_fullwidth",
			"type" => "upload"),
			
		array(	"name" => "Header height",
			"desc" => "Enter the height of your header. Please only use numbers, do not add (px) on the end",
			"id" => "header_height",
			"std" => "150",
			"type" => "text"),

			
		array(	"name" => "Logo Upload",
			"desc" => "Enter the full URL of your logo image (starting with http://), or upload an image from your computer by clicking the 'Upload Image' button. If you are overlaying your logo onto a header, ensure your logo is in transparent PNG format",
			"id" => "custom_logo_upload_images",
			"videolink"		=> "http://www.optimizepress.com/members",
			"type" => "upload"),
			
		array(	"name" => "Logo Alignment",
			"desc" => "Choose the alignment of your logo on the headers of your pages",
			"id" => "logo_align",
			"help"			=> "This is a sample help text for Enable Cookie Checking/Gateway",
			"videotxt"		=> "click here to view full tutorial",
			"videolink"		=> "http://www.optimizepress.com/members",
			"type" => "select_align",
			"options" => $align_list),

		array(	"name" => "Hyperlink Color",
			"desc" => "Select a color from the color picker or enter the hex code here for the default hyperlink color you want to set for your site.  <strong>Note:</strong> will only affect new pages you create, will not change existing published pages",
			"id" => "hyperlink_color",
			"default" => "0088CC",
			"type" => "color",
			"std" => "",
			"size" => "70"),
			
				array(	"type" => "closefieldset"),
			
			array(	"type" => "openfieldset"),
			
					array(	"name" => "Facebook APP ID",
			"desc" => "To use Facebook comments system, you will need a Facebook APP ID. <a href='http://developers.facebook.com/setup/' target='_blank'>Click here to your Facebook APP ID</a>",
			"id" => "facebookappid",
			"type" => "text",
			"std" => "",
			"size" => "70"),
				
				
				array(	"type" => "closefieldset"),
			
	
			
			array(	"type" => "openfieldset"),
			
		array(	"name" => "Copyright Footer Text",
			"desc" => "Enter the copyright text that you would like to display in the footer. <strong>Note:</strong> Our templates already have the 'Copyright ©' text included, so just enter any text you want to show after this and the copyright year if you wish to include it.",
			"id" => "footer_text",
			"type" => "text",
			"std" => "",
			"size" => "70"),
			
		array(	"name" => "OptimizePress Footer Affiliate Link",
			"desc" => "Earn commissions for OptimizePress by entering your OptimizePress affiliate link here, which will be attached to the 'Powered By OptimizePress' footer text. You can find your affiliate link in the members area, or <a href='http://www.joltaffiliates.com' target='_blank'>signup here</a> ",
			"id" => "footer_afflink",
			"type" => "text",
			"std" => "http://www.optimizepress.com",
			"default" => "checked",
			"size" => "70"),

		array(	"name" => "",
			"desc" => "Display powered by text",
			"id" => "footer_poweredby",
			"value" => "true",
			"default" => "checked",
			"help"			=> "Tick this option to display the 'Powered by OptimizePress' text in the footer which is linked to your affiliate link",
			"type" => "checkbox"),
					
		array(	"type" => "title_h2"),

		array(  "name" => "Include Footer Page Links",
			"desc" => "Choose the pages you want to include in the footer.",
			"help"			=> "Tick the pages you want to include in the footer of your OptimizePress site. Note that you will also need to<br> ensure the 'Display Footer Links' option is activated on your individual pages to show the footer links (recommended)",
			"id" => "footer_include",
			"std" => "",
			"type" => "exclude_include_checkbox",
			"options" => $getpagnav),
	
		array(	"type" => "close"),
	
		array(	"name" => "",
			"desc" => "Open Footer Links In New window",
			"id" => "footerlinkstarget",
			"help"			=> "Tick this box if you want all your footer links to open in a new window",
			"value" => "true",
			"default" => "checked",
			"type" => "checkbox"),
		
		array(	"name" => "Footer Disclaimer Message",
			"desc" => "If you want to include a footer disclaimer message on your pages, enter it in this box.<br><br> <strong>Note:</strong> You can disable the footer disclaimer from showing on specific pages by using the 'Disable Disclaimer Message' option on the individual page custom options",
			"id" => "footerdisclaimermsg",
			"type" => "textarea"),
			
		array(	"name" => "",
			"desc" => "Activate Footer Disclaimer Message",
			"help"			=> "Tick this box to activate the above disclaimer message on your pages",
			"id" => "activatefooterdisclaimermsg",
			"value" => "true",
			"type" => "checkbox"),
			
			
			
				array(	"type" => "closefieldset"),
			
			
		

				array(	"type" => "openfieldset"),

		array(	"name" => "Favicon URL",
			"desc" => "Enter the full URL of the favicon you want to use on your site (starting with http://), or upload an image from your computer by clicking the 'Upload Image' button",
			"id" => "favicon_url",
			"type" => "upload"),
			
		
	
		array(	"name" => "Custom Tracking Code (Header)",
			"desc" => "Enter any tracking codes which need to be placed before the &lt;/head&gt; tag here.  Code entered will be added to all pages in your site.<br><br>Enter your full <span style='color:#FF7700;'><strong>Google Analytics</strong></span> tracking code here",
			"id" => "customtrackingcodeheader",
			"type" => "textarea"),
			
		array(	"name" => "Custom Tracking Codes (Footer)",
			"desc" => "Enter any tracking codes which need to be placed before the &lt;/body&gt; tag here.  Code entered will be added to all pages in your site. ",
			"id" => "customtrackingcodefooter",
			"type" => "textarea"),
			
	
		
		array(	"name" => "Custom CSS",
			"desc" => "Add any css code you want to add to ALL pages here.  ",
			"id" => "customcss",
			"type" => "textarea"),

		array(	"type" => "closefieldset"),
		
		array(	"type" => "submit")
		
);

?>