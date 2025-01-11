<?php

use Core\Router;

Router::add("/admin", ["controller" => "main", "method" => "index", "prefix" => "admin"]);
Router::add("/admin/menu", ["controller" => "main", "method" => "menu", "prefix" => "admin"]);

Router::add("/auth_registration", ["controller" => "auth", "method" => "registration", "prefix" => "auth"]);
Router::add("/auth_login", ["controller" => "auth", "method" => "login", "prefix" => "auth"]);
Router::add("/auth_loginAdmin", ["controller" => "auth", "method" => "loginAdmin", "prefix" => "auth"]);

Router::add("/auth_create", ["controller" => "auth", "method" => "create_user", "prefix" => "auth"]);
Router::add("/auth_edit", ["controller" => "auth", "method" => "edit_user", "prefix" => "auth"]);
Router::add("/auth_edit_status", ["controller" => "auth", "method" => "edit_status", "prefix" => "auth"]);
Router::add("/delete", ["controller" => "auth", "method" => "delete", "prefix" => "auth"]);
Router::add("/auth_edit_avatar", ["controller" => "auth", "method" => "auth_edit_avatar", "prefix" => "auth"]);

Router::add("/", ["controller" => "main", "method" => "index", "prefix" => '']);
Router::add("/out", ["controller" => "main", "method" => "out", "prefix" => '']);

Router::add("/users", ["controller" => "user", "method" => "users", "prefix" => '']);

Router::add("/login", ["controller" => "user", "method" => "page_login", "prefix" => '']);
Router::add("/registration", ["controller" => "user", "method" => "page_register", "prefix" => '']);

Router::add("/create", ["controller" => "user", "method" => "create_user", "prefix" => '']);
Router::add("/profile", ["controller" => "user", "method" => "page_profile", "prefix" => '']);
Router::add("/edit", ["controller" => "user", "method" => "edit", "prefix" => '']);
Router::add("/status", ["controller" => "user", "method" => "status", "prefix" => '']);
Router::add("/edit_avatar", ["controller" => "user", "method" => "avatar", "prefix" => '']);
