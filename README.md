# How to set up

## Install the software

```bash
sudo apt-get install nginx php-fpm php-curl php-mysqli mariadb-server

sudo git clone https://github.com/urlaube/urlaube /var/www/html

sudo git clone https://github.com/filmmakers4future/fm4fhandler /var/www/html/user/handlers/fm4fhandler

sudo git clone https://github.com/filmmakers4future/fm4fplugin /var/www/html/user/plugins/fm4fplugin
sudo git clone https://github.com/urlaube/hidefuturedate /var/www/html/user/plugins/hidefuturedate
sudo git clone https://github.com/urlaube/PodlovePlugin /var/www/html/user/plugins/PodlovePlugin

sudo git clone https://github.com/filmmakers4future/fm4ftheme /var/www/html/user/themes/fm4ftheme

cd /var/www/html/user/config
sudo git init
sudo git remote add origin https://github.com/filmmakers4future/website-config
sudo git pull origin master

# For production installation - else check "Sample secret/secrets.php"
cd /var/www/html/user/config/secrets
sudo git init
sudo git remote add origin git@github.com:Filmmakers4Future/Websites-Secrets.git
sudo git pull origin master

cd /var/www/html/user/content
sudo git init
sudo git remote add origin https://github.com/filmmakers4future/website-content
sudo git pull origin master

cd /var/www/html/user/uploads
sudo git init
sudo git remote add origin https://github.com/filmmakers4future/website-uploads
sudo git pull origin master
```

## Sample secret/secrets.php

```php
<?php

  // prevent script from getting called directly
  if (!defined("URLAUBE")) { die(""); }

  $MAILGUN_AUTH = "api:key-12345678910111213";
  
  // php -r 'print(str_replace("\$", "\\\$", password_hash(readline("Password: "), PASSWORD_DEFAULT)."\n"));'
  $NEWSLETTER_SEND_PASSWORD = "12345678910111213";
  
  $DB_NAME = "db_name";
  $DB_USER = "db_user";
  $DB_PASS = "12345678910111213";
```



## Configure the webserver

### Open the configuration file

```
sudo vi /etc/nginx/sites-enabled/default 
```

### Insert the configuration:

```
server {
  listen 80 default_server;
  listen [::]:80 default_server;

  root /var/www/html;

  index index.php index.html index.htm;

  server_name _;

  # disallow access to hidden files
  location ~* \/\. {
    rewrite ^.*$ /index.php last;
  }

  # prevent access to protected paths
  rewrite ^\/CHANGELOG.md$         /index.php last;
  rewrite ^\/README.md$            /index.php last;
  rewrite ^\/router\.php$          /index.php last;
  rewrite ^\/system(\/.*)?$        /index.php last;
  rewrite ^\/user\/cache(\/.*)?$   /index.php last;
  rewrite ^\/user\/config(\/.*)?$  /index.php last;
  rewrite ^\/user\/content(\/.*)?$ /index.php last;

  # if file does not exist then use index.php
  try_files $uri /index.php?$query_string;

  # enable php
  location ~ \.php$ {
    # make sure we are not tricked into executing arbitrary files as PHP
    try_files $uri /index.php?$query_string;

    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
  }
}
```

### Restart the webserver

```
sudo systemctl restart nginx.service
```

## Setup the database

### Log into the MariaDB database

```
sudo mysql
```

### Execute the SQL statements

```
CREATE DATABASE fff CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE fff;

CREATE TABLE data (
	uid                   VARCHAR(40)  NOT NULL PRIMARY KEY,
	name                  VARCHAR(256) NOT NULL,
	mail                  VARCHAR(256) NOT NULL,
	job                   VARCHAR(256) NOT NULL,
	country               VARCHAR(256) NOT NULL,
	city                  VARCHAR(256),
	website               VARCHAR(256),
	iscompany             BOOLEAN      NOT NULL DEFAULT FALSE,
	newsletter            BOOLEAN      NOT NULL DEFAULT FALSE,
	disabled              BOOLEAN      NOT NULL DEFAULT FALSE,
	admin_verify_token    VARCHAR(40),
	user_newsletter_token VARCHAR(40),
	user_verify_token     VARCHAR(40),
	mailhash              VARCHAR(64)  AS (SHA2(mail, 256)) PERSISTENT UNIQUE KEY,
	subscribed            BOOLEAN      AS (disabled IS FALSE AND admin_verify_token IS NULL AND user_verify_token IS NULL AND newsletter IS TRUE),
	verified              BOOLEAN      AS (disabled IS FALSE AND admin_verify_token IS NULL AND user_verify_token IS NULL)
);

GRANT ALL ON fff.* TO 'fff'@'%' IDENTIFIED BY 'fff';
GRANT ALL ON fff.* TO 'fff'@'localhost' IDENTIFIED BY 'fff';
GRANT ALL ON fff.* TO 'fff'@'127.0.0.1' IDENTIFIED BY 'fff';

FLUSH PRIVILEGES;

EXIT;
```
