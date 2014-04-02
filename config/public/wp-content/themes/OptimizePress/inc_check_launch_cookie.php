<?php $daynumber;

$CurrentLaunch = $post->ID;
$GetLaunchPageNumber = $wpdb->get_results( "SELECT option_name, option_value FROM ".$table_prefix."options WHERE option_value = '$CurrentLaunch' " );
print_r($GetLaunchPageNumber);
?>