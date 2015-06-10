<?php
/**
 * Created by PhpStorm.
 * User: farkasvolgyi.istvan
 * Date: 2015.06.10.
 * Time: 14:01
 */

namespace App;

class ReadAndroid
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
        $file = new \ApkParser\Parser($app);
        $xmlData = simplexml_load_string($file->getManifest()->getXmlString());
        $appData = ['Title' => $xmlData->application['name'], 'Version' => $xmlData['versionName']];

        $this->ShowData($appData);
    }

    private function ShowData($appData)
    {
        echo 'ANDROID APP:';

        foreach ($appData as $key => $value) {
            echo $key . ': ' . $value . PHP_EOL;
        }
    }
}