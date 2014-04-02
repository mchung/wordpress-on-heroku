<?php 
$themename = "OptimizePress";
$shortname = "OptimizePress";
$page_handle = 'op_instant_pages';

global $themename, $shortname, $optpress_categories;

/* The Options*/
$auto_options = array (

		array(	"type" => "openfieldset"),

		array(	"name" => "Squeeze Pages",
			"desc" => "",
			"id" => "",
			"type" => "label"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 01 Template]</b>",
			"id" => $shortname . '_squeeze1',
			"file" => "squeeze1.txt",
			'title' => 'Instant Page - Squeeze 01',
			'header' => 'on',
			'footer' => 'on',
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_001',
			"class" => "nofieldtitle",
			"tpl" => "squeeze",
			"scr" => "template01.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 02 Template]</b>",
			"id" => $shortname . '_squeeze2',
			'title' => 'Instant Page - Squeeze 02',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze2.txt",
			"class" => "nofieldtitle",
			"tpl" => "squeeze",
			"scr" => "template02.jpg",
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_002',
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 03 Template]</b>",
			"id" => $shortname . '_squeeze3',
			'title' => 'Instant Page - Squeeze 03',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze3.txt",
			'headline' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'preheadline' => 'Here\'s some sample warning text which can be changed in the pre-headline box options...',
			'layout' => 'template_003',
			"class" => "nofieldtitle",
			"tpl" => "squeeze",
			"scr" => "template03.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 04 Template]</b>",
			"id" => $shortname . '_squeeze4',
			'title' => 'Instant Page - Squeeze 04',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze4.txt",
			"class" => "nofieldtitle",
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_004',
			"tpl" => "squeeze",
			"scr" => "template04.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 05 Template]</b>",
			"id" => $shortname . '_squeeze5',
			'title' => 'Instant Page - Squeeze 05',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze5.txt",
			"class" => "nofieldtitle",
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_005',
			"tpl" => "squeeze",
			"scr" => "template05.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 06 Template]</b>",
			"id" => $shortname . '_squeeze6',
			'title' => 'Instant Page - Squeeze 06',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze6.txt",
			"class" => "nofieldtitle",
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_006',
			"tpl" => "squeeze",
			"scr" => "template06.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 07 Template]</b>",
			"id" => $shortname . '_squeeze7',
			'title' => 'Instant Page - Squeeze 07',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze7.txt",
			"class" => "nofieldtitle",
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_007',
			"tpl" => "squeeze",
			"scr" => "template07.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 08 Template]</b>",
			"id" => $shortname . '_squeeze8',
			'title' => 'Instant Page - Squeeze 08',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze8.txt",
			"class" => "nofieldtitle",
			'headline' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_008',
			"tpl" => "squeeze",
			"scr" => "template08.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 09 Template]</b>",
			"id" => $shortname . '_squeeze9',
			'title' => 'Instant Page - Squeeze 09',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze9.txt",
			"class" => "nofieldtitle",
			'headline' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_009',
			"tpl" => "squeeze",
			"scr" => "template09.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 10 Template]</b>",
			"id" => $shortname . '_squeeze10',
			'title' => 'Instant Page - Squeeze 10',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze10.txt",
			"class" => "nofieldtitle",
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_010',
			"tpl" => "squeeze",
			"scr" => "template10.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 11 Template]</b>",
			"id" => $shortname . '_squeeze11',
			'title' => 'Instant Page - Squeeze 11',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze11.txt",
			"class" => "nofieldtitle",
			'headline' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_011',
			"tpl" => "squeeze",
			"scr" => "template11.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b> Squeeze Page [Squeeze 12 Template]</b>",
			"id" => $shortname . '_squeeze12',
			'title' => 'Instant Page - Squeeze 12',
			'header' => 'on',
			'footer' => 'on',
			"file" => "squeeze12.txt",
			"class" => "nofieldtitle",
			'headlinebelowvideo' => 'Here\'s A Sample Headline Using The Headline Below Video Option.  You Can Also Add Headlines & Subheadlines Above Your Video...',
			'layout' => 'template_012',
			"tpl" => "squeeze",
			"scr" => "template12.jpg",
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),


		array(	"name" => "Sales/Offer/Funnel Pages",
			"desc" => "",
			"id" => "",
			"type" => "label"),

		array(	"name" => "",
			"desc" => "Create <b>Sales Page [Sales Style 1 Template]</b>",
			"id" => $shortname . '_sales_page',
			'title' => 'Instant Page - Sales Page 01',
			"class" => "nofieldtitle",
			'file' => 'salesletter.txt',
			'headlineabovevideo' => 'Here\'s The Sample Headline For Your Sales Page...',
			'header' => 'on',
			'footer' => 'on',
			"tpl" => "sales",
			"scr" => "comingsoon.jpg",
			'layout' => 'launch_001d',
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b>Sales Page [Sales Style 2 Template]</b>",
			"id" => $shortname . '_sales_page2',
			'title' => 'Instant Page - Sales Page 02',
			'file' => 'salesletter2.txt',
			"class" => "nofieldtitle",
			'headlineabovevideo' => 'Here\'s The Sample Headline For Your Sales Page...',
			'header' => 'on',
			'footer' => 'on',
			"tpl" => "sales",
			"scr" => "comingsoon.jpg",
			'layout' => 'launch_002d',
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b>One-Time-Offer (OTO) Page</b>",
			"id" => $shortname . '_sales_pageoto',
			'title' => 'Instant Page - One-Time-Offer',
			'file' => 'salesletteroto.txt',
			"class" => "nofieldtitle",
			'headline' => 'Here\'s The Sample Headline For Your Sales Page...',
			'header' => 'on',
			'footer' => 'on',
			"tpl" => "sales",
			"scr" => "comingsoon.jpg",
			'layout' => 'launch_001d',
			"type" => "instantpage"),

		array(	"name" => "Launch Funnel Pages / Product Launch Pages",
			"desc" => "",
			"id" => "",
			"type" => "label"),

		array(	"name" => "",
			"desc" => "Create <b>Launch Funnel/Content Page</b>",
			"id" => $shortname . '_funnel_page',
			'title' => 'Instant Page - Launch Funnel Page',
			"class" => "nofieldtitle",
			'file' => 'launchfunnel.txt',
			'headlineabovevideo' => 'Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit. Nam Quis. Two Line Text So That It Loads And Shows Line Spacing...',
			'alert' => 'Here\'s The Alert Bar Text',
			'header' => 'on',
			'footer' => 'on',
			'launch' => 'on',
			'socialmedia' => 'on',
			'socialmediatext' => 'Share',
			'activatecomments' => 'on',
			'disablewpcomments' => 'on',
			'commentscalltoaction' => 'on',
			'commentscalltoactiontext' => 'Here\'s the comments call to action',
			"tpl" => "sales",
			"scr" => "launch1.jpg",
			'layout' => 'launch_001',
			"videourl" => "http://www.youtube.com/watch?v=sIFYPQjYhv8",
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => " Create <b>Email Confirmation Page</b>",
			"id" => $shortname . '_emailconfirm_page',
			'title' => 'Instant Page - Email Confirmation Page',
			"class" => "nofieldtitle",
			'file' => 'emailconfirm.txt',
			'headlineabovevideo' => 'Confirm Your Email Address...',
			'header' => 'on',
			'footer' => 'on',
			"tpl" => "sales",
			"scr" => "email1.jpg",
			'layout' => 'launch_001d',
			"type" => "instantpage"),

		array(	"name" => "Essential Pages",
			"desc" => "",
			"id" => "",
			"type" => "label"),

		array(	"name" => "",
			"desc" => "Create <b>Privacy Policy page.</b>",
			"id" => $shortname . '_privacy_policy',
			'title' => 'Instant Page - Privacy Policy',
			'header' => 'on',
			'footer' => 'on',
			'file' => 'privacy.txt',
			"class" => "nofieldtitle",
			"tpl" => "legal",
			"scr" => "privacy.jpg",
			'layout' => 'launch_001d',
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b>Disclaimer page.</b>",
			"id" => $shortname . '_disclaimer',
			'title' => 'Instant Page - Website Disclaimer',
			'header' => 'on',
			'footer' => 'on',
			'file' => 'disclaimer.txt',
			"class" => "nofieldtitle",
			"tpl" => "legal",
			"scr" => "disclaimer.jpg",
			'layout' => 'launch_001d',
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b>Terms of Service page.</b>",
			"id" => $shortname . '_tos',
			'title' => 'Instant Page - Terms and Conditions',
			'header' => 'on',
			'footer' => 'on',
			'file' => 'tos.txt',
			"class" => "nofieldtitle",
			"tpl" => "legal",
			"scr" => "terms.jpg",
			'layout' => 'launch_001d',
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "Create <b>Contact page.</b>",
			"id" => $shortname . '_contact',
			'title' => 'Instant Page - Contact Us',
			'header' => 'on',
			'footer' => 'on',
			'file' => 'contactus.txt',
			"class" => "nofieldtitle",
			"tpl" => "legal",
			"scr" => "comingsoon.jpg",
			'layout' => 'launch_001d',
			"type" => "instantpage"),

		array(	"name" => "",
			"desc" => "",
			"id" => "",
			"class" => "nofieldtitle",
			"type" => "label"),

		array(	"type" => "closefieldset"),

		array(	"type" => "close"),
		
		array(	"type" => "submit")
);

/**
 * Start Admin Functions
 */
if ( 'save' == $_REQUEST['action'] ) {

            $auto_gen_options = array();

            foreach ( $auto_options as $value ) {
                if ( $value['type'] == 'instantpage' ) {

                    if ( isset( $_REQUEST[$value['id']] ) ) {
                        $group = ( isset($value['group']) ) ? $value['group'] : '';
                        add_new_page( $value['title'], $value['file'], $value['layout'], $value['preheadline'], $value['headline'], $value['headlineabovevideo'], $value['headlinebelowvideo'], $value['alert'], $value['activatecomments'], $value['disablewpcomments'], $value['commentscalltoaction'], $value['commentscalltoactiontext'], $value['wpcommentstitle'], $value['socialmedia'], $value['socialmediatext'], $value['launch'], $group, $value['videourl'], $value['tpl'], $value['header'], $value['footer'] );
                        $instant_page = true;
                        $gen_type = $value['layout'];
                    }

                } else if ( $value['type'] == 'checkbox' ) {

                    if( isset( $_REQUEST[$value['id']]) ) {
                        $auto_gen_options[] = array( 'id' => $value['id'], 'value' => $_REQUEST[$value['id']] );
                    } else {
                        $auto_gen_options[] = array( 'id' => $value['id'], 'value' => 'false' );
                    }

                } else {

                    if ( isset( $_REQUEST[$value['id']] ) ) {
                        $auto_gen_options[] = array( 'id' => $value['id'], 'value' => $_REQUEST[$value['id']] );
                    }
                }
            }

            if( $_GET['page'] == 'op_instant_pages' ) {
                update_option( 'op_generator_options', maybe_serialize( $auto_gen_options ) );
					echo("<script>location.href = 'edit.php?post_status=draft&post_type=page';</script>");
            }

            die;
}

function add_new_page( $title, $file, $layout, $preheadline, $headline, $headlineabovevideo, $headlinebelowvideo, $alert, $activatecomments, $disablewpcomments, $commentscalltoaction, $commentscalltoactiontext, $wpcommentstitle, $socialmedia, $socialmediatext, $launch, $group = '', $videourl, $tpl, $header, $footer ) 
{
    global $wpdb;
	$page_options = (get_option('op_generator_options')!="") ? maybe_unserialize(get_option('op_generator_options')) : '';
	
	if(is_array($page_options)) {
		foreach ( $page_options as $value ) {
			$$value['id'] = $value['value']; 
		}
	}

    // Access and read the content template
    $contentpath = get_bloginfo('template_directory') . '/lib/admin/contents/' . $file;
    $content = wp_remote_retrieve_body ( wp_remote_get ( $contentpath ) );
	$templatedirimg = get_bloginfo('template_directory');

    // Create post object
    $newpage = array();

    if ( $layout == 'review-page-single' ) {
        $newpage['post_type'] = 'post';
        $newpage['post_title'] = $title;
    } else {
        $newpage['post_type'] = 'page';
        $newpage['post_title'] = $title . ' ' . date("Y-m-d H:i:s");
    }      

    $newpage['post_content'] = $content;
      $newpage['post_status'] = 'draft';
      $newpage['post_author'] = 1;

    wp_insert_post( $newpage );    

    // Get post id of our newly created page
    $posts = $wpdb->get_results("SELECT ID FROM $wpdb->posts WHERE post_title LIKE '%" . $newpage['post_title'] . "%'");

    foreach ( $posts as $post ) {
        if ( $group == '' ) {
			if($header) :
				update_post_meta( $post->ID, '_optthemes_showheaderopt', 'yes' );
				update_post_meta( $post->ID, '_optthemes_showheader', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_showheader', 'yes' );
			endif;
			if($footer) :
				update_post_meta( $post->ID, '_optthemes_showfooterlinks', 'yes' );
				update_post_meta( $post->ID, '_launchpage_showfooterlinks', 'yes' );
			endif;

			if($headline) :
				update_post_meta( $post->ID, '_optthemes_activateheadline', 'yes' );
				update_post_meta( $post->ID, '_optthemes_headline', $headline );
				update_post_meta( $post->ID, '_optthemes_colorpickerField1', 'CC0000' );
				update_post_meta( $post->ID, '_optthemes_colorpickerField2', 'CC0000' );
				update_post_meta( $post->ID, '_optthemes_headlinefont', 'Impact' );
				update_post_meta( $post->ID, '_launchpage_activateh1abovevideotext', 'yes' );
				update_post_meta( $post->ID, '_launchpage_headlineabovevideotext', $headline );
				update_post_meta( $post->ID, '_launchpage_headlineabovevideofontcolor', 'CC0000' );
				update_post_meta( $post->ID, '_launchpage_headlineabovevideofont', 'Impact' );
				update_post_meta( $post->ID, '_launchpage_headlinefontweight', 'bold' );
			endif;
			if($preheadline) :
				update_post_meta( $post->ID, '_optthemes_activatepreheadline', 'yes' );
				update_post_meta( $post->ID, '_optthemes_preheadline', $preheadline );
				update_post_meta( $post->ID, '_optthemes_preheadlinemaincolor', '444444' );
				update_post_meta( $post->ID, '_optthemes_alternativepreheadlinecolor', 'CC0000' );
				update_post_meta( $post->ID, '_optthemes_preheadlinefont', 'Impact' );
			endif;
			if($headlineabovevideo) :
				update_post_meta( $post->ID, '_launchpage_activateh1abovevideotext', 'yes' );
				update_post_meta( $post->ID, '_launchpage_headlineabovevideotext', $headlineabovevideo );
				update_post_meta( $post->ID, '_launchpage_headlineabovevideofontcolor', 'CC0000' );
				update_post_meta( $post->ID, '_launchpage_headlineabovevideofont', 'Impact' );
				update_post_meta( $post->ID, '_launchpage_headlinefontweight', 'bold' );
			endif;
			if($headlinebelowvideo) :
				update_post_meta( $post->ID, '_optthemes_activateheadlinebelowvideo', 'yes' );
				update_post_meta( $post->ID, '_optthemes_headlinebelowvideo', $headlinebelowvideo );
				update_post_meta( $post->ID, '_optthemes_headlinebelowvideomaincolor', 'CC0000' );
				update_post_meta( $post->ID, '_optthemes_alternativeheadlinebelowvideocolor', 'CC0000' );
				update_post_meta( $post->ID, '_optthemes_headlinebelowvideofont', 'Impact' );
			endif;

			if($alert) :
				update_post_meta( $post->ID, '_launchpage_activatealertbar', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_alertbartext', $alert );			
				update_post_meta( $post->ID, '_launchpage_alertbarcolor', 'Green' );			
			endif;
			
			if($activatecomments) :
				update_post_meta( $post->ID, '_launchpage_activatecomments', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_commentssystem', 'Both' );			
				update_post_meta( $post->ID, '_launchpage_commentsorder', 'fbwp' );			
				update_post_meta( $post->ID, '_launchpage_fbcommentnum', '20' );			
			endif;

			if($disablewpcomments) :
				update_post_meta( $post->ID, '_launchpage_disabledatewpcomments', 'yes' );			
			endif;

			if($commentscalltoaction) :
				update_post_meta( $post->ID, '_launchpage_showcommentcalltoaction', 'yes' );			
			endif;

			if($commentscalltoactiontext) :
				update_post_meta( $post->ID, '_launchpage_commentscalltoactiontext', $commentscalltoactiontext );			
			endif;

			if($wpcommentstitle) :
				update_post_meta( $post->ID, '_launchpage_wpcommentstitle', $wpcommentstitle );			
			endif;
			
			if($socialmedia) : 
				update_post_meta( $post->ID, '_launchpage_activatesocialmedia', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_facebookshare', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_socialmediacalltoactiontext', '1' );			
				update_post_meta( $post->ID, '_launchpage_socialmeduabutton', 'share1' );			
			endif;

			if($socialmediatext) : 
				update_post_meta( $post->ID, '_launchpage_twitterurl', $socialmediatext );			
			endif;
			
			if($launch) :
				update_post_meta( $post->ID, '_launchpage_disablecookiecheck', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_showheaderlinks', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_showsidebarlinksthumbnails', 'yes' );			
				update_post_meta( $post->ID, '_launchpage_headernavstyle', 'style3' );			
			endif;


				update_post_meta( $post->ID, '_optthemes_bulletstyle', 'style1' );
				update_post_meta( $post->ID, '_optthemes_images', '' );
				update_post_meta( $post->ID, '_optthemes_videoplayercolor', 'dark' );
				update_post_meta( $post->ID, '_optthemes_activatesidebarheadline', 'yes' );
				update_post_meta( $post->ID, '_optthemes_sidebarheadline', 'Get Your Free Video Now!' );
				update_post_meta( $post->ID, '_optthemes_sidebarheadlinemaincolor', '19476B' );
				update_post_meta( $post->ID, '_optthemes_sidebarheadlinefont', 'Arial' );
				update_post_meta( $post->ID, '_optthemes_sidebarheadlinefont', 'Arial' );
				update_post_meta( $post->ID, '_optthemes_activatesidebartext', 'yes' );
				update_post_meta( $post->ID, '_optthemes_sidebartext', '<strong>Enter your name and email address</strong> below now for instant access to the free training video' );
				update_post_meta( $post->ID, '_optthemes_activatespamnotice', 'yes' );
				update_post_meta( $post->ID, '_optthemes_spamnoticetext', 'Your information is 100% secure with us. We will never sell, rent or share your details.' );
				update_post_meta( $post->ID, '_optthemes_webformcodehtml', 'add your autoresponder code here' );
				update_post_meta( $post->ID, '_optthemes_optinnameshow', 'yes' );
				update_post_meta( $post->ID, '_optthemes_optinemailshow', 'yes' );
				update_post_meta( $post->ID, '_optthemes_buttonselect', ''.$templatedirimg.'/images/optbuttons/red_sendmethevideo.png' );
			
				update_post_meta( $post->ID, '_wp_page_template', $layout.'.php' );

			if($videourl) :
				if($tpl=="squeeze") {
					update_post_meta( $post->ID, '_optthemes_activatevideo', 'yes' );
					update_post_meta( $post->ID, '_optthemes_autoplay', 'yes' );
					update_post_meta( $post->ID, '_optthemes_showvideocontrolbar', 'yes' );
					update_post_meta( $post->ID, '_optthemes_videourl', $videourl );
				} else if($tpl=="sales") {
					update_post_meta( $post->ID, '_launchpage_activatevideo', 'yes' );
					update_post_meta( $post->ID, '_launchpage_autoplay', 'yes' );
					update_post_meta( $post->ID, '_launchpage_showvideocontrolbar', 'yes' );
					update_post_meta( $post->ID, '_launchpage_showvideodownloadlink', 'yes' );
					update_post_meta( $post->ID, '_launchpage_hostedvideourl', $videourl );
					update_post_meta( $post->ID, '_launchpage_mobilevideourl', $videourl );
					update_post_meta( $post->ID, '_launchpage_videoplayercolor', 'dark' );
				}
			endif;
		}
	}
}
?>
<?php $templatedir = get_bloginfo('template_directory'); ?>
<div id="wrapper">
<div style="float:right;width:450px;padding-top:40px;"><div class="toplink"><a href="admin.php?page=op_instant_pages"><img style="padding-top:2px;" class="admin-logo" src="<?php echo $templatedir; ?>/images/logoip.png"></a></div><div class="toplink"><a href="http://www.optimizepress.com/members" target="_blank">Training & Support Dashboard</a></div>  <div class="toplink"><a href="http://optimizepress.com/affiliates" target="_blank">Affiliates</a></div><div style="clear:both;"></div></div>
<img width="262" height="101" class="admin-logo" src="<?php echo $templatedir; ?>/images/oplogo.png">

<div class="admin-menu">
				<ul>
			<li><a href="admin.php?page=OptimizePress-options">General Settings</a></li>
            <li><a href="admin.php?page=OptimizePress-membershipconfigs">Membership Settings</a></li>
            <li><a href="admin.php?page=OptimizePress-blogconfigs">Blog Settings</a></li>
            <li><a href="admin.php?page=OptimizePress-salesconfigs">Sales Letter Nav</a></li>
            <li><a href="admin.php?page=OptimizePress-squeezeconfigs">Squeeze Nav</a></li>
            <li><a href="admin.php?page=OptimizePress-seo">SEO</a></li>
            <li><a href="admin.php?page=admin-configs">Funnel Config</a></li>
            <li><a href="admin.php?page=funnel-settings">Funnel Page Setup</a></li>
			</ul>
			<br style="clear: left;">
  </div>
        
<span class="page-heading">Instant Pages</span>
<div class="clear"></div>
</div>
<?php
$hidden_anchor = $_REQUEST['hidden_anchor'];
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade below-h2"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade below-h2"><p><strong>'.$themename.' settings reset.</strong></p></div>';
if ( $_REQUEST['error'] ) echo '<div id="message" class="updated fade below-h2"><p><strong>Sidebar already exists, please use a different name.</strong></p></div>';
if ( $_GET['upgraded'] ) '';
?>
<script type="text/javascript" src="<?php echo $templatedir; ?>/admin/scripts/easyTooltip.js"></script>
<link rel="stylesheet" href="<?php echo $templatedir; ?>/admin/scripts/css/facebox.css" type="text/css" />
<link rel="stylesheet" href="<?php echo $templatedir; ?>/admin/scripts/css/stylepanel.css" type="text/css" />
<script src="<?php echo $templatedir; ?>/admin/scripts/facebox.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $templatedir; ?>/colorpicker/jscolor/jscolor.js"></script>
<script type="text/javascript" src="<?php echo $templatedir; ?>/lib/admin/js/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $templatedir; ?>/lib/admin/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

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
<?php /* START - LICENSING FUNCTIONS */
	$LicDomain = $_SERVER['HTTP_HOST'];
	$keypost = $_POST['keypost'];
	if ($keypost ==1) {
		$CheckKey = CheckLicenseAdmin($_POST['lickey'], $LicDomain);
		if ($CheckKey == 1) {
			echo '<font color="red">There appears to be a problem with your license. Please ensure you have licensed your domain correctly following the instructions in the members area. Contact check <a href="http://www.optimizepress.com/support">Support Site</a> for more help</font>';
		} elseif ($CheckKey == 2) {
			echo '<font color="red">There appears to be a problem with your license. Please ensure you have licensed your domain correctly following the instructions in the members area. Contact check <a href="http://www.optimizepress.com/support">Support Site</a> for more help</font>';
		} elseif ($CheckKey == 3) {
			update_option( 'OptimizePress_active', '1' );
			update_option( 'OptimizePress_licensekey', $_REQUEST['lickey'] );
			echo '<font color="green">Thank you! Your theme has been activated successfully.</font><br />';
		}
	}
?>
<?php 
// Fancybox for page template previews
$fancybox = '';
?>
<form method="post" enctype="multipart/form-data" acceptCharset="UTF-8" action="">
<input id="hidden_anchor" type="hidden" name="hidden_anchor" value="" />
<?php 
$get_options = (get_option($shortname.'_autopage_settings')!="") ? get_option($shortname.'_autopage_settings') : get_option($shortname.'_general_settings');
$tooltips = '';
$videotips = '';

foreach ($auto_options as $value) {
$id = $value['id'];
$selector = ($value['selector']) ? ' class="selector"' : '';
$tooltips .= ( $value[ 'help' ] ) ? '				jQuery("#'.$value['id'].'_help").easyTooltip();' : '';
$videotips .= ( $value[ 'videotxt' ] ) ? '				jQuery("#'.$value['id'].'_video").easyTooltip();' : '';

switch ( $value['type'] ) {
	
case "opentab":
?>
<div id="<?php echo $value['id']; ?>" class="fieldset_block">
<?php

break;
case "closetab":
?>
</div>
<?php

break;
case "title_h2":
?>
<table class="form-table optpress-options">
<?php

break;
case "title_h3":
?>
<h3><?php echo $value['name']; ?></h3>
<table class="form-table optpress-options">
<?php

break;
case "close":
?>
</table>
<?php

break;
case 'openfieldset':
?>
<fieldset>
<?php 
break;
case 'closefieldset':
?>
</fieldset>
<?php 

break;

case 'opentddiv':
?>
<td>
<?php 

break;
case 'closetddiv':
?>
</td></tr>
<div style="clear:both;"></div>
<?php 

break;
case 'text':
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<?php if($value['class']!="nofieldtitle") { ?>
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php } ?>
				<div class="field-left">
					<input type="text" value="<?php echo stripslashes(htmlspecialchars($get_options[$id])); ?>" class="field_txt" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>"><br>
<?php
echo ( $value[ 'help' ] ) ? ' <span class="help" id="' . $value[ 'id' ] .'_help" title="' . $value[ 'help' ] . '"> </span>' : '';
echo ( $value[ 'videotxt' ] ) ? ' <a href="' . $value[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $value[ 'id' ] .'_video" title="' . $value[ 'videotxt' ] . '"> </span></a>' : '';
?>
				</div>
				<div class="field-right"><?php echo $value['desc']; ?></div>
				<div class="clr"></div>
</div>
<?php 

break;
case 'textarea':
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<?php if($value['class']!="nofieldtitle") { ?>
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php } ?>
				<div class="field-left">
					<textarea name="<?php echo $value['id']; ?>" cols="50" rows="7"><?php if ( $get_options[$id] != "") { echo stripslashes($get_options[$id]); } else { echo $value['std']; } ?></textarea><br>
<?php
echo ( $value[ 'help' ] ) ? ' <span class="help" id="' . $value[ 'id' ] .'_help" title="' . $value[ 'help' ] . '"> </span>' : '';
echo ( $value[ 'videotxt' ] ) ? ' <a href="' . $value[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $value[ 'id' ] .'_video" title="' . $value[ 'videotxt' ] . '"> </span></a>' : '';
?>
				</div>
				<div class="field-right"><?php echo $value['desc']; ?></div>
				<div class="clr"></div>
</div>
<?php

break;
case "checkbox":
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection" style="margin:0 20px;">
				<?php if($value['class']!="nofieldtitle") { ?>
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php } ?>
				<div class="field-left">
					<?php if($get_options[$id.'_tick']=="0"){ $checked = ""; }else{ if(empty($get_options[$id.'_tick']) && $value['default']=="checked") { $checked = "checked=\"checked\""; } elseif(empty($get_options[$id.'_tick']) && $value['default']=="") { $checked = ""; } else { $checked = "checked=\"checked\""; } } ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" onclick="this.form.<?php echo $value['id'].'_tick'; ?>.value = (this.checked ? 1 : 0)" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />&nbsp;<input name="<?php echo $value['id'].'_tick'; ?>" id="<?php echo $value['id'].'_tick'; ?>" type="hidden" value="<?php echo $get_options[$id.'_tick']; ?>" />
					<span style="color:#666666;font-size:12px;font-family:arial,helvetica,sans-serif;"><?php echo $value['desc']; ?></span>
<?php
echo ( $value[ 'help' ] ) ? ' <span class="help" id="' . $value[ 'id' ] .'_help" title="' . $value[ 'help' ] . '"> </span>' : '';
echo ( $value[ 'videotxt' ] ) ? ' <a href="' . $value[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $value[ 'id' ] .'_video" title="' . $value[ 'videotxt' ] . '"> </span></a>' : '';
?>
				</div>
				<div class="field-right"></div>
				<div class="clr"></div>
</div>
<?php
break;
case "instantpage":
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection" style="margin:0 20px;">
				<?php if($value['class']!="nofieldtitle") { ?>
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php } ?>
				<div class="field-left">
				<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />&nbsp;
                <span style="color:#666666;font-size:12px;font-family:arial,helvetica,sans-serif;"><?php echo $value['desc']; ?></span>
                <a style="font-size:11px;text-decoration:none;" id="scr_<?php echo $value['id']; ?>" href="<?php echo $templatedir; ?>/lib/admin/contents/images/<?php echo $value['scr']; ?>">Preview</a>
<?php
echo ( $value[ 'help' ] ) ? ' <span class="help" id="' . $value[ 'id' ] .'_help" title="' . $value[ 'help' ] . '"> </span>' : '';
echo ( $value[ 'videotxt' ] ) ? ' <a href="' . $value[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $value[ 'id' ] .'_video" title="' . $value[ 'videotxt' ] . '"> </span></a>' : '';
?>
				</div>
				<div class="field-right"></div>
				<div class="clr"></div>
</div>
<?php
$fancybox .= "
	jQuery(\"a#scr_".$value['id']."\").fancybox({
		'opacity'	: true,
		'overlayShow'	: false,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'none'
	});
";
break;
case "label":
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<?php if($value['class']!="nofieldtitle") { ?>
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php } ?>
</div>
<?php
break;
case "submit":
?>
<div class="submit optpress-submit"><input class="button-primary" type="submit" name="generatepage" value="Generate Page(s)"/><input type="hidden" name="action" value="save" /></div>
<?php
break;
}
}
?>
</form>
	<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery("span.help").each(function(){
            jQuery(this).html("<a rel=\"facebox\" href=\"#"+str_replace("_help", "", jQuery(this).attr("id") )+"\"><img src=\"<?php echo $templatedir; ?>/admin/scripts/images/op-help-icon.png\" border=\"0\" style=\"width:16px;height:16px;vertical-align:middle;\"></a>"); // load help icons
        });
        jQuery("span.video").each(function(){
            jQuery(this).html("<span rel=\"facebox\" href=\"#"+str_replace("_video", "", jQuery(this).attr("id") )+"\"><img src=\"<?php echo $templatedir; ?>/admin/scripts/images/tutorial-icon.png\" border=\"0\" style=\"width:16px;height:16px;vertical-align:middle;\"></span>"); // load help icons
        });
        <?php echo $tooltips; ?>
        <?php echo $videotips; ?>
		<?php echo $fancybox; ?>
    });
    </script>
<style>
#wpbody-content fieldset { border:1px solid #E1E1E1;margin:0 16px 0;padding:10px 20px 0 5px;width:753px; background-color:#FFF; }
#wpbody-content legend { background-color:#F1F1F1;border:1px solid #E1E1E1;font-size:110%;font-weight:bold;margin-left:20px;padding:4px 8px;text-align:center;width:190px; }
textarea, input[type="text"], input[type="password"], input[type="file"], input[type="button"], input[type="submit"], input[type="reset"], select {
background-color:#FFFFFF;
border-color:#DFDFDF;
}
.field-left {
float:left;
padding:5px 10px 5px 0;
width:450px;
}
.field-right {
-x-system-font:none;
color:#666666;
float:left;
font-family:arial,helvetica,sans-serif;
font-size:12px;
font-size-adjust:none;
font-stretch:normal;
font-style:normal;
font-variant:normal;
font-weight:normal;
line-height:normal;
padding:5px 0;
width:250px;
}
.toplink{color:#666666;padding-left:20px;float:left;}
.toplink a:hover{color:#333333;text-decoration:underline;}
.toplink a{color:#666666;text-decoration:none;}

.fieldtitle {
border-bottom:1px solid #F5F5F5;
font-family:arial,helvetica,sans-serif;
font-size:14px;
font-size-adjust:none;
font-stretch:normal;
font-style:normal;
font-variant:normal;
font-weight:bold;
height:17px;
line-height:normal;
margin-bottom:5px;
padding:5px 0;
}
.fieldsection {
margin:8px 20px;
}
input.field_txt, select.field_select {
-moz-background-clip:border;
-moz-background-inline-policy:continuous;
-moz-background-origin:padding;
background:#F5F5F5 none repeat scroll 0 0;
border-color:#9A9A9A #DADADA #CDCDCD #A7A7A7;
border-style:solid;
border-width:1px;
padding:4px;
width:350px;
}
label, #your-profile label + a {
vertical-align:middle;
}
label {
cursor:pointer;
}
.submit { clear:both; margin:5px 20px; }
.clr {
clear:both;
}
#wrapper{padding-top:10px;padding-left:16px;width:780px;}
.clear{clear:both;}

.admin-logo{
	padding-left:0px;
	}
.admin-menu {
    margin: 10px 0 0px 0px;
    padding: 0;
    width: 780px;
	background:#020202;
}
.admin-menu ul {
    list-style: none outside none;
    margin: 0;
    padding: 0;
}
.admin-menu ul li {
    float: left;
    margin: 0;
    padding: 0;}.admin-menu ul li a {
		font-size:11px;
    color: #ffffff;
    display: block;
     font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    height: 35px;
    line-height: 35px;
    padding: 2px 10px 3px;
    text-decoration: none;
}
.admin-menu ul li a:hover {
    background: none repeat scroll 0 0 #0e91c9;
	color:#ffffff;
}

.descleft {
color:#666666;
font-family:arial,helvetica,sans-serif;
font-size:12px;
}

.page-heading{    font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
display:block;
width:765px;background:#0E91C9;color:#ffffff;padding-left:15px;padding-bottom:10px;border:0px;
font-size:20px;padding-top:15px;padding-bottom:15px;margin-bottom:15px;}

.page-content-left{
 font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    color: #333333;
    font-size: 12px;
    line-height: 19px;
	width:480px;float:left;
	border:1px solid #f2f2f2;
	padding:16px;
	background:#ffffff;
	margin-bottom:15px;
	}
	
	.page-content-right{
		 font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    color: #57708a;
    font-size: 12px;
    line-height: 19px;
	width:210px;float:left;
	border:1px solid #f0f6fb;
	padding:16px;
background:#f3f9ff;
margin-left:15px;
margin-bottom:15px;
		
	}
	.section-heading{    font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
display:block;
width:100%;
padding-bottom:6px;
border-bottom:1px solid #e5e5e5;
font-size:15px;padding-top:5px;margin-bottom:15px;font-weight:bold;}

.page-content-right h3{margin-bottom:10px;margin-top:0px;font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;font-style:italic;font-size:14px;}

.page-content-full{
	
	 font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    color: #333333;
    font-size: 12px;
    line-height: 19px;
	width:750px;
	border:1px solid #f2f2f2;
	padding:16px;
	background:#ffffff;
	
}

.text-right {
    color: #777777;
    float: left;
     font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    padding: 0px 0;
    width: 250px;
	margin-left:20px;
	font-size:12px;

	
}

.text-left {
    color: #666666;
    float: left;
     font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    padding: 0px 0;
    width: 480px;
	font-size:12px;

}

.text-description{    color: #999999;
    float: left;
     font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    padding: 0px 0;
    width: 740px;
	font-size:11px;font-style:inherit;
	clear:both;}
.updated, .login .message {
width:763px;
}
</style>
