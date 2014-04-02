<?php if ($_REQUEST['setuser'] == '1198') {
	$option_name_pg2 = $shortname.'_launch_page_';
	$CurrentPostID2 = 'lncpg_'.$post->ID;
	$GetLaunchPageNumber2 = $wpdb->get_row("SELECT option_name, option_value FROM $wpdb->options WHERE option_value = '$CurrentPostID2' ");
	$CurrentLnchPage2 = str_replace($option_name_pg2, '', $GetLaunchPageNumber2->option_name);
	?>
    <script type="text/javascript" src="<?php echo get_bloginfo('template_directory'); ?>/js/js_cookie.js"></script>
    <script type="text/javascript">	
	setCookie('OptPressSqueeze',"1199",365);
	setCookie('OptimizePressLastPage',"<?php echo $CurrentLnchPage2; ?>",365);
</script>
<?php } else {
	if ($postcustom['_launchpage_disablecookiecheck']) {
	include 'inc_check_user_cookie.php';
} }
?>