<?php if (!defined('BASEPATH')) exit('No permitir el acceso directo al script');

require_once dirname(__FILE__) . '/PHPMailer/PHPMailerAutoload.php';

class Class_mail extends PHPMailer{
    function __construct()
    {
        parent::__construct();
    }
}