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
  $phpmailer->Sender = $_SERVER["EMAIL_REPLY_TO"]; # 'return-path@domain.com';
  $phpmailer->From = $_SERVER["EMAIL_FROM"]; # 'mail-from@domain.com';
  $phpmailer->FromName = $_SERVER["EMAIL_NAME"]; # 'From Name';
  $phpmailer->Host = 'smtp.sendgrid.net';
  $phpmailer->Username = $_SERVER["SENDGRID_USERNAME"];
  $phpmailer->Password = $_SERVER["SENDGRID_PASSWORD"];
  $phpmailer->Hostname = $_SERVER["SERVER_NAME"];
  $phpmailer->Port = 587;
  $phpmailer->SMTPAuth = true;
  $phpmailer->SMTPSecure = 'tls';
}
?>