<?php
/**
 * Created by PhpStorm.
 * User: farkasvolgyi.istvan
 * Date: 2015.06.10.
 * Time: 10:03
 */

namespace App;
require '../vendor/autoload.php';

class CheckFiles
{

    private $appDir;

    public function __construct($appDir)
    {
        $this->CheckDir($appDir);
    }

    private function CheckDir($appDir)
    {
        $dirIterator = new \DirectoryIterator($appDir);
        foreach ($dirIterator as $app) {
            if ($app->getFilename() === '.' || $app->getFilename() === '..') {
                continue;
            }

            switch ($app->getExtension()) {
                case 'xap':
                    new ReadWP($appDir, $app->getFilename());
                    break;
                case 'apk':
                    new ReadAndroid($appDir, $app->getFilename());
                    break;
                case 'ipa':
                    new ReadiOS($appDir, $app->getFilename());
            }

        }
    }
}

$appDir = 'apps';
new CheckFiles($appDir);