<ul class="launch1navbar">
<?php for ($lnkcntr = 1; $lnkcntr <= $num_launch; $lnkcntr += 1) { ?>
<li>
<?php $loop_pg = str_replace('lncpg_', '', get_option($shortname.'_launch_page_'.$lnkcntr));
$EachPostID = str_replace('lncpg_', '', get_option($shortname.'_launch_page_'.$lnkcntr));
$EachPost = get_post($EachPostID);
$EachPostStatus = $EachPost->post_status;

if ($EachPostStatus == 'future') {
			$_cm_image = get_option( $shortname.'_lnch_cmimg_'.$lnkcntr );
			if ($_cm_image=='') {
				$_cm_image = get_option($shortname.'_coming_image');
			}
	$activelinks_vid .= '<li><img style="" src="'.$_cm_image.'" width="210" height="140" /></li>
	<li class="textentry">'.get_option($shortname.'_inact_lnk_name_'.$lnkcntr).'</li>';
?>
<?php echo get_option($shortname.'_inact_lnk_name_'.$lnkcntr); ?>
<?php } else { 
$activelinks_vid .= '<li><a style="border:0;" title="'.get_option($shortname.'_act_lnk_name_'.$lnkcntr).'" href="'.get_permalink( $loop_pg ).'">
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
<?php } ?>
</li>
<?php } ?>
</ul>