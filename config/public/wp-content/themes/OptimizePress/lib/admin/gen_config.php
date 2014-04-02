<?php 
$themename = "OptimizePress";
$shortname = "OptimizePress";
$page_handle = $shortname . '-genconfigs';
?>
<?php
/* The Options*/
$gen_options = array (

		array(	"type" => "openfieldset"),
		
				array(	"name" => "Header Upload",
			"desc" => "Click browse to select a header image to upload (Recommended Width: 977px)'.",
			"id" => "header_img_images",
			"type" => "upload"),
			
		
			array(	"name" => "Header height",
			"desc" => "Enter the height of your header. Please only use numbers, do not add (px) on the end",
			"id" => "header_height",
			"type" => "text"),
		
			
		array(	"name" => "Header Full Width Background",
			"desc" => "Paste the full URL of your header image e.g. 'http://www.yoursite.com/header.png'.",
			"id" => "header_fullwidth",
			"type" => "text",
			"size" => "70"),

		array(	"name" => "Favicon URL",
			"desc" => "Please specifiy the URL of the favicon you wish to use on your site",
			"help"			=> "This is a sample help text for Enable Cookie Checking/Gateway",
			"videotxt"		=> "click here to view full tutorial",
			"videolink"		=> "http://www.optimizepress.com/members",
			"id" => "favicon_url",
			"type" => "text",
			"size" => "70"),
			
		array(	"name" => "Logo Upload",
			"desc" => "Click browse to select a logo image to upload (max width: 977px)'.",
			"id" => "custom_logo_upload_images",
			"help"			=> "This is a sample help text for Enable Cookie Checking/Gateway",
			"videotxt"		=> "click here to view full tutorial",
			"videolink"		=> "http://www.optimizepress.com/members",
			"type" => "upload"),
			
		array(	"name" => "Logo Alignment",
			"desc" => "",
			"id" => "logo_align",
			"help"			=> "This is a sample help text for Enable Cookie Checking/Gateway",
			"videotxt"		=> "click here to view full tutorial",
			"videolink"		=> "http://www.optimizepress.com/members",
			"type" => "select_align",
			"options" => $align_list),
			
	
			
		array(	"name" => "Copyright Footer Text",
			"desc" => "Enter the copyright text that you would like to display in the footer. Note that our system will automatically add the 'Copyright ©' text to the start of your copyright message",
			"id" => "footer_text",
			"type" => "text",
			"std" => "",
			"size" => "70"),
			
		array(	"name" => "",
			"desc" => "Display powered by text",
			"id" => "footer_poweredby",
			"value" => "true",
			"default" => "checked",
			"help"			=> "This is a sample help text for Enable Cookie Checking/Gateway",
			"videotxt"		=> "click here to view full tutorial",
			"videolink"		=> "http://www.optimizepress.com/members",
			"type" => "checkbox"),
		
		array(	"name" => "",
			"desc" => "Enter your OptimizePress affiliate link here.   <a href='https://nanacast.com/aj/25796/' target='_blank'>Signup here</a> to get your affiliate account instantly.",
			"id" => "footer_afflink",
			"type" => "text",
			"size" => "70"),
			
		array(	"name" => "Custom Tracking Code (Header)",
			"desc" => "Code will be added just before the &lt;/head&gt; tag. Code entered will be added to all pages including squeeze pages and launch page templates.<br><br>  Place your <strong><span style='color:#62B054'>Google Analytics</span></strong> tracking scripts here. ",
			"id" => "customtrackingcodeheader",
			"type" => "textarea"),
			
		array(	"name" => "Custom Tracking Codes (Footer)",
			"desc" => "Code will be added just before the &lt;/body&gt; tag. Code entered will be added to all pages including squeeze pages and launch page templates.  ",
			"id" => "customtrackingcodefooter",
			"type" => "textarea"),
			
		array(  "name" => "Include Footer Page Links",
			"desc" => "Choose the pages you want to include in the footer.",
			"id" => "footer_include",
			"std" => "",
			"type" => "exclude_include_checkbox",
			"options" => $getpagnav),
		
		array(	"name" => "",
			"desc" => "Open Footer Links In New window",
			"id" => "footerlinkstarget",
			"value" => "true",
			"default" => "checked",
			"type" => "checkbox"),
		
		array(	"name" => "Footer Disclaimer Message",
			"desc" => "",
			"id" => "footerdisclaimermsg",
			"type" => "textarea"),
			
		array(	"name" => "",
			"desc" => "Activate Footer Disclaimer Message",
			"id" => "activatefooterdisclaimermsg",
			"value" => "true",
			"type" => "checkbox"),
		
		array(	"name" => "Custom CSS",
			"desc" => "Add any css code you want to add to ALL pages here",
			"id" => "customcss",
			"type" => "textarea"),

		array(	"type" => "closefieldset"),

		array(	"type" => "close"),
		
		array(	"type" => "submit")
);
global $themename, $shortname, $optpress_categories;
?>
<?php $templatedir = get_bloginfo('template_directory'); ?>
<div id="wrapper">
<img width="262" height="101" class="admin-logo" src="<?php echo $templatedir; ?>/images/oplogo.png">

<div class="admin-menu">
			<ul>
			<li><a href="http://www.optimizepress.com/members" target="_blank">Training &amp; Reference Dashboard</a></li>

            <li><a href="http://optimizepress.com/affiliates" target="_blank">Affiliates</a></li>
            <li><a href="http://www.jolthelpdesk.com" target="_blank">FAQ &amp; Support</a></li>
			</ul>
			<br style="clear: left;">
  </div>
        
<span class="page-heading">General Settings</span>
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
<form method="post" enctype="multipart/form-data" acceptCharset="UTF-8" action="">
<input id="hidden_anchor" type="hidden" name="hidden_anchor" value="" />
<?php 
$get_options = (get_option($shortname.'_gen_settings')!="") ? get_option($shortname.'_gen_settings') : get_option($shortname.'_general_settings');
$tooltips = '';
$videotips = '';

foreach ($gen_options as $value) {
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
case 'divcolor':
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
					<input type="text" value="<?php echo stripslashes(htmlspecialchars($get_options[$id])); ?>" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" style="width: 70px;" class="color" size="<?php echo $value['size']; ?>" autocomplete="off"><br>
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
case 'text':
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
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
case 'color':
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
					<input size="<?php echo $value['size']; ?>" style="width:70px;" class="color" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_options[$id])); ?>" /><br>
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
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
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
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
					<?php if($get_options[$id.'_tick']=="0"){ $checked = ""; }else{ if(empty($get_options[$id.'_tick']) && $value['default']=="checked") { $checked = "checked=\"checked\""; } elseif(empty($get_options[$id.'_tick']) && $value['default']=="") { $checked = ""; } else { $checked = "checked=\"checked\""; } } ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" onclick="this.form.<?php echo $value['id'].'_tick'; ?>.value = (this.checked ? 1 : 0)" id="<?php echo $value['id']; ?>" <?php echo $checked; ?> />&nbsp;<input name="<?php echo $value['id'].'_tick'; ?>" id="<?php echo $value['id'].'_tick'; ?>" type="hidden" value="<?php echo $get_options[$id.'_tick']; ?>" />
					<?php echo $value['desc']; ?>
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
case "navbaralign": 
$array = array('left','center');
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
                    <select id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" style="width:125px;"><br>
					<?php
                    foreach ($array as $i => $value) {
                        $selected = ( $get_options[$id] == $value ) ?  'selected="selected"' : '';
                        if( $get_options[$id] == "" ) {
                            $checked = ( ( $value[ 'default_value' ] ) == $value ) ?  'selected="selected"' : '';
                        }
                        echo '<option '.$selected.' '.$checked.' value="'.$value.'">'.$value.'</option>';									
                    }
                    ?>
                    </select>
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
case 'file':
?>
<tr valign="top" <?php if ($value['selector']) {echo 'id="toggle_click" class="selected_categories"';} if ( ($get_options['homepage_slider'] == 'custom' || $get_options['homepage_slider'] == 'flash' || $get_options['homepage_slider'] == '') && ($value['selector']) ){echo ' style="display:none"';} ?>>
<th align="left"><?php echo $value['name']; ?></th>
<td><input size="<?php echo $value['size']; ?>" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php echo stripslashes(htmlspecialchars($get_options[$id])); ?>" />
<?php
echo ( $value[ 'help' ] ) ? ' <span class="help" id="' . $value[ 'id' ] .'_help" title="' . $value[ 'help' ] . '"> </span>' : '';
echo ( $value[ 'videotxt' ] ) ? ' <a href="' . $value[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $value[ 'id' ] .'_video" title="' . $value[ 'videotxt' ] . '"> </span></a>' : '';
?>
<br /><span><?php echo $value['desc']; ?></span></td>
</tr>
<?php if(get_option($value['id'] .'_images')) { ?>
<tr valign="top">
<th align="left">
</th>
<td>
<?php
    echo '<label>Uploaded Images:</label><img style="vertical-align:text-top;" src="' . get_option($value['id'] .'_images').'">';
?>
</td>
</tr>
<?php } ?>
<?php 
break;
case 'upload':
?>
<div id="<?php echo $value['id']; ?>_upload-field" class="fieldsection">

				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
					<input type="text" value="<?php echo htmlspecialchars($get_options[$id]); ?>" class="field_txt uploaded_url" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>"><br><br><span class="image_upload_button button " id="<?php echo $value['id']; ?>_upload-btn">Upload Image</span>
				<input type="hidden" class="ajax_action_url" value="<?php echo admin_url("admin-ajax.php"); ?>" name="<?php echo $value['id']; ?>_action"></div>
                <div class="field-right"><?php echo $value['desc']; ?></div>
				<div class="clr"></div>
</div>
	
<?php
break;
case "submit":
?>
<div class="submit optpress-submit"><input class="button-primary" type="submit" name="updategen" value="Save changes"/><input type="hidden" name="action" value="save" /></div>
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
    });
    </script>
<style>
#wpbody-content fieldset { border:1px solid #E1E1E1;margin:0 16px 20px;padding:10px 20px 0 5px;width:753px; background-color:#FFF; }
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
#wrapper{padding-top:10px;padding-left:16px;}

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
    padding: 0;}
	
	.admin-menu ul li a {
		font-size:14px;
    color: #ffffff;
    display: block;
     font-family: "Lucida Grande","Lucida Sans Unicode",Helvetica,Arial,Verdana,sans-serif;
    height: 35px;
    line-height: 35px;
    padding: 2px 10px 0;
    text-decoration: none;
}
.admin-menu ul li a:hover {
    background: none repeat scroll 0 0 #0e91c9;
	color:#ffffff;
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

.selected1{background:#0e91c9;}
</style>
<?php
/**
 * Start Admin Functions
 */
if($_POST['updategen']) {
	$hidden_anchor = $_REQUEST['hidden_anchor'];
	$send = $_GET['page'];
	if ( $_GET['page'] == $page_handle ) {
	if ( 'save' == $_REQUEST['action'] ) {		
		//Updates membership page settings
		$options_array = array();
		foreach ($gen_options as $value) {		
			if($value['id'] != 'sidebar_generator_0'){
				$options_array[$value['id']] = $_REQUEST[ $value['id'] ]; 
			}
		}
			$options_array['showcommentstatsonmodulepages_tick'] = $_REQUEST[ 'showcommentstatsonmodulepages_tick' ]; 
			update_option( $shortname.'_gen_settings', $options_array);

		echo "<script>window.location='admin.php?page=".$send."&saved=true'</script>";
		die;
			} else if( 'reset' == $_REQUEST['action'] ) {
		foreach ($gen_options as $value) {
			delete_option( $value['id'] ); }
			header("Location: admin.php?page=$send&reset=true$hidden_anchor");
		die;
		}
	}	
}
?>