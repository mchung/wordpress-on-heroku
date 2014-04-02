<?php
/**
 * Miscellaneous Theme Functions
 */
include 'config.php';

// Register widgetized areas
function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;

	register_sidebars(5,array('name' => 'Sidebar %d','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgettitle">','after_title' => '</h3>'));
    register_sidebar(array('name' => 'Membership Sidebar','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgettitle">','after_title' => '</h3>'));
    register_sidebar(array('name' => 'Blog Sidebar','before_widget' => '<div id="%1$s" class="widget %2$s">','after_widget' => '</div>','before_title' => '<h3 class="widgettitle">','after_title' => '</h3>'));

}

add_action( 'init', 'the_widgets_init' );


function new_more_link( $more_link, $more_link_text ) {
	return str_replace('more-link', 'more-link button_link', $more_link );
}
add_filter('the_content_more_link', 'new_more_link', 10, 2);


function new_excerpt_more($excerpt) {
	return str_replace('[...]', '...', $excerpt);
}
add_filter('wp_trim_excerpt', 'new_excerpt_more');


function new_comment_author_link($return) {
	return str_replace($return, "<span></span>$return", $return);
}
add_filter('get_comment_author_link', 'new_comment_author_link');


function optpress_excerpt($length, $ellipsis) {
	$text = get_the_content();
	$text = preg_replace('`\[[^\]]*\]`','',$text);
	$text = strip_tags($text);
	//$text = preg_replace("/<img[^>]+\>/i", "", $text);
	$text = substr($text, 0, $length);
	$text = substr($text, 0, strripos($text, " "));
	$text = $text.$ellipsis;
	return $text;
}

function optpress_truncate($string, $limit, $break=".", $pad="...") {
	if(strlen($string) <= $limit) return $string;
	
	 if(false !== ($breakpoint = strpos($string, $break, $limit))) {
		if($breakpoint < strlen($string) - 1) {
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	  }
	return $string; 
}

function optpress_image_resize($height,$width,$img_url) {

	$image['url'] = $img_url;
	$image_path = explode($_SERVER['SERVER_NAME'], $image['url']);
	$image_path = $_SERVER['DOCUMENT_ROOT'] . $image_path[1];
	$image_info = @getimagesize($image_path);

	// If we cannot get the image locally, try for an external URL
	if (!$image_info)
		$image_info = @getimagesize($image['url']);

	$image['width'] = $image_info[0];
	$image['height'] = $image_info[1];
	if($img_url != "" && ($image['width'] > $width || $image['height'] > $height || !isset($image['width']))){
		$img_url = OPTPRESS_SCRIPTS_FOLDER."/thumb.php?src=$img_url&amp;w=$width&amp;h=$height&amp;zc=1&amp;q=100";
	}
	
	return $img_url;
}

// Contact Form
function optpress_contact_form($email) {

	$email_adress_reciever = $email != "" ? $email : get_option('admin_email');
	
	//If the form is submitted
	if(isset($_POST['submittedContact'])) {
		require(OPTPRESS_INCLUDES . "/submit.php");
	}
	
	if(isset($emailSent) && $emailSent == true) {
		
		$out .= '<a name="contact_"></a>';
		$out .= '<p class="thanks"><strong>Thanks!</strong> Your email was successfully sent.</p>';
		
	} else {
		
		if(isset($captchaError)) {
			$out .= '<a name="contact_"></a>';
			$out .= '<p class="error">There was an error submitting the form.<p>';
		}
		
		$out .= '<a name="contact_"></a>';
		$out .= '<form action="' .get_permalink(). '#contact_" id="contact_form" method="post">';
		$out .= '<p><input type="text" name="contactName" id="contactName" value="';
		
		if(isset($_POST['contactName'])) {
			$out .= $_POST['contactName'];
		}
		$out .= '"';
		$out .= ' class="requiredFieldContact textfield';
		
		if($emailError != '') {
			$out .= ' inputError';
		}
		$out .= '"';
		$out .= ' size="22" tabindex="1" /><label class="textfield_label" for="contactName">Name *</label></p>';
		
		$out .= '<p><input type="text" name="email" id="email" value="';
		
		if(isset($_POST['email'])) {
			$out .= $_POST['email'];
		}
		$out .= '"';
		$out .= ' class="requiredFieldContact email textfield';
		
		if($emailError != '') {
			$out .= ' inputError';
		}
		$out .= '"';
		$out .= ' size="22" tabindex="2" /><label class="textfield_label" for="email">Email *</label></p>';
		
		$out .= '<p><textarea name="comments" id="commentsText" rows="20" cols="30" tabindex="3" class="requiredFieldContact textarea';
		
		if($commentError != '') {
			$out .= ' inputError';
		}
		$out .= '">';
		
		if(isset($_POST['comments'])) { 
			if(function_exists('stripslashes')) { 
				$out .= stripslashes($_POST['comments']); 
				} else { 
					$out .= $_POST['comments']; 
				} 
			}
		$out .= '</textarea></p>';
		
		$out .= '<p class="screenReader"><label for="checking" class="screenReader">If you want to submit this form, do not enter anything in this field</label><input type="text" name="checking" id="checking" class="screenReader" value="';
		
		 if(isset($_POST['checking'])) {
			echo $_POST['checking'];
		}
		$out .= '" /></p>';
		
		$out .= '<p class="loadingImg"></p>';
		$out .= '<p><input name="submittedContact" id="submittedContact" class="button"  tabindex="4" value="Submit" type="submit" /></p>';
		$out .= '<p class="screenReader"><input id="submitUrl" type="hidden" name="submitUrl" value="' .get_template_directory_uri(). '/lib/includes/submit.php" /></p>';
		$out .= '<p class="screenReader"><input id="emailAddress" type="hidden" name="emailAddress" value="' .$email_adress_reciever. '" /></p>';
	
		$out .= '</form>';

	}
	return $out;
}

/* START - LICENSING FUNCTIONS */

function curl_get_file_contents($URL){
$c = curl_init();
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($c, CURLOPT_URL, $URL);
$contents = curl_exec($c);
curl_close($c);
if ($contents) {
	return $contents;
} else {
	return false;
}
}

add_option( 'OptimizePress_active', '0' );
add_option( 'OptimizePress_licensekey', '0' );

function url($url){
        $dom = strstr($url,'//');
        $dom = substr($dom,2);
        $mydom = explode("/",$dom);
        $suburl = strstr($mydom[0],'.');
        if($suburl!=".com" || $suburl==".net" || $suburl==".org" || $suburl==".biz" || $suburl==".us" || $suburl==".cc" || $suburl==".tv" || $suburl==".info" || $suburl==".mobi" || $suburl==".co" || $suburl==".me"){
            $result = substr($suburl,1);
            return($result);
        }else{
            return($mydom[0]);
        }
    }
	
function CheckLicense() {
	if (!get_option('OptimizePress_active') >0 || !get_option('OptimizePress_licensekey') >0) {
		echo 'This theme is not yet activated, please enter the license key to activate the theme.';
		exit;
	} /*else {
		$LicKey = get_option('OptimizePress_licensekey');
		$LicFile='http://www.optimizepress.com/licences/'.$LicKey.'.xml';
		$LicContents = curl_get_file_contents($LicFile);
		if ($LicContents) {
		$LicDomain = $_SERVER['HTTP_HOST'];
		if (!strstr($LicContents, $LicDomain)) {			
			echo 'There appears to be a problem with your license. Please ensure you have licensed your domain correctly following the instructions in the members area. Contact check <a href="http://www.optimizepress.com/support">Support Site</a> for more help';
			exit;
		}
		} else {
			echo 'There appears to be a problem with your license. Please ensure you have licensed your domain correctly following the instructions in the members area. Contact check <a href="http://www.optimizepress.com/support">Support Site</a> for more help';
			exit;
		}
	}*/
		
	
}
add_action('wp_head', 'CheckLicense');

function CheckLicenseAdmin($LicKey, $LicDomain) {
	
	$LicFile='http://optimizehq.com/licences/'.$LicKey.'.xml';
	$LicContents = curl_get_file_contents($LicFile);
	if ($LicContents) {
	#if (@fopen($LicFile, "r")) {
		$LicDomain = $_SERVER['HTTP_HOST'];
		#$LicContents = file_get_contents($LicFile);
		if (!strstr($LicContents, $LicDomain)) {			
			$issue = 1;
		} else {
			$issue = 3;
		}
	} else {
		$issue = 2;
	}
  return $issue;	
}

function CheckLicenseFileAdmin() {
		$LicKey = get_option('OptimizePress_licensekey');
		if (!$LicKey > 0) {
			echo 'Please enter your license key below.  You can get your license key from the <a href="http://www.optimizepress.com/members" target="_blank">OptimizePress members area</a> where you will need to enter<br /> the URL of this site in order to  authorize this domain for use with OptimizePress.  Your license key will normally be your email address<br /><br />
<form method="post" enctype="multipart/form-data" acceptCharset="UTF-8" action="">Enter license key here: <input type="text" name="lickey" id="lickey" /><br />
<input type="submit" value="Click Here to License This Site" class="licensebutton" /><input name="keypost" type="hidden" value="1" />
</form>';
		} else {
			echo '<div style="padding-bottom:15px;"><span style="color:green; font-weight:bold;">OptimizePress is activated.</span></div>';
		}
}
/* END - LICENSING FUNCTIONS */


/* START - FUNCTIONS BY STARCOM SYSTEMS */
function get_shortname() {
	$shortname = "OptimizePress";
	return $shortname;
}

add_action('wp_head', 'get_shortname');

function optpress_frnt_scripts() {	
	#wp_enqueue_style( 'optpress-admin', OPTPRESS_ADMIN_CSS .'/styles_admin.css', false, '1.0.0', 'screen' );
	wp_enqueue_script('optpress-jscookie', get_template_directory_uri() . '/js/js_cookie.js', '', '1.0');
}
add_action('init', 'optpress_frnt_scripts');

/* END - FUNCTIONS BY STARCOM SYSTEMS */

?>