<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('../../config.php');
require_once('custom_shortcode.php');

// check for rights
if ( !is_user_logged_in() || !current_user_can('edit_posts') ) 
	wp_die(__("You are not allowed to be here"));
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo $themename .' Shortcode'; ?></title>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php echo get_option('blog_charset'); ?>" />
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/tiny_mce_popup.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/mctabs.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_option('siteurl') ?>/wp-includes/js/tinymce/utils/form_utils.js"></script>
	<script language="javascript" type="text/javascript" src="<?php echo get_template_directory_uri() ?>/lib/admin/tinymce/tinymce.js"></script>
	<base target="_self" />
</head>
<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="optpress_portfolio" action="#">
	<div class="tabs">
		<ul>
			
			<li id="style_tab" class="current"><span><a href="javascript:mcTabs.displayTab('style_tab','custom_panel');" onMouseDown="return false;"><?php echo 'Style List'; ?></a></span></li>
	
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height:auto;">		
		<!-- custom_panel -->
		<div id="custom_panel" class="panel current" style="height:auto;">
		<br />
		<fieldset>
			<legend>Select Custom Style</legend>

			<?php
            if(is_array($shortcode_tags)) {
				$i=1;$m=1;
                foreach ($shortcode_tags as $optpress_sc_key => $optpress_sc_value) {
					$checked = ($i=='1') ? ' checked="checked"' : '';
                    if( preg_match('/op_custom/', $optpress_sc_value) ) {
                        $optpress_sc_name = str_replace('op_custom_', '' ,$optpress_sc_value);
                        $optpress_sc_imgname = str_replace('_', '-' ,$optpress_sc_name);
                        $optpress_sc_name = str_replace('_', ' ' ,$optpress_sc_name);
                        $optpress_sc_name = ucwords($optpress_sc_name);
						echo '<div style="float:left;width:190px;text-align:center;padding:10px 0;">
						 <img width="190" src="'.get_bloginfo('template_directory').'/images/custom/'.$optpress_sc_imgname.'.png"><br>
						 '.$optpress_sc_name.'<br>
						 <input '. $checked .' type="radio" name="customstyle" value="' . $optpress_sc_key . '" />
						</div>';
						echo ($m=='3') ? '<div style="clear:both;"></div>' : '';
						$m = ($m=='3') ? 0 : $m;
                    $i++; $m++; }
                }
            }
            ?>
            
            <div style="clear:both;padding:10px 0;"></div>
		</fieldset>
		</div>
		<div style="clear:both;"></div>
	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php echo "Cancel"; ?>" onClick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php echo "Add To Page"; ?>" onClick="insertCustomOPLink();" />
		</div>
        <div style="clear: both;"></div>
	</div>
</form>
</body>
</html>
