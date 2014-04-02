<?php

// Bootstrap file for getting the ABSPATH constant to wp-load.php
require_once('config.php');

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
<body id="link" onLoad="tinyMCEPopup.executeOnLoad('init();');document.body.style.display='';document.getElementById('portfolio_category').focus();" style="display: none">
<!-- <form onsubmit="insertLink();return false;" action="#"> -->
	<form name="optpress_portfolio" action="#">
	<div class="tabs">
		<ul>
			<li id="style_tab"><span><a href="javascript:mcTabs.displayTab('style_tab','style_panel');" onMouseDown="return false;"><?php echo 'Styles'; ?></a></span></li>
		</ul>
	</div>
	
	<div class="panel_wrapper" style="height:142px;">
		
		
		<!-- style_panel -->
		<div id="style_panel" class="panel">
		<br />
		<fieldset>
			<legend>Select the Style Shortcode you would like to insert into the post.</legend>
		<table border="0" cellpadding="4" cellspacing="0">
         <tr>
            <td nowrap="nowrap"><label for="style_shortcode">Select Custom Style:</label></td>
            <td><select id="style_shortcode" name="style_shortcode" style="width: 200px">
                <option value="0">No Style</option>
				<?php
				if(is_array($shortcode_tags)) {
					foreach ($shortcode_tags as $optpress_sc_key => $optpress_sc_value) {
						if( preg_match('/optpress/', $optpress_sc_value) ) {
							$optpress_sc_name = str_replace('optpress_', '' ,$optpress_sc_value);
							$optpress_sc_name = str_replace('_', ' ' ,$optpress_sc_name);
							$optpress_sc_name = ucwords($optpress_sc_name);
							echo '<option value="' . $optpress_sc_key . '" >' . $optpress_sc_name . '</option>' . "\n";
						}
					}
				}
				?>
            </select></td>
          </tr>
        </table>
		</fieldset>
		</div>
	
	</div>

	<div class="mceActionPanel">
		<div style="float: left">
			<input type="button" id="cancel" name="cancel" value="<?php echo "Cancel"; ?>" onClick="tinyMCEPopup.close();" />
		</div>

		<div style="float: right">
			<input type="submit" id="insert" name="insert" value="<?php echo "Insert"; ?>" onClick="insertOptPressLink();" />
		</div>
	</div>
</form>
</body>
</html>
