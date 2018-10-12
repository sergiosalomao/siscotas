<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 06/10/2018
 * Time: 13:27
 */

namespace App\Controller;


use PDO;
use PDOException;
use App\Controller\Interfaces\InterfaceDataBase;

class DataBaseController extends Controller
{

    public static $instance;
    public $table;

    public function __construct()
    {

    }

    public static function getInstance(string $dsn)
    {
        try {
            if (!isset(self::$instance)) {
                self::$instance = new PDO($dsn);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            }
        } catch (PDOException $e) {
            die($e->getMessage());
        }
        return self::$instance;
    }

    public function connectDb(string $dsn)
    {
        try {
            $conn = new PDO($dsn);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}


