<?php
/**
 * Created by PhpStorm.
 * User: farkasvolgyi.istvan
 * Date: 2015.06.10.
 * Time: 11:28
 */

namespace App;

class ReadWP
{
    private $appDir = 'apps';
    private $appName = 'phoneapp-debug_ut.xap';

    public function __construct($appDir, $appName)
    {
        $this->app = $appDir . '/' . $appName;
        $this->readApp($this->app);
    }

    private function ReadApp($app)
    {
        $file = new \ZipArchive();
        $file->open($app);
        $xmlData = simplexml_load_string($file->getFromName('WMAppManifest.xml'));
        $appData = ['Title' => $xmlData->App['Title'], 'Version' => $xmlData->App['Version']];

        $this->ShowData($appData);
    }

    private function ShowData($appData)
    {
        echo 'WP APP:';

        foreach ($appData as $key => $value) {
            echo $key .': '. $value. PHP_EOL;
        }
    }
}