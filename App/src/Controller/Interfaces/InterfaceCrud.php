<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 06/10/2018
 * Time: 22:44
 */

namespace App\Controller\Interfaces;

interface InterfaceCrud
{
    public function save(array $dados);
    public function delete($id);
    public function getRowById($id) ;
    public function getRowByField(array $fields);
    public function getAllList(array $fieldsOrderBy);



}