<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 08/10/2018
 * Time: 19:43
 */

namespace Presto\Controller;

use App\Services\Utilities;

class AdaptersController
{
   private $util;

    public function __construct()
   {
   $utilities = new Utilities();
   $this->util = $utilities;
   }

    /*
     * Adaptador prepara o sql do insert ou update
     */
    public function saveAdapter(string $table, array $arrayList)
    {
        $fields = null;
        $values = null;
        $statusMode = 'INSERT';
        $id = null;
        foreach ($arrayList as $field => $value) {
            if ($field != 'id')
                $fields .= trim($field) . ',';
            if (($field == 'id') && ($value != '')) {
                $statusMode = 'UPDATE';
                $id = $value;
            };
            if ($field != 'id')
                $values .= "'" . trim($value) . "'" . ',';
        }

        if ($this->util->firtsLetter($fields) == ',') {
            $fields = $this->util->removeFirstLetter($fields);
        };
        if ($this->util->lastLetter($fields) == ',') {
            $fields = $this->util->removeLastLetter($fields);
        };
        if ($this->util->firtsLetter($values) == ',') {
            $values = $this->util->removeFirstLetter($values);
        };
        if ($this->util->lastLetter($values) == ',') {
            $values = $this->util->removeLastLetter($values);
        };

        $lineUpdate = null;
        foreach ($arrayList as $field => $value) {
            if ($field != 'id')
                $lineUpdate .= "$field=$value,";
        }
        $lineUpdate = $this->util->removeLastLetter($lineUpdate);
        if ($statusMode == 'UPDATE')
            $sql = "UPDATE $table SET {$lineUpdate} WHERE id = {$id}";
        if ($statusMode == 'INSERT')
            $sql = "INSERT INTO $table ({$fields}) VALUES ({$values})";

        return $sql;

    }

}