<?php
$themedir = get_bloginfo( 'template_directory' );
    if ( !class_exists('myCustomFields') ) {

    include dirname( __FILE__ )."/Up.php";

    $myupload = new CI_Up_Mark();

	class myCustomFields {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = '_optthemes_';
		var $i = 1; // Fix the "attachment" thing with main wp content field
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/
	
		
		
		var $customFields =	array(
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "<span style='font-size:15px;font-style:normal;line-height:19px;'>The options in this control panel are for use with any of the <strong>Squeeze Page Templates</strong>. For an overview of how to setup your squeeze pages, <a href='http://www.optimizepress.com/members/#location3' target='_blank'>click here</a></span>",
				"type"			=> "note",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "Overall Page Settings (Squeeze)",
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
				"help"			=> "Select the font used for your main page body copy",
				"type"			=> "mainbodytextfont",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "overallfont",
				"title"			=> "Main Font",
				"description"	=> "",
				"type"			=> "overalllist",
				"help"			=> "Use this option to override your selections for headlines to set all the options to the same font",
				"videotxt"		=> "click here to view full tutorial",
				"videolink"		=> "http://www.optimizepress.com/members",
				"labelwidth"	=> "165px",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"name"			=> "bulletstyle",
				"title"			=> "Bullet Style Select",
				"description"	=> "",
				"help"			=> "Choose the bullet style here for your squeeze page bulleted lists.<BR> <strong>Note:</strong> On squeeze pages this setting will override the shortcode bullet styles",
				"type"			=> "bulletstyle",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showfooterlinks",
				"title"			=> "Display Footer Links",
				"help"			=> "Activate this option to display the footer links on this page. You can setup<BR> the footer links in the OptimizePress General Settings",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle",
				"default_value"	=>	1,
				"separator"		=> "separator",
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
				"title"			=> "Navigation Settings (Squeeze)",
				"description"	=> "Show a navigation bar on your squeeze page.  To customize the look of your navigation bar, <a href='admin.php?page=OptimizePress-squeezeconfigs' target='_blank'>click here</a>. <strong>Note:</strong> Not available on Squeeze 01 template",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "shownavbar",
				"title"			=> "Activate Navigation Bar",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle",
				"childdivclass"	=> "activesqnavbar",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "navbarposition",
				"title"			=> "Squeeze Page Navbar Position",
				"type"			=> "navbarposition",
				"width"			=> "150px",
				"class"			=> "twotdstyle activesqnavbar",
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
				"title"			=> "Launch/Gateway Settings (Squeeze)",
				"description"	=> "Must be activated if you are using the launch gateway system and this is your squeeze page. You can change your launch settings <a href='admin.php?page=admin-configs' target='_blank'>here</a> ",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			
			
			
            array(
				"name"			=> "disablecookiecheck",
				"title"			=> "Activate Gateway",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"help"			=> "Activate this option if you are using this page in a launch funnel.  Any time this option is activated, the visitors computer will be checked<BR> for the cookie file and if it is not present they will be redirected to the squeeze page.",
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
				"title"			=> "Header & Logo Settings (Squeeze)",
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
				"title"			=> "showheaderopt",
				"description"	=> "Header/Logo Settings",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "customheaderimg",
				"description"	=> "Custom Header Image",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "customheadertxt",
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
				"title"			=> "showheaderopt",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "showheaderopt",
				"title"			=> "Activate Header Options",
				"type"			=> "headercheckbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activesqheader",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showheader",
				"title"			=> "Show Header",
				"description"	=> "(required if using logo)",
				"help"			=> "[Required If you are using a logo] This option will show the header on your page as long as you are using a template which supports it. <BR>Header must have been uploaded to the OptimizePress general settings and also you need to set a header height in the general settings.",
				"type"			=> "headercheckbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showlogo",
				"title"			=> "Show Logo",
				"description"	=> "",
				"help"			=> "Show the logo on this page.  Your logo will be overlayed over your header image.  Ensure you have uploaded<BR> a logo in your OptimizePress General Settings, and also set the logo alignment in the general settings",
				"type"			=> "checkbox",
				"childdivclass"	=> "pagelogo",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showheaderhyperlink",
				"title"			=> "Activate Header Hyperlink",
				"description"	=> "",
				"type"			=> "headercheckbox",
				"childdivclass"	=> "showsqheaderhyperlink",
				"class"			=> "twotdstyle activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "headerhyperlink",
				"title"			=> "Header Hyperlink URL",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle showsqheaderhyperlink",
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
				"title"			=> "customheaderimg",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pageheader_height",
				"title"			=> "Custom Header Image Height",
				"description"	=> " ",
				"type"			=> "text",
				"separator"		=> "separator",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pageheaderurl",
				"title"			=> "Custom Header Image URL",
				"description"	=> " ",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pageheaderurlfullwidth",
				"title"			=> "Custom Header Image URL (full width)",
				"description"	=> " ",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),		
			array(
				"name"			=> "pagelogo",
				"title"			=> "Custom Logo URL",
				"description"	=> " ",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "pagelogo_align",
				"title"			=> "Custom Logo Alignment",
				"description"	=> " ",
				"type"			=> "align_list",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheader",
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
				"title"			=> "customheadertxt",
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
				"childdivclass"	=> "activesqheadertext",
				"class"			=> "twotdstyle",
				"labelwidth"	=> "165px",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			
            array(
				"name"			=> "headertext",
				"title"			=> "Header Text",
				"description"	=> " ",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheadertext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headertextfont",
				"title"			=> "Header Text Font",
				"description"	=> "",
				"type"			=> "headerfontlist",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqheadertext",
				"scope"			=>	array( "page" ),
				"default_value"	=> "Vegur",
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "headertextsize",
				"title"			=> "Header Text Size (px)",
				"type"			=> "text",
				"class"			=> "twotdstyle activesqheadertext",
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
				"class"			=> "color activesqheadertext",
				"default_value"	=> "FFFFFF",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "headertextshadowcolor",
				"title"			=> "Header Text Shadow Color",
				"description"	=> "Text Shadow Color",
				"type"			=> "text",
				"class"			=> "color activesqheadertext",
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
				"title"			=> "Sidebar Settings (Squeeze)",
				"description"	=> "Select a sidebar to show under the optin form. You can add content to this sidebar on the <a href='widgets.php' target='_blank'>widgets page</a>",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),

            array(
				"name"			=> "sidebarwidgettoshow",
				"title"			=> "Choose Sidebar",
				"type"			=> "sidebarwidgetlist",
				"help"			=> "This is a sample help text for Sidebar Options",
				"videotxt"		=> "click here to view full tutorial",
				"videolink"		=> "http://www.optimizepress.com/members",
				"labelwidth"	=> "165px",
				"separator"		=> "separator",
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
				"title"			=> "Headline Options (Squeeze)",
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
				"title"			=> "preheadline",
				"description"	=> "Pre-Headline",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "headline",
				"description"	=> "Headline",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "subheadline",
				"description"	=> "Subheadline",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "headlinebelowvideo",
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
				"title"			=> "preheadline",
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
				"childdivclass"	=> "activepreheadline",
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
				"class"			=> "twotdstyle activepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinemaincolor",
				"title"			=> "Main color",
				"description"	=> "Main color",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "color activepreheadline",
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
				"class"			=> "color activepreheadline",
				"default_value"	=> "cc0000",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinefont",
				"title"			=> "Select Font",
				"description"	=> "Select Font",
				"type"			=> "fontlist",
				"labelwidth"	=> "165px",
				"default_value" => "Impact",
				"class"			=> "font activepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinefontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "font activepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinefontweight",
				"title"			=> "Font Weight",
				"description"	=> "",
				"type"			=> "fontweight",
				"labelwidth"	=> "165px",
				"default_value" => "bold",
				"class"			=> "font activepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlinefontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "font activepreheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "preheadlineletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "font activepreheadline",
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
				"title"			=> "headline",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
		    array(
				"name"			=> "activateheadline",
				"title"			=> "Show Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activeheadline",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "headline",
				"title"			=> "Headline",
				"type"			=> "textarea",
				"class"			=> "activeheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "colorpickerField1",
				"title"			=> "Main color",
				"description"	=> "Main color",
				"type"			=> "text",
				"class"			=> "color activeheadline",
				"default_value"	=> "cc0000",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "colorpickerField2",
				"title"			=> "Alternative color",
				"description"	=> "Alternative color",
				"type"			=> "text",
				"class"			=> "color activeheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinefont",
				"title"			=> "Select Font",
				"description"	=> "Select Font",
				"type"			=> "fontlist",
				"class"			=> "font activeheadline",
				"default_value" => "Impact",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinefontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "font activeheadline",
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
				"class"			=> "font activeheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinefontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "font activeheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlineletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "font activeheadline",
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
				"title"			=> "subheadline",
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
				"childdivclass"	=> "activesubheadline",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadline",
				"title"			=> "Sub-Headline",
				"type"			=> "textarea",
				"class"			=> "twotdstyle activesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinemaincolor",
				"title"			=> "Main color",
				"description"	=> "Main color",
				"type"			=> "text",
				"class"			=> "color activesubheadline",
				"default_value"	=> "444444",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "alternativesubheadlinecolor",
				"title"			=> "Alternative color",
				"description"	=> "Alternative color",
				"type"			=> "text",
				"class"			=> "color activesubheadline",
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
				"class"			=> "font activesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinefontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "font activesubheadline",
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
				"class"			=> "font activesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlinefontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "font activesubheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "subheadlineletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "font activesubheadline",
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
				"title"			=> "headlinebelowvideo",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activateheadlinebelowvideo",
				"title"			=> "Show Options",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activeheadlinebelowvideo",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideo",
				"title"			=> "Headline Below Video",
				"type"			=> "textarea",
				"class"			=> "activeheadlinebelowvideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideomaincolor",
				"title"			=> "Main color",
				"description"	=> "Main color",
				"type"			=> "text",
				"class"			=> "color activeheadlinebelowvideo",
				"default_value"	=> "cc0000",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "alternativeheadlinebelowvideocolor",
				"title"			=> "Alternative color",
				"description"	=> "Alternative color",
				"type"			=> "text",
				"class"			=> "color activeheadlinebelowvideo",
				"default_value"	=> "cc0000",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofont",
				"title"			=> "Select Font",
				"description"	=> "Select Font",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"class"			=> "font activeheadlinebelowvideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofontsize",
				"title"			=> "Font Size",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "font activeheadlinebelowvideo",
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
				"class"			=> "font activeheadlinebelowvideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideofontstyle",
				"title"			=> "Font Style",
				"description"	=> "",
				"type"			=> "fontstyle",
				"labelwidth"	=> "165px",
				"class"			=> "font activeheadlinebelowvideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headlinebelowvideoletterspacing",
				"title"			=> "Letter Spacing",
				"description"	=> "",
				"type"			=> "letterspacing",
				"labelwidth"	=> "165px",
				"class"			=> "font activeheadlinebelowvideo",
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
				"type"			=> "endfieldset",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			array(
				"name"			=> "",
				"title"			=> "Video Settings (Squeeze)",
				"description"	=> "Use a video on your squeeze page.  Default dimensions for most squeeze template videos is 628(h) x 355(w)",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
						
						
            array(
				"name"			=> "activatevideo",
				"title"			=> "Activate Video",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activesqueezevideo",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			            array(
				"name"			=> "videourl",
				"title"			=> "Video URL",
				"description"	=> "If your video is hosted on Amazon S3/Cloudfront or similar, you can use our built in video player.  Enter the full URL of the video here",
				"type"			=> "text",
				"class"			=> "activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "mobilevideourl",
				"title"			=> "iPad/iPhone Compatible Video URL",
				"description"	=> "Enter the URL of your mobile friendly video (m4v, mov, mp4) file. This can be the same URL as above if the video is encoded properly.",
				"type"			=> "text",
				"class"			=> "activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "videoimage1",
				"title"			=> "Video Preview/Still Image URL",
				"description"	=> "Specify the URL of the image which will be placed when the video is stopped.  <strong>Note:</strong> This option can only be used if you're using our player and your own video URL ",
				"type"			=> "text",
				"class"			=> "twotdstyle activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "videoembedcode",
				"title"			=> "Video Embed (Youtube/Vimeo/Viddler)",
				"description"	=> "You can use video code from YouTube, Vimeo, Viddler on your squeeze page. Paste the code between the [Object] tags only",
				"type"			=> "textarea",
				"class"			=> "activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "externalvideo",
				"title"			=> "External Player Code (Easy Video Player / EZS3)",
				"description"	=> "If you are using Easy Video Player, EZS3 or have an external embed code, enter the code here.",
				"type"			=> "textarea",
				"class"			=> "activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

			
            array(
				"name"			=> "videowidth",
				"title"			=> "Video Width",
				"description"	=> "If you are adding a video, enter the width in pixels (px) you want to use. Leave blank for the template default size ",
				"type"			=> "text",
				"class"			=> "activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "videoheight",
				"title"			=> "Video Height",
				"description"	=> "If you are adding a video, enter the height in pixels (px) you want to use. Leave blank for the template default size",
				"type"			=> "text",
				"class"			=> "activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showshadowborder",
				"title"			=> "Video Shadow Border",
				"help"			=> "Display a border around your video. Note: Only applies to videos using our video player - not externally hosted videos",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqueezevideo",
				"scope"			=>	array( "page" ),
				"default_value"	=>	1,
				"capability"	=> "edit_pages"
			),  
            array(
				"name"			=> "autoplay",
				"title"			=> "Autoplay Video",
				"help"			=> "Automatically start your video when a visitor lands on your page. Note: Only applies to videos using our video player - not externally hosted videos",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqueezevideo",
				"scope"			=>	array( "page" ),
				"default_value"	=>	1,
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showvideocontrolbar",
				"title"			=> "Video Player Controlbar",
				"description"	=> "",
				"help"			=> "Show the video controls on your video. Note: Only applies to videos using our video player - not externally hosted videos",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqueezevideo",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "images",
				"title"			=> "Video Graphic",
				"description"	=> "If you would like to use a graphic of a video instead of an actual video, click browse to upload an image from your computer",
				"type"			=> "upload",
				"class"			=> "activesqueezevideo",
				"noborderbottom"=> "noborderbottom",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "videoplayercolor",
				"title"			=> "Video Player Color",
				"description"	=> "",
				"help"			=> "Choose a light or dark color scheme for your video player controls to fit with your site theme.",
				"type"			=> "playercolor",
				"class"			=> "activesqueezevideo",
				"noborderbottom"=> "noborderbottom",
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
				"title"			=> "Opt-in / Squeeze Form Options (Squeeze)",
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
				"title"			=> "optincustomization",
				"description"	=> "Customization",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "optinautoresponder",
				"description"	=> "Autoresponder Code",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "optincustomform",
				"description"	=> "Custom Form",
				"type"			=> "tablist",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"title"			=> "optindualform",
				"description"	=> "Dual Form",
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
				"title"			=> "optincustomization",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activatesidebararrow",
				"title"			=> "Opt-in Box Arrow Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activesidebararrow",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "sidebararrowstyle",
				"title"			=> "Opt-in Box Arrow Style",
				"description"	=> "Select the style of the arrow for your squeeze page",
				"type"			=> "sidebararrowlist",
				"class"			=> "activesidebararrow",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activatesidebarheadline",
				"title"			=> "Opt-in Box Headline Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activesidebarheadline",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "sidebarheadline",
				"title"			=> "Opt-in Box Headline",
				"description"	=> "This is an attention grabbing sidebar headline where you can tell your visitor what to do next.",
				"type"			=> "text",
				"class"			=> "activesidebarheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "sidebarheadlinemaincolor",
				"title"			=> "Main color",
				"description"	=> "Main color",
				"type"			=> "text",
				"class"			=> "color activesidebarheadline",
				"default_value"	=> "215e8e",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "sidebarheadlinefont",
				"title"			=> "Select Font",
				"description"	=> "Select Font",
				"type"			=> "fontlist",
				"default_value" => "Impact",
				"class"			=> "font activesidebarheadline",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activatesidebartext",
				"title"			=> "Opt-in Box Text Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activesidebartext",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "sidebartext",
				"title"			=> "Opt-in Box Text",
				"description"	=> "Advise your prospect what details to enter into the form",
				"type"			=> "text",
				"class"			=> "activesidebartext",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activatespamnotice",
				"title"			=> "Spam Notice Text Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activespamnotice",
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
				"class"			=> "activespamnotice",
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
				"title"			=> "optinautoresponder",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "webformcodehtml",
				"title"			=> "Autoresponder Code",
				"description"	=> "Copy your form code from your autoresponder provider and paste it in the box below. Ensure you are using the non-javascript code, and paste ALL HTML code your autoresponder company gives you into this box",
				"type"			=> "textarea",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinname",
				"title"			=> "Name",
				"description"	=> "Name",
				"type"			=> "text",
				"class"			=> "optinbelow",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
// nick 10/29/2010
            array(
				"name"			=> "optinnametext",
				"title"			=> "Box Text",
				"description"	=> "Box Text",
				"type"			=> "text",
				"class"			=> "optinbelow",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "optinnameshow",
				"title"			=> "Show?",
				"description"	=> "Show?",
				"type"			=> "checkbox",
				"class"			=> "optinbelow",
				"default_value"	=>	1,
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
           	array(
				"name"			=> "optinemail",
				"title"			=> "Email",
				"description"	=> "Email",
				"type"			=> "text",
				"class"			=> "optinbelow clear",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
           	array(
				"name"			=> "optinemailtext",
				"title"			=> "Box Text",
				"description"	=> "Box Text",
				"type"			=> "text",
				"class"			=> "optinbelow",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "optinemailshow",
				"title"			=> "Show?",
				"description"	=> "Show?",
				"type"			=> "checkbox",
				"class"			=> "optinbelow",
				"default_value"	=>	1,
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
			),
			array(
				"name"			=> "showextrawebformfield",
				"title"			=> "Show extra input field options",
				"description"	=> "Show extra input field options",
				"type"			=> "checkbox",
				"childdivclass"	=> "extrawebformfield",
				"class"			=> "optinbelow",
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
				"title"			=> "Form URL",
				"description"	=> "Form URL",
				"type"			=> "text",
				"class"			=> "formurl optinbelow",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "webformhiddenhtml",
				"title"			=> "",
				"description"	=> "Hidden Fields",
				"type"			=> "textarea",
				"class"			=> "formurl optinbelow",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "buttonselect",
				"title"			=> "Select Squeeze Page Button",
				"description"	=> "<a href=../wp-content/themes/OptimizePress/lib/admin/media-upload-sq_button.php?fld=_optthemes_buttonselect&TB_iframe=1&height=350&width=640& class='thickbox'>Select Image OR Upload New</a> <br>Select the button color and text for your squeeze page. For examples please refer to the support guide ",
				"type"			=> "text",
				"class"			=> "separator",
				"default_value"	=> "test",
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
				"title"			=> "optincustomform",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activatecustomoptinform",
				"title"			=> "Activate Custom Optin Form",
				"labelwidth"	=> "165px",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "customoptinform",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "customoptincode",
				"title"			=> "Custom Optin Form Code",
				
				"description"	=> "Enter your Custom Optin Form code here (note this will replace the optin form created by Optimizepress)",
				"type"			=> "textarea",
				"class"			=> "customoptinform",
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
				"title"			=> "optindualform",
				"type"			=> "tabcontent",
				"style"			=> "tabbed",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "activedoubleoptin",
				"title"			=> "Active Double Opt-in Box",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
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
				"title"			=> "Header/Footer Color Choices (Squeeze)",
				"description"	=> "Customize the look of your template with these color selectors. Please note that not all templates support color changes, refer to support documentation for more information",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
			
			array(
				"name"			=> "activatetplcolor",
				"title"			=> "Show Template Color Selector Options",
				"description"	=> "",
				"type"			=> "checkbox",
				"childdivclass"	=> "activetpl",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "headercolor",
				"title"			=> "Header Color",
				"description"	=> "Header Color",
				"type"			=> "text",
				"class"			=> "color activetpl",
				"default_value"	=> "",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "footercolor",
				"title"			=> "Footer Color",
				"description"	=> "Footer Color",
				"type"			=> "text",
				"class"			=> "color activetpl",
				"default_value"	=> "",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			  array(
				"name"			=> "footertextcolor",
				"title"			=> "Footer Text Color",
				"description"	=> "Footer Text Color",
				"type"			=> "text",
				"class"			=> "color activetpl",
				"default_value"	=> "",
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
				"title"			=> "Ecover Settings (Squeeze)",
				"description"	=> "Show an ecover on the side of your squeeze page. <strong>Note:</strong> Some templates do not support the ecover feature.",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
			  
            array(
				"name"			=> "activateecover",
				"title"			=> "Activate Ecover",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activeecover",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "ecoverimageurl",
				"title"			=> "Ecover Image URL",
				"labelwidth"	=> "165px",
				"type"			=> "text",
				"class"			=> "activeecover",
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
				"title"			=> "Javascript Pop Message (Squeeze)",
				"description"	=> "If you are using a template with an on-click warning message, set the text here. Include link to tutorial here on how to setup Javascript Pop message",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
				
			array(
				"name"			=> "js1message",
				"title"			=> "Javascript Warning Popup Message",
				"type"			=> "text",
				"separator"		=> "separator",	
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
				"title"			=> "Social Media Settings (Squeeze)",
				"description"	=> "Setup the social media share bar on this page",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
			
			
            array(
				"name"			=> "activatesocialmedia",
				"title"			=> "Activate Social Media",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activesqsocialmedia",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "socialmediacalltoactiontext",
				"title"			=> "Social Media Call To Action Text",
				"description"	=> "",
				"type"			=> "ctatextlist",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqsocialmedia",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "twitterurl",
				"title"			=> "Twitter Share Text",
				"description"	=> "",
				"type"			=> "text",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle activesqsocialmedia",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "facebookshare",
				"title"			=> "Facebook Share Icon",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activesqsocialmedia",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "socialmeduabutton",
				"title"			=> "Social Media Button Select",
				"description"	=> "",
				"type"			=> "socialmediabuttonlist",
				"class"			=> "twotdstyle activesqsocialmedia",
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
				"title"			=> "Comments Settings (Squeeze)",
				"description"	=> "Setup comments on your squeeze page with these options",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
			
            array(
				"name"			=> "activatecomments",
				"title"			=> "Activate Comments",
				"description"	=> "",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "activesqcomments",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "disabledatewpcomments",
				"title"			=> "Disable Dates On WP Comments",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activesqcomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showcommentcalltoaction",
				"title"			=> "Show Comments Call To Action Text",
				"description"	=> "",
				"type"			=> "checkbox",
				"class"			=> "twotdstyle activesqcomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "commentscalltoactiontext",
				"title"			=> "Comments Call To Action Text",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activesqcomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "commentssystem",
				"title"			=> "Comments System",
				"description"	=> "",
				"type"			=> "commentssystem",
				"class"			=> "twotdstyle activesqcomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "commentsorder",
				"title"			=> "Comments Order",
				"description"	=> "rearrange the order of which comments block comes first on the page",
				"type"			=> "commentsorder",
				"class"			=> "twotdstyle activesqcomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "fbcommentnum",
				"title"			=> "Facebook Number of Comments Per Page",
				"description"	=> "",
				"type"			=> "fbcommentnum",
				"class"			=> "twotdstyle activesqcomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "wpcommentstitle",
				"title"			=> "Wordpress Comments Title",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle activesqcomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
     
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "To use Facebook comments system, you will need a facebook API key. <a href='http://developers.facebook.com/setup/' target='_blank'>Click here to your facebook APP ID.</a> You must enter your Facebook APP ID in the OptimizePress general settings <a href='admin.php?page=OptimizePress-options'>here</a>",
				"type"			=> "caption",
				"class"			=> "twotdstyle activesqcomments",
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
				"title"			=> "Disclaimer (Squeeze)",
				"description"	=> "Use the option below to disable the disclaimer if you have set one in your main options page",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
			
            array(
				"name"			=> "disabledisclaimermsg",
				"title"			=> "Disable Disclaimer Text",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"childdivclass"	=> "disabledisclaimermsg",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
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
				"title"			=> "Misc. Settings (Squeeze)",
				"description"	=> "Options that don't fit in other categories will be placed here",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"class"			=> "activesqheader",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
				
			),
			
			 array(
				"name"			=> "showpdficont10",
				"title"			=> "PDF icon on Template 10",
				"description"	=> "(Show the PDF icon on Template 10)",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			
			 array(
				"name"			=> "hidedlbutton10",
				"title"			=> "Download Button on Template 10",
				"description"	=> "(Hide download button on Template 10)",
				"type"			=> "checkbox",
				"labelwidth"	=> "165px",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",				
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
		function myCustomFields() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
            add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultCustomFields( $type, $context, $post ) {
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
		function createCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-custom-fields', 'Squeeze Page Options', array( &$this, 'displayCustomFields' ), 'page', 'normal', 'high' );
				//add_meta_box( 'my-custom-fields', 'Squeeze Page Customization Options', array( &$this, 'displayCustomFields' ), 'post', 'normal', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayCustomFields() {
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
				#my-custom-fields .form-wrap fieldset { border:1px solid #E1E1E1;margin:0 12px 20px;padding:10px 20px 0 5px;width:350px; }
				#my-custom-fields .form-wrap legend { background-color:#F1F1F1;border:1px solid #E1E1E1;font-size:110%;font-weight:bold;margin-left:20px;padding:4px 8px;text-align:center;width:260px; }
				#my-custom-fields .form-wrap fieldset label { padding-top:7px; float:left;padding-top:7px;width:165px; }
				#my-custom-fields .form-wrap fieldset div.separator { 
					border-top:none;
					clear:both;
					margin-bottom:10px;
					margin-top:0;
					padding-bottom:2px;
					padding-top:0;
					position:relative;
					z-index:1;
				 }
				#my-custom-fields .form-wrap fieldset .optinbelow textarea { width:420px; }
				#my-custom-fields div.form-field input.formurl[type="text"] { width:220px; }
				#my-custom-fields .form-field input[type=text].color { width:85px; margin-right:5px; } 
				#my-custom-fields .form-field input[type=text].color2 { width:85px; margin-right:5px; } 
				#my-custom-fields .form-wrap div.color { float:left;margin:8px 8px -1px;width:31%;padding-bottom:10px; } 
				#my-custom-fields .form-wrap div.color2 { float:left;margin:8px 8px -1px;width:25%;padding-bottom:10px; } 
				#my-custom-fields .form-wrap div.font { float:right;margin:8px 8px -1px;width:auto;padding-bottom:10px; } 
				#my-custom-fields .form-table th, .form-wrap label { clear:both; font-size:11px; }
				#my-custom-fields .form-wrap .form-field { margin:8px 8px -1px;padding:0 0 8px; }
				#my-custom-fields .form-wrap div.separator { border-top:1px dotted #CCCCCC;clear:both;margin-top:0;padding-top:10px;padding-bottom:10px;position:relative;z-index:999;margin-bottom:-1px; }
				#my-custom-fields .form-field input[type=text] { width: 210px; }
				#my-custom-fields .form-wrap div.noborderbottom { margin-bottom:-1px; padding-bottom:10px; }
				#my-custom-fields div.form-wrap div.optinbelow { float:left;margin:8px 0 -1px 8px;width:420px;padding-bottom:10px; } 
				#my-custom-fields #poststuff .inside, #poststuff .inside p { clear:both; font-style:normal; }
				#my-custom-fields .form-wrap div.formurl { float:left;margin:8px 8px -1px;width:92%;padding-bottom:10px; } 
				#my-custom-fields .form-field input[type=text].optinbelow { width:112px; margin-right:5px; } 
 				#my-custom-fields .form-field input[type=text].formurl { width:210px; margin-right:5px; } 
				#my-custom-fields .form-wrap .optinbelow textarea { width:420px; margin-left:5px; vertical-align:baseline; } 
				#my-custom-fields .inside .form-wrap .extrawebformfield { padding:0; margin:5px; }
				#my-custom-fields .inside .form-wrap .extrawebformfield p { color:#333333; font-size:11px; font-style:normal; width:165px; }
				#my-custom-fields .inside .form-wrap .extrawebformfield input[type=text] { width:112px; padding:3px; margin:1px 15px 1px 1px; }
				div.op-menu-page-group-header > ins {
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
				div.op-menu-page-group-header {
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
					padding: 20px;
					font-size: 1.2em;
				}
				<?php global $shortname;
				$headersitewidecss = get_option($shortname.'_general_settings'); ?>
				<?php if ( $headersitewidecss['activate_header_sitewide'] != "" && !isset ( $_GET['post'] ) ) { ?>
					.activesqheader { display:block; }
				<?php } else {
					if ( get_post_meta( $post->ID, $this->prefix . "showheaderopt", true ) != "yes" ) { ?>.activesqheader { display:none; }<?php } ?>
				<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateheadertext", true ) != "yes" ) { ?>.activesqheadertext { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatepreheadline", true ) != "yes" ) { ?>.activepreheadline { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateheadline", true ) != "yes" ) { ?>.activeheadline { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatesubheadline", true ) != "yes" ) { ?>.activesubheadline { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatevideo", true ) != "yes" ) { ?>.activesqueezevideo { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateheadlinebelowvideo", true ) != "yes" ) { ?>.activeheadlinebelowvideo { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatesidebararrow", true ) != "yes" ) { ?>.activesidebararrow { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatesidebarheadline", true ) != "yes" ) { ?>.activesidebarheadline { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatetplcolor", true ) != "yes" ) { ?>.activetpl { display:none; }<?php } ?>
				
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatesidebartext", true ) != "yes" ) { ?>.activesidebartext { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatespamnotice", true ) != "yes" ) { ?>.activespamnotice { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatetplcolor", true ) != "yes" ) { ?>.activetplcolor { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "showextrawebformfield", true ) != "yes" ) { ?>.extrawebformfield { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatecustomoptinform", true ) != "yes" ) { ?>.customoptinform { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activateecover", true ) != "yes" ) { ?>.activeecover { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatesocialmedia", true ) != "yes" ) { ?>.activesqsocialmedia { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatecomments", true ) != "yes" ) { ?>.activesqcomments { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "showheaderhyperlink", true ) != "yes" ) { ?>.showsqheaderhyperlink { display:none; }<?php } ?>
				<?php if ( get_post_meta( $post->ID, $this->prefix . "shownavbar", true ) != "yes" ) { ?>.activesqnavbar { display:none; }<?php } ?>
               </style>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/colorpicker/jscolor/jscolor.js"></script>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/admin/optin.js"></script>		
                <script type="text/javascript">
                jQuery(document).ready(function() {
					jQuery(".op-menu-page-group-header").click(function(){
						var sign = (jQuery("ins", this).html() == "+") ? "-" : "+";
						jQuery("ins", this).html(sign);
						jQuery(this).next("fieldset").toggle();
					}); 
                    enhanceForm();
					jQuery("#_optthemes_overallfont").change(function () {
						  var str = "";
						  var preheadlinefont = "";
						  var headlinefont = "";
						  var subheadlinefont = "";
						  var headlinebelowvideofont = "";
						  var sidebarheadlinefont = "";
						  jQuery("select#_optthemes_overallfont option:selected").each(function () {
								str += jQuery(this).text();
								switch(str)
								{
									case "Arial": 
										preheadlinefont = "Arial";
										headlinefont = "Arial";
										subheadlinefont = "Arial";
										headlinebelowvideofont = "Arial";
										sidebarheadlinefont = "Arial";									
									break;
									case "Impact": 
										preheadlinefont = "Arial";
										headlinefont = "Impact";
										subheadlinefont = "Arial";
										headlinebelowvideofont = "Impact";
										sidebarheadlinefont = "Arial";									
									break;
									case "Georgia": 
										preheadlinefont = "Georgia";
										headlinefont = "Georgia";
										subheadlinefont = "Georgia";
										headlinebelowvideofont = "Georgia";
										sidebarheadlinefont = "Georgia";									
									break;
									case "Vegur": 
										preheadlinefont = "Vegur";
										headlinefont = "Vegur";
										subheadlinefont = "Vegur";
										headlinebelowvideofont = "Vegur";
										sidebarheadlinefont = "Vegur";									
									break;
									default: 
										preheadlinefont = "<?php htmlspecialchars(get_post_meta($post->ID,"_optthemes_preheadlinefont",true)); ?>";
										headlinefont = "<?php htmlspecialchars(get_post_meta($post->ID,"_optthemes_preheadlinefont",true)); ?>";
										subheadlinefont = "<?php htmlspecialchars(get_post_meta($post->ID,"_optthemes_preheadlinefont",true)); ?>";
										headlinebelowvideofont = "<?php htmlspecialchars(get_post_meta($post->ID,"_optthemes_preheadlinefont",true)); ?>";
										sidebarheadlinefont = "<?php htmlspecialchars(get_post_meta($post->ID,"_optthemes_preheadlinefont",true)); ?>";							
								}
							  });
						  jQuery("select#_optthemes_preheadlinefont").val(preheadlinefont);
						  jQuery("select#_optthemes_headlinefont").val(headlinefont);
						  jQuery("select#_optthemes_subheadlinefont").val(subheadlinefont);
						  jQuery("select#_optthemes_headlinebelowvideofont").val(headlinebelowvideofont);
						  jQuery("select#_optthemes_sidebarheadlinefont").val(sidebarheadlinefont);
						})
						//.change();
					
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
                </script>
				<?php
				$tooltips = '';
				$videotips = '';
                wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
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
                    	<?php $tooltips .= ( $customField[ 'help' ] ) ? '				jQuery("#'.$customField['name'].'_help").easyTooltip();' : ''; ?>
                    	<?php $videotips .= ( $customField[ 'videotxt' ] ) ? '				jQuery("#'.$customField['name'].'_video").easyTooltip();' : ''; ?>
						<?php $fieldsetwidth = ($customField[ 'width' ]) ? $customField[ 'width' ] : '350px'; ?>
                        <?php echo ($customField['type']=="fieldset") ? '<div class="op-menu-page-group-header" style="z-index: 100; margin-top: 10px; margin-left: 12px;width:455px;"><ins>+</ins>'.$customField['title'].'</div>' : ''; ?>
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
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="float:left;width:165px;;"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo ($customField[ 'childdivclass' ]) ? '<input onclick="show_hide_childdivs(\''.$customField[ 'childdivclass' ].'\');"' : '<input ';
									echo 'type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
										if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
											echo ' checked="checked"';
										else if ( $headersitewide['activate_header_sitewide'] != "" && !isset ( $_GET['post'] ) ) 
											echo ' checked="checked"';
										echo '" style="width: auto; height: 21px; vertical-align: middle;" /> &nbsp;'.$customField[ 'description' ];
										echo '<div style="clear:both;"></div>';
									break;
								}
								case "checkbox": {
									// Checkbox
									$labelwidth = ($customField[ 'labelwidth' ]) ? $customField[ 'labelwidth' ] : 'auto';
									if($customField['class']=='optinbelow' || $customField['class']=='formurl optinbelow') { 
									// check if user has selected value for this
									echo '<input onclick="show_hide_childdivs(\''.$customField[ 'childdivclass' ].'\');" type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
										if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
											echo ' checked="checked"';
										if ( $customField['default_value'] == 1 && !isset ( $_GET['post'] ) )
											echo ' checked="checked"';
										echo '" style="width: auto; height: 21px; vertical-align: middle;" />';
										echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
										echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
										if ( $customField[ 'description' ] ) echo ' '.$customField[ 'description' ];
									}
									else if($customField['class']=='twotdstyle' || $customField['class']=='twotdstyle activesqueezevideo' || $customField['class']=='twotdstyle activesqheader' || $customField['class']=='twotdstyle activesqsocialmedia' || $customField['class']=='twotdstyle activesqcomments') {
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="float:left;width:165px;;"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo ($customField[ 'childdivclass' ]) ? '<input onclick="show_hide_childdivs(\''.$customField[ 'childdivclass' ].'\');"' : '<input ';
									echo 'type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
										if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
											echo ' checked="checked"';
										if ( $customField['default_value'] == 1 && !isset ( $_GET['post'] ) )
											echo ' checked="checked"';
										echo '" style="width: auto; height: 21px; vertical-align: middle;" /> &nbsp;'.$customField[ 'description' ];
										echo '<div style="clear:both;"></div>';
									}
									else {
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .' style="width:'.$labelwidth.';"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<input onclick="show_hide_childdivs(\''.$customField[ 'childdivclass' ].'\');" type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									}
									break;
								}
                                case "file": {
									// Text area
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
 									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                   if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<input type="file" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"';
                                    if($this->prefix . $customField[ 'name' ]=="_optthemes_videographic"){
                                        echo '<label>Uploaded Images:</label><img style="max-width:433px;" src="'.get_post_meta( $post->ID, '_optthemes_images', true ).'"  style="max-width:735px;">';
                                   }
									break;
								}
								case 'upload':
								echo '<div id="'.$this->prefix . $customField[ 'name' ].'_upload-field" class="fieldsection">';							
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="helpsales" id="' . $customField[ 'name' ] .'_helpsales" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? '  <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="videosales" id="' . $customField[ 'name' ] .'_videosales" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<input value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" class="field_txt uploaded_url" style="width:215px;" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"><br><br><span class="image_upload_button button " id="'.$this->prefix . $customField[ 'name' ].'_upload-btn">Upload Image</span>';
									echo '<input type="hidden" class="ajax_action_url" value="'.admin_url("admin-ajax.php").'" name="'.$this->prefix . $customField[ 'name' ].'_action">';
									
								echo '</div>';
								echo '<br />';
								break;		
								case "menuheader": {
									echo '<div class="op-menu-page-group-header" style="z-index: 100; margin-top: 0pt; margin-left: 12px;"><ins>+</ins>Security Encryption Key</div>';	
									break;						
								}
								case "textarea": {
									// Text area
									if($customField['class']=='optinbelow' || $customField['class']=='formurl optinbelow') { 
                                    if ( $customField[ 'description' ] ) echo $customField[ 'description' ] . ' ';
									echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									}
									else {
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									}
									break;
								}
								case "ctatextlist": {
									$array = array('1'=>'Share This Video!', '2'=>'Pass This On!', '3'=>'Share The Love!', '4'=>'SHARE! Share This Now!', '5'=>'SHARE! Share This Video!', '6'=>'SHARE! Pass This On!', '7'=>'Share This Now!');
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;max-width:425px;">';
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
								case "socialmediabuttonlist": {
									$buttons = array("Social Media Set 1" => "share1","Social Media Set 2" => "share2","Social Media Set 3" => "share3","Social Media Set 4" => "share4","Social Media Set 5" => "share5");
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
								case "fontweight": {
									$arrays = array("normal"=>"normal", "bold"=>"bold");
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($arrays as $i => $value) {
										$array_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID, $this->prefix.$customField['name'],true))=="" ) {
											$array_checked = ( ( $customField[ 'default_value' ] ) == $i ) ?  'selected="selected"' : '';
										}
										echo '<option '.$array_checked.' '.$array_selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;	
								}
								case "fontstyle": {
									$arrays = array("normal"=>"normal", "italic"=>"italic");
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($arrays as $i => $value) {
										$array_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$array_selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;	
								}
								case "letterspacing": {
									$arrays = array("-1px"=>"-1px", "0px"=>"0px");
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($arrays as $i => $value) {
										$array_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$array_selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;	
								}
								case "navbarposition": {
									$array = array('Above Header','Below Header');
									// Dropdown
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
									// Dropdown
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
									// Dropdown
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "playercolor": {
									$array = array('light'=>'light','dark'=>'dark');
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($array as $i => $value) {
										$selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										echo '<option '.$selected.' value="'.$value.'">'.ucfirst($value).'</option>';									
									}
									echo '</select>';
									break;
								}
								case "mainbodytextfont": {
									$mainbodytextfonts_array = array('Arial, Helvetica, Sans-serif','Verdana, Geneva, Sans-serif','Georgia, Times New Roman, Times, Serif','Lucida Grande, Lucida Sans Unicode, Sans-serif');
									// Dropdown
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
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
								case "overalllist": {
									$arial = (htmlspecialchars(get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="Arial") ? 'selected="selected"':'';
									$impact = (htmlspecialchars(get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="Impact") ? 'selected="selected"': '';
									$georgia = (htmlspecialchars(get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="Georgia") ? 'selected="selected"':'';
									$vegur = (htmlspecialchars(get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="Vegur") ? 'selected="selected"':'';
									// Dropdown
									$labelwidth = ($customField[ 'labelwidth' ]) ? $customField[ 'labelwidth' ] : 'auto';
									echo '<label style="float:left;width:'.$labelwidth.'" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									echo '<option selected="selected" value="">Select font</option>';
									echo '<option '.$arial.' value="Arial">Arial</option>';
									echo '	<option '.$impact.' value="Impact">Impact</option>';
									echo '	<option '.$georgia.' value="Georgia">Georgia</option>';
									echo '	<option '.$vegur.' value="Vegur">Vegur</option>';
									echo '</select>';
									break;
								}
								case "bulletstyle": {									
									$bulletstyle_array = array('style1'=>'Black Arrow Bullet', 'style2'=>'Green Plus Bullet', 'style3'=>'Green Tick Bullet', 'style4'=>'Black Tick Bullet', 'style5'=>'Red Arrow Bullet', 'style6'=>'Green Tick 2 Bullet', 'style7'=>'Green Plus 2 Bullet', 'style8'=>'Red Tick Bullet');
									// Dropdown
									$labelwidth = ($customField[ 'labelwidth' ]) ? $customField[ 'labelwidth' ] : 'auto';
									echo '<label style="float:left;width:'.$labelwidth.';" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:auto;">';
									foreach ($bulletstyle_array as $key => $value) {
										$bulletstyle_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $key ) ?  'selected="selected"' : '';
										echo '<option '.$bulletstyle_selected.' value="'.$key.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "sidebarwidgetlist": {
									$array = array("No Sidebar" => "0","Sidebar 1" => "1","Sidebar 2" => "2","Sidebar 3" => "3","Sidebar 4" => "4","Sidebar 5" => "5");
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
								case "align_list": {
									$fonts_array = array('Center'=>'center','Left'=>'left');
									echo '<label style="float:left;width:165px;" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo '</label>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:100px;">';
									foreach ($fonts_array as $i => $value) {
										$font_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $value ) ?  'selected="selected"' : '';
										if( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true))=="" ) {
											$font_checked = ( ( $customField[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
										}
										echo '<option '.$font_selected.' '.$font_checked.' value="'.$value.'">'.$i.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "headerfontlist": {
									$fonts_array = array('Arial','Impact','Georgia','Tahoma','Vegur');
									$fonts_array[] = "Hand of Sean";
									$fonts_array[] = "Arial Narrow";
									// Dropdown
									$labelwidth = ($customField[ 'labelwidth' ]) ? $customField[ 'labelwidth' ] : '165px';									
									echo '<label style="float:left;width:'.$labelwidth.'" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
								case "fontlist": {
									$fonts_array = array('Arial','Impact','Georgia','Tahoma','Vegur');
									if($this->prefix . $customField[ 'name' ] == "_optthemes_sidebarheadlinefont") {
										$fonts_array[] = "Hand of Sean";
										$fonts_array[] = "Arial Narrow";
									}
									// Dropdown
									$labelwidth = ($customField[ 'labelwidth' ]) ? $customField[ 'labelwidth' ] : '165px';									
									echo '<label style="float:left;width:'.$labelwidth.'" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
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
								case "buttonlist": {
									// Dropdown
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									$buttons = array("Orange Button Style" => " ", " - Add To Cart" => "orange_addtocart", " - Download Now" => "orange_downloadnow", " - Get Access Now!" => "orange_getaccessnow", " - Get Instant Access" => "orange_getinstantaccess", " - YES! Let Me in Early" => "orange_letmeinearly", " - Send Me The Video" => "orange_sendmethevideo", " - Show Me The Video" => "orange_showmethevideo", " - Sign Up Now!" => "orange_signupnow", "-------------------------------" => " ", "Red Button Style" => " ", " - Add To Cart " => "red_addtocart", " - Download Now " => "red_downloadnow", " - Get Access Now! " => "red_getaccessnow", " - Get Instant Access " => "red_getinstantaccess", " - YES! Let Me in Early " => "red_letmeinearly", " - Send Me The Video " => "red_sendmethevideo", " - Show Me The Video " => "red_showmethevideo", " - Sign Up Now! " => "red_signupnow", "------------------------------- " => " ", "Yellow Button Style" => " ", " - Add To Cart  " => "yellow_addtocart", " - Download Now  " => "yellow_downloadnow", " - Get Access Now!  " => "yellow_getaccessnow", " - Get Instant Access  " => "yellow_getinstantaccess", " - YES! Let Me in Early  " => "yellow_letmeinearly", " - Send Me The Video  " => "yellow_sendmethevideo", " - Show Me The Video  " => "yellow_showmethevideo", " - Sign Up Now!  " => "yellow_signupnow");
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
								case "sidebararrowlist": {
									$sidebararrow_array = array('blue-handdrawn' => 'Hand drawn arrows Blue','red-handdrawn' => 'Hand drawn arrows Red','red-animated' => 'Animated Red Arrow','red-static' => 'Static Red Arrow', 'black-sketch' => 'Black Sketch Arrow' );
									// Dropdown
									$labelwidth = ($customField[ 'labelwidth' ]) ? $customField[ 'labelwidth' ] : '165px';									
									echo '<label style="float:left;width:'.$labelwidth.'" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    echo '</label>';
									//if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
									echo '<select id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" style="width:210px;">';
									foreach ($sidebararrow_array as $i => $value) {
										$arrow_selected = ( htmlspecialchars( get_post_meta($post->ID,$this->prefix.$customField['name'],true) ) == $i ) ?  'selected="selected"' : '';
										echo '<option '.$arrow_selected.' value="'.$i.'">'.$value.'</option>';									
									}
									echo '</select>';
									break;
								}
								case "separator": {
									echo '<div style="display:none" id="popup_domination_hdn_div"></div>';
									echo '<div style="display:none" id="popup_domination_hdn_div2"></div>';
									break;	
								}
								case "caption": {
									if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
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
								case "hidden": {
									// Hidden field
									echo '<input class="'.$customField['class'].'" type="hidden" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;	
								}
								case "title": {
									// Title/description
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									break;	
								}
								case "extrafieldIDtext": {
                                    if ( $customField[ 'description' ] ) echo '<p style="float:left;">' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<input style="float:left;width:120px;" class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									break;	
								}
								case "extrafieldvaluetext": {
                                    if ( $customField[ 'description' ] ) echo '<p style="float:left;">' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<input style="float:left;width:240px;" class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '<br style="clear:both;" />';
									break;	
								}
								default: {
									if($customField['class']=='color' || $customField['class']=='color activepreheadline' || $customField['class']=='color activeheadline' || $customField['class']=='color activesubheadline' || $customField['class']=='color activesqheadertext' || $customField['class']=='color activeheadlinebelowvideo' || $customField['class']=='color activesidebarheadline' || $customField['class']=='color activetpl' || $customField['class']=='color activetplcolor') { 
									// check if user has selected value for this
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];
									$labelwidth = ($customField[ 'labelwidth' ]) ? $customField[ 'labelwidth' ] : '165px';									
									echo '<label style="float:left;width:'.$labelwidth.'" for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    echo '</label>';
									echo '<input class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . $mycurrentvalue . '" />';


									//echo '<input class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="'. $mycurrentvalue .'" />';
									//echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									//echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									//if ( $customField[ 'description' ] ) echo ''.$customField[ 'description' ];
									}
									else if($customField['class']=='optinbelow' || $customField['class']=='formurl optinbelow') { 
									// check if user has selected value for this
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									if ( $customField[ 'description' ] ) echo '<div style="width: 165px; float: left; padding-top: 7px;">'.$customField[ 'description' ].'</div>';
									echo ' <input class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="'. $mycurrentvalue .'" />';
									}
									else if($customField['class']=='optinbelow clear' || $customField['class']=='formurl optinbelow clear') { 
									// check if user has selected value for this
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
									echo ' <input class="'.$customField['class'].'" type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="'. $mycurrentvalue .'" />';
									if ( $customField[ 'description' ] ) echo '<div style="width: 165px; float: left; padding-top: 7px;">'.$customField[ 'description' ].'</div>';
									}
									else {
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';
                                    echo '</label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
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
				} 	echo '<div id="popup_domination_hdn_div2" style="display: none;"></div>'; ?>
            <script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(document).ready(function() {
				
					//When page loads...
					jQuery("#my-custom-fields .tab_content").hide(); //Hide all content
					jQuery("#my-custom-fields ul.tabs li:first-child").addClass("active").show(); //Activate first tab
					jQuery("#my-custom-fields .tab_content:first-child").show(); //Show first tab content
				
					//On Click Event
					jQuery("#my-custom-fields ul.tabs li").click(function() {
				
						jQuery("#my-custom-fields ul.tabs li").removeClass("active"); //Remove any "active" class
						jQuery(this).addClass("active"); //Add "active" class to selected tab
						jQuery("#my-custom-fields .tab_content").hide(); //Hide all tab content
				
						var activeTab = jQuery(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
						jQuery(activeTab).fadeIn(); //Fade in the active ID content
						return false;
					});
				
				});
				jQuery("span.help").each(function(){
					jQuery(this).html("<a rel=\"facebox\" href=\"#"+str_replace("_help", "", jQuery(this).attr("id") )+"\"><img src=\"<?php echo $templatedir; ?>/admin/scripts/images/op-help-icon.png\" border=\"0\" style=\"width:16px;height:16px;vertical-align:middle;\"></a>"); // load help icons
				});
				jQuery("span.video").each(function(){
					jQuery(this).html("<span rel=\"facebox\" href=\"#"+str_replace("_video", "", jQuery(this).attr("id") )+"\"><img src=\"<?php echo $templatedir; ?>/admin/scripts/images/tutorial-icon.png\" border=\"0\" style=\"width:16px;height:16px;vertical-align:middle;\"></span>"); // load help icons
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
		function saveCustomFields( $post_id, $post ) {
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

			if ( !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
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
        	$myupload->set_File('_optthemes_videographic');
            $myimage = 'images';
            $imagename = '';
            if($_FILES['_optthemes_videographic']['name']!=""){
            	if($myupload->is_ImageFile()==true){
            		$imagename = $myupload->do_UploadFile();
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . $myimage, $dir.'/'.$imagename ) : '';
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . $myimage.'_thumbs', $dir.'/thumbs/'.$imagename ) : '';
                    ($this->i==1) ? update_post_meta( $post_id, $this->prefix . $myimage.'_normal', $dir.'/normal/'.$imagename ) : '';
            	}
            }else{
                if ( get_post_meta( $post->ID, $this->prefix . $myimage, true ) == ""){
                    update_post_meta( $post_id, $this->prefix . $myimage, $dir.'/images/video1.jpg' );
                }
            } $this->i++;
	} // End Class
  }
} // End if class exists statement

?>