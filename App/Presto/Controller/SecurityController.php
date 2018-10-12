<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 08/10/2018
 * Time: 22:06
 */
namespace Presto\Controller;
class SecurityController
{
    public function createhashArgon2($password)
    {
        return trim(password_hash($password, PASSWORD_ARGON2I));
    }

    public function compareArgonPassword($password, $PASSWORD_ARGON2I)
    {
        $hashed_password = password_hash($password, PASSWORD_ARGON2I);
        return password_verify(trim($password), trim($PASSWORD_ARGON2I));
    }
}