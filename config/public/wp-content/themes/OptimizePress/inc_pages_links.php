<?php 
$frm_cookie = get_option($shortname.'_frm_cookie');
$launch_type = get_option($shortname.'_launch_type');
$num_launch = get_option($shortname.'_num_launch');

if ($frm_cookie == 1) {
$SqzPageLoc = get_permalink( get_option($shortname.'_squeeze_page') );

if ($_COOKIE['OptPressSqueeze'] <> "1199" && $_REQUEST['setuser'] <> "1198") {
echo "<script>window.location='".$SqzPageLoc."'</script>";
exit;
} else {

$LastPageUserVisited = $_COOKIE["OptimizePressLastPage"];

$option_name_pg = $shortname.'_launch_page_';
$CurrentPostID = 'lncpg_'.$post->ID;
$GetLaunchPageNumber = $wpdb->get_row("SELECT option_name, option_value FROM $wpdb->options WHERE option_value = '$CurrentPostID' ");
$CurrentLnchPage = str_replace($option_name_pg, '', $GetLaunchPageNumber->option_name);
if ($_REQUEST['setuser'] == "1198") {
	?>
    <script type="text/javascript">
setCookie('OptimizePressLastPage','',-1);
setCookie('OptimizePressLastPage','<?php echo $CurrentLnchPage; ?>',365);
</script>
<?php } else {
if ($LastPageUserVisited == 0 && $CurrentLnchPage==1) { 
$cnd = 1; ?>
<script type="text/javascript">
setCookie('OptimizePressLastPage','',-1);
setCookie('OptimizePressLastPage','<?php echo $CurrentLnchPage; ?>',365);
</script> 
<?php $LstPgCookie = $CurrentLnchPage+1;
} elseif ($LastPageUserVisited == $CurrentLnchPage-1 ) { 
$cnd = 2; ?>	
<script type="text/javascript">
setCookie('OptimizePressLastPage','',-1);
setCookie('OptimizePressLastPage','<?php echo $CurrentLnchPage; ?>',365);
</script> 

<?php 
$LstPgCookie = $LastPageUserVisited+1;
} elseif ( $LastPageUserVisited >= $CurrentLnchPage ) {
	$cnd = 3;
// Show the page, do nothing.
$LstPgCookie = $LastPageUserVisited;
} elseif ( $launch_type == 1 || $launch_type == 2 ) {
	$cnd = 5; 
?>
<script type="text/javascript">
setCookie('OptimizePressLastPage','',-1);
setCookie('OptimizePressLastPage','<?php echo $CurrentLnchPage; ?>',365);
</script> 
<?php 	
$LstPgCookie = $CurrentLnchPage;
} else { 
$cnd = 4;
echo "<script>window.location='".$SqzPageLoc."'</script>";
} }
} }
#echo 'Current Condition:'. $cnd. '<br>Last Page User Visited:'. $LastPageUserVisited. ' <br>Current Launch Page Number '.$CurrentLnchPage. ' <br>Squeeze Cookie: '.$_COOKIE['OptPressSqueeze'] ;
#exit;
//check for launch type
include 'inc_pages_links_'.$launch_type.'.php';
?>