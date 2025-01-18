<?php

namespace Core;

use Core\Patterns\Registry;
use Core\Patterns\TSingleton;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require VENDOR . "/phpmailer/phpmailer/src/Exception.php";
require VENDOR . "/phpmailer/phpmailer/src/PHPMailer.php";

class Mailer
{

    use TSingleton;

    public static $env;
    public static $mail;
    public static $mail_setting;

    public function __construct()
    {
        self::$env = Registry::getInstance();

        $this->emailParams();

        self::$mail_setting = self::$env->getProperties()["mail_setting"];
        self::$mail = new PHPMailer(true);

        try
        {
            self::$mail->SMTPDebug    = self::$mail_setting["SMTPDebug"];                  
            self::$mail->isSMTP();
            self::$mail->Mailer       = self::$mail_setting["mailer"];                                
            self::$mail->Host         = self::$mail_setting["mail_host"];                
            self::$mail->SMTPAuth     = self::$mail_setting["SMTPAuth"];                              
            self::$mail->Username     = self::$mail_setting["mail_login"];           
            self::$mail->Password     = self::$mail_setting["mail_password"];                            
            self::$mail->SMTPSecure   = self::$mail_setting["SMTPSecure"];   
            self::$mail->Port         = self::$mail_setting["mail_port"];
        }catch(Exception $e)
        {
            throw new Exception("Не удалось отправить сообщение. Ошибка почтовой программы!", 500);
        }
    }

    public function sendMessage($user, $new_pass)
    {
        self::$mail->setFrom(self::$mail_setting["admin_mail"], "ADMIN");
        self::$mail->addAddress($user["email"], $user["name"]);
        self::$mail->isHTML(true);
        self::$mail->Subject = "Новый пароль";
        self::$mail->Body    = "Ваш новый пароль <b>{$new_pass}</b>";

        self::$mail->send();
    }

    public function emailParams()
    {
        $env = require CONFIG . "/env.php";
        
        foreach($env as $k => $v)
        {
            self::$env->setProperty($k, $v);
        }
    }

}