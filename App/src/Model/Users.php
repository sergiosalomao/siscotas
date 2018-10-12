<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 06/10/2018
 * Time: 19:05
 */

namespace App\Model;

use App\Controller\Crud;


class Users extends Crud
{
    protected $schema = 'public';
    protected $table = 'tb_users';
    protected $schemaTable ="public.tb_users";
}

