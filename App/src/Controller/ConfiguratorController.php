<?php
/**
 * Created by PhpStorm.
 * User: Sergio
 * Date: 03/10/2018
 * Time: 21:27
 */
namespace App\Controller;

class ConfiguratorController
{
    private $appInfo;
    private $language;
    private $dsn;

    public function __construct()
    {
        $this->getConfigurations();

    }

    public function getConfigurations()
    {
        $param = [];
        $itemP = [];
        $fileconf = file("../../config.cfg");

        foreach ($fileconf as $key => $value) {
            $itemP = explode("=", $fileconf[$key]);
            $param['param'] = $itemP[0];
            if (isset($itemP[1]) ? $param['value'] = $itemP[1] :
                $param['value'] = 'Undefined') ;

            if ($param['param'] == 'APP_INFO') {
                $configuration['APP_INFO'] = trim($param['value']);
                $this->appInfo = $configuration['APP_INFO'];
            }
            if ($param['param'] == 'DB_CONNECTION') {
                $configuration['DB_CONNECTION'] = trim($param['value']);
            }
            if ($param['param'] == 'DB_HOST') {
                $configuration['DB_HOST'] = trim($param['value']);
            };
            if ($param['param'] == 'DB_PORT') {
                $configuration['DB_PORT'] = trim($param['value']);
            };
            if ($param['param'] == 'DB_DATABASE') {
                $configuration['DB_DATABASE'] = trim($param['value']);
            }
            if ($param['param'] == 'DB_USERNAME') {
                $configuration['DB_USERNAME'] = trim($param['value']);
            }
            if ($param['param'] == 'DB_PASSWORD') {
                $configuration['DB_PASSWORD'] = trim($param['value']);
            }
            if ($param['param'] == 'LANGUAGE') {
                $configuration['LANGUAGE'] = trim($param['value']);
                $this->language = $configuration['LANGUAGE'];
            }
        }
        $this->dsn = "{$configuration['DB_CONNECTION']}:host={$configuration["DB_HOST"]};port={$configuration["DB_PORT"]};dbname={$configuration["DB_DATABASE"]};user={$configuration["DB_USERNAME"]};password={$configuration["DB_PASSWORD"]};";

        return $configuration;
    }

    public function getAppInfo()
    {
        return $this->appInfo;
    }

    public function getDsn()
    {
        return $this->dsn;
    }

    public function getLanguage()
    {
        return $this->language;
    }


}