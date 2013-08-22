<?php
/*
Plugin Name: Sendgrid for Wordpress on Heroku
Plugin URI: http://github.com/mchung/heroku-buildpack-wordpress
Description: Sendgrid Wordpress plugin for Wordpress sites running on Heroku.
Version: 1.0
Author: Marc Chung
Author URI: http://www.marcchung.com
License: MIT
*/
add_action('phpmailer_init', 'heroku_mail_to_sendgrid');

function heroku_mail_to_sendgrid(&$phpmailer) {
  $phpmailer->IsSMTP();

  $phpmailer->Host = 'smtp.sendgrid.net';
  $phpmailer->Username = getenv("SENDGRID_USERNAME");
  $phpmailer->Password = getenv("SENDGRID_PASSWORD");
  $phpmailer->Hostname = getenv("SERVER_NAME");
  $phpmailer->Port = 587;
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = 'tls';
}

add_filter('wp_mail_from', 'change_mail_from');

/* Return from email address */
function change_mail_from($wp_mail_from)
{
  return get_bloginfo('admin_email', 'raw');
}

add_filter('wp_mail_from_name', 'change_mail_from_name');

/* Return mail from name */
function change_mail_from_name($wp_mail_from_name)
{
  $display_name = get_userdata(1)->display_name;
  $blogname = get_bloginfo('blogname', 'raw');
  return "$display_name from $blogname";
}

add_filter('wpcf7_mail_components', 'send_from_wpcf7');

function send_from_wpcf7($components) {
  // In the case where wpcf7 is called,
  // depend on those settings instead.
  remove_filter('wp_mail_from', 'change_mail_from');
  remove_filter('wp_mail_from_name', 'change_mail_from_name');

  return $components;
}

?>