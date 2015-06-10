<?php
/**
 * Created by PhpStorm.
 * User: farkasvolgyi.istvan
 * Date: 2015.06.10.
 * Time: 15:34
 */

namespace App;

use CFPropertyList\CFPropertyList;

class ReadiOS {
    private $appDir = 'apps';
    private $appName = 'phoneapp-debug_ut.xap';

    public function __construct($appDir, $appName)
    {
        $this->app = $appDir . '/' . $appName;
        $this->readApp($this->app);
    }

    private function ReadApp($app)
    {

    }

    private function ShowData($appData)
    {
        echo 'iOS APP:';

        foreach ($appData as $key => $value) {
            echo $key .': '. $value. PHP_EOL;
        }
    }
}