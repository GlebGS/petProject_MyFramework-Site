<?php

use Core\Router;

// prefix Admin
Router::add("/admin", ["controller" => "main", "method" => "index", "prefix" => "admin"]);
Router::add("/admin/menu", ["controller" => "main", "method" => "menu", "prefix" => "admin"]);

// prefix Auth
Router::add("/auth_registration", ["controller" => "auth", "method" => "registration", "prefix" => 'auth']);
Router::add("/auth_login", ["controller" => "auth", "method" => "login", "prefix" => 'auth']);
Router::add("/auth_loginAdmin", ["controller" => "auth", "method" => "loginAdmin", "prefix" => 'auth']);


// Default
Router::add("/", ["controller" => "main", "method" => "index", "prefix" => '']);
Router::add("/out", ["controller" => "main", "method" => "out", "prefix" => '']);

Router::add("/users", ["controller" => "user", "method" => "users", "prefix" => '']);

Router::add("/login", ["controller" => "user", "method" => "page_login", "prefix" => '']);
Router::add("/registration", ["controller" => "user", "method" => "page_register", "prefix" => '']);

Router::add("/create", ["controller" => "user", "method" => "create_user", "prefix" => '']);
Router::add("/profile", ["controller" => "user", "method" => "page_profile", "prefix" => '']);