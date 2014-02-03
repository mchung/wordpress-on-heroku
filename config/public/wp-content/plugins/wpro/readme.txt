=== WP Read-Only ===

* Contributors: alfreddatakillen
* Tags: wordpress, amazon, s3, readonly
* Requires at least: 3.3
* Tested up to: 3.3.1
* Stable tag: 1.0
* License: GPLv2

Plugin for running your Wordpress site without Write Access to the
web directory. Amazon S3 is used for uploads/binary storage.
This plugin was made with cluster/load balancing server setups in
mind - where you do not want your WordPress to write anything to
the local web directory.

== Description ==

This plugin will put your media uploads on Amazon S3. Unlike other
S3 plugins, this plugin does not require your uploads to first be
stored in your server's upload directory, so this plugin will work
fine on WordPress sites where the web server have read-only access
to the web directory.

*	Wordpress image editing will still work fine (just somewhat slower).
*	Full support for XMLRPC uploads.

This plugin was made for Wordpress sites deployed in a (load balancing)
cluster across multiple webservers, where you do not want your WordPress
to write anything to the local web directory.

Note: You still need write access to the system /tmp directory for
this plugin to work. It will use the system /tmp directory for
temporary storage during uploads, image editing/scaling, etc.

= Wordpress MU/Multisite =

This plugin works out-of-the box with Wordpress Multisite/MU.

You will find the settings for this plugin in the Network Admin, when
in a MU/Multisite environment.

== Installation ==

1. Put the plugin in the Wordpress `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Enter your Amazon S3 settings in `Settings` > `WPRO Settings`.

= Alternative: Configure by constants in wp-config.php =

Instead of configuring the plugin in `Settings` > `WPRO Settings`,
you may use constants in your `wp-config.php`. This might be an
option for you, if you want the plugin to be a "must-use plugin",
or if you do not want your users to access the settings from the
admin.

Those are the constants

*	define('WPRO_ON', true); // Enables the plugin and use
	configuration from contants.
*	define('WPRO_SERVICE', 's3'); // Amazon S3 is the service.
*	define('WPRO_FOLDER', 'some/path/here'); // Prepend all URI paths
	at S3 with this folder. In most cases, you probably want this
	to be empty.
*	define('WPRO_AWS_KEY', 'your aws key');
*	define('WPRO_AWS_SECRET', 'your aws secret');
*	define('WPRO_AWS_BUCKET', 'MyBucket'); // The name of the Amazon
	S3 bucket where your files should be stored.
*	define('WPRO_AWS_VIRTHOST', 'files.example.org'); // If you have
	a virthost for your Amazon S3 bucket, it should be there.
*	define('WPRO_AWS_ENDPOINT', 's3-eu-west-1.amazonaws.com'); // The
	Amazon endpoint datacenter where your S3 bucket is. Se list of
	endpoints below.

Those are the AWS endpoints:

*	`s3.amazonaws.com` - US East Region (Standard)
*	`s3-us-west-2.amazonaws.com` - US West (Oregon) Region
*	`s3-us-west-1.amazonaws.com` - US West (Northern California) Region
*	`s3-eu-west-1.amazonaws.com` - 'EU (Ireland) Region
*	`s3-ap-southeast-1.amazonaws.com` - Asia Pacific (Singapore) Region
*	`s3-ap-northeast-1.amazonaws.com` - Asia Pacific (Tokyo) Region
*	`s3-sa-east-1.amazonaws.com` - South America (Sao Paulo) Region

== Frequently Asked Questions ==

= Will this plugin work in Wordpress MU/Multisite environments? =

Yes.

= Where do I report bugs? = 

Report any issues at the github issue tracker:
https://github.com/alfreddatakillen/wpro/issues

= Where do I contribute with code, bug fixes, etc.? =

At github:
https://github.com/alfreddatakillen/wpro

And, plz, use tabs for indenting! :)

= What should I think of when digging the code? =

If you define the constant WPRO_DEBUG in your wp-config.php, then
some debug data will be written to /tmp/wpro-debug

= What about the license? =

Read more about GPLv2 here:
http://www.gnu.org/licenses/gpl-2.0.html

= Do you like beer? =

If we meet some day, and you think this stuff is worth it, you may buy
me a beer in return. (GPLv2 still applies.)

== Changelog ==

= 1.1 =

*	Added support for configuring by constants in `wp-config.php`.
*	Plugin now works in open_basedir and safe_mode environments.
*	Implemented our own sys_get_temp_dir for PHP < 5.2.1 compatibility.
*	Fixed bug that left a lot of temporary directories in the system tmp.
*	In a Multisite/MU environment, the settings are global for all sites,
	in the Network Admin.

Creds to [Sergio Livi](https://github.com/serl "Sergio Livi")
and [Keitaroh Kobayashi](https://github.com/keichan34 "Keitaroh Kobayashi")
for contributing with code! Also, thanks to
[mavesell](https://github.com/maveseli "mavesell")
and [nmagee](https://github.com/nmagee "nmagee") for feedback and comments!

= 1.0 =

*	The first public release.

== Roadmap ==

Todo list:

*	Add support for FTP:ing uploads to somewhere, as an alternative to
	Amazon S3.
*	For WPMU: Store media in a single bucket, but separate them by site, in
	sub-folders.
*	Only handle `new` medias when activating this plugin on an existing
	site. Today it's an all-or-nothing approach, and you will have to
	migrate your media to S3.
