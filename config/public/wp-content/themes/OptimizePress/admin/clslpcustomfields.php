<?php
    if ( !class_exists('myLpCustomFields') ) {

    $myupload = new CI_Up_Mark();

	class myLpCustomFields {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = '_launchpage_';
		var $i = 1; // Fix the "attachment" thing with main wp content field
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/


		var $customFields =	array(
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "<span style='font-size:15px;font-style:normal;line-height:19px;'>The options in this control panel are for use with any of the <strong>Sales Pages and Launch Page Templates.</strong> For an overview of how to setup these pages, <a href='http://www.optimizepress.com/members/#location4' target='_blank'>click here</a></span>",
				"type"			=> "note",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "Overall Page Settings",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "mainbodytextfont",
				"title"			=> "Main Body Text Font",
				"description"	=> "Main Body Text Font",
				"help"			=> "Select the main font for the body copy of your page",
				"type"			=> "mainbodytextfont",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "launchbgcolor",
				"title"			=> "Background Color",
				"description"	=> "Background Color",
				"help"			=> "Select the color for the background of your page",
				"type"			=> "text",
				"class"			=> "color",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "launchbgimgurl",
				"title"			=> "Background Image URL",
				"description"	=> "Background Image URL",
				"help"			=> "If you want to use an image for your page background, enter the URL for the image here",
				"type"			=> "text",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "launchbgimgtiling",
				"title"			=> "Background Image Tiling",
				"description"	=> "Background Image Tiling",
				"help"			=> "If you're using an image for your background, select the tiling here",
				"type"			=> "bgtilinglist",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pagehyperlinkcolor",
				"title"			=> "Page Hyperlink Color",
				"description"	=> "Page Hyperlink Color",
				"help"			=> "Select the hyperlink color for your page here (the color of your links)",
				"type"			=> "text",
				"class"			=> "hyperlink_color",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "subheadcufonfont",
				"title"			=> "Page Headline Cufon Font",
				"description"	=> "Page Headline Cufon Font",
				"help"			=> "If you use the Cufon headline shortcode, you can select the font to be used here",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),	
			array(
				"name"			=> "fbshareimg",
				"title"			=> "Facebook Share Image",
				"help"			=> "Upload an image to set as the 'share' image when this page is shared on Facebook using a Facebook Share widget or similar.",
				"description"	=> "",
				"type"			=> "upload",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),	
			array(
				"name"			=> "fbdesc",
				"title"			=> "Facebook Description",
				"help"			=> "Enter a description that you want to show when your page is shared on Facebook",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),	
			array(
				"name"			=> "page2share",
				"title"			=> "Page to Share",
				"help"			=> "Select the page you want to share when the social links are clicked on your page. This option<BR> applies to our social sharing options, and the Facebook comments/like buttons.  It will not affect<BR> any shortcode sharing icons used on the page. This will also duplicate comments <BR>from the chosen page onto this page",
				"description"	=> "",
				"type"			=> "page2sharelist",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "customshareurl",
				"title"			=> "Custom Share URL",
				"help"			=> "If you want to share the URL of a different page when people click the share/like buttons on your page,<BR>enter the URL here. You can also use this option to make the Facebook like button above the comments like your Facebook Page.",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),	
			
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),


            array(
				"name"			=> "",
				"title"			=> "Navigation Settings",
				"description"	=> "Show a navigation bar on your sales letter / launch pages.  <strong>Note:</strong> This is not for use with the launch funnel settings, you should use the launch/gateway settings for the launch navbar.  To customize the look of the navbar, use the <a href='admin.php?page=OptimizePress-salesconfigs'>sales letter navbar settings</a><br><br><strong>Note:</strong> We do not recommend using the 'Below Header' Navbar position option for Sales Style 3,4 or 5 templates",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "shownavbar",
				"title"			=> "Activate Navigation Bar",
				"description"	=> "Activate the main navigation for your sales page",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle",
				"childdivclass"	=> "activenavbar",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "navbarposition",
				"title"			=> "Sales Page Navbar Position",
				"type"			=> "navbarposition",
				"width"			=> "150px",
				"class"			=> "twotdstyle activenavbar",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),


            array(
				"name"			=> "",
				"title"			=> "Launch/Gateway Settings",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "disablecookiecheck",
				"title"			=> "Activate Gateway/Navbar",
				"description"	=> "",
				"type"			=> "checkbox",
				"help"			=> "If you are setting up a launch page, you need to activate the gateway and navbars here",
				"videotxt"		=> "click here to view full tutorial",
				"videolink"		=> "http://www.optimizepress.com/members",
				"childdivclass"	=> "activenav",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "showheaderlinks",
				"title"			=> "Show Launch Navbar",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activenav",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showsidebarlinksthumbnails",
				"title"			=> "Show Launch Thumbnails",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activenav",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "headernavstyle",
				"title"			=> "Launch Navbar Style",
				"description"	=> "",
				"type"			=> "headernavstyle",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),		
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),



            array(
				"title"			=> "Header & Logo Options",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "starttabs",
				"scope"			=>	array( "page" ),
				"style"			=> "tabbed",
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchshowheaderopt",
				"description"	=> "Header/Logo Settings",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchcustomheaderimg",
				"description"	=> "Custom Header Image",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchcustomheadertxt",
				"description"	=> "Custom Header Text",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabs",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "starttabcontainer",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchshowheaderopt",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showheader",
				"title"			=> "Show Header",
				"description"	=> "(required if using logo)",
				"type"			=> "headercheckbox",
				"childdivclass"	=> "activeheader",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showlogo",
				"title"			=> "Show Logo",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "pagelogo",
				"class"			=> "twotdstyle activeheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showheaderhyperlink",
				"title"			=> "Activate Header Hyperlink",
				"description"	=> "",
				"type"			=> "headercheckbox",
				"childdivclass"	=> "showheaderhyperlink",
				"class"			=> "twotdstyle activeheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "headerhyperlink",
				"title"			=> "Header Hyperlink URL",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle showheaderhyperlink",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			
			array(
				"title"			=> "launchcustomheaderimg",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pageheader_height",
				"title"			=> "Custom Header Image Height",
				"description"	=> "",
				"type"			=> "text",
				"separator"		=> "separator",
				"class"			=> "twotdstyle activeheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pageheaderurl",
				"title"			=> "Custom Header Image URL",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activeheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pageheaderurlfullwidth",
				"title"			=> "Custom Header Image URL (background/full width)",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activeheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),		
			array(
				"name"			=> "pagelogo",
				"title"			=> "Custom Logo URL",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activeheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pagelogo_align",
				"title"			=> "Custom Logo Alignment",
				"description"	=> "",
				"type"			=> "align_list",
				"class"			=> "twotdstyle activeheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"title"			=> "launchcustomheadertxt",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activateheadertext",
				"title"			=> "Activate Header Text",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activeheadertext",
				"class"			=> "twotdstyle activeheader",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "If you are not using your own header image, you can upload a blank color header (see inside the graphics pack) and set the text to overlay on your header below",
				"type"			=> "caption",
				"class"			=> "activeheadertext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			
            array(
				"name"			=> "headertext",
				"title"			=> "Header Text",
				"description"	=> "Header Text",
				"type"			=> "text",
				"class"			=> "twotdstyle activeheadertext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headertextfont",
				"title"			=> "Header Text Font",
				"description"	=> "Header Text Font",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"class"			=> "twotdstyle activeheadertext",
				"scope"			=>	array( "page" ),
				"default_value"	=> "Vegur",
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "headertextsize",
				"title"			=> "Header Text Size (px)",
				"description"	=> "Header Text Size (px)",
				"type"			=> "text",
				"class"			=> "twotdstyle activeheadertext",
				"scope"			=>	array( "page" ),
				"style_width"	=> "85px",
				"default_value"	=> "48",
				"capability"	=> "edit_pages"
			),			
			array(
				"name"			=> "headertextcolor",
				"title"			=> "Header Text Color",
				"description"	=> "Header Text Color",
				"type"			=> "text",
				"class"			=> "color activeheadertext",
				"default_value"	=> "FFFFFF",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "headertextshadowcolor",
				"title"			=> "Header Text Shadow Color",
				"description"	=> "Header Text Shadow Color",
				"type"			=> "text",
				"class"			=> "color activeheadertext",
				"default_value"	=> "333333",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			
			array(
				"type"			=> "endtabcontainer",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "",
				"title"			=> "Sidebar Settings",
				"description"	=> "Select a sidebar to show in the sidebar.  <strong>Note:</strong> this sidebar will only show on sidebar enabled sales page templates. You can add content to this sidebar on the widgets page",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "sidebarwidgettoshow",
				"title"			=> "Select Sidebar To Show ",
				"description"	=> "",
				"type"			=> "sidebarwidgetlist",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),




            array(
				"name"			=> "",
				"title"			=> "Footer Settings",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showfooterlinks",
				"title"			=> "Show Footer Nav Bar",
				"description"	=> "",
				"type"			=> "checkbox",
				"default_value"	=>	1,
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "footertextcolor",
				"title"			=> "Footer Text Color",
				"description"	=> "",
				"type"			=> "text",
				"help"			=> "Select the color for your footer links/text here",
				"class"			=> "color",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),



			array(
				"title"			=> "Headline Options",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
			array(
				"type"			=> "starttabs",
				"scope"			=>	array( "page" ),
				"style"			=> "tabbed",
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchpreheadline",
				"description"	=> "Pre-Headline",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchheadline",
				"description"	=> "Headline",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchsubheadline",
				"description"	=> "Subheadline",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchheadlinebelowvideo",
				"description"	=> "Headline Below Video",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabs",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "starttabcontainer",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			
			array(
				"title"			=> "launchpreheadline",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
		    array(
				"name"			=> "activatepreheadline",
				"title"			=> "Show Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activatepreheadline",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadline",
				"title"			=> "Pre-Headline",
				"type"			=> "textarea",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinemaincolor",
				"title"			=> "Main color",
				"description"	=> "Main color",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "color activatepreheadline",
				"default_value"	=> "444444",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "alternativepreheadlinecolor",
				"title"			=> "Alternative color",
				"description"	=> "Alternative color",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "color activatepreheadline",
				"default_value"	=> "cc0000",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinefont",
				"title"			=> "Select Font",
				"description"	=> "Select Font",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "preheadlinefontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinefontweight",
				"title"			=> "Font Weight",
				"description"	=> "",
				"type"			=> "fontweight",
				"default_value" => "bold",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinefontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlineletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"title"			=> "launchheadline",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
		    array(
				"name"			=> "activateh1abovevideotext",
				"title"			=> "Show Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activateh1abovevideotext",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlineabovevideotext",
				"title"			=> "Headline Text",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activateh1abovevideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlineabovevideofont",
				"title"			=> "Headline Font",
				"description"	=> "",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"class"			=> "twotdstyle activateh1abovevideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlineabovevideofontcolor",
				"title"			=> "Headline Color",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "color activateh1abovevideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinefontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1abovevideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinefontweight",
				"title"			=> "Font Weight",
				"description"	=> "",
				"type"			=> "fontweight",
				"default_value" => "bold",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1abovevideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinefontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1abovevideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlineletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1abovevideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"title"			=> "launchsubheadline",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
		    array(
				"name"			=> "activatesubheadline",
				"title"			=> "Show Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activatesubheadline",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadline",
				"title"			=> "Sub-Headline",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activatesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinemaincolor",
				"title"			=> "Main color",
				"description"	=> "Main color",
				"type"			=> "text",
				"class"			=> "color activatesubheadline",
				"default_value"	=> "444444",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "alternativesubheadlinecolor",
				"title"			=> "Alternative color",
				"description"	=> "Alternative color",
				"type"			=> "text",
				"class"			=> "color activatesubheadline",
				"default_value"	=> "cc0000",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinefont",
				"title"			=> "Select Font",
				"description"	=> "Select Font",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"class"			=> "twotdstyle activatesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinefontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinefontweight",
				"title"			=> "Font Weight",
				"description"	=> "",
				"type"			=> "fontweight",
				"default_value" => "bold",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinefontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlineletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activatesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"title"			=> "launchheadlinebelowvideo",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
      	    array(
				"name"			=> "activateh1belowvideotext",
				"title"			=> "Show Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activateh1belowvideotext",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "headlinebelowvideotext",
				"title"			=> "Headline Text",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activateh1belowvideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofont",
				"title"			=> "Headline Font",
				"description"	=> "",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"class"			=> "twotdstyle activateh1belowvideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofontcolor",
				"title"			=> "Headline Color",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "color activateh1belowvideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1belowvideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofontweight",
				"title"			=> "Font Weight",
				"description"	=> "",
				"type"			=> "fontweight",
				"default_value" => "bold",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1belowvideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1belowvideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideoletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activateh1belowvideotext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),


            array(
				"name"			=> "",
				"title"			=> "Alert Bar",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activatealertbar",
				"title"			=> "Show Alert Bar Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activatealertbar",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "alertbartext",
				"title"			=> "Alert Bar Text",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activatealertbar",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "alertbarcolor",
				"title"			=> "Alert Bar Color",
				"description"	=> "",
				"type"			=> "alertbarcolor",
				"class"			=> "twotdstyle activatealertbar",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),



            array(
				"name"			=> "",
				"title"			=> "Content Block Above Video",
				"description"	=> "This content block is a place for you to add content above your video on your page.  You can use HTML in this field to style your text/content.",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatecontentblock",
				"title"			=> "Active Content Block",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activecontentblock",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "contentblockabovevideo",
				"title"			=> "Content Block Above Video",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "activecontentblock",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),




            array(
				"name"			=> "",
				"title"			=> "Video Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatevideo",
				"title"			=> "Activate Video",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activevideo",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "hostedvideourl",
				"title"			=> "Hosted Video URL",
				"description"	=> "Enter the URL of your video here hosted on Amazon S3 (recommended) or your own server. Supports MP4 (recommended), M4V, MOV and FLV Formats",
				"type"			=> "text",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "mobilevideourl",
				"title"			=> "iPad/iPhone Compatible Video Url",
				"description"	=> "Enter the URL of your mobile friendly video (m4v, mov) file. Please see user guide for more info on encoding your video.",
				"type"			=> "text",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "videoimage1",
				"title"			=> "Video Preview/Still Image",
				"description"	=> "Specify the URL of the image which will be placed when the video is stopped",
				"type"			=> "text",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "videourl",
				"title"			=> "Video Embed (Youtube/Vimeo/Viddler)",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "externalvideo",
				"title"			=> "External Player Code (Easy Video Player / EZS3)",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "videowidth",
				"title"			=> "Video Width",
				"description"	=> "If you are adding a video, enter the width in pixels (px) you want to use.  ",
				"type"			=> "text",
				"class"			=> "activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "videoheight",
				"title"			=> "Video Height",
				"description"	=> "If you are adding a video, enter the height in pixels (px) you want to use.",
				"type"			=> "text",
				"class"			=> "activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showshadowborder",
				"title"			=> "Show Video Shadow Border",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "autoplay",
				"title"			=> "Autoplay Video",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"default_value"	=>	1,
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showvideocontrolbar",
				"title"			=> "Show Video Player Controlbar",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showvideodownloadlink",
				"title"			=> "Show Video Download Link",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "videodownloadlinktext",
				"title"			=> "Video Download Link Text",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "downloadvideourl",
				"title"			=> "Download Video URL",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "videoplayercolor",
				"title"			=> "Video Player Color",
				"description"	=> "",
				"type"			=> "playercolor",
				"class"			=> "twotdstyle activevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),		
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),




            array(
				"name"			=> "",
				"title"			=> "Social Media Settings",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatesocialmedia",
				"title"			=> "Activate Social Media",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activesocialmedia",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "socialmediacalltoactiontext",
				"title"			=> "Social Media Call To Action Text",
				"description"	=> "",
				"type"			=> "ctatextlist",
				"class"			=> "twotdstyle activesocialmedia",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "twitterurl",
				"title"			=> "Twitter Share Text",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activesocialmedia",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "facebookshare",
				"title"			=> "Facebook Share Icon",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activesocialmedia",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "socialmeduabutton",
				"title"			=> "Social Media Button Select",
				"description"	=> "",
				"type"			=> "socialmediabuttonlist",
				"class"			=> "twotdstyle activesocialmedia",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),



            array(
				"name"			=> "",
				"title"			=> "Comments Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatecomments",
				"title"			=> "Activate Comments",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activecomments",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "disabledatewpcomments",
				"title"			=> "Disable Dates On WP Comments",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showcommentcalltoaction",
				"title"			=> "Show Comments Call To Action Text",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "commentscalltoactiontext",
				"title"			=> "Comments Call To Action Text",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "commentssystem",
				"title"			=> "Comments System",
				"description"	=> "",
				"type"			=> "commentssystem",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "commentsorder",
				"title"			=> "Comments Order",
				"description"	=> "rearrange the order of which comments block comes first on the page",
				"type"			=> "commentsorder",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "fbcommentnum",
				"title"			=> "Facebook Number of Comments Per Page",
				"description"	=> "",
				"type"			=> "fbcommentnum",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
           
            array(
				"name"			=> "wpcommentstitle",
				"title"			=> "Wordpress Comments Title",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "To use Facebook comments system, you will need a facebook API key. <a href='http://developers.facebook.com/setup/' target='_blank'>Click here to your facebook APP ID</a>. You must enter your Facebook APP ID in the OptimizePress general settings <a href='admin.php?page=OptimizePress-options'>here</a>",
				"type"			=> "caption",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),




            array(
				"title"			=> "Opt-in Options",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "starttabs",
				"scope"			=>	array( "page" ),
				"style"			=> "tabbed",
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchoptincustomform",
				"description"	=> "Opt-in Box Options",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "launchoptindualform",
				"description"	=> "Opt-in Dual Form",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabs",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "starttabcontainer",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"title"			=> "launchoptincustomform",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			
            array(
				"name"			=> "activateoptin",
				"title"			=> "Activate Opt In",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activeoptin",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optintitle",
				"title"			=> "Opt-in Headline/Title",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optintextblock",
				"title"			=> "Opt-in Text Block",
				"description"	=> "(Optional) Enter the text that will be placed above your optin box to encourage optins",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "autorespondercode",
				"title"			=> "Autoresponder Code",
				"description"	=> "Insert ALL the HTML code your autoresponder provider gives you here",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinboxname",
				"title"			=> "Opt-in Box Fields",
				"description"	=> "Name",
				"type"			=> "textoptinbox",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),		
            array(
				"name"			=> "optinboxnametext",
				"title"			=> "",
				"description"	=> "Box Text",
				"type"			=> "textoptinbox",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinboxnameshow",
				"title"			=> "",
				"description"	=> "Show Name Field",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinboxemail",
				"title"			=> "",
				"description"	=> "Email",
				"type"			=> "textoptinbox",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinboxemailtext",
				"title"			=> "",
				"description"	=> "Box Text",
				"type"			=> "textoptinbox",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinboxemailshow",
				"title"			=> "",
				"description"	=> "Show Email Field",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),		
			array(
				"name"			=> "showextrawebformfield",
				"title"			=> "Show extra input field options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "extrawebformfield",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "extra1ID",
				"title"			=> "Field 1 Input ID",
				"description"	=> "Field 1 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra1value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra2ID",
				"title"			=> "Field 2 Input ID",
				"description"	=> "Field 2 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra2value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra3ID",
				"title"			=> "Field 3 Input ID",
				"description"	=> "Field 3 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra3value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra4ID",
				"title"			=> "Field 4 Input ID",
				"description"	=> "Field 4 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra4value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra5ID",
				"title"			=> "Field 5 Input ID",
				"description"	=> "Field 5 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra5value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extrawebformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "optinformurl",
				"title"			=> "Opt-in Form URL",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "webformhiddenhtml",
				"title"			=> "",
				"description"	=> "Hidden Fields",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinbutton",
				"title"			=> "Opt-in Button<br><a href=../wp-content/themes/OptimizePress/lib/admin/media-upload-sq_button.php?fld=_launchpage_optinbutton&TB_iframe=1&height=350&width=640& class='thickbox'>Select Image OR Upload New</a> ",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activeoptin",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activatespamnotice",
				"title"			=> "Spam Notice Text Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activelpspamnotice",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "spamnoticetext",
				"title"			=> "Spam Notice Text",
				"description"	=> "Enter your preferred spam notice - use this to reassure the safety of your visitors details (highly recommended you include this)",
				"type"			=> "text",
				"class"			=> "activelpspamnotice",
				"noborderbottom"=> "noborderbottom",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),


			array(
				"title"			=> "launchoptindualform",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activedoubleoptin",
				"title"			=> "Activate Double Opt-in Box",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"type"			=> "endtabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),


			array(
				"type"			=> "endtabcontainer",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "",
				"title"			=> "Call To Action / Delayed Button",
				"description"	=> "Use this option to activate a call to action button on your sales/launch page.  This button can be shown at the start and/or end of your content.  You can also add a delay for your button so that it only shows after a set interval",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatecalltoaction",
				"title"			=> "Activate Call To Action",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activecalltoaction",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "calltoactionbutton",
				"title"			=> "Call To Action Button",
				"description"	=> "",
				"type"			=> "ctabuttonlist",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "calltoactionbuttonstyle",
				"title"			=> "Button Styling",
				"description"	=> "",
				"type"			=> "ctastyle",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatedelaybutton",
				"title"			=> "Activate Delayed Button",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "calltoactionbuttontimedelay",
				"title"			=> "Button Time Delay",
				"help"			=> "Enter the delay time for the button in seconds. Enter ONLY the number, do not enter 'seconds' or anything else in the box",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "calltoactionurl",
				"title"			=> "Call To Action URL",
				"help"			=> "Enter the URL/Web Address for your checkout or call to action link here.  This link will normally come from Paypal or your shopping cart system",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showctabuttonundervideo",
				"title"			=> "Show Button Under Video",
				"help"			=> "Tick this box to show the call to action button at the top of your page under your video. This button will go above your main page content",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showctabuttonaftercontent",
				"title"			=> "Show Button After Content",
				"help"			=> "Tick this box to show the call to action button at the end of your main page content",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "ctalinkstarget",
				"title"			=> "Open Link In New window",
				"help"			=> "Tick this box to open the button link in a new browser window",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activecalltoaction",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),





            array(
				"name"			=> "",
				"title"			=> "Delayed Content Box",
				"description"	=> "Use this option to activate a delayed content box on your sales/launch page.  This box can be shown at the start and/or end of your content.  You can set the box content to be delayed after a set interval",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatedelaycontentbox",
				"title"			=> "Activate Delayed Content Box",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activedelaycontentbox",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "delaycontentboxtimedelay",
				"title"			=> "Content Box Time Delay",
				"description"	=> "",
				"help"			=> "Enter the delay time for the box in seconds. Enter ONLY the number, do not enter 'seconds' or anything else in the box",
				"type"			=> "text",
				"class"			=> "twotdstyle activedelaycontentbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "delaycontentboxtext",
				"title"			=> "Delayed Content Box HTML/Text",
				"description"	=> "Enter the content for your delayed box here. <strong>Note:</strong> Use only text or HTML here, this box will not accept shortcodes or other code",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activedelaycontentbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showcontentboxtextundervideo",
				"title"			=> "Show Box Under Video",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activedelaycontentbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showcontentboxtextaftercontent",
				"title"			=> "Show Box After Content",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activedelaycontentbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),




            array(
				"name"			=> "",
				"title"			=> "Disclaimer",
				"description"	=> "Use this option to disable the disclaimer on this page if you have set one in your OptimizePress General Settings. To change this text, <a href='admin.php?page=OptimizePress-options#generalsettings'>click here</a>",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "disabledisclaimermsg",
				"title"			=> "Disable Disclaimer Message",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "title",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			)
		);

		/**
		* PHP 4 Compatible Constructor
		*/
		function myLpCustomFields() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createLpCustomFields' ) );
            add_action( 'admin_menu', array( &$this, 'createLpCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveLpCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultLpCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultLpCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				remove_meta_box( 'postcustom', 'post', $context );
				remove_meta_box( 'postcustom', 'page', $context );
				//Use the line below instead of the line above for WP versions older than 2.9.1
				//remove_meta_box( 'pagecustomdiv', 'page', $context );
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createLpCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-lp-custom-fields', 'Launch Page & Sales Letter Options', array( &$this, 'displayLpCustomFields' ), 'page', 'normal', 'high' );
				//add_meta_box( 'my-lp-custom-fields', 'Launch Page, Sales Letter', array( &$this, 'displayLpCustomFields' ), 'post', 'normal', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayLpCustomFields() {
			global $post;
            $templatedir = get_bloginfo('template_directory');
			?>
			<div class="form-wrap">
			<script type="text/javascript" src="<?php echo $templatedir; ?>/admin/scripts/easyTooltip.js"></script>
            <link rel="stylesheet" href="<?php echo $templatedir; ?>/admin/scripts/css/facebox.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $templatedir; ?>/admin/scripts/css/stylepanel.css" type="text/css" />
            <script src="<?php echo $templatedir; ?>/admin/scripts/facebox.js" type="text/javascript"></script>
			<script src="<?php echo $templatedir; ?>/lib/admin/js/ajaxupload.js" type="text/javascript"></script>
            <script src="<?php echo $templatedir; ?>/lib/admin/js/adminupload.js" type="text/javascript"></script>
            <script type="text/javascript">
			function str_replace (search, replace, subject, count) {
			var i = 0, j = 0, temp = '', repl = '', sl = 0, fl = 0,
						f = [].concat(search),
						r = [].concat(replace),
						s = subject,
						ra = r instanceof Array, sa = s instanceof Array;
				s = [].concat(s);
				if (count) {
					this.window[count] = 0;
				}
			 
				for (i=0, sl=s.length; i < sl; i++) {
					if (s[i] === '') {
						continue;
					}
					for (j=0, fl=f.length; j < fl; j++) {
						temp = s[i]+'';
						repl = ra ? (r[j] !== undefined ? r[j] : '') : r[0];
						s[i] = (temp).split(f[j]).join(repl);
						if (count && s[i] !== temp) {
							this.window[count] += (temp.length-s[i].length)/f[j].length;}
					}
				}
				return sa ? s : s[0];
			}	
			</script>
            	<style>
				.form-wrap fieldset { border:1px solid #E1E1E1;margin:0 12px 20px;padding:10px 20px 0 5px;width:350px; }
				.form-wrap legend { background-color:#F1F1F1;border:1px solid #E1E1E1;font-size:110%;font-weight:bold;margin-left:20px;padding:4px 8px;text-align:center;width:260px; }
				.form-wrap fieldset label { padding-top:7px; }
				.form-wrap fieldset div.separator { 
					border-top:none;
					clear:both;
					margin-bottom:10px;
					margin-top:0;
					padding-bottom:2px;
					padding-top:0;
					position:relative;
					z-index:999;
				 }
				.form-field input[type=text].color { width:85px; margin-right:5px; } 
				#my-lp-custom-fields .form-wrap div.color { float:none;margin:8px 8px -1px;width:auto;padding-bottom:10px; } 
				.form-wrap div.font { float:right;margin:8px 8px -1px;width:auto;padding-bottom:10px; } 
				.form-table th, .form-wrap label { clear:both; }
				.form-wrap .form-field { margin:8px 8px -1px;padding:0 0 8px; }
				.form-wrap div.separator { border-top:1px dotted #CCCCCC;clear:both;margin-top:0;padding-top:10px;padding-bottom:10px;position:relative;z-index:999;margin-bottom:-1px; }
				.form-wrap div.noborderbottom { margin-bottom:-1px; padding-bottom:10px; }
				.form-wrap div.optinbelow { float:left;margin:8px 0 -1px 8px;width:175px;padding-bottom:10px; } 
				.form-wrap div.formurl { float:left;margin:8px 8px -1px;width:92%;padding-bottom:10px; } 
				.form-field input[type=text].optinbelow { width:112px; margin-right:5px; } 
 				.form-field input[type=text].formurl { width:350px; margin-right:5px; } 
				.form-wrap .optinbelow textarea { width:500px; margin-left:5px; vertical-align:baseline; } 
				.inside .form-wrap .extrawebformfield { padding:0; margin:5px; }
				.inside .form-wrap .extrawebformfield p { color:#333333; font-size:11px; font-style:normal; }
				.inside .form-wrap .extrawebformfield input[type=text] { width:112px; padding:3px; margin:1px 15px 1px 1px; }
				.wp_themeSkin .mceIframeContainer { border:1px solid #DFDFDF; }
				div.op-launch-menu-page-group-header > ins {
					background:#666666 none repeat scroll 0 0;
					border:1px solid transparent;
					color:#CCCCCC;
					display:inline-block;
					font-family:monospace;
					font-size:17px;
					font-weight:bold;
					height:22px;
					line-height:22px;
					margin:-2px 10px 0 0;
					text-align:center;
					text-decoration:none;
					vertical-align:middle;
					width:22px;
				}
				div.op-launch-menu-page-group-header {
					background:#FFFFFF none repeat scroll 0 0;
					border:1px solid #CCCCCC;
					color:#666666;
					cursor:pointer;
					font-family:'Georgia',serif;
					font-size:145%;
					margin:30px 0 0;
					padding:10px;
					position:relative;
					vertical-align:middle;
				}				
				ul.tabs {
					margin: 0 0 0 7px;
					padding: 0;
					float: left;
					list-style: none;
					height: 32px; /*--Set height of tabs--*/
					border-bottom: 1px solid #E1E1E1;
					border-left: 1px solid #E1E1E1;
					width: 100%;
				}
				ul.tabs li {
					float: left;
					margin: 0;
					padding: 0;
					height: 31px; /*--Subtract 1px from the height of the unordered list--*/
					line-height: 31px; /*--Vertically aligns the text within the tab--*/
					border: 1px solid #E1E1E1;
					border-left: none;
					margin-bottom: -1px; /*--Pull the list item down 1px--*/
					overflow: hidden;
					position: relative;
					background: #e0e0e0;
				}
				ul.tabs li a {
					text-decoration: none;
					color: #000;
					display: block;
					font-size: 11px;
					padding: 0 10px;
					border: 1px solid #fff; /*--Gives the bevel look with a 1px white border inside the list item--*/
					outline: none;
				}
				ul.tabs li a:hover {
					background: #ccc;
				}
				html ul.tabs li.active, html ul.tabs li.active a:hover  { /*--Makes sure that the active tab does not listen to the hover properties--*/
					background: #fff;
					border-bottom: 1px solid #fff; /*--Makes the active tab look like it's connected with its content--*/
				}
				.tab_container {
					border: 1px solid #E1E1E1;
					border-top: none;
					overflow: hidden;
					clear: both;
					float: left; width: 100%;
					background: #fff;
					margin:0 0 7px 7px;
				}
				.tab_content {
					padding: 20px 0 20px 7px;
					font-size: 1.2em;
				}
				<?php global $shortname;
				$headersitewidecss = get_option($shortname.'_general_settings'); ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatepreheadline", true ) != "yes" ) { ?>.activatepreheadline { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateh1abovevideotext", true ) != "yes" ) { ?>.activateh1abovevideotext { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatesubheadline", true ) != "yes" ) { ?>.activatesubheadline { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateh1belowvideotext", true ) != "yes" ) { ?>.activateh1belowvideotext { display:none; }<?php } ?>
				<?php if ( $headersitewidecss['activate_header_sitewide'] != "" && !isset ( $_GET['post'] ) ) { ?>
					.activeheader { display:block; }
				<?php } else {
					if ( get_post_meta( $post->ID, $this->prefix . "showheader", true ) != "yes" ) { ?>.activeheader { display:none; }<?php } ?>
				<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "showlogo", true ) != "yes" ) { ?>.pagelogo { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateheadertext", true ) != "yes" ) { ?>.activeheadertext { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatealertbar", true ) != "yes" ) { ?>.activatealertbar { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatecontentblock", true ) != "yes" ) { ?>.activecontentblock { display:none; }<?php } ?>
				<?php /*if ( get_post_meta( $post->ID, $this->prefix . "activatesidebarblock", true ) != "yes" ) { ?>.activesidebarblock { display:none; }<?php }  */ ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatevideo", true ) != "yes" ) { ?>.activevideo { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatesocialmedia", true ) != "yes" ) { ?>.activesocialmedia { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatecomments", true ) != "yes" ) { ?>.activecomments { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateoptin", true ) != "yes" ) { ?>.activeoptin { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "showextrawebformfield", true ) != "yes" ) { ?>.extrawebformfield { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatecalltoaction", true ) != "yes" ) { ?>.activecalltoaction { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatedelaycontentbox", true ) != "yes" ) { ?>.activedelaycontentbox { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "usecomingsoonimage", true ) != "yes" ) { ?>.comingsoonimg { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "disablecookiecheck", true ) != "yes" ) { ?>.activenav { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatespamnotice", true ) != "yes" ) { ?>.activelpspamnotice { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "showheaderhyperlink", true ) != "yes" ) { ?>.showheaderhyperlink { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "shownavbar", true ) != "yes" ) { ?>.activenavbar { display:none; }<?php } ?>
               </style>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/colorpicker/jscolor/jscolor.js"></script>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/admin/optin.js"></script>
                <script type="text/javascript">
                jQuery(document).ready(function() {
					jQuery(".op-launch-menu-page-group-header").click(function(){
						var sign = (jQuery("ins", this).html() == "+") ? "-" : "+";
						jQuery("ins", this).html(sign);
						jQuery(this).next("fieldset").toggle();
					}); 
                    enhanceForm();
					/* update video settings in sales letter options */
					enhanceSalesLetterFields('_launchpage_showheader', 'checkbox');
					enhanceSalesLetterFields('_launchpage_showlogo', 'checkbox');
					enhanceSalesLetterFields('_launchpage_showheaderhyperlink', 'checkbox');
					enhanceSalesLetterFields('_launchpage_headerhyperlink', 'text');

					/* update video settings in sales letter options */
					enhanceSalesLetterFields('_launchpage_activatevideo', 'checkbox');
					enhanceSalesLetterFields('_launchpage_hostedvideourl', 'text');
					enhanceSalesLetterFields('_launchpage_mobilevideourl', 'text');
					enhanceSalesLetterFields('_launchpage_videoimage1', 'text');
					enhanceSalesLetterFields('_launchpage_videourl', 'textarea');
					enhanceSalesLetterFields('_launchpage_externalvideo', 'textarea');
					enhanceSalesLetterFields('_launchpage_videowidth', 'text');
					enhanceSalesLetterFields('_launchpage_videoheight', 'text');
					enhanceSalesLetterFields('_launchpage_showshadowborder', 'checkbox');
					enhanceSalesLetterFields('_launchpage_autoplay', 'checkbox');
					enhanceSalesLetterFields('_launchpage_showvideocontrolbar', 'checkbox');
					enhanceSalesLetterFields('_launchpage_showvideodownloadlink', 'checkbox');
					enhanceSalesLetterFields('_launchpage_videodownloadlinktext', 'text');
					enhanceSalesLetterFields('_launchpage_downloadvideourl', 'text');
					enhanceSalesLetterFields('_launchpage_videoplayercolor', 'select');

					/* update comment settings in sales letter options */
					enhanceSalesLetterFields('_launchpage_activatecomments', 'checkbox');
					enhanceSalesLetterFields('_launchpage_disabledatewpcomments', 'checkbox');
					enhanceSalesLetterFields('_launchpage_showcommentcalltoaction', 'checkbox');
					enhanceSalesLetterFields('_launchpage_commentscalltoactiontext', 'text');
					enhanceSalesLetterFields('_launchpage_commentssystem', 'select');
					enhanceSalesLetterFields('_launchpage_commentsorder', 'select');
					enhanceSalesLetterFields('_launchpage_fbcommentnum', 'select');
					enhanceSalesLetterFields('_launchpage_fbemailnotify', 'text');
					enhanceSalesLetterFields('_launchpage_wpcommentstitle', 'text');
					enhanceSalesLetterFields('_launchpage_facebookapikey', 'text');
					enhanceSalesLetterFields('_launchpage_facebookxid', 'text');
                });
					function show_hide_childdivs(classname) {
						jQuery("."+classname).animate({"height": "toggle"}, { duration: 175 });
					}
              		function enhanceForm() {

              			// Mutate the form to a fileupload form
              			// As usual: Special code for IE
              			if (jQuery.browser.msie) jQuery('#post').attr('encoding', 'multipart/form-data');
              			else jQuery('#post').attr('enctype', 'multipart/form-data');

              			// Ensure proper encoding
              			jQuery('#post').attr('acceptCharset', 'UTF-8');
                      }
					function enhanceSalesLetterFields(name, type) {
						if(type == "select") {
							jQuery('div[id="my-lp-custom-fields"] select[name="'+ name +'"]').change(function() {
							  jQuery('div[id="my-mem-custom-fields"] select[name="'+ name +'"]').val(jQuery(this).val());   
							});
						}
						else if(type == "textarea") {
							jQuery('div[id="my-lp-custom-fields"] textarea[name="'+ name +'"]').change(function() {
							  jQuery('div[id="my-mem-custom-fields"] textarea[name="'+ name +'"]').val(jQuery(this).val());   
							});		
						}	
						else if(type == "checkbox") {
							jQuery('div[id="my-lp-custom-fields"] input[name="'+ name +'"]').click(function() {
							  jQuery('div[id="my-mem-custom-fields"] input[name="'+ name +'"]').attr('checked', jQuery(this).is(':checked'));   
							});
						}
						else if(type == "text"){
							jQuery('div[id="my-lp-custom-fields"] input[name="'+ name +'"]').change(function() {
							  jQuery('div[id="my-mem-custom-fields"] input[name="'+ name +'"]').val(jQuery(this).val());   
							});
						}
					}					  
                </script>

				
				
				<?php
				$tooltips = '';
				$videotips = '';
                wp_nonce_field( 'my-lp-custom-fields', 'my-lp-custom-fields_wpnonce', false, true );
				foreach ( $this->customFields as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
							case "post": {
								// Output on any post screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="post-new.php" || $post->post_type=="post" )
									$output = true;
								break;
							}
							case "page": {
								// Output on any page screen
								if ( basename( $_SERVER['SCRIPT_FILENAME'] )=="page-new.php" || $post->post_type=="page" )
									$output = true;
								break;
							}
						}
						if ( $output ) break;
					}
					// Check capability
					if ( !current_user_can( $customField['capability'], $post->ID ) )
						$output = false;
					// Output if allowed
					if ( $output ) { ?>
                    	<?php $tooltips .= ( $customField[ 'help' ] ) ? '				jQuery("#'.$customField['name'].'_helpsales").easyTooltip();' : ''; ?>
                    	<?php $videotips .= ( $customField[ 'videotxt' ] ) ? '				jQuery("#'.$customField['name'].'_videosales").easyTooltip();' : ''; ?>
						<?php $fieldsetwidth = ($customField[ 'width' ]) ? $customField[ 'width' ] : '350px'; ?>
                        <?php echo ($customField['type']=="fieldset") ? '<div class="op-launch-menu-page-group-header" style="z-index: 100; margin-top: 10px; margin-left: 12px;width:455px;"><ins>+</ins>'.$customField['title'].'</div>' : ''; ?>
						<?php echo ($customField['type']=="fieldset" && $customField['description']!="") ? '<fieldset style="width:'.$fieldsetwidth.';display:none;"><p style="margin-left: 10px; color: rgb(65, 65, 65);">'.$customField['description'].'</p>' : (($customField['type']=="fieldset") ? '<fieldset style="width:'.$fieldsetwidth.';display:none;">' : ''); ?>
						<?php if($customField['type']!="menuheader" && $customField['style']!="tabbed") : ?>
                        <div class="<?php echo ($customField['type']!="fieldset") ? 'form-field  form-required' : ''; ?> <?php echo str_replace("font","", str_replace("color","", $customField['class']) ); ?> <?php echo $customField['separator']; ?>  <?php echo $customField['noborderbottom']; ?>">
                        <?php endif; ?>
							<?php
							switch ( $customField[ 'type' ] ) {
								case "starttabs": {
									echo '<ul class="tabs">';
									break;	
								}
								case "tablist": {
									echo '<li><a href="#tab_'.$customField[ 'title' ].'">'.$customField[ 'description' ].'</a></li>';
									break;	
								}
								case "endtabs": {
									echo '</ul>';
									break;	
								}
								case "starttabcontainer": {
									echo '<div class="tab_container">';
									break;	
								}
								case "tabcontent": {
									echo '<div id="tab_'.$customField[ 'title' ].'" class="tab_content">';
									break;	
								}
								case "endtabcontent": {
									echo '</div>';
									break;	
								}
								case "endtabcontainer": {
									echo '</div>';
									break;	
								}
								case "headercheckbox": {
									global $shortname;
									$headersitewide = get_option($shortname.'_general_settings');
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="float:left;width:185px;"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo ($customField[ 'childdivclass' ]) ? '<input onclick="show_hide_childdivs(\''.$customField[ 'childdivclass' ].'\');"' : '<input ';
									echo 'type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
										if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
											echo ' checked="checked"';
										else if ( $headersitewide['activate_header_sitewide'] != "" && !isset ( $_GET['post'] ) ) 
											echo ' checked="checked"';
										echo '" style="width: auto; height: 21px; vertical-align: middle;" /> &nbsp;'.$customField[ 'description' ];
									break;
								}
								case "checkbox": {
									// Checkbox
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="float:left;width:185px;"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo ($customField[ 'childdivclass' ]) ? '<input onclick="show_hide_childdivs(\''.$customField[ 'childdivclass' ].'\');"' : '<input ';
									echo 'type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
										if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
											echo ' checked="checked"';
										else if ( $customField['default_value'] == 1 && !isset ( $_GET['post'] ) ) 
											echo ' checked="checked"';
										echo '" style="width: auto; height: 21px; vertical-align: middle;" /> &nbsp;'.$customField[ 'description' ];
									break;
								}
                                case "file": {
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<input style="width:auto;" type="file" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '">';
                                    if($this->prefix . $customField[ 'name' ]=="_launchpage_uploadvideothumbnail"){
                                        echo '<label>Uploaded Images:</label><img src="'.get_post_meta( $post->ID, '_launchpage_uploadvideothumbnail_images', true ).'"  style="max-width:735px;">';
                                   }
									break;
								}
								case 'upload':
								echo '<div id="'.$this->prefix . $customField[ 'name' ].'_upload-field" class="fieldsection">';							
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<input class="field_txt uploaded_url" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" style="width:215px;" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"><br><br><span class="image_upload_button button " id="'.$this->prefix . $customField[ 'name' ].'_upload-btn">Upload Image</span>';
									echo '<input type="hidden" class="ajax_action_url" value="'.admin_url("admin-ajax.php").'" name="'.$this->prefix . $customField[ 'name' ].'_action">';
									
								echo '</div>';
								echo '<br />';
								break;
								case "menuheader": {
									echo '<div class="op-launch-menu-page-group-header" style="z-index: 100; margin-top: 0pt; margin-left: 12px;"><ins>+</ins>Security Encryption Key</div>';	
									break;						
								}
								case "textarea": {
									// Text area
									$thislabelwidth = ($customField['name']=="videourl" || $customField['name']=="externalvideo") ? 'auto' : '185px';
									echo '<label style="float:left;width:'.$thislabelwidth.';" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<br /><br /><span style="font-size:11px;color:#666666;">' . $customField[ 'description' ].'</span>';
                                    echo '</label>';
									echo '<textarea style="width:416px;" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									break;
								}
								case "wysiwyg": { 
									 // Text area 
									 echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									 echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									 echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									 echo '</label>'; 
									 echo '<p>' . $customField[ 'description' ] . '</p>';  
									 echo '<div id="editor-toolbar">
											<div class="zerosize"><input type="button" onclick="switchEditors.go(\'' . $this->prefix . $customField[ 'name' ] .'\')" accesskey="e"></div><a onclick="switchEditors.go(\'' . $this->prefix . $customField[ 'name' ] .'\', \'html\');jQuery(this).addClass(\'active\');" id="edButtonHTML">HTML</a><a onclick="switchEditors.go(\'' . $this->prefix . $customField[ 'name' ] .'\', \'tinymce\');jQuery(this).addClass(\'active\');" class="active" id="edButtonPreview">Visual</a>
											</div>';
									 echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3" style="width:100%;">' . htmlspecialchars( nl2br(get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true )) ) . '</textarea>';  
									 // WYSIWYG  
									 if ( $customField[ 'type' ] == "wysiwyg" ) { ?> 
										 <script type="text/javascript"> 
											 jQuery( document ).ready( function() { 
												 jQuery( "<?php echo $this->prefix . $customField[ 'name' ]; ?>" ).addClass( "mceEditor" ); 
												 if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) { 
													 tinyMCE.execCommand( "mceAddControl", false, "<?php echo $this->prefix . $customField[ 'name' ]; ?>" ); 
												 } 
											 }); 
										 </script> 
									 <?php } 
									 break; 
								} 
								case "exclude_include_checkbox": {
									global $themename, $shortname, $getpagnav;
									$options = array( array( "id" => "video1_setup", "name" => "video1_setup", "type" => "" ), array( "id" => "video2_setup", "name" => "video2_setup", "type" => "" ), array( "id" => "video3_setup", "name" => "video3_setup", "type" => "" ), array( "id" => "video4_setup", "name" => "video4_setup", "type" => "" ), array( "id" => "video5_setup", "name" => "video5_setup", "type" => "" ), array( "id" => "video6_setup", "name" => "video6_setup", "type" => "" ), array( "id" => "video7_setup", "name" => "video7_setup", "type" => "" ), array( "id" => "video8_setup", "name" => "video8_setup", "type" => "" ) ); // Nick 10/25/2010
									$get_options = get_option($shortname.'_general_settings');
									$i=1;
									echo '<label style="float:left;width:185px;" for="' .  $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label><div id="'. $this->prefix . $customField[ 'name' ].'" style="float: left; width: 420px;" class="linkstovideos_box_select">'; 
									foreach ($options as $value) {
									$id = $value['id'];
									$page = get_post($get_options[$id]);
									$pagetitle = $page->post_title;
									?>
                                    <?php if($get_options[$id]){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
                                    <?php
									if(stripslashes($get_options[$id])!="") {
										echo '<div style="border:1px solid #cccccc;margin-right:4px;margin-bottom:4px;padding:4px;white-space:nowrap;float:left;width:120px;overflow:hidden;"><input style="width:auto;" type="checkbox" alt="'.stripslashes($get_options[$id]).'" id="'. $this->prefix . $customField[ 'name' ].'_'.stripslashes($get_options[$id]).'" class="select_' . $this->prefix . $customField[ 'name' ]. '" /> '.stripslashes($pagetitle).'</div>';
									}
                                    ?>

                                    <?php
									$i++;
									}
									?>
                                    <div style="clear:both"></div>
                                    <input style="width:400px;" readonly="readonly" name="<?php echo  $this->prefix . $customField[ 'name' ]; ?>" id="<?php echo  $this->prefix . $customField[ 'name' ]; ?>" type="hidden" value="<?php if ( get_post_meta($post->ID,$this->prefix.$customField['name'],true)  != '') { echo htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ); } else { } ?>" />
                                    <br /><span><?php echo $value['desc']; ?></span>
                                    </div>
									<?php
                                    break;
								}
								case "fontlist": {
									$fonts_array = array('Arial','Impact','Georgia','Tahoma','Vegur');
									$fonts_array[] = "Hand of Sean";
									$fonts_array[] = "Arial Narrow";
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($fonts_array as $i => $value) {
										$font_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$font_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$font_selected.' '.$font_checked.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "fontweight": {
									$arrays = array("normal"=>"normal", "bold"=>"bold");
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($arrays as $i => $value) {
										$array_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$array_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$array_selected.' '.$array_checked.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "playercolor": {
									$arrays = array("light"=>"light", "dark"=>"dark");
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($arrays as $i => $value) {
										$array_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$array_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$array_selected.' '.$array_checked.' value="'.$value.'">'.ucfirst($value).'</option>';									
									}
									echo '</select>';
									break;
								}
								case "fontstyle": {
									$arrays = array("normal"=>"normal", "italic"=>"italic");
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($arrays as $i => $value) {
										$array_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$array_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$array_selected.' '.$array_checked.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "letterspacing": {
									$arrays = array("-1px"=>"-1px", "0px"=>"0px");
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($arrays as $i => $value) {
										$array_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$array_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$array_selected.' '.$array_checked.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "align_list": {
									$array = array('Center'=>'center','Left'=>'left');
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$selected.' '.$checked.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
// Nick 11/05/2010
								case "ctatextlist": {
									$array = array('1'=>'Share This Video!', '2'=>'Pass This On!', '3'=>'Share The Love!', '4'=>'SHARE! Share This Now!', '5'=>'SHARE! Share This Video!', '6'=>'SHARE! Pass This On!', '7'=>'Share This Now!');
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $i ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$checked = ( ( $customField[ 'default_value' ] ) == $i ) ?  'selected="selected"' : '';
										}
										echo '<option '.$selected.' '.$checked.' value="'.$i.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "page2sharelist": {
									$thisID = $post->ID;
									$array = array();
									$array[$thisID] = get_the_title( $thisID );
									$myposts = query_posts('posts_per_page=-1&post_type=page&post_status=publish&orderby=title&order=ASC');
									//The Loop
									foreach($myposts as $page) :
										$array[$page->ID] = get_the_title( $page->ID );
									endforeach;
									//$wp_query=$tmp;
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:140px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($thisID,$this->prefix.$customField['name'],true) ) == $i ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($thisID,$this->prefix.$customField['name'],true))=="" ) {
											$checked = ( ( $customField[ 'default_value' ] ) == $i ) ?  'selected="selected"' : '';
										}
										echo '<option '.$selected.' '.$checked.' value="'.$i.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
// close Nick
								case "sidebariconlist": {
									$array = array('No Icon'=>'', 'Blue Icon Download'=>'sbicon1', 'Blue Icon Video'=>'sbicon2', 'Blue Icon Audio'=>'sbicon3', 'PDF Icon'=>'sbicon4', 'Audio Icon'=>'sbicon5', 'Lightbulb Icon'=>'sbicon6', 'Video Clapper Icon'=>'sbicon7', 'Video Reel Icon'=>'sbicon8', 'Download Box Icon'=>'sbicon9', 'Dashboard Icon'=>'sbicon10');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$selected.' '.$checked.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "membersvidpositionlist": {
									$array = array('Before Content'=>'beforecontent', 'After Content'=>'aftercontent');
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$selected.' '.$checked.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "membersthumblist": {
									$array = array('Folder (Plain)'=>'membersthumb1', 'Folder (Documents)'=>'membersthumb2', 'Folder (Audio)'=>'membersthumb3', 'Folder (Video)'=>'membersthumb4', 'Video Player Dark'=>'membersthumb5', 'Video Player Light'=>'membersthumb6');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$selected.' '.$checked.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "bgtilinglist": {
									$repeat_array = array('repeat'=>'Tiled', 'repeat-x'=>'Horizontal Tile Top');
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($repeat_array as $i => $value) {
										$repeat_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $i ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$repeat_checked = ( ( $customField[ 'default_value' ] ) == $i ) ?  'selected="selected"' : '';
										}
										echo '<option '.$repeat_selected.' '.$repeat_checked.' value="'.$i.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "comingsoonlist": {
									$imgs_array = array('comingsoon_1'=>'Coming Soon Graphic #1', 'comingsoon_2'=>'Coming Soon Graphic #2', 'comingsoon_3'=>'Coming Soon Graphic #3', 'comingsoon_4'=>'Coming Soon Graphic #4', 'comingsoon_5'=>'Coming Soon Graphic #5');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($imgs_array as $i => $value) {
										$imgs_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $i ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$img_checked = ( ( $customField[ 'default_value' ] ) == $i ) ?  'selected="selected"' : '';
										}
										echo '<option '.$imgs_selected.' '.$img_checked.' value="'.$i.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "headernavstyle": {
									$style_array = array('style1' => 'Style1 - Large Capitals (4 Vid Max)', 'style2' => 'Style2 - Smaller (6 Vid Max)', 'style3' => 'Style3 - Smallest (6 Vid Max)');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($style_array as $key => $value) {
										$style_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $key ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$style_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$style_selected.' '.$style_checked.' value="'.$key.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "mainbodytextfont": {
									$mainbodytextfonts_array = array('Arial, Helvetica, Sans-serif','Verdana, Geneva, Sans-serif','Georgia, Times New Roman, Times, Serif','Lucida Grande, Lucida Sans Unicode, Sans-serif');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:215px;">';
									foreach ($mainbodytextfonts_array as $i => $value) {
										$mainbodytextfonts_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$mainbodytextfonts_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$mainbodytextfonts_selected.' '.$mainbodytextfonts_checked.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "headlineposition": {
									$array = array('Above Video','Below Video');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "navbarposition": {
									$array = array('Above Header','Below Header');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:150px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "commentssystem": {
									$array = array('Facebook','Wordpress','Both');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "commentsorder": {
									$array = array('Wordpress First, Facebook Second'=>'wpfb', 'Facebook First, Wordpress Second'=>'fbwp');
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:235px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "fbcommentnum": {
									$array = array('10 comments'=>'10', '20 comments'=>'20', '30 comments'=>'30', '40 comments'=>'40', '50 comments'=>'50');
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "alertbarcolor": {
									$array = array('Green','Yellow','Red','Blue');
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								// nick 11/01/2010
								case "sidebarwidgetlist": {
									$array = array("No Sidebar" => "0","Sidebar 1" => "1","Sidebar 2" => "2","Sidebar 3" => "3","Sidebar 4" => "4","Sidebar 5" => "5");
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
									break;	
								}
								// close nick
								case "socialmediabuttonlist": {
									$buttons = array("Social Media Set 1" => "share1","Social Media Set 2" => "share2","Social Media Set 3" => "share3","Social Media Set 4" => "share4","Social Media Set 5" => "share5");
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($buttons as $i => $value) {
										$button_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$button_selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;	
								}
								case "ctabuttonlist": {
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									$buttons = array("Orange Button Style" => " ", " - Add To Cart" => "orange_addtocart", " - Add To Cart 2" => "orange_addtocart2", " - Order Now" => "orange_ordernow", " - Get Access Now" => "orange_getaccessnow", " - Get Instant Access" => "orange_getinstantaccess", " - YES! Let Me In!" => "orange_yesletmein", " - Register Now" => "orange_registernow", " - Buy Now" => "orange_buynow", " - Checkout!" => "orange_checkout", " - Sign Up Now" => "orange_signupnow", "-------------------------------" => " ", "Red Button Style" => " ", " - Add To Cart " => "red_addtocart", " - Add To Cart 2 " => "red_addtocart2", " - Order Now " => "red_ordernow", " - Get Access Now " => "red_getaccessnow", " - Get Instant Access " => "red_getinstantaccess", " - YES! Let Me In! " => "red_yesletmein", " - Register Now " => "red_registernow", " - Buy Now " => "red_buynow", " - Checkout! " => "red_checkout", " - Sign Up Now " => "red_signupnow", "------------------------------- " => " ", "Yellow Button Style" => " ", " - Add To Cart  " => "yellow_addtocart", " - Add To Cart 2  " => "yellow_addtocart2", " - Order Now  " => "yellow_ordernow", " - Get Access Now  " => "yellow_getaccessnow", " - Get Instant Access  " => "yellow_getinstantaccess", " - YES! Let Me In!  " => "yellow_yesletmein", " - Register Now  " => "yellow_registernow", " - Buy Now  " => "yellow_buynow", " - Checkout!  " => "yellow_checkout", " - Sign Up Now  " => "yellow_signupnow");
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									$nobutton_font = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == "" ) ? 'selected="selected"' : "";
									echo '<option '.$nobutton_font.' value=""> -- Select a button -- </option>';
									foreach ($buttons as $i => $value) {
										$button_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$button_selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "ctastyle": {
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									$buttons = array("No Styling" => "nostyling", "No Credit Card Icons" => " ", " - Blue Hand-Drawn Effect" => "nocc_bluehdeffect", " - Red Hand-Drawn Effect" => "nocc_redhdeffect", "-------------------------------" => " ", "Include Credit Card Icons:" => " ", " - Credit Card Icons Only " => "withccnopaypal_noeffects", " - Blue Hand-Drawn Effect + CC Icons " => "withccnopaypal_bluehdeffect", " - Red Hand-Drawn Effect + CC Icons " => "withccnopaypal_redhdeffect", "------------------------------- " => " ", "Include Credit Card Icons & Paypal:" => " ", " - Credit Card Icons & Paypal Only  " => "withccandpaypal_noeffects", " - Blue Hand-Drawn Effect  " => "withccandpaypal_bluehdeffect", " - Red Hand-Drawn Effect  " => "withccandpaypal_redhdeffect");
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									$nobutton_font = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == "" ) ? 'selected="selected"' : "";
									echo '<option '.$nobutton_font.' value=""> -- Select a button style -- </option>';
									foreach ($buttons as $i => $value) {
										$button_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$button_selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "buttonlist": {
									// Dropdown
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									$buttons = array("Orange Button Style" => " ", " - Add To Cart" => "orange_addtocart", " - Download Now" => "orange_downloadnow", " - Get Access Now!" => "orange_getaccessnow", " - Get Instant Access" => "orange_getinstantaccess", " - YES! Let Me in Early" => "orange_letmeinearly", " - Send Me The Video" => "orange_sendmethevideo", " - Show Me The Video" => "orange_showmethevideo", " - Sign Up Now!" => "orange_signupnow", " - Get On The Waiting List" => "orange_getwaitinglist", "-------------------------------" => " ", "Red Button Style" => " ", " - Add To Cart " => "red_addtocart", " - Download Now " => "red_downloadnow", " - Get Access Now! " => "red_getaccessnow", " - Get Instant Access " => "red_getinstantaccess", " - YES! Let Me in Early " => "red_letmeinearly", " - Send Me The Video " => "red_sendmethevideo", " - Show Me The Video " => "red_showmethevideo", " - Sign Up Now! " => "red_signupnow", " - Get On The Waiting List " => "red_getwaitinglist", "------------------------------- " => " ", "Yellow Button Style" => " ", " - Add To Cart  " => "yellow_addtocart", " - Download Now  " => "yellow_downloadnow", " - Get Access Now!  " => "yellow_getaccessnow", " - Get Instant Access  " => "yellow_getinstantaccess", " - YES! Let Me in Early  " => "yellow_letmeinearly", " - Send Me The Video  " => "yellow_sendmethevideo", " - Show Me The Video  " => "yellow_showmethevideo", " - Sign Up Now!  " => "yellow_signupnow", " - Get On The Waiting List  " => "yellow_getwaitinglist");
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									$nobutton_font = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == "" ) ? 'selected="selected"' : "";
									echo '<option '.$nobutton_font.' value=""> -- Select a button -- </option>';
									foreach ($buttons as $i => $value) {
										$button_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$button_selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "separator": {
									echo '';
									break;	
								}
								case "separatoroptin": {
									echo '<div style="display:none" id="optin_launch_hdn_div"></div>';
									echo '<div style="display:none" id="optin_launch_hdn_div2"></div>';
									break;	
								}
								case "caption": {
									if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
									break;	
								}
								case "hidden": {
									// Hidden field
									echo '<input class="'.$customField['class'].'" type="hidden" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;	
								}
								case "title": {
									// Title/description
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									break;	
								}
								case "extrafieldIDtext": {
                                    if ( $customField[ 'description' ] ) echo '<p style="float:left;">' . $customField[ 'description' ] . '</p>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    echo '</label>';
									echo '<input style="float:left;width:120px;" class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;	
								}
								case "extrafieldvaluetext": {
                                    if ( $customField[ 'description' ] ) echo '<p style="float:left;">' . $customField[ 'description' ] . '</p>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    echo '</label>';
									echo '<input style="float:left;width:240px;" class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '<br style="clear:both;" />';
									break;	
								}
								case "textoptinbox": {
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];
									echo '<label style="float:left;width:185px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo ' <input style="width:150px;" class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="'. $mycurrentvalue .'" /> &nbsp;'.$customField[ 'description' ];
									break;
								}
								case "fieldset": {
									echo '';
									break;	
								}
								case "endfieldset": {
									echo '';
									break;	
								}
								case "note": {
									echo '<p style="margin-left:0;color:#414141;"><em>' . $customField[ 'description' ] . '</em></p>';
								break;	
								}
								default: {
									if($customField['class']=='color' || $customField['class']=='color activeheadertext' || $customField['class']=='color activateh1abovevideotext' || $customField['class']=='color activateh1belowvideotext' || $customField['class']=='color activatepreheadline' || $customField['class']=='color activatesubheadline') { 
									// Plain text field
									// check if user has selected value for this
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];
									echo '<label style="width:185px;float:left;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] .'</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo ' <input style="width:85px;clear:left;" class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="'. $mycurrentvalue .'" />';
									} else if ($customField['class']=='hyperlink_color') {
									global $shortname;
									$hyperlinksitewide = get_option($shortname.'_general_settings');
									$hyperlinkcolor = $hyperlinksitewide['hyperlink_color'];
									$mycurrentvalue = ( $hyperlinkcolor != "" && !isset ( $_GET['post'] )) ? $hyperlinkcolor : htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) );
									echo '<label style="width:185px;float:left;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] .'</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo ' <input style="width:85px;clear:left;" class="color" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="'. $mycurrentvalue .'" />';
									}
									else {
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];
									$thislabelwidth = ($customField['name']=="pageheaderurlfullwidth") ? 'auto' : '185px';
									echo '<label style="float:left;width:'.$thislabelwidth.';" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									$input_width = ($customField['style_width']) ? $customField['style_width'] : (($customField['name']=="pageheaderurlfullwidth") ? '404px' : '215px');
									echo ' <input style="width:'.$input_width.';" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="'. $mycurrentvalue .'" />';
									}
									break;
								}
							}
							?>
							<?php
                                $url = get_bloginfo('url');
                                //if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                            ?>
						<?php if($customField['type']!="menuheader" && $customField['style']!="tabbed") : ?></div><?php endif; ?>
                        <?php echo ($customField['type']=="endfieldset") ? '</fieldset>' : ''; ?>
					<?php
					}
				} ?>
            <script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(document).ready(function() {
				
					//When page loads...
					jQuery("#my-lp-custom-fields .tab_content").hide(); //Hide all content
					jQuery("#my-lp-custom-fields ul.tabs li:first-child").addClass("active").show(); //Activate first tab
					jQuery("#my-lp-custom-fields .tab_content:first-child").show(); //Show first tab content
				
					//On Click Event
					jQuery("#my-lp-custom-fields ul.tabs li").click(function() {
				
						jQuery("#my-lp-custom-fields ul.tabs li").removeClass("active"); //Remove any "active" class
						jQuery(this).addClass("active"); //Add "active" class to selected tab
						jQuery("#my-lp-custom-fields .tab_content").hide(); //Hide all tab content
				
						var activeTab = jQuery(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
						jQuery(activeTab).fadeIn(); //Fade in the active ID content
						return false;
					});
				
				});
				jQuery("span.helpsales").each(function(){
					jQuery(this).html("<a rel=\"facebox\" href=\"#"+str_replace("_helpsales", "", jQuery(this).attr("id") )+"\"><img src=\"<?php echo $templatedir; ?>/admin/scripts/images/op-help-icon.png\" border=\"0\" style=\"width:16px;height:16px;vertical-align:middle;\"></a>"); // load help icons
				});
				jQuery("span.videosales").each(function(){
					jQuery(this).html("<span rel=\"facebox\" href=\"#"+str_replace("_videosales", "", jQuery(this).attr("id") )+"\"><img src=\"<?php echo $templatedir; ?>/admin/scripts/images/tutorial-icon.png\" border=\"0\" style=\"width:16px;height:16px;vertical-align:middle;\"></span>"); // load help icons
				});
				<?php echo $tooltips; ?>
				<?php echo $videotips; ?>
			});
			</script>
			</div>
			<?php
		}
		/**
		* Save the new Custom Fields values
		*/
		function saveLpCustomFields( $post_id, $post ) {
            global $wpdb,$myupload;
			if(!is_dir(WP_CONTENT_DIR .'/uploads')) {
				mkdir(WP_CONTENT_DIR .'/uploads', 0777);
			}
			if(!is_dir(WP_CONTENT_DIR .'/uploads/normal')) {
				mkdir(WP_CONTENT_DIR .'/uploads/normal', 0777);
			}
			if(!is_dir(WP_CONTENT_DIR .'/uploads/thumbs')) {
				mkdir(WP_CONTENT_DIR .'/uploads/thumbs', 0777);
			}
            $dirname = WP_CONTENT_DIR .'/uploads';
            $url = get_bloginfo('url');
            $dir = get_bloginfo('home').'/wp-content/uploads';

			if ( !wp_verify_nonce( $_POST[ 'my-lp-custom-fields_wpnonce' ], 'my-lp-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( $post->post_type != 'page' && $post->post_type != 'post' )
				return;
			foreach ( $this->customFields as $customField ) {
				if ( current_user_can( $customField['capability'], $post_id ) ) {
					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
						update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
                        ///update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
					} else {
						delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
					}

        	    }
	    	}

            //Uploading Images goes here
        	$myupload->set_FPath($dirname."/");
            $myupload->filepaththumb = $dirname."/thumbs/";
            $myupload->filepathnormal = $dirname."/normal/";
        	$myupload->set_File('_launchpage_uploadvideothumbnail');
            $myimage = 'images';
            $imagename = '';
            if($_FILES['_launchpage_uploadvideothumbnail']['name']!=""){
            	if($myupload->is_ImageFile()==true){
            		$imagename = $myupload->do_UploadFile();
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . 'uploadvideothumbnail_'. $myimage, $dir.'/'.$imagename ) : '';
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . 'uploadvideothumbnail_'. $myimage.'_thumbs', $dir.'/thumbs/'.$imagename ) : '';
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . 'uploadvideothumbnail_'. $myimage.'_normal', $dir.'/normal/'.$imagename ) : '';
            	}
            }else{
                if ( get_post_meta( $post->ID, $this->prefix . 'uploadvideothumbnail_'. $myimage, true ) == ""){
                    update_post_meta( $post_id, $this->prefix . 'uploadvideothumbnail_'. $myimage, $dir.'/images/video1.jpg' );
                }
            } $this->i++;
	} // End Class
  }
} // End if class exists statement

?>