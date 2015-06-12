<?php

namespace App\Processor;

use App\Information\IOSInformation;

class IOSProcessor
{
    public function __construct(\ZipArchive $zipArchive){
        $this->zipArchive = $zipArchive;
    }

    public function process(){

    }
}