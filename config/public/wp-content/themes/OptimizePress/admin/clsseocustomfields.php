<?php
    if ( !class_exists('mySeoCustomFields') ) {

	class mySeoCustomFields {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = '_seo_';
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/
		var $customFields =	array(
		  array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "<span style='font-size:15px;font-style:normal;line-height:19px;'>Before setting up any of the SEO on-page options below, please check all the settings in the OptimizePress <a href='admin.php?page=OptimizePress-seo' target='_blank''>SEO Options panel</a> are correct, and click <strong>'Save Changes'</strong> to activate the SEO system.  Do not miss this step or your SEO options may not function correctly",
				"type"			=> "note",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
		
            array(
				"name"			=> "",
				"title"			=> "SEO Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "disabledseo",
				"title"			=> "Disable OptimizePress SEO for this post/page.",
				"description"	=> "",
				"type"			=> "checkbox",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "customtitletag",
				"title"			=> "Custom Title Tag",
				"description"	=> "Use this to override your theme settings and enter your own title tag for SEO purposes",
				"type"			=> "text",
				"noborderbottom"=> "noborderbottom",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "customtitletag",
				"title"			=> "Custom Title Tag",
				"description"	=> "Use this to override your theme settings and enter your own title tag for SEO purposes",
				"type"			=> "text",
				"noborderbottom"=> "noborderbottom",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "metadescription",
				"title"			=> "Meta Description",
				"description"	=> "Enter the description that will be seen in the search engines for your page.  Ensure you include your keyword here",
				"type"			=> "textarea",
				"separator"		=> "separator",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "metadescription",
				"title"			=> "Meta Description",
				"description"	=> "Enter the description that will be seen in the search engines for your page.  Ensure you include your keyword here",
				"type"			=> "textarea",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "metakeywords",
				"title"			=> "Meta Keywords",
				"description"	=> "Enter the keywords for your page here.  Enter each keyword followed by a comma - ,",
				"type"			=> "text",
				"separator"		=> "separator",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_posts"
			),
			array(
				"name"			=> "metakeywords",
				"title"			=> "Meta Keywords",
				"description"	=> "Enter the keywords for your page here.  Enter each keyword followed by a comma - ,",
				"type"			=> "text",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_posts"
			),
			array(
				"name"			=> "1",
				"title"			=> "add a <b>noindex</b> robot meta tag to this page",
				"description"	=> "",
				"type"			=> "checkbox",
				"help"			=> "Use this option to stop search engines indexing your page",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "1",
				"title"			=> "add a <b>noindex</b> robot meta tag to this page",
				"description"	=> "",
				"type"			=> "checkbox",
				"separator"		=> "separator",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_posts"
			),
            array(
				"name"			=> "2",
				"title"			=> "add a <b>nofollow</b> robot meta tag to this page",
				"description"	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "2",
				"title"			=> "add a <b>nofollow</b> robot meta tag to this page",
				"description"	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_posts"
			),
            array(
				"name"			=> "3",
				"title"			=> "add a <b>noarchive</b> robot meta tag to this page",
				"description"	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "3",
				"title"			=> "add a <b>noarchive</b> robot meta tag to this page",
				"description"	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_posts"
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
				"title"			=> "Exit Popup Optin Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "exitpopup",
				"title"			=> "Enable Exit PopUp?",
				"description"	=> "",
				"type"			=> "checkbox",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "poph1",
				"title"			=> "Headline",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"default_value"	=> "Get Your Free Report Now!",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "popmsgaboveform",
				"title"			=> "Content Above Form",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "twotdstyle",
				"default_value"	=> "Enter your name and email below for instant access to your free report...",
				"separator"		=> "separator",
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
				"childdivclass"	=> "extraseoformfield",
				"class"			=> "optinbelow",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "extra1ID",
				"title"			=> "Field 1 Input ID",
				"description"	=> "Field 1 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra1value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra2ID",
				"title"			=> "Field 2 Input ID",
				"description"	=> "Field 2 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra2value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra3ID",
				"title"			=> "Field 3 Input ID",
				"description"	=> "Field 3 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra3value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra4ID",
				"title"			=> "Field 4 Input ID",
				"description"	=> "Field 4 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra4value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra5ID",
				"title"			=> "Field 5 Input ID",
				"description"	=> "Field 5 Input ID",
				"type"			=> "extrafieldIDtext",
				"class"			=> "extraseoformfield",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "extra5value",
				"title"			=> "Input Message",
				"description"	=> "Input Message",
				"type"			=> "extrafieldvaluetext",
				"class"			=> "extraseoformfield",
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
				"type"			=> "title",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "buttonselect",
				"title"			=> "Select Squeeze Page Button",
				"description"	=> "<a href=../wp-content/themes/OptimizePress/lib/admin/media-upload-sq_button.php?fld=_seo_buttonselect&TB_iframe=1&height=350&width=640& class='thickbox'>Select Image OR Upload New</a> <br>Select the button color and text for your squeeze page. For examples please refer to the support guide ",
				"type"			=> "text",
				"class"			=> "separator",
				"default_value"	=> "test",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "popmsgbelowform",
				"title"			=> "Content Below Form",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "twotdstyle",
				"default_value"	=> "Your information is 100% secure with us and will never be shared",
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
				"title"			=> "Exit Redirect Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "exitredirect",
				"title"			=> "Activate Exit Redirect",
				"description"	=> "",
				"type"			=> "checkbox",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "exitredirpopmsg",
				"title"			=> "Exit Redirect Pop Message",
				"description"	=> "(Note this may not show on some browsers)",
				"type"			=> "textarea",
				"class"			=> "twotdstyle",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "exitredirurl",
				"title"			=> "Exit Redirect URL",
				"description"	=> "",
				"type"			=> "text",
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
				"title"			=> "Tracking Codes & Javascript",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "headergooglewebcode",
				"title"			=> "Header Tracking & Javascript Codes",
				"description"	=> "Place any tracking codes and javascript here that need to be placed before the &lt;/head&gt; tag.  You should enter any Google Website Optimizer <strong><span style='color:#CC6600'>Control and Tracking</span></strong> script codes here.",
				"type"			=> "textarea",
				"separator"		=> "separator",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_posts"
			),
			array(
				"name"			=> "headergooglewebcode",
				"title"			=> "Header Tracking & Javascript Codes",
				"description"	=> "Place any tracking codes and javascript here that need to be placed before the &lt;/head&gt; tag.  You should enter any Google Website Optimizer <strong><span style='color:#CC6600'>Control and Tracking</span></strong> script codes here. ",
				"type"			=> "textarea",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_posts"
			),
			array(
				"name"			=> "footertrackingjscode",
				"title"			=> "Footer Tracking & Javascript Codes",
				"description"	=> "Place any tracking codes and javascript here that need to be placed before the &lt;/body&gt; tag",
				"type"			=> "textarea",
				"separator"		=> "separator",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "activategoogleweboptimizermv",
				"title"			=> "Activate Google Website Optimizer Multivariate Testing",
				"description"	=> "",
				
				"type"			=> "checkbox",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_posts"
			),			
             array(
				"name"			=> "activategoogleweboptimizermv",
				"title"			=> "Activate Google Website Optimizer Multivariate Testing",
				"help"			=> "<strong>Important:</strong> ONLY activate this option if you are doing multivariate testing.  If you are using A/B testing, do not activate this option or your pages will not validate",
				"description"	=> "",
				"type"			=> "checkbox",
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
				"title"			=> "Redirect Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "redirect_url",
				"title"			=> "Redirect URL",
				"description"	=> "Enter the url for the page you wish to redirect.",
				"type"			=> "text",
				"separator"		=> "separator",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "redirect_url",
				"title"			=> "Redirect URL",
				"description"	=> "If you are using the Redirect template, you can set the URL to redirect this page to here",
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
				"title"			=> "Custom CSS Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "onpagecustomcss",
				"title"			=> "Custom CSS",
				"description"	=> "Add any css code you want to add to this page here",
				"type"			=> "textarea",
				"separator"		=> "separator",
				"scope"			=>	array( "post" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "onpagecustomcss",
				"title"			=> "Custom CSS",
				"description"	=> "Add any css code you want to add to this page here",
				"type"			=> "textarea",
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
			)


		);
		/**
		* PHP 4 Compatible Constructor
		*/
		function mySeoCustomFields() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createSeoCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveSeoCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultSeoCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultSeoCustomFields( $type, $context, $post ) {
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
		function createSeoCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-seo-custom-fields', 'Page SEO & Optimization Options', array( &$this, 'displaySeoCustomFields' ), 'page', 'normal', 'high' );
				add_meta_box( 'my-seo-custom-fields', 'Page SEO & Optimization Options', array( &$this, 'displaySeoCustomFields' ), 'post', 'normal', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displaySeoCustomFields() {
			global $post;
            $templatedir = get_bloginfo('template_directory');
			?>
			<div class="form-wrap">
			
			<script type="text/javascript" src="<?php echo $templatedir; ?>/admin/scripts/easyTooltip.js"></script>
            <link rel="stylesheet" href="<?php echo $templatedir; ?>/admin/scripts/css/facebox.css" type="text/css" />
            <link rel="stylesheet" href="<?php echo $templatedir; ?>/admin/scripts/css/stylepanel.css" type="text/css" />
            <script src="<?php echo $templatedir; ?>/admin/scripts/facebox.js" type="text/javascript"></script>
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
				div.op-seo-menu-page-group-header > ins {
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
				div.op-seo-menu-page-group-header {
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
				#my-seo-custom-fields .inside .form-wrap .extraseoformfield { margin:5px; }
				#my-seo-custom-fields .inside .form-wrap .extraseoformfield p { 
					color:#333333;
					font-size:11px;
					font-style:normal;
					width:165px;
				}
				#my-seo-custom-fields div.form-wrap div.optinbelow { float:left;margin:8px 0 -1px 8px;width:420px;padding-bottom:10px; } 
				#my-seo-custom-fields div.form-wrap .optinbelow textarea { height:120px; vertical-align:baseline; width:412px; }
				#TB_window { z-index:999999999; }
				<?php if ( get_post_meta( $post->ID, $this->prefix . "showextraseoformfield", true ) != "yes" ) { ?>.extraseoformfield { display:none; }<?php } ?>
				</style>
                <script type="text/javascript">
					function show_hide_childdivs(classname) {
						jQuery("."+classname).animate({"height": "toggle"}, { duration: 175 });
					}				
                </script>
				<?php
				$tooltips = '';
				$videotips = '';
				wp_nonce_field( 'my-seo-custom-fields', 'my-seo-custom-fields_wpnonce', false, true );
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
                        <?php echo ($customField['type']=="fieldset") ? '<div class="op-seo-menu-page-group-header" style="z-index: 100; margin-top: 10px; margin-left: 12px;width:455px;"><ins>+</ins>'.$customField['title'].'</div>' : ''; ?>
						<?php echo ($customField['type']=="fieldset") ? '<fieldset style="width:'.$fieldsetwidth.';display:none;"><p style="margin-left: 10px; color: rgb(65, 65, 65);">'.$customField['description'].'</p>' : ''; ?>
						<?php if($customField['type']!="menuheader") : ?>
                        <div class="<?php echo ($customField['type']!="fieldset") ? 'form-field  form-required' : ''; ?> <?php echo str_replace("font","", str_replace("color","", $customField['class']) ); ?> <?php echo $customField['separator']; ?>  <?php echo $customField['noborderbottom']; ?>">
                        <?php endif; ?>
							<?php
							switch ( $customField[ 'type' ] ) {
								case "checkbox": {
									// Checkbox
									echo ($customField[ 'childdivclass' ]) ? '<input onclick="show_hide_childdivs(\''.$customField[ 'childdivclass' ].'\');"' : '<input ';
									echo 'type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
                                    echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;">' . $customField[ 'title' ] . '</label>&nbsp;&nbsp;';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span>' : '';
									break;
								}
								case "menuheader": {
									echo '<div class="op-seo-menu-page-group-header" style="z-index: 100; margin-top: 0pt; margin-left: 12px;"><ins>+</ins>Security Encryption Key</div>';	
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
								case "textarea": {
									// Text area
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];									
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span>' : '';
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . $mycurrentvalue . '</textarea>';
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
									if($customField['class']=='optinbelow' || $customField['class']=='formurl optinbelow') { 
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
									$mycurrentvalue = (htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) )!="") ? htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) : $customField['default_value'];
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b>';
									echo ( $customField[ 'help' ] ) ? ' <span class="help" id="' . $customField[ 'name' ] .'_help" title="' . $customField[ 'help' ] . '"> </span>' : '';
									echo ( $customField[ 'videotxt' ] ) ? ' <a href="' . $customField[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $customField[ 'name' ] .'_video" title="' . $customField[ 'videotxt' ] . '"> </span></a>' : '';									
                                    if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>';
                                    echo '</label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . $mycurrentvalue . '" />';
									}
									break;
								}
							}
							?>
							<?php //if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
						<?php if($customField['type']!="menuheader") : ?></div><?php endif; ?>
                        <?php echo ($customField['type']=="endfieldset") ? '</fieldset>' : ''; ?>
					<?php
					}
				}
                /*
                echo '<div class="form-field form-required">';
                echo '<label ><b>Robots Meta Tags</b></label>';
                echo '<input type="checkbox" name="' . $this->prefix . '1" id="' . $this->prefix . '1" value="noindex"';
    			if ( get_post_meta( $post->ID, $this->prefix . '1', true ) == "noindex" )
    				echo ' checked="checked"';
    			echo '" style="width: auto;float:left;" /><label>add a <code>noindex</code> robot meta tag to this page</label>';
                echo '<input type="checkbox" name="' . $this->prefix . '2" id="' . $this->prefix . '2" value="nofollow"';
    			if ( get_post_meta( $post->ID, $this->prefix . '2', true ) == "nofollow" )
    				echo ' checked="checked"';
    			echo '" style="width: auto;float:left;" /><label>add a <code>nofollow</code> robot meta tag to this page</label>';
                echo '<input type="checkbox" name="' . $this->prefix . '3" id="' . $this->prefix . '3" value="noarchive"';
    			if ( get_post_meta( $post->ID, $this->prefix . '3', true ) == "noindex" )
    				echo ' checked="checked"';
    			echo '" style="width: auto;float:left;" /><label>add a <code>noarchive</code> robot meta tag to this page</label>';
                echo '</div>';
                echo $_POST[$this->prefix . '3'];
                */
                ?>
            <script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".op-seo-menu-page-group-header").click(function(){
					var sign = (jQuery("ins", this).html() == "+") ? "-" : "+";
					jQuery("ins", this).html(sign);
					jQuery(this).next("fieldset").toggle();
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
		function saveSeoCustomFields( $post_id, $post ) {
			if ( !wp_verify_nonce( $_POST[ 'my-seo-custom-fields_wpnonce' ], 'my-seo-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( $post->post_type != 'page' && $post->post_type != 'post' )
				return;
			foreach ( $this->customFields as $customField ) {
				if ( current_user_can( $customField['capability'], $post_id ) ) {
					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] ) ) {
						update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $_POST[ $this->prefix . $customField['name'] ] );
					} else {
						delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
					}
				}
			}
		}

	} // End Class

} // End if class exists statement

?>