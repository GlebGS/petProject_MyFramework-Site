# ПЕТ-ПРОЕКТ

Проект написанный с использованием мною написанного фреймворка.

# Настройка

## Чтобы собрать проект Composer:

- `composer install`
- `composer update`
- `composer dump-autoload`

## Если используешь NGINX

    events {}

    http {

        include mime.types;
        
        server {
            listen 80;
            listen [::]:80;
            server_name pet_project.com;
            root /home/sites/pet_project/Public;
            
            index index.php;
        
            charset utf-8;
        
            location / {
                try_files $uri $uri/ /index.php?$query_string;
            }
        
            error_page 404 /index.php;
        
            location ~ ^/index\.php(/|$) {
                fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
                include fastcgi_params;
                fastcgi_hide_header X-Powered-By;
                
                fastcgi_pass 127.0.0.1:9000;
            }
        
            location ~ /\.(?!well-known).* {
                deny all;
            }
        }	
        
    }

## Если используешь APACHE

### /.htaccess
    RewriteEngine On
    RewriteRule (.*) Public/$1

### Public/.htaccess
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    #RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule (.*) index.php?$1 [L,QSA]

    #Options -Indexes

## Подключение к базе данных

Параметры базы данных находятся в файле `/Config/env.php`

## SQL Создание таблицы 
    CREATE TABLE "users"(
        id SERIAL NOT NULL,
        name VARCHAR(32),
        role VARCHAR(12) DEFAULT 'user',
        email VARCHAR(32) NOT NULL,
        password VARCHAR(128) NOT NULL,
        "date" timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(id)
    );

    CREATE TABLE "data"(
        id SERIAL NOT NULL,
        "user_id" integer,
        work varchar(128) DEFAULT NULL,
        phone varchar(128) DEFAULT NULL,
        address varchar(128) DEFAULT NULL,
        status VARCHAR(32) DEFAULT 'danger',
        avatar varchar(128) DEFAULT '/img/avatar/default.png',
        "date" timestamp without time zone NOT NULL DEFAULT CURRENT_TIMESTAMP,
        PRIMARY KEY(id)
    );

    CREATE INDEX index_foreignkey_data_users ON "data" USING btree ("user_id");