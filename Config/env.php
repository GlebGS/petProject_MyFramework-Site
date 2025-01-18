<?php

return [
    "data_base" =>[
        "dsn" => "pgsql:host=127.0.0.1;dbname=DB",
        "db" => "pgsql",
        "db_name" => "DB",
        "host" => "127.0.0.1",
        "port" => "5432",
        "login" => "user",
        "password" => "password"
    ],

    "mail_setting" => [
        "mailer" => "smtp",
        "admin_mail" => "test@yandex.ru",
        "SMTPDebug" => 2,
        "SMTPAuth" => true,
        "SMTPSecure" => "ssl",
        "mail_host" => "ssl://smtp.yandex.ru",
        "mail_port" => 465,
        "mail_login" => "test@yandex.ru",
        "mail_password" => "password"
    ]
];