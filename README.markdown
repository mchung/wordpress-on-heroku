# Wordpress on Heroku

Wordpress on Heroku--you know, when you want to run Wordpress on Heroku.

## List of Heroku-specific customizations

* `SMTP over Sendgrid` - Sendgrid for email.
* `MySQL` - ClearDB for MySQL
* `Nginx` - Nginx for serving up content. Depends on a custom Nginx build, see [heroku-buildpack-wordpress](http://github.com/mchung/heroku-buildpack-wordpress) for further details.
* `PHP-FPM` - Automagically manage PHP processes with PHP-FPM. No more mucking around with PHP_FCGI_CHILDREN and PHP_FCGI_MAX_REQUESTS.

## Can I use this or what?

Yes. But there are a few constraints.

## Okay, hit me with them.

Anything to do with the [ephemeral filesystem](http://devcenter.heroku.com/articles/dyno-isolation)

* Cannot upload media files. WORKAROUND: Upload to S3 and embed content.
* Cannot update themes or plugins from the admin page. WORKAROUND: Add them to `wp-content/themes` or `wp-content/plugins` then deploy.

## TODO

* Handle image uploads to S3 instead (plugin or custom code). If you know of a Wordpress S3 plugin that actually works, I'd be happy to add it in.

## I thought Heroku was only for Ruby applications?

Not anymore. Heroku's latest offerings (See [Celadon Cedar stack](http://devcenter.heroku.com/articles/cedar)) makes it easy (well, easyish) for developers to install and run any language, or actually any service.

