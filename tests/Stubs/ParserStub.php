<?php


namespace App\Tests\Stubs;


use ApkParser\Parser;

class ParserStub extends Parser {
    private $mockManifest;

    public function __construct($mockManifest)
    {
        $this->mockManifest = $mockManifest;
    }

    public function getManifest()
    {
        return $this->mockManifest;
    }
}