<script type="text/javascript" src="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/js/thickbox.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo( 'template_directory' );?>/colorpicker/jscolor/jscolor.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo( 'template_directory' );?>/admin/optin.js"></script>
<link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/css/thickbox.css" type="text/css" media="screen" />
<style>
table.optpress-options { margin-left:10px; }
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
#wrapper{padding-top:10px;padding-left:0;width:780px;}


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
.toplink{color:#666666;padding-left:20px;float:left;}
.toplink a:hover{color:#333333;text-decoration:underline;}
.toplink a{color:#666666;text-decoration:none;}
.selected1{background:#0e91c9;}
</style>
<div id="templateinfo" style="padding-left:16px;">
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
            <li class="selected1"><a href="admin.php?page=admin-configs">Funnel Config</a></li>
            <li><a href="admin.php?page=funnel-settings">Funnel Page Setup</a></li>
			</ul>
			<br style="clear: left;">
  </div>
<span class="page-heading">OptimizePress Funnel Configuration</span>
<div class="clear"></div>
</div><!--close wrapper-->
</div>
<fieldset> 

<?php 
$shortname = "OptimizePress";
?>
  
  <?php
  if ($_REQUEST['updateconfi'] <> '') {
	  $launch_type = $_REQUEST['launch_type'];
	  $num_launch = $_REQUEST['num_launch'];
	  $coming_image = $_REQUEST['csimg'];
	  $squeeze_page = $_REQUEST['squeeze_page'];
	  $frm_cookie = $_REQUEST['frm_cookie'];
	  $lnc_current_page = $_REQUEST['lnc_current_page'];
	  $currentsalespagenavcolor = $_REQUEST['currentsalespagenavcolor'];
	  $currentsalespagetitletxt = $_REQUEST['currentsalespagetitletxt'];
	  $showcurrentsalespagetitletxt = $_REQUEST['showcurrentsalespagetitletxt'];
	    
	  //Update Options in mysql
	  update_option( $shortname.'_launch_type', $launch_type );
	  update_option( $shortname.'_num_launch', $num_launch );
	  update_option( $shortname.'_squeeze_page', $squeeze_page );
	  update_option( $shortname.'_coming_image', $coming_image );
	  update_option( $shortname.'_frm_cookie', $frm_cookie );
	  update_option( $shortname.'_lnc_current_page', $lnc_current_page );
	  update_option( $shortname.'_currentsalespagenavcolor', $currentsalespagenavcolor );
	  update_option( $shortname.'_currentsalespagetitletxt', $currentsalespagetitletxt );
	  update_option( $shortname.'_showcurrentsalespagetitletxt', $showcurrentsalespagetitletxt );
	  
	  echo "<script>window.location='".$_SERVER["REQUEST_URI"]."&update=success'</script>";
  }
  
  $launch_type = get_option($shortname.'_launch_type');
  $num_launch = get_option($shortname.'_num_launch');
  $squeeze_page = get_option($shortname.'_squeeze_page');
  $coming_image = get_option($shortname.'_coming_image');
  $frm_cookie = get_option($shortname.'_frm_cookie');
  $lnc_current_page = get_option($shortname.'_lnc_current_page');
  $pre_coming_image = str_replace(get_bloginfo('template_directory').'/images/cs/','',$coming_image);
  $currentsalespagenavcolor = get_option($shortname.'_currentsalespagenavcolor');
  $currentsalespagetitletxt = get_option($shortname.'_currentsalespagetitletxt');
  $showcurrentsalespagetitletxt = get_option($shortname.'_showcurrentsalespagetitletxt');
  
  if ($_REQUEST['update'] == 'success') {
	  
  ?>
  <div class="fieldsection">
  <div class="MsgSuccess" style="border:none;">Configuration updated successfully.</div>
  </div>
  <?php } ?>
  <div class="fieldsection">
  <div id="AdmFormBox" style="width:100%;margin-top:0px;">
  <div>
  <div style="background-color:#EEF9FF;border:1px solid #B2D9EE;padding-left:20px;color:#1c5675;margin-top:0px;padding-top:14px;padding-bottom:14px;padding-right:20px;">
    <p><center><strong><a href="http://www.optimizepress.com/training/launch-setup/how-to-setup-a-product-launch-funnel/" target="_blank">Click here to view the Launch Setup Tutorials</a></strong></center></p><br />
  The options on this page control the overall setup of your launch funnel.&nbsp; If you want to do a one-off launch, (pages live for everyone at same time), choose  <strong>&ldquo;One-Off&rdquo;</strong> below. If you are running a <strong>Perpetual or Evergreen launch</strong> (where your site always gives the appearance of being in launch mode), choose that&nbsp;  option below.&nbsp;&nbsp;<br />
  <br />
  When you setup your autoresponder on your squeeze page, you must to ensure the Success Page or thank you page URL is set to be your first launch page with
  the value &ldquo;?setuser=1199&rdquo; attached. For example:&nbsp;<strong>http://www.yourdomain.com/launch-page-1/?setuser=1199</strong><br />
<br />
  <strong><span style="color:#C00">Note:</span></strong> If you are using the gateway system, you need to enable cookie checking on each individual page in your funnel.  To do this, create your page and in the page customization options (below the main editor) you should tick the <strong>"Enable Cookie Checking/Gateway"</strong> option.  


  </div>
  <br />
  </div>
  
<form name="form1" method="post" action="<?php echo $_SERVER["REQUEST_URI"] ?>">
  <table width="100%" border="0">
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>

        <div class="fieldtitle">Choose Your Launch Type</div>
      <div class="field-left">
        <label>
          <input type="radio" name="launch_type" value="1" id="launch_type_0" <?php if ($launch_type == 1) { ?>checked="checked"<?php } ?> />
          Perpetual/Evergreen</label>
        <br />
        <label>
          <input type="radio" name="launch_type" value="2" id="launch_type_1" <?php if ($launch_type == 2) { ?>checked="checked"<?php } ?> />
          One-Off/Timed</label>
          
          </div>
          
          <div class="field-right">
           (see explaination above or <a href="http://www.optimizepress.com/members" target="_blank">click here</a>) for more information
          </div>
          
          <div class="clr" style="padding-bottom:20px;"></div>
          
             <div class="fieldtitle">Number of Launch Pages</div>
          <div class="field-left">
           <input name="num_launch" type="text" id="num_launch" value="<?php echo $num_launch; ?>" size="50" />
          </div>
          
          <div class="field-right">
          You can set as many pages as you wish for your launch funnel, but be aware this may affect the styling of your pages if you have lots of pages 
          </div>
           <div class="clr" style="padding-bottom:20px;"></div>


<div class="fieldtitle">Coming Soon/Inactive Thumbnail Image</div>
   
<div class="field-left">
<!--<select name="pre_coming_image" id="pre_coming_image">    
            <?php /*
$dir = dir("../wp-content/themes/OptimizePress/images/cs");
//List files in images directory
while (($file = $dir->read()) !== false)
{
	if ($file <> '.' && $file <> '..' && $file <> 'Thumbs.db') {
		echo "<option value=".get_bloginfo('template_directory')."/images/cs/".$file;
		if ($pre_coming_image == $file) {
			echo " selected=selected ";
		}
		echo ">" . $file ;
		echo "</option>";
		
	}
}

$dir->close();*/
?>
</select>-->
<input name="csimg" type="text" id="csimg" size="50" value="<?php echo $coming_image; ?>" readonly="readonly">
<br />
<a href="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/media-upload.php?placeValuesBeforeTB_=savedValues&TB_iframe=true&height=600&width=825&modal=true&" class="thickbox">Select Image OR Upload New</a>
</td>
</div>
 <div class="field-right">
 Set the coming soon thumbnail image for your funnel. This thumbnail will be used for any pages which are not active.&nbsp; If you wish to use an item from the drop down menu, please ensure you first clear the text in the custom image field. 
 </div>
 <div class="clr" style="padding-bottom:20px;"></div>


<div class="fieldtitle">
Squeeze Page/Funnel Entry Page
</div>

<div class="field-left">
 <select name="squeeze_page"> 
    <option value="">
      <?php echo attribute_escape(__('Select page')); ?></option> 
    <?php 
  $pages = get_pages(); 
  foreach ($pages as $pagg) {
	  
  	$option = '<option value="'.$pagg->ID.'" ';
	 if ($squeeze_page == $pagg->ID) {
	$option .=  'selected';
	}
	$option .= ' >';
	$option .= $pagg->post_title;
	$option .= '</option>';
	echo $option;
  }
 ?>
  </select>
</div>

 <div class="field-right">
Set the squeeze page you will be using for your funnel. This is the page your visitors will see before opting in to your funnel.&nbsp; They will be redirected back to this page if they have not previously subscribed.&nbsp; (Please note if your visitor clears their cookies they will also see this page again)
 </div>
 <div class="clr" style="padding-bottom:20px;"></div>



<div class="fieldtitle">Enable Cookie Checking &amp; Gateway System</div>

<div class="field-left">
 <label>
          <input type="radio" name="frm_cookie" value="1" id="launch_type_2" <?php if ($frm_cookie == 1) { ?>checked="checked"<?php } ?> />
          Yes</label>
        <br />
        <label>
          <input type="radio" name="frm_cookie" value="0" id="launch_type_3" <?php if ($frm_cookie == 0) { ?>checked="checked"<?php } ?> />
          No</label>
</div>

 <div class="field-right">
Ensure this option is set to &ldquo;Yes&rdquo; if you want to use the gateway system for your pages. If you turn this option off, all pages will be accessible with no cookie checking. <strong><span style="color:#C00">Important:</span></strong> We recommend turning this option on AFTER you have created your pages. If not, you will be redirected when testing/previewing your pages. 
 </div>
 <div class="clr" style="padding-bottom:20px;"></div>
 <div class="fieldtitle">Current Launch Page/Redirect Page</div>
<div class="field-left">
<select name="lnc_current_page"> 
    <option value="">
      <?php echo attribute_escape(__('Select page')); ?></option> 
    <?php 
  $pages1 = get_pages(); 
  foreach ($pages1 as $pagg1) {
	  
  	$option1 = '<option value="'.$pagg1->ID.'" ';
	 if ($lnc_current_page == $pagg1->ID) {
	$option1 .=  'selected';
	}
	$option1 .= ' >';
	$option1 .= $pagg1->post_title;
	$option1 .= '</option>';
	echo $option1;
  }
 ?>
  </select>
</div>

 <div class="field-right">
Use this field to set the page your new subscribers will be redirected to. If you are running a one-off launch you can change this during your launch so new visitors will see the latest video. Note that you must still set your autoresponder redirect with the ?setuser=1199 value.
 </div>
 <div class="clr" style="padding-bottom:20px;"></div>
 <div class="fieldtitle">Current Launch Page Navbar Color</div>
 <div class="field-left">
 <input type="text" class="color" id="currentsalespagenavcolor" style="width:85px;" value="<?php echo $currentsalespagenavcolor; ?>" name="currentsalespagenavcolor" />
 </div>

 <div class="field-right">
Set the highlight color for the current page on the launch navbar that the user currently is viewing in your funnel
 </div>

 <div class="clr" style="padding-bottom:20px;"></div>
 <div class="fieldtitle">Launch Sidebar Title</div>
 <div class="field-left">
 <input type="text" id="currentsalespagetitletxt" size="50" value="<?php echo $currentsalespagetitletxt; ?>" name="currentsalespagetitletxt" />
 </div>

 <div class="field-right">Activate a title above the launch thumbnails sidebar and set the title text (max 18 characters)
 </div>
 <div class="field-left">
 <input type="checkbox" id="showcurrentsalespagetitletxt" <?php if ($showcurrentsalespagetitletxt == 'on') { ?>checked="checked"<?php } ?> name="showcurrentsalespagetitletxt" />
 <span style="color:#666666;font-family:arial,helvetica,sans-serif;font-size:12px;font-size-adjust:none;font-stretch:normal;font-style:normal;font-variant:normal;font-weight:normal;line-height:normal;">Show Launch Sidebar Title</span>
 </div>

 <div class="field-right">
 </div>
 <div class="clr" style="padding-bottom:20px;"></div>

   <tr>
      <td><input type="submit" name="updateconfi" id="updateconfi" value="Update Configurations" /></td><td></td>
    </tr>
  </table>  
</form>  
</div>
</div>
</fieldset>