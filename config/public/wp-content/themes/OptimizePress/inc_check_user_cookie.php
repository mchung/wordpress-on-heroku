<script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/js_cookie.js"></script>
<?php $shortname = 'OptimizePress';
$frm_cookie = get_option($shortname.'_frm_cookie');
if ($frm_cookie == 1) {
$setnewcookie = $_REQUEST['setuser'];
if ($setnewcookie == "1199") { 
#=============================
$option_name_pg2 = $shortname.'_launch_page_';
$CurrentPostID2 = 'lncpg_'.$post->ID;
$GetLaunchPageNumber2 = $wpdb->get_row("SELECT option_name, option_value FROM $wpdb->options WHERE option_value = '$CurrentPostID2' ");
$CurrentLnchPage2 = str_replace($option_name_pg2, '', $GetLaunchPageNumber2->option_name);
/*echo $CurrentLnchPage2;
exit;*/
#=============================
?>
<script type="text/javascript">	
	setCookie('OptPressSqueeze',"1199",365);
	setCookie('OptimizePressLastPage',"<?php echo $CurrentLnchPage2; ?>",365);
</script>
    <?php 
	$lnchpg1 = get_option($shortname.'_lnc_current_page');
	if ($lnchpg1 == '') {
		$lnchpg1 = str_replace('lncpg_', '', get_option($shortname.'_launch_page_1'));
	}
	$lnchpg = get_permalink( $lnchpg1 );
	echo "<script>window.location='".$lnchpg."'</script>";
	}} ?>