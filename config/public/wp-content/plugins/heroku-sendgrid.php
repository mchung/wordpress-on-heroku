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

  $display_name = get_userdata(1)->display_name;
  $blogname = get_bloginfo('blogname', 'raw');
  $email = get_bloginfo('admin_email', 'raw');

  $phpmailer->Sender = $email;
  $phpmailer->From = $email;
  $phpmailer->FromName = "$display_name from $blogname";
  $phpmailer->AddReplyTo($email, $admin_name);

  $phpmailer->Host = 'smtp.sendgrid.net';
  $phpmailer->Username = getenv("SENDGRID_USERNAME");
  $phpmailer->Password = getenv("SENDGRID_PASSWORD");
  $phpmailer->Hostname = getenv("SERVER_NAME");
  $phpmailer->Port = 587;
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = 'tls';
}
?>