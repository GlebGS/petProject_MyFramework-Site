<?php

use Core\Router;

// prefix Admin
Router::add("/admin", ["controller" => "main", "method" => "index", "prefix" => "admin"]);

// prefix Auth
Router::add("/auth_registration", ["controller" => "auth", "method" => "registration", "prefix" => 'auth']);
Router::add("/auth_login", ["controller" => "auth", "method" => "login", "prefix" => 'auth']);

// Default
Router::add("/", ["controller" => "main", "method" => "index", "prefix" => '']);

Router::add("/users", ["controller" => "user", "method" => "users", "prefix" => '']);

Router::add("/login", ["controller" => "user", "method" => "page_login", "prefix" => '']);
Router::add("/registration", ["controller" => "user", "method" => "page_register", "prefix" => '']);