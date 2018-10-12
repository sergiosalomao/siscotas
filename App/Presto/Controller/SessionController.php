<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 07/10/2018
 * Time: 19:46
 */

namespace Presto\Controller;


class SessionController
{
    public function saveLoginSession(string $name, string $email){
        $_SESSION['LOGIN_STATUS'] = 'true';
        $_SESSION['USER_NAME'] = $name;
        $_SESSION['USER_EMAIL'] = $email;
        $_SESSION['HOUR_CONNECTED'] = date('Y-m-d H:i');
    }
}