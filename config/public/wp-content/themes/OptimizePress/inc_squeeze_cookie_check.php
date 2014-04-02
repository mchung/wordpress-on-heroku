<?php $frm_cookie = get_option($shortname.'_frm_cookie');
if ($frm_cookie == 1 && $_COOKIE['OptPressSqueeze'] == "1199") {
	$lnchpg1 = get_option($shortname.'_lnc_current_page');
	if ($lnchpg1 == '') {
		$lnchpg1 = str_replace('lncpg_', '', get_option($shortname.'_launch_page_1'));
	} 
	$lnchpg = get_permalink( $lnchpg1 );
	echo "<script>window.location='".$lnchpg."'</script>";
}
?>