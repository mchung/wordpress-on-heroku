# Wordpress on Heroku

This is where changes to your Wordpress site are made.  Changes committed to this directory will overwrite all the vendor defaults.

Generally, you'll be interested in adding plugins, adding themes, and modifying wordpress.conf.erb.
```
└── config                # Config files
    ├── public            # Public directory
    │   └── wp-content    # Themes & plugins
    │       ├── plugins
    │       └── themes
    └── vendor            # Config files for vendored apps
        ├── nginx
        │   └── conf      # nginx.conf + wordpress.conf.erb
        └── php           # php.ini
            └── etc       # php-fpm.conf
```

For everything you ever wanted to know about running Wordpress on Heroku, check out my [heroku-buildpack-wordpress](http://github.com/mchung/heroku-buildpack-wordpress).