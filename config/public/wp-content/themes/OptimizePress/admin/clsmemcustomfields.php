<?php
    if ( !class_exists('myMemCustomFields') ) {

    $myupload = new CI_Up_Mark();

	class myMemCustomFields {
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
				"description"	=> "<span style='font-size:15px;font-style:normal;line-height:19px;'>The options in this control panel are for use with any of the <strong>Membership Page Templates</strong> (note some options are not available on the membership pages). For an overview of how to setup your membership pages, <a href='http://www.optimizepress.com/training/membership-setup/' target='_blank'>click here</a></span>",
				"type"			=> "note",
				"class"			=> "twotdstyle",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),

            array(
				"name"			=> "",
				"title"			=> "Membership General Options",
				"description"	=> "",
				"type"			=> "fieldset",
				"width"			=> "450px",
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
				"name"			=> "memberssidebartitle",
				"title"			=> "Members Sidebar Title",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberssidebartext",
				"title"			=> "Members Sidebar Text",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberssidebarnavtitle",
				"title"			=> "Membership Sidebar Nav Title",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberssidebaricon",
				"title"			=> "Members Sidebar Icon",
				"description"	=> "",
				"type"			=> "sidebariconlist",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberssidebariconurl",
				"title"			=> "Members Sidebar Icon URL",
				"description"	=> "",
				"type"			=> "text",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "showmembersidebarwidget",
				"title"			=> "Show Sidebar Widget",
				"description"	=> "",
				"help"			=> "You can show the content from the membership sidebar (found on the widgets page) on this page by activating this option",
				"type"			=> "checkbox",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberspagevidposition",
				"title"			=> "Membership Video Position",
				"description"	=> "",
				"type"			=> "membersvidpositionlist",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberspagethumb",
				"title"			=> "Module Page Thumbnail",
				"description"	=> "",
				"type"			=> "membersthumblist",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberspagethumburl",
				"title"			=> "Module Page Thumbnail URL",
				"description"	=> "If you want to use your own thumbnail (shows on module pages), enter the URL here. recommended dimensions 145(w) x 88px(h)",
				"type"			=> "upload",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "If you want to use your own thumbnail (shows on module pages), enter the URL here. recommended dimensions 145(w) x 88px(h)",
				"type"			=> "caption",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),			
            array(
				"name"			=> "hidemembermoduletitle",
				"title"			=> "Hide Module Title",
				"description"	=> "(on content pages)",
				"type"			=> "checkbox",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "hidemembercontenttitle",
				"title"			=> "Hide Content Title",
				"description"	=> "(on content pages)",
				"type"			=> "checkbox",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
			array(
				"name"			=> "memberscontentdesc",
				"title"			=> "Content Description",
				"help"			=> "Add a description or introduction to your page content here.  This will<br>show on the automatic listing when this page is listed on a MODULE page",
				"description"	=> "",
				"type"			=> "textarea",
				"class"			=> "membership",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "",
				"type"			=> "separatoroptin",
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
				"title"			=> "Membership Video Options",
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
				"title"			=> "Membership Comments Options",
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
				"name"			=> "fbemailnotify",
				"title"			=> "Facebook Email Username For Notifications",
				"description"	=> "Enter your facebook ID/username email here to be notified each time a comment is posted to this page thread.",
				"type"			=> "text",
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
				"name"			=> "facebookxid",
				"title"			=> "Duplicate FB Comments From Page",
				"description"	=> "enter the ID of the page you want to duplicate Facebook comments from",
				"type"			=> "text",
				"class"			=> "twotdstyle activecomments",
				"scope"			=>	array( "page" ),
				"capability"	=> "edit_pages"
			),
            array(
				"name"			=> "",
				"title"			=> "",
				"description"	=> "To use Facebook comments system, you will need a facebook API key. <a href='http://developers.facebook.com/setup/' target='_blank'>Click here to your facebook APP ID</a>.  You must enter your Facebook APP ID in the OptimizePress general settings <a href='admin.php?page=OptimizePress-options'>here</a>",
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
		function myMemCustomFields() { $this->__construct(); }
		/**
		* PHP 5 Constructor
		*/
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createMemCustomFields' ) );
            add_action( 'admin_menu', array( &$this, 'createMemCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveMemCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			//add_action( 'do_meta_boxes', array( &$this, 'removeDefaultMemCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultMemCustomFields( $type, $context, $post ) {
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
		function createMemCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				add_meta_box( 'my-mem-custom-fields', 'Membership Options', array( &$this, 'displayMemCustomFields' ), 'page', 'normal', 'high' );
				//add_meta_box( 'my-mem-custom-fields', 'Membership Customization Options', array( &$this, 'displayMemCustomFields' ), 'post', 'normal', 'high' );
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayMemCustomFields() {
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
				.form-wrap legend { background-color:#F1F1F1;border:1px solid #E1E1E1;font-size:110%;font-weight:bold;margin-left:20px;padding:4px 8px;text-align:center;width:260px;}
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
				div.op-mem-menu-page-group-header > ins {
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
				div.op-mem-menu-page-group-header {
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
				<?php global $shortname;
				$headersitewidecss = get_option($shortname.'_general_settings'); ?>
				<?php /* if ( get_post_meta( $post->ID, $this->prefix . "showmembershipoption", true ) != "yes" ) { ?>.membership { display:none; }<?php }*/ ?>	
				<?php if ( get_post_meta( $post->ID, $this->prefix . "activatevideo", true ) != "yes" ) { ?>.activevideo { display:none; }<?php } ?>
	
               </style>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/colorpicker/jscolor/jscolor.js"></script>
           		<script type="text/javascript" src="<?php echo $templatedir; ?>/admin/optin.js"></script>
                <script type="text/javascript">
                jQuery(document).ready(function() {
                    enhanceForm();
					/* update video settings in sales letter options */
					enhanceMembershipFields('_launchpage_showheader', 'checkbox');
					enhanceMembershipFields('_launchpage_showlogo', 'checkbox');
					enhanceMembershipFields('_launchpage_showheaderhyperlink', 'checkbox');
					enhanceMembershipFields('_launchpage_headerhyperlink', 'text');

					/* update video settings in sales letter options */
					enhanceMembershipFields('_launchpage_activatevideo', 'checkbox');
					enhanceMembershipFields('_launchpage_hostedvideourl', 'text');
					enhanceMembershipFields('_launchpage_mobilevideourl', 'text');
					enhanceMembershipFields('_launchpage_videoimage1', 'text');
					enhanceMembershipFields('_launchpage_videourl', 'textarea');
					enhanceMembershipFields('_launchpage_externalvideo', 'textarea');
					enhanceMembershipFields('_launchpage_videowidth', 'text');
					enhanceMembershipFields('_launchpage_videoheight', 'text');
					enhanceMembershipFields('_launchpage_showshadowborder', 'checkbox');
					enhanceMembershipFields('_launchpage_autoplay', 'checkbox');
					enhanceMembershipFields('_launchpage_showvideocontrolbar', 'checkbox');
					enhanceMembershipFields('_launchpage_showvideodownloadlink', 'checkbox');
					enhanceMembershipFields('_launchpage_videodownloadlinktext', 'text');
					enhanceMembershipFields('_launchpage_downloadvideourl', 'text');
					enhanceMembershipFields('_launchpage_videoplayercolor', 'select');

					/* update comment settings in sales letter options */
					enhanceMembershipFields('_launchpage_activatecomments', 'checkbox');
					enhanceMembershipFields('_launchpage_disabledatewpcomments', 'checkbox');
					enhanceMembershipFields('_launchpage_showcommentcalltoaction', 'checkbox');
					enhanceMembershipFields('_launchpage_commentscalltoactiontext', 'text');
					enhanceMembershipFields('_launchpage_commentssystem', 'select');
					enhanceMembershipFields('_launchpage_commentsorder', 'select');
					enhanceMembershipFields('_launchpage_fbcommentnum', 'select');
					enhanceMembershipFields('_launchpage_fbemailnotify', 'text');
					enhanceMembershipFields('_launchpage_wpcommentstitle', 'text');
					enhanceMembershipFields('_launchpage_facebookapikey', 'text');
					enhanceMembershipFields('_launchpage_facebookxid', 'text');
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
					  
					function enhanceMembershipFields(name, type) {
						if(type == "select") {
							jQuery('div[id="my-mem-custom-fields"] select[name="'+ name +'"]').change(function() {
							  jQuery('div[id="my-lp-custom-fields"] select[name="'+ name +'"]').val(jQuery(this).val());   
							});
						}
						else if(type == "textarea") {
							jQuery('div[id="my-mem-custom-fields"] textarea[name="'+ name +'"]').change(function() {
							  jQuery('div[id="my-lp-custom-fields"] textarea[name="'+ name +'"]').val(jQuery(this).val());   
							});		
						}	
						else if(type == "checkbox") {
							jQuery('div[id="my-mem-custom-fields"] input[name="'+ name +'"]').click(function() {
							  jQuery('div[id="my-lp-custom-fields"] input[name="'+ name +'"]').attr('checked', jQuery(this).is(':checked'));   
							});
						}
						else if(type == "text"){
							jQuery('div[id="my-mem-custom-fields"] input[name="'+ name +'"]').change(function() {
							  jQuery('div[id="my-lp-custom-fields"] input[name="'+ name +'"]').val(jQuery(this).val());   
							});
						}
					}
                </script>

				
				
				<?php
				$tooltips = '';
				$videotips = '';
                wp_nonce_field( 'my-mem-custom-fields', 'my-mem-custom-fields_wpnonce', false, true );
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
                        <?php echo ($customField['type']=="fieldset") ? '<div class="op-mem-menu-page-group-header" style="z-index: 100; margin-top: 10px; margin-left: 12px;width:455px;"><ins>+</ins>'.$customField['title'].'</div>' : ''; ?>
						<?php echo ($customField['type']=="fieldset") ? '<fieldset style="width:'.$fieldsetwidth.';display:none;"><p style="margin-left: 10px; color: rgb(65, 65, 65);">'.$customField['description'].'</p>' : ''; ?>
						<?php if($customField['type']!="menuheader") : ?>
                        <div class="<?php echo ($customField['type']!="fieldset") ? 'form-field  form-required' : ''; ?> <?php echo str_replace("font","", str_replace("color","", $customField['class']) ); ?> <?php echo $customField['separator']; ?>  <?php echo $customField['noborderbottom']; ?>">
                        <?php endif; ?>
							<?php
							switch ( $customField[ 'type' ] ) {
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
										else if ( $customField['default_value'] == 1 && !isset( $_GET['post'] ) ) 
											echo ' checked="checked"';
										echo '" style="width: auto; height: 21px; vertical-align: middle;" /> &nbsp;'.$customField[ 'description' ];
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
									echo '<div class="op-mem-menu-page-group-header" style="z-index: 100; margin-top: 0pt; margin-left: 12px;"><ins>+</ins>Security Encryption Key</div>';	
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
						<?php if($customField['type']!="menuheader") : ?></div><?php endif; ?>
                        <?php echo ($customField['type']=="endfieldset") ? '</fieldset>' : ''; ?>
					<?php
					}
				} ?>
            <script type="text/javascript">
			jQuery(document).ready(function(){
				jQuery(".op-mem-menu-page-group-header").click(function(){
					var sign = (jQuery("ins", this).html() == "+") ? "-" : "+";
					jQuery("ins", this).html(sign);
					jQuery(this).next("fieldset").toggle();
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
		function saveMemCustomFields( $post_id, $post ) {
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

			if ( !wp_verify_nonce( $_POST[ 'my-mem-custom-fields_wpnonce' ], 'my-mem-custom-fields' ) )
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
		$this->i++;
	} // End Class
  }
} // End if class exists statement

?>