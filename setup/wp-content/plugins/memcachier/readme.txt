=== MemCachier ===
Contributors: PerS,  ryan, sivel
Tags: cache, Memcachier, Memcached, admin, manage cache, object cache, WP Object Cache
Requires at least: 3.4
Tested up to: 3.5
Stable Tag: 1.0

Use MemCachier to implement WP Object Cache

== Description ==

Changed the [Memcached WP Object Cache](http://wordpress.org/extend/plugins/memcached/) backend to use [MemCachier](http://www.memcachier.com/).

This initial release is only tested with WordPress at [AppFog](https://www.appfog.com/products/appfog/jumpstarts/), but [should work on other sites](http://www.memcachier.com/2012/12/19/memcachier-powered-wordpress-object-caching/).


Demo at [memcachier.soderlind.no](http://memcachier.soderlind.no)

= Credits =
I've only [changed the WP_Object_Cache constructor](http://soderlind.no/archives/2012/12/19/memcachier-backend-for-the-wp-object-cache/), so the credits goes to ryan and sivel for [Memcached WP Object Cache](http://wordpress.org/extend/plugins/memcached/), and ronnywang for [PHPMemcacheSASL](https://github.com/ronnywang/PHPMemcacheSASL)

== Installation ==
1. Add [MemCachier](https://www.appfog.com/products/appfog/add-ons/) to your WordPress site at AppFog 
1. Install the plugin by copying it to the plugins/memcachier folder
1. Move plugins/memcachier/object-cache.php to wp-content/object-cache.php

== Changelog ==

= 1.0 =
* Initial release

