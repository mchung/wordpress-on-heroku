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

  /** 
   * Allow ENV vars to override the defaults, as it exposes
   * the WP admin account. 
   *
   * Use heroku config:set to define these:
   *   - EMAIL_FROM
   *   - EMAIL_NAME
   *   - EMAIL_REPLY_TO
   **/
  $email_from = getenv('EMAIL_FROM');
  if(empty($email_from)){
    $email_from = $email;
  }

  $email_from_name = getenv('EMAIL_NAME');
  if(empty($email_from_name)){
    $email_from_name = "$display_name from $blogname";
  }

  $email_reply_to = getenv('EMAIL_REPLY_TO');
  if(empty($email_reply_to)){
    $email_reply_to = $email;
  }
  
  $phpmailer->Sender = $email;
  $phpmailer->From = $email_from;
  $phpmailer->FromName = $email_from_name;
  $phpmailer->AddReplyTo($email_reply_to);

  $phpmailer->Host = 'smtp.sendgrid.net';
  $phpmailer->Username = getenv("SENDGRID_USERNAME");
  $phpmailer->Password = getenv("SENDGRID_PASSWORD");
  $phpmailer->Hostname = getenv("SERVER_NAME");
  $phpmailer->Port = 587;
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = 'tls';
}
?>
