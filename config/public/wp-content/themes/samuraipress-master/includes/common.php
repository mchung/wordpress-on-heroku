<?php

if (!defined('NS_PATH')) {
	define( 'NS_PATH', ABSPATH . '../noblesamurai.com/' );
}

if (!file_exists(NS_PATH . 'common.php')) {
	wp_die( "noblesamurai.com/common.php not found.  Add define('NS_PATH', '../noblesamurai.com') to wp-config.php" );
}

require( NS_PATH . 'common.php' );
