# Loftili - web

Loftili web is the complimentary web application that supports and manages the loftili core web application instances. The goal of this application will be to support users and allow them to manage things like:

- IP address for [my].loftili subdomain
- Login credentials and access level
- Managing media on the core device

## Dependencies

This web application uses a combination of a few different frameworks/tools:

- [PHP](http://php.net)
    - [Laravel](http://laravel.com) - the main framework for the application
    - [Composer](http://getcomposer.org) - php's package manager
    - [Wordpress](https://wordpress.org/download/) - Used for it's cms
- [Node](http://nodejs.org/) - used for the asset stack
    - [Bower](http://bower.io/) - package manager for vendor javascript assets
    - [Grunt](http://gruntjs.com/) - task runner similar to make/rake
- [Ruby](https://www.ruby-lang.org/en/)
    - [sass](http://sass-lang.com/install) - used for stylesheets
    - [bourbon](http://bourbon.io/) - very handy sass framework
- [MySQL](http://www.mysql.com/) - mysql is the chosen DB

## Installing

Getting this code base up and running locally might be a bit of a challege for people unfamiliar with the tools above. Proceed with caution.

**packages**

After cloning the repository and assuming you have access to `npm`, `composer`, `gem`, and `curl` on your path, you can get this code base up and running by:

```
# cd <repo-path>

# get a local copy of wordpress
$ curl -o wordpress.tar.gz https://wordpress.org/latest.tar.gz

# should unpack right into wordpress dir
$ tar xvzf wordpress.tar.gz

# make sure you have sass installed
$ gem install sass --no-ri --no-rdoc

# grunt and bower need to be installed globally 
$ sudo npm install -g grunt-cli
$ sudo npm install -g bower

# install php packages
$ composer install --prefer-dist

# install bower packages
$ bower install

# install node packages
$ npm install

# compile assets
$ grunt

```

This is a bit of a handful but once you've got all the packages installed, you only need to ever use the `grunt` command again (unless new packages get added)

**mysql setup**

Don't foret to set up your database too!
```
$ mysql -u root

mysql> create user 'loftili'@'localhost' identified by 'password';
mysql> grant all privileges on *.* to 'loftili'@'localhost' with grant option;
```

**webserver config**

Whether you're using Apache, nginx, IIS, or whatever you fancy, you will need to create virtual directories to the `./public` and the `./wordpress` directories. An example apache `http-vhosts.conf` file might look like:

```
<VirtualHost *:80>
  DirectoryIndex index.php
  DocumentRoot "/source/loftili/web/public"
  ServerName lofti.local
</VirtualHost>

<VirtualHost *:80>
  DirectoryIndex index.php
  DocumentRoot "/source/loftili/web/public"
  ServerName blog.lofti.local
</VirtualHost>

<VirtualHost *:80>
  DirectoryIndex index.php
  DocumentRoot "/source/loftili/web/wordpress"
  ServerName admin.lofti.local
</VirtualHost>
```

Notice the subdomain routing between blog.loftili.local and loftili.local? It's needed.

**migrations**

Laravel is great at getting your DB up to speed with what everyone else has:
```
$ php artisan migrate 
```

**wordpress config** 

At this point, you'll want to log into wordpress and go through the configuration process and you should be all set.

## Working on assets

While making changes to the asset files, you can run: `grunt watch`, which will run the compilation task for the appropriate file type you make changes to.


### Suggested PHP config

```
./configure \
  --with-apxs2=/http/bin/apxs \
  --with-mysql \
  --with-pdo-mysql \
  --with-mcrypt \
  --enable-mbstring \
  --enable-pdo \
  --enable-mbregex \
  --enable-sockets \
  --with-zlib \
  --with-openssl
```

