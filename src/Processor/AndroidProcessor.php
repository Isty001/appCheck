<?php

namespace App\Processor;


use ApkParser\Parser;

class AndroidProcessor
{
    /**
     * @var Parser
     */
    private $parser;

    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
    }

    private function process()
    {
        $this->parser->getManifest()->getApplication();
    }
}