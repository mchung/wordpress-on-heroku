<script type="text/javascript" src="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/js/thickbox.js"></script>
<link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/css/thickbox.css" type="text/css" media="screen" />
<style>
table.optpress-options { margin-left:10px; }
#wpbody-content fieldset { border:1px solid #E1E1E1;margin:0 0px 20px;padding:10px 20px 0 5px;width:753px; background-color:#FFF; }
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
            <li><a href="admin.php?page=admin-configs">Funnel Config</a></li>
            <li class="selected1"><a href="admin.php?page=funnel-settings">Funnel Page Setup</a></li>
			</ul>
			<br style="clear: left;">
  </div>
<span class="page-heading">OptimizePress Funnel Page Settings</span>
<div class="clear"></div>
</div><!--close wrapper-->

<fieldset>

<?php 
$shortname = "OptimizePress";
$launch_type = get_option($shortname.'_launch_type');
$num_launch = get_option($shortname.'_num_launch');
include 'plugin_get_pages_with_status.php';

if ($_REQUEST['updatelaunchpgs'] == 1) {
	for ($ict = 1; $ict <= $num_launch; $ict += 1) {
		
	  $_launch_page = $_REQUEST['lnch_page'.$ict];
	  $_act_lnk_name = $_REQUEST['actlnknm'.$ict];
	  $_inact_lnk_name = $_REQUEST['inactlnknm'.$ict];
	  #if (strstr($_REQUEST['thmb'.$ict], $templatedir)) {
		  $_lnch_thumb = $_REQUEST['thmb'.$ict];
	  #} else {
		  #$_lnch_thumb = $templatedir."/images/uploads/lncthumb/".$_REQUEST['thmb'.$ict];
	  #}
	  
	  $_lnch_cmimg = $_REQUEST['cmimg'.$ict];
	  $_lnch_cmimg_del = $_REQUEST['delcmimg'.$ict];
		
	  //Update Options in mysql
	  update_option( $shortname.'_launch_page_'.$ict, 'lncpg_'.$_launch_page );
	  update_option( $shortname.'_act_lnk_name_'.$ict, $_act_lnk_name );
	  update_option( $shortname.'_inact_lnk_name_'.$ict, $_inact_lnk_name );
	  update_option( $shortname.'_lnch_thumb_'.$ict, $_lnch_thumb );
	  if ($_lnch_cmimg <> '') {
		  update_option( $shortname.'_lnch_cmimg_'.$ict, $_lnch_cmimg );
	  }
	  if ($_lnch_cmimg_del == 1) {
		  delete_option( $shortname.'_lnch_cmimg_'.$ict );
	  }
	  
	  if ($launch_type == 2) {
		  $_mm = $_REQUEST['mm'.$ict];
		  $_jj = $_REQUEST['jj'.$ict];
		  $_aa = $_REQUEST['aa'.$ict];
		  $_hh = $_REQUEST['hh'.$ict];
		  $_mn = $_REQUEST['mn'.$ict];
		  $_ii = date('i');
		  $_future_date = $_aa.'-'.$_mm.'-'.$_jj.' '.$_hh.':'.$_mn.':'.$_ii;
		  
		  // Update post $_launch_page
		  $post_data = array(
			  "ID" => $_launch_page,
			  "post_date" => $_future_date,
			  "post_date_gmt" => $_future_date,
			  "edit_date" => true,
			  "post_status" => 'future'
		  );
		
		// Update the post into the database
		  wp_update_post( $post_data );
		  #print_r($post_data)."<br />";

	  }

	}
		  
	
	echo "<script>window.location='".$_SERVER["REQUEST_URI"]."'&update=success</script>";
}

  if ($_REQUEST['update'] == 'success') {
	  
  ?>
  <div class="MsgSuccess">Funnel setup updated successfully.</div>
  
  <?php } 
if ($launch_type == '') {	
?>
<div class="ErrMsg">The launch type and number of launch pages need to be set from the configuration first.</div>
<?php } 
else {
	?>
    <div class="fieldsection">
<div id="AdmFormBox" style="margin-top:0px;width:100%;">
<div style="background-color:#EEF9FF;border:1px solid #B2D9EE;padding-left:20px;color:#1c5675;margin-top:0px;padding-top:15px;padding-right:20px;padding-bottom:15px;">
<strong><?php echo 'Current Server date/time: '. date("F j, Y, g:i a");#date('Y-m-d H:m:i'); ?></strong>
<div>

</div>
<?php if ($launch_type == 1) {?> 
 <p><center><strong><a href="http://www.optimizepress.com/training/launch-setup/how-to-setup-a-product-launch-funnel/" target="_blank">Click here to view the Launch Setup Tutorials</a></strong></center></p>
  <p>Use the settings below to setup the individual pages to be included in your launch funnel. &nbsp;If you want to add more items to your launch funnel, access the Funnel Configuration page and change the number of launch pages. &nbsp; </p>
 
    <?php } else { ?>
      <p><center><strong><a href="http://www.optimizepress.com/training/launch-setup/how-to-setup-a-product-launch-funnel/" target="_blank">Click here to view the Launch Setup Tutorials</a></strong></center></p>
  <p> Use the settings below to setup the individual pages to be included in your launch funnel. &nbsp;If you want to add more items to your launch funnel, access the Funnel Configuration page and change the number of launch pages. &nbsp;<br />
    <br />
    The active date and time is in the following format: MM - DD - YYYY @ HH : MM. &nbsp; All times are 24 hour clock. &nbsp;Please check the server date and time above to ensure you are setting the right time for your launch as this may vary from your local time. </p>
    
    <br />

  
    <?php } ?>
     </div>
</div>
  <form action="<?php echo $_SERVER["REQUEST_URI"] ?>" method="post" id="frm2">
    <table width="100%" border="0">
      <tr>
        <td width="35%">&nbsp;</td>
        <td width="65%">&nbsp;</td>
      </tr>
      <?php
for ($counter = 1; $counter <= $num_launch; $counter += 1) {
	  $_launch_page = get_option( $shortname.'_launch_page_'.$counter );
	  $_act_lnk_name = get_option( $shortname.'_act_lnk_name_'.$counter );
	  $_inact_lnk_name = get_option( $shortname.'_inact_lnk_name_'.$counter );
	  $_lnch_thumb = get_option( $shortname.'_lnch_thumb_'.$counter );
	  $_lnch_cmimg = get_option( $shortname.'_lnch_cmimg_'.$counter );
	
   ?>
      <tr>
        <td><div class="fieldtitle">Launch page <?php echo $counter; ?></div></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Select page</td>
        <td>
        <select name="lnch_page<?php echo $counter; ?>">
            <option value=""> <?php echo attribute_escape(__('Select page')); ?></option>
            <?php 
  $pages = get_pages_with_status('status=all'); 
  foreach ($pages as $pagg) {
	  
  	$option = '<option value="'.$pagg->ID.'" ';
	 if ($_launch_page == 'lncpg_'.$pagg->ID) {
	$option .=  'selected';
	}
	$option .= ' >';
	$option .= $pagg->post_title;
	$option .= '</option>';
	echo $option;
  }
 ?>
          </select></td>
      </tr>
      <tr>
        <td>Active link name</td>
        <td><input name="actlnknm<?php echo $counter; ?>" type="text" id="actlnknm<?php echo $counter; ?>" value="<?php echo $_act_lnk_name; ?>" size="50" /></td>
      </tr>
      <tr>
        <td>Inactive link name</td>
        <td><input name="inactlnknm<?php echo $counter; ?>" type="text" id="inactlnknm<?php echo $counter; ?>" value="<?php echo $_inact_lnk_name; ?>" size="50" /></td>
      </tr>
      <tr>
        <td>Active Thumbnail</td>
        <td><input name="thmb<?php echo $counter; ?>" type="text" id="thmb<?php echo $counter; ?>" value="<?php echo $_lnch_thumb; ?>" size="50" /> <a href="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/media-upload-lncthumb.php?imgfldnum=thmb<?php echo $counter; ?>&placeValuesBeforeTB_=savedValues&TB_iframe=true&height=600&width=825&modal=true" class="thickbox">Select Image OR Upload New</a></td>
      </tr>
      <tr>
        <td>Coming Soon/Inactive Thumbnail (Optional)</td>
        <td><input name="cmimg<?php echo $counter; ?>" type="text" id="cmimg<?php echo $counter; ?>" value="<?php echo $_lnch_cmimg; ?>" size="50" />
        <?php if ($_lnch_cmimg) { ?>
        <label><input name="delcmimg<?php echo $counter; ?>" type="checkbox" id="delcmimg<?php echo $counter; ?>" value="1" /> Delete Image? </label>
        <?php } ?>
        </td>
      </tr>
      <?php 
	  
	  if ($launch_type == 2) { 
	  	if ($_launch_page <> '') {
			$_launch_page = str_replace('lncpg_', '', $_launch_page);
			$GetPostDate = get_post($_launch_page);
			$brkdate_space = explode(' ', $GetPostDate->post_date);
			$brkdate_date = explode('-', $brkdate_space[0]);
			$brkdate_time = explode(':', $brkdate_space[1]);		
			$curryear = $brkdate_date[0];
			$currday = $brkdate_date[2];
			$currmonth = $brkdate_date[1];
			$currhour = $brkdate_time[0];
			$currminute = $brkdate_time[1];
		} else {
			$curryear = date('Y');
			$currday = date('d');
			$currmonth = date('m');
			$currhour = date('H');
			$currminute = date('i');
		}
			
	  ?>
      <tr>
        <td>Set active date</td>
        <td>
<div class="timestamp-wrap">
            <select id="mm<?php echo $counter; ?>" name="mm<?php echo $counter; ?>" tabindex="4">
              <option value="01" <?php if ($currmonth == '01') {?> selected="selected"<?php } ?>>Jan</option>
              <option value="02" <?php if ($currmonth == '02') {?> selected="selected"<?php } ?>>Feb</option>
              <option value="03" <?php if ($currmonth == '03') {?> selected="selected"<?php } ?>>Mar</option>
              <option value="04" <?php if ($currmonth == '04') {?> selected="selected"<?php } ?>>Apr</option>
              <option value="05" <?php if ($currmonth == '05') {?> selected="selected"<?php } ?>>May</option>
              <option value="06" <?php if ($currmonth == '06') {?> selected="selected"<?php } ?>>Jun</option>
              <option value="07" <?php if ($currmonth == '07') {?> selected="selected"<?php } ?>>Jul</option>
              <option value="08" <?php if ($currmonth == '08') {?> selected="selected"<?php } ?>>Aug</option>
              <option value="09" <?php if ($currmonth == '09') {?> selected="selected"<?php } ?>>Sep</option>
              <option value="10" <?php if ($currmonth == '10') {?> selected="selected"<?php } ?>>Oct</option>
              <option value="11" <?php if ($currmonth == '11') {?> selected="selected"<?php } ?>>Nov</option>
              <option value="12" <?php if ($currmonth == '12') {?> selected="selected"<?php } ?>>Dec</option>
            </select>
            <input name="jj<?php echo $counter; ?>" type="text" id="jj<?php echo $counter; ?>" tabindex="4" value="<?php echo $currday; ?>" size="2" maxlength="2" autocomplete="off" />
            ,
            <input type="text" id="aa<?php echo $counter; ?>" name="aa<?php echo $counter; ?>" value="<?php echo $curryear; ?>" size="4" maxlength="4" tabindex="4" autocomplete="off" />
            @
            <input type="text" id="hh<?php echo $counter; ?>" name="hh<?php echo $counter; ?>" value="<?php echo $currhour; ?>" size="2" maxlength="2" tabindex="4" autocomplete="off" />
            :
            <input type="text" id="mn<?php echo $counter; ?>" name="mn<?php echo $counter; ?>" value="<?php echo $currminute; ?>" size="2" maxlength="2" tabindex="4" autocomplete="off" />
          </div></td>
      </tr>
      <?php } ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <?php } ?>
      <tr>
        <td><input name="updatelaunchpgs" type="hidden" id="updatelaunchpgs" value="1" /></td>
        <td><input type="submit" name="updatelaunches" id="updatelaunches" value="Update Launch Pages" /></td>
      </tr>
    </table>
  </form>
  
  </fieldset>
</div>

<?php } ?>
