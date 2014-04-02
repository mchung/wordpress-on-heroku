<ul class="launch1navbar">
<?php if ($frm_cookie == 1) { ?>
<?php for ($lnkcntr = 1; $lnkcntr <= $num_launch; $lnkcntr += 1) { ?>
<li>
<?php #echo $lnkcntr .'-'. $LastPageUserVisited;
$loop_pg = str_replace('lncpg_', '', get_option($shortname.'_launch_page_'.$lnkcntr));
#echo $lnkcntr .'-'. $LstPgCookie;
if ($lnkcntr <= $LstPgCookie) {
	$activelinks_vid .= '<li><a style="border:0;" title="'.get_option($shortname.'_act_lnk_name_'.$lnkcntr).'" href="'.get_permalink( $loop_pg ).'"';
	
	$activelinks_vid .= '>
<img style="" src="'.get_option($shortname.'_lnch_thumb_'.$lnkcntr).'" width="210" height="140" /></a></li>
<li class="textentry"><a title="'.get_option($shortname.'_act_lnk_name_'.$lnkcntr).'" href="'.get_permalink( $loop_pg ).'"';
if ($lnkcntr == $CurrentLnchPage) {
		$activelinks_vid .= ' class="CurrentLinkActiveClass" ';
		}

$activelinks_vid .= '>'.get_option($shortname.'_act_lnk_name_'.$lnkcntr).'</a></li>';
?>
<a href="<?php echo get_permalink( $loop_pg ); ?>" <?php if ($lnkcntr == $CurrentLnchPage) {
		echo ' class="CurrentLinkActiveClass" ';
		} ?>><?php echo get_option($shortname.'_act_lnk_name_'.$lnkcntr); ?></a>
<?php } else { 
			$_cm_image = get_option( $shortname.'_lnch_cmimg_'.$lnkcntr );
			if ($_cm_image=='') {
				$_cm_image = get_option($shortname.'_coming_image');
			}
	$activelinks_vid .= '<li><img style="" src="'.$_cm_image.'" width="210" height="140" /></li>
	<li class="textentry">'.get_option($shortname.'_inact_lnk_name_'.$lnkcntr).'</li>';
	?>
<?php echo get_option($shortname.'_inact_lnk_name_'.$lnkcntr); ?>
<?php } ?>
</li>
<?php } ?>
<?php } else {
for ($lnkcntr = 1; $lnkcntr <= $num_launch; $lnkcntr += 1) { 
	?>
<li>
<?php $loop_pg = str_replace('lncpg_', '', get_option($shortname.'_launch_page_'.$lnkcntr));
$EachPostID = str_replace('lncpg_', '', get_option($shortname.'_launch_page_'.$lnkcntr));
$EachPost = get_post($EachPostID);
$EachPostStatus = $EachPost->post_status;

if ($EachPostStatus == 'publish') {
	$activelinks_vid .= '<li><a style="border:0;" title="'.get_option($shortname.'_act_lnk_name_'.$lnkcntr).'" href="'.get_permalink( get_option($loop_pg) ).'">
<img style="" src="'.get_option($shortname.'_lnch_thumb_'.$lnkcntr).'" width="210" height="140" /></a></li>
<li class="textentry"><a title="'.get_option($shortname.'_act_lnk_name_'.$lnkcntr).'" href="'.get_permalink( $loop_pg ).'">'.get_option($shortname.'_act_lnk_name_'.$lnkcntr).'</a></li>';
?>
<a href="<?php echo get_permalink( $loop_pg ); ?>"><?php echo get_option($shortname.'_act_lnk_name_'.$lnkcntr); ?></a>
<?php } else { 
	$activelinks_vid .= '<li><img style="" src="'.get_option($shortname.'_coming_image').'" width="210" height="140" /></li>
	<li class="textentry">'.get_option($shortname.'_inact_lnk_name_'.$lnkcntr).'</li>';
	?>
<?php echo get_option($shortname.'_inact_lnk_name_'.$lnkcntr); ?>
<?php } ?>
</li>
<?php } ?>
<?php } ?>
</ul>