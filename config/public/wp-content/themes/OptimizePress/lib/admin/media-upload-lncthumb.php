<?php include "../../../../../wp-config.php"; 
if ( !current_user_can('add_users') ) {
 echo 'You cannot access this file. Sorry.';
 exit;
}
?>
<?php get_template_directory(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' );?>/lib/admin/css/styles_admin.css" type="text/css" media="screen" />
<div style="width:32px; float:right; position:absolute; top:2px; right:4px;"><a href="#" onclick="self.parent.tb_remove();" class="page-txt">Close</a></div>
<?php 
$dir = dir(get_template_directory()."/images/uploads/lncthumb");
$newcsimg = $_REQUEST['newcsimg'];
$imgfldnum = $_REQUEST['imgfldnum'];
$imgpath = $_REQUEST['imgpath'];

if ($newcsimg == 1) {
$path = get_template_directory().'/images/uploads/lncthumb/';
function UploadFile($file,$path)
{
$basename = basename( $file['name']);
$basename = preg_replace("/[&'!@#$%^*()?]/","_",$basename);
$basename = str_replace(' ', '_', $basename);
$new_file_name=date("Ymd").date("H-i-s").$basename;
$target_path  = $path.'/'.$new_file_name;
if(move_uploaded_file($file['tmp_name'], $target_path)) {
return $new_file_name;
} else{
}
}
$path = $imgpath.'/';
$photo = UploadFile($_FILES['newcsimg'],$path );
}
?>
<div style="padding-left:15px; padding-right:15px;">
<p class="page-heading">Launch Thumbnail Image Setup</p>
<p class="page-txt" style="margin-bottom:20px;">Select an image from the options below to use as your default coming soon image for your launch funnel, OR scroll down to upload your own coming soon image</p>
<form>
<?php


//List files in images directory
$row = '';
while (($file = $dir->read()) !== false)
{
	$row++;
	if ($file <> '.' && $file <> '..' && $file <> 'Thumbs.db' && $file <> 'index.php') {
		?>
<div style="width:250px; float:left;">
<img src="<?php echo get_bloginfo('template_directory')."/images/uploads/lncthumb/".$file; ?>" style="max-width:210px; max-height:140px;" /><br />
<input type="radio" name="cs_img" value="<?php echo get_bloginfo('template_directory')."/images/uploads/lncthumb/".$file; ?>" /> <span class="page-txt"><?php echo $file; ?></span>
</div>
<?php	
if($row % 1) { 
?>
<br style="clear:both;" />
<div style="height:10px;">&nbsp;</div>
<?php
} }}

$dir->close();
unset($dir, $row, $file);

?>
<?php
$myuploaddir = wp_upload_dir();
$optdir = $myuploaddir['basedir']."/optpress"; 
$optdircs = $myuploaddir['basedir']."/optpress/images_lncthumbs"; 
if (!file_exists($optdir)) {
	mkdir($optdir, 0777);
} 
if (!file_exists($optdircs)) {
	mkdir($optdircs, 0777);
}

$dir = dir($optdircs);

?>
<div style="clear:both; padding-top:10px;"></div>
<p class="page-heading">Your Uploaded Images</p>
<?php

//List files in images directory
$row = '';
while (($file = $dir->read()) !== false)
{
	$row++;
	if ($file <> '.' && $file <> '..' && $file <> 'Thumbs.db' && $file <> 'index.php') {
		?>
<div style="width:250px; float:left;">
<img src="<?php echo $myuploaddir['baseurl']."/optpress/images_lncthumbs/".$file; ?>" style="max-width:210px; max-height:140px;" /><br />
<input type="radio" name="cs_img" value="<?php echo $myuploaddir['baseurl']."/optpress/images_lncthumbs/".$file; ?>" /> <span class="page-txt"><?php echo $file; ?></span>
</div>
<?php	
if($row % 1) { 
?>
<br style="clear:both;" />
<div style="height:10px;">&nbsp;</div>
<?php
} }}

$dir->close();

?>
<br style="clear:both;" />
<div style="clear:both; padding-top:20px;">

			<input type="submit" name="closebut" onclick="self.parent.tb_remove();" id="closelink" value="Use Selected Image" class="biginputbuttons" />
           <input type="submit" name="closebut22" onclick="self.parent.tb_remove();" id="closelink22" value="Cancel" class="inputbuttons" />
			
			<br style="clear: left;">

</div>
</form>

<div class="upload-csimg-form">
<p class="page-heading">Upload New Image</p>
<p class="page-txt" style="margin-bottom:20px;">Choose an image from your computer to upload and use as your coming soon image.  Note that the recommended size for your image is 210 pixels (width) x 140 pixels (height)</p>
<form method="post" enctype="multipart/form-data" id="csimgupload">
  <input type="file" name="newcsimg" id="newcsimg" />
  <input type="submit" name="button" id="button" value="Upload File" class="inputbuttons" />
  <input name="newcsimg" type="hidden" id="newcsimg" value="1" />
  <input name="imgfldnum" type="hidden" id="imgfldnum" value="<?php echo $imgfldnum; ?>" />
  <input name="imgpath" type="hidden" id="imgpath" value="<?php echo $optdircs; ?>" />
</form>
</div>
<script type="text/javascript">
$(document).ready(function() { 
	
	$("#closelink").click(function() {
		$("#<?php echo $imgfldnum; ?>", top.document).val($('input[name=cs_img]:checked').val());
	});
	
});
</script>
</div>