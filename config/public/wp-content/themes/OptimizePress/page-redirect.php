<?php /*
Template Name: Redirect Page
*/
    $postcustom = get_post_custom($post->ID);
    $templatedir = get_bloginfo('template_directory');

$redirect_url = $postcustom['_seo_redirect_url'][0];
$redirect_url = (is_numeric($redirect_url)) ? get_permalink($redirect_url) : $redirect_url;
$location = "Location: {$redirect_url}";
header("HTTP/1.1 301 Moved Permanently"); 
header( $location );
exit();
?>