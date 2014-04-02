<?php 
$themename = "OptimizePress";
$shortname = "OptimizePress";
$page_handle = $shortname . '-seo';
?>
<?php
/* The Options*/
$seo_options = array (

	

		array(	"type" => "openfieldset"),

		array(	"name" => "",
			"desc" => "<strong>Disable OptimizePress SEO Options</strong> - this will disable all OptimizePress custom SEO options. Check this box if you are using a separate SEO plugin",
			"id" => "seodisableseo",
			"class" => "nofieldtitle",
			"type" => "checkbox"),

		array(	"name" => "",
			"desc" => "Use Canonical URLs",
			"id" => "seousecanonicalurl",
			"class" => "nofieldtitle",
			"type" => "checkbox"),

		array(	"name" => "",
			"desc" => "Automatically do 301 (permanent) redirects for permalink changes",
			"id" => "seoauto301redir",
			"class" => "nofieldtitle",
			"type" => "checkbox"),
			
		array(	"name" => "Home Page Custom Title",
			"desc" => "Enter a custom title for your home page.  This is the page that shows at the main root or home for your site e.g. http://www.yourdomain.com.  You can set the home page for your site in the Settings > <a href='/wp-admin/options-reading.php'>Reading</a> admin options within Wordpress",
			"id" => "seohometitle",
			"type" => "text"),

		array(	"name" => "Home Page Custom Description",
			"desc" => "Enter a custom home page description.  Use this to describe your site in a setence or two. This will be shown in Google under your site title so ensure you include your main keyword in the description",
			"id" => "seohomedesc",
			"type" => "textarea"),

		array(	"name" => "Home Page Custom Keywords",
			"desc" => "Enter the keywords here for your home page. Ensure the keywords are comma separated, and we recommend using a few focused keywords or phrases (less than 5). ",
			"id" => "seohomekeywords",
			"type" => "textarea"),



		array(	"type" => "closefieldset"),

		array(	"type" => "openfieldset"),

		

		array(	"name" => "Page Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%post_title%&gt; - <em>The title of the post</em><br>&lt;%category_title%&gt; - <em>The title of the category</em><br>&lt;%author_login%&gt; - <em>The author login</em><br>&lt;%author_firstname%&gt; - <em>The author first name</em><br>&lt;%author_lastname%&gt; - <em>The author last name</em>",
			"id" => "seopage_title_format",
			"std" => "<%page_title%> | <%site_title%>",
			"type" => "text"),
			
			
			array(	"name" => "Blog Post Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%post_title%&gt; - <em>The title of the post</em><br>&lt;%category_title%&gt; - <em>The title of the category</em><br>&lt;%author_login%&gt; - <em>The author login</em><br>&lt;%author_firstname%&gt; - <em>The author first name</em><br>&lt;%author_lastname%&gt; - <em>The author last name</em>",
			"id" => "seopost_title_format",
			"std" => "<%post_title%> | <%site_title%>",
			"type" => "text"),

		array(	"name" => "Blog Author Pages Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%post_title%&gt; - <em>The title of the post</em><br>&lt;%category_title%&gt; - <em>The title of the category</em><br>&lt;%author_login%&gt; - <em>The author login</em><br>&lt;%author_firstname%&gt; - <em>The author first name</em><br>&lt;%author_lastname%&gt; - <em>The author last name</em>",
			"id" => "seoauthor_title_format",
			"std" => "<%author_nicename%> | <%site_title%>",
			"type" => "text"),

		array(	"name" => "Blog Category Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%category_title%&gt; - <em>The title of the category</em>",
			"id" => "seocat_title_format",
			"std" => "<%category_title%> | <%site_title%>",
			"type" => "text"),

		array(	"name" => "Blog Archive Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%date%&gt; - <em>The original archive title given by WP</em>",
			"id" => "seoarchive_title_format",
			"std" => "<%date%> | <%site_title%>",
			"type" => "text"),

		array(	"name" => "Blog Tag Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%tag%&gt; - <em>The name of the tag</em>",
			"id" => "seotag_title_format",
			"std" => "<%tag%> | <%site_title%>",
			"type" => "text"),

		array(	"name" => "Search Page Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%keyword%&gt; - <em>What was searched for</em>",
			"id" => "seosearch_title_format",
			"std" => "<%keyword%> | <%site_title%>",
			"type" => "text"),

		array(	"name" => "404 Page Title",
			"desc" => "<strong>Available shortcodes:</strong><br> &lt;%site_title%&gt; - <em>Your site title</em><br>&lt;%site_desc%&gt; - <em>Your site description</em><br>&lt;%request_url%&gt; - <em>The original URL path, like \"/url-that-does-not-exist/\"</em><br>&lt;%request_words%&gt; - <em>The URL path in human readable form, like \"Url That Does Not Exist\"</em>",
			"id" => "seo404_title_format",
			"std" => "Nothing found for <%request_words%>",
			"type" => "text"),

		array(	"type" => "closefieldset"),

		array(	"type" => "close"),
		
		array(	"type" => "submit")
);
global $themename, $shortname, $optpress_categories;
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
            <li class="selected1"><a href="admin.php?page=OptimizePress-seo">SEO</a></li>
            <li><a href="admin.php?page=admin-configs">Funnel Config</a></li>
            <li><a href="admin.php?page=funnel-settings">Funnel Page Setup</a></li>
			</ul>
			<br style="clear: left;">
  </div>
        
<span class="page-heading">SEO Options</span>
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
$get_options = (get_option($shortname.'_seo_settings')!="") ? get_option($shortname.'_seo_settings') : get_option($shortname.'_general_settings');
$tooltips = '';
$videotips = '';

foreach ($seo_options as $value) {
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
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
					<input type="text" value="<?php if ( $get_options[$id] != "") { echo stripslashes(htmlspecialchars($get_options[$id])); } else { echo $value['std']; } ?>" class="field_txt" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>"><br>
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
case 'divcolor':
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection"<?php echo ($value['float']!="") ? ' style="float:'.$value['float'].';width:250px;margin:0 20px;"' : ''; ?>>
				<?php if($value['class']!="nofieldtitle") { ?>
                <div class="fieldtitle" <?php echo ($value['name']!="") ? '' : ' style="height:0;"'; ?>><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php } ?>
				<div class="field-left">
					<input type="text" value="<?php echo stripslashes(htmlspecialchars($get_options[$id])); ?>" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" style="width: 70px;" class="color" size="<?php echo $value['size']; ?>" autocomplete="off">&nbsp;
					<span class="descleft"><?php echo $value['desc']; ?></span>
<?php
echo ( $value[ 'help' ] ) ? ' <span class="help" id="' . $value[ 'id' ] .'_help" title="' . $value[ 'help' ] . '"> </span>' : '';
echo ( $value[ 'videotxt' ] ) ? ' <a href="' . $value[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $value[ 'id' ] .'_video" title="' . $value[ 'videotxt' ] . '"> </span></a>' : '';
?>
				</div>
				<div class="field-right"></div>
				<div class="clr"></div>
</div>
<?php echo (!empty($value['clear'])) ? '<div class="clr"></div>' : ''; ?>
<?php 
break;
case 'color':
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection"<?php echo ($value['float']!="") ? ' style="float:'.$value['float'].';width:250px;margin:0 20px;"' : ''; ?>>
				<?php if($value['class']!="nofieldtitle") { ?>
                <div class="fieldtitle" <?php echo ($value['name']!="") ? '' : ' style="height:0;"'; ?>><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php } ?>
				<div class="field-left">
					<input size="<?php echo $value['size']; ?>" style="width:70px;" class="color" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php echo stripslashes(htmlspecialchars($get_options[$id])); ?>" />&nbsp;
					<span class="descleft"><?php echo $value['desc']; ?></span>
<?php
echo ( $value[ 'help' ] ) ? ' <span class="help" id="' . $value[ 'id' ] .'_help" title="' . $value[ 'help' ] . '"> </span>' : '';
echo ( $value[ 'videotxt' ] ) ? ' <a href="' . $value[ 'videolink' ] .'" target="_blank"><span class="video" id="' . $value[ 'id' ] .'_video" title="' . $value[ 'videotxt' ] . '"> </span></a>' : '';
?>
				</div>
				<div class="field-right"></div>
				<div class="clr"></div>
</div>
<?php echo (!empty($value['clear'])) ? '<div class="clr"></div>' : ''; ?>
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
case 'upload':
?>
<div id="<?php echo $value['id']; ?>_upload-field" class="fieldsection">

				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
					<input type="text" value="<?php echo htmlspecialchars($get_options[$id]); ?>" class="field_txt uploaded_url" id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>"><br><br><span class="image_upload_button button " id="<?php echo $value['id']; ?>_upload-btn">Upload Image</span>
				<input type="hidden" class="ajax_action_url" value="<?php echo admin_url("admin-ajax.php"); ?>" name="<?php echo $value['id']; ?>_action"></div>
				<div class="field-right"><?php echo $value['desc']; ?>Type the full path URL to your logo on the text field (must start with http://), or you can upload a new one by clicking the "Upload Image" button. Use a transparent PNG image for best results.</div>
				<div class="clr"></div>
</div>
	
<?php
break;
case "checkbox":
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<?php if($value['class']!="nofieldtitle") : ?>
				<div class="fieldtitle"<?php echo ($value['name']!="") ? '' : ' style="height:0;"'; ?>><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
                <?php endif; ?>
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
case "navbaralign": 
$array = array('left','center');
?>
<div id="op_<?php echo $value['id']; ?>" class="fieldsection">
				<div class="fieldtitle"><label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label></div>
				<div class="field-left">
                    <select id="<?php echo $value['id']; ?>" name="<?php echo $value['id']; ?>" style="width:125px;"><br>
					<?php
					while (list ($i, $val) = each ($array)) {
                        $selected = ( $get_options[$id] == $val ) ?  'selected="selected"' : '';
                        if( $get_options[$id] == "" ) {
                            $checked = ( ( $value[ 'default_value' ] ) == $val ) ?  'selected="selected"' : '';
                        }
                        echo '<option '.$selected.' '.$checked.' value="'.$val.'">'.$val.'</option>';									
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
case "submit":
?>
<div class="submit optpress-submit"><input class="button-primary" type="submit" name="updateseo" value="Save changes"/><input type="hidden" name="action" value="save" /></div>
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
line-height:20px;
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
.toplink{color:#666666;padding-left:20px;float:left;}
.toplink a:hover{color:#333333;text-decoration:underline;}
.toplink a{color:#666666;text-decoration:none;}

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

.selected1{background:#0e91c9;}
</style>
<?php
/**
 * Start Admin Functions
 */
if($_POST['updateseo']) {
	$hidden_anchor = $_REQUEST['hidden_anchor'];
	$send = $_GET['page'];
	if ( $_GET['page'] == $page_handle ) {
	if ( 'save' == $_REQUEST['action'] ) {		
		//Updates membership page settings
		$options_array = array();
		foreach ($seo_options as $value) {		
			if($value['id'] != 'sidebar_generator_0'){
				$options_array[$value['id']] = $_REQUEST[ $value['id'] ]; 
			}
		}
			$options_array['seodisableseo_tick'] = $_REQUEST[ 'seodisableseo_tick' ]; 
			$options_array['seousecanonicalurl_tick'] = $_REQUEST[ 'seousecanonicalurl_tick' ]; 
			$options_array['seoauto301redir_tick'] = $_REQUEST[ 'seoauto301redir_tick' ]; 
			update_option( $shortname.'_seo_settings', $options_array);

		echo "<script>window.location='admin.php?page=".$send."&saved=true'</script>";
		die;
			} else if( 'reset' == $_REQUEST['action'] ) {
		foreach ($seo_options as $value) {
			delete_option( $value['id'] ); }
			header("Location: admin.php?page=$send&reset=true$hidden_anchor");
		die;
		}
	}	
}
?>