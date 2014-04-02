<?php if (!empty($postcustom['_seo_exitpopup'])) : ?>
<script type="text/javascript" src="<?php echo $templatedir; ?>/js/jquery.simplemodal.js"></script>
<script type="text/javascript" src="<?php echo $templatedir; ?>/js/init.js"></script>
<link href="<?php echo $templatedir; ?>/modalpop.css" rel="stylesheet" type="text/css" media="all"/>
<div style="display: none; padding: 10px; font-color:#000;" id="exit_content">
<div style="padding:25px 25px 10px 25px;">

<?php echo !empty($postcustom['_seo_poph1']) ? '<h1 style="text-align:center;padding:0;color:#CC0000;font-family:Impact, Charcoal, sans-serif;font-size:35px;font-weight:normal;line-height:34px">'.stripslashes($postcustom['_seo_poph1'][0]).'</h1>' : ''; ?>
<?php echo !empty($postcustom['_seo_popmsgaboveform']) ? '<center><p style="padding-left:15px;padding-right:15px;margin: 12pt 0pt 12px; font-size: 14px;">'.stripslashes(nl2br($postcustom['_seo_popmsgaboveform'][0])).'</center></p>' : ''; ?>

<!--Start Custom Optin Code-->
<?php if($postcustom['_seo_activatecustomoptinform']) { ?>
	<?php echo stripcslashes($postcustom['_seo_customoptincode'][0]); ?>
<?php } else { ?>
<!--Close Custom Optin Code-->

<!--Start OptimizePress Optin Code-->
<center>
<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Headline")</script>' : ''; ?><?php echo !empty($postcustom['_seo_sidebarheadline']) ? '<div class="sidebar-headline">'.stripcslashes($postcustom['_seo_sidebarheadline'][0]).'</div>' :  ""?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>
<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Text")</script>' : ''; ?><?php echo !empty($postcustom['_seo_sidebartext']) ? '<div class="sidebar-text">'.stripcslashes($postcustom['_seo_sidebartext'][0]).'</div>' :  ""?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>
<form action="<?php echo !empty($postcustom['_seo_optinformurl']) ? stripcslashes($postcustom['_seo_optinformurl'][0]) : ""?>" method="post">
<?php $namefield_name = !empty($postcustom['_seo_optinname']) ? stripcslashes($postcustom['_seo_optinname'][0]) : "" ?>
<?php $emailfield_name = !empty($postcustom['_seo_optinemail']) ? stripcslashes($postcustom['_seo_optinemail'][0]) : "" ?>
<?php $name_init = !empty($postcustom['_seo_optinnametext']) ? 'value="'.stripcslashes($postcustom['_seo_optinnametext'][0]).'" name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_seo_optinnametext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_seo_optinnametext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your name..." name="'.$namefield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your name...\';}" onfocus="if (this.value == \'Enter your name...\') {this.value = \'\';}"';
$email_init = !empty($postcustom['_seo_optinemailtext']) ? 'value="'.stripcslashes($postcustom['_seo_optinemailtext'][0]).'" name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_seo_optinemailtext'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_seo_optinemailtext'][0]).'\') {this.value = \'\';}"' : ' value="Enter your email..." name="'.$emailfield_name.'" onblur="if (this.value == \'\') {this.value = \'Enter your email...\';}" onfocus="if (this.value == \'Enter your email...\') {this.value = \'\';}"';
?>
<?php echo !empty($postcustom['_seo_optinnameshow']) ? '<input id="'.$namefield_name.'" class="text" type="text" size="20" '.$name_init.' />' : ""; ?>
<?php echo !empty($postcustom['_seo_optinemailshow']) ? '<input id="'.$emailfield_name.'" class="text" type="text" size="20" '.$email_init.' />' : ""; ?>
<?php $extra = 1; 
while($extra<=5) {
	$value_init = !empty($postcustom['_seo_extra'.$extra.'value']) ? 'value="'.stripcslashes($postcustom['_seo_extra'.$extra.'value'][0]).'" onblur="if (this.value == \'\') {this.value = \''.stripcslashes($postcustom['_seo_extra'.$extra.'value'][0]).'\';}" onfocus="if (this.value == \''.stripcslashes($postcustom['_seo_extra'.$extra.'value'][0]).'\') {this.value = \'\';}"' : '';
	echo !empty($postcustom['_seo_extra'.$extra.'ID']) ? '<input name="'.stripcslashes($postcustom['_seo_extra'.$extra.'ID'][0]).'" id="'.stripcslashes($postcustom['_seo_extra'.$extra.'ID'][0]).'" class="text" type="text" size="20" '.$value_init.' />' : "";
$extra++;	
}
?>
<?php echo !empty($postcustom['_seo_webformhiddenhtml']) ? stripcslashes(eval('?>'.htmlspecialchars_decode($postcustom['_seo_webformhiddenhtml'][0]))) : ""; ?>
<center><input class="button1" id="submit_image_5f17aab77d6c" type="image" width="268" src="<?php echo stripcslashes($postcustom['_seo_buttonselect'][0]); ?>" name="submit" value="Get Instant Access"/></center>
<?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '<script>utmx_section("Optin Box Spam Notice")</script>' : ''; ?><?php echo !empty($postcustom['_seo_spamnoticetext']) ? '<div class="sidebar-padlock">'.stripcslashes($postcustom['_seo_spamnoticetext'][0]).'</div>' :  ""; ?><?php echo !empty($postcustom['_seo_activategoogleweboptimizermv']) ? '</noscript>' : ''; ?>
</form>
<?php } ?>
</center>
<!--Close OptimizePress Optin Code-->
</div>
<?php echo !empty($postcustom['_seo_popmsgbelowform']) ? '<div style="width:100%;background: -moz-linear-gradient(center top , #EFEFEF, #FFFFFF) repeat scroll 0 0 transparent;background-image: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#efefef), to(#ffffff));filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#efefef, endColorstr=#ffffff);-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#EFEFEF, endColorstr=#FFFFFF);border-top:1px solid #e5e5e5;min-height:25px;padding-top: 15px;padding-bottom:15px;"><center><p style="font-size: 12px;color:#777777;text-align:center;padding-left:15px;padding-right:15px;">'.stripslashes(nl2br($postcustom['_seo_popmsgbelowform'][0])).'</center></p></div>' : ''; ?>
<?php endif; ?>
</div>

