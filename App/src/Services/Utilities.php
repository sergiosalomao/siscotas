<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 07/10/2018
 * Time: 00:04
 */

namespace App\Services;

class Utilities
{
    public function firtsLetter(string $frase)
    {
        $l = substr($frase, 0, 1);
        return $l;
    }

    public function lastLetter(string $frase)
    {
        $l = substr($frase, strlen($frase) - 1);
        return $l;
    }

    public function removeFirstLetter(string $frase)
    {
        $l = substr($frase, 1, strlen($frase));
        return $l;
    }

    public function removeLastLetter(string $frase)
    {
        $l = substr($frase, 0, strlen($frase) - 1);
        return $l;
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

        if ($this->firtsLetter($fields) == ',') {
            $fields = $this->removeFirstLetter($fields);
        };
        if ($this->lastLetter($fields) == ',') {
            $fields = $this->removeLastLetter($fields);
        };
        if ($this->firtsLetter($values) == ',') {
            $values = $this->removeFirstLetter($values);
        };
        if ($this->lastLetter($values) == ',') {
            $values = $this->removeLastLetter($values);
        };

        $lineUpdate = null;
        foreach ($arrayList as $field => $value) {
            if ($field != 'id')
                $lineUpdate .= "$field=$value,";
        }
        $lineUpdate = $this->removeLastLetter($lineUpdate);
        if ($statusMode == 'UPDATE')
            $sql = "UPDATE $table SET {$lineUpdate} WHERE id = {$id}";
        if ($statusMode == 'INSERT')
        $sql = "INSERT INTO $table ({$fields}) VALUES ({$values})";

        return $sql;

    }


}