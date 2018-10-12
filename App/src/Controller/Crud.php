<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 06/10/2018
 * Time: 22:41
 */

namespace App\Controller;

use PDO;
use App\Controller\Interfaces\InterfaceCrud;
use Presto\Controller\AdaptersController;

abstract class Crud extends Controller implements InterfaceCrud
{
    private $sqlAdapter;
    private $dsn;

    public function __construct()
    {
        $util = new AdaptersController();
        $this->saveAdapter = $util;

        $conf = new ConfiguratorController();
        $this->dsn = $conf->getDsn();
    }

    public function save(array $dados)
    {

        $sql = $this->saveAdapter->saveAdapter("$this->schemaTable", $dados, 'id', 'DEFAULT');

        try {
            $pdo = new PDO($this->dsn);
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return "ERROR: " . $e->getMessage();
        }
        return true;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

   public function getRowById($id)
   {
       $cont = 0;
       $sql = "SELECT * FROM {$this->schemaTable} WHERE id = $id";
       try {
           $pdo = new PDO($this->dsn);
           $stmt = $pdo->prepare($sql);
           $stmt->execute();
       } catch (PDOException $e) {
           return "ERROR: " . $e->getMessage();
       }
       return $row = $stmt->fetch(PDO::FETCH_OBJ);
   }

    public function getRowByField(array $fields)
    {
        $cont = 0;
        $sql = "SELECT * FROM {$this->schemaTable} WHERE 1=1 ";
        foreach ($fields as $field => $value) {
            if (isset($fields["$field"])) {
                if (!is_numeric($value)) $value = "'$value'";
                $sql .= " AND $field = $value ";
                $cont++;
            }
        }
        $sql .= 'LIMIT 1';
        try {
            $pdo = new PDO($this->dsn);
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            return "ERROR: " . $e->getMessage();
        }
        return $row = $stmt->fetch(PDO::FETCH_OBJ);
    }

    public function getAllList(array $fieldsOrderBy)
    {
        // TODO: Implement getAllList() method.
    }


}