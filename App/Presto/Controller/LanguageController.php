<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 10/10/2018
 * Time: 23:23
 */

namespace Presto\Controller;


class LanguageController
{
    private $language = 'pt';

    public function __construct()
    {

    }

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function getLanguage()
    {
        return $this->language;
    }


    public function language($textParam)
    {

        $return = null;
        $filelang = file("../language/$this->language.yaml");
        foreach ($filelang as $key => $value) {
            $itemParam = explode(":", $filelang[$key]);
            $line['param'] = trim($itemParam[0]);
            $line['value'] = trim($itemParam[1]);

            if (trim($line['param']) == trim($textParam)) {
                $return = trim($itemParam[1]);
            }

        }
        return $return;
    }

}