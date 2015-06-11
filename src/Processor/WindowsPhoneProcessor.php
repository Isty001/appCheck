<?php

namespace App\Processor;

use App\Information\WindowsPhoneInformation;

class WindowsPhoneProcessor
{
    /**
     * @var \ZipArchive
     */
    private $zipArchive;

    public function __construct(\ZipArchive $zipArchive)
    {
        $this->zipArchive = $zipArchive;
    }

    /**
     * @param string $filename
     * @return WindowsPhoneInformation
     */
    public function process($filename)
    {
        return $this->createInformation($this->parseXML($filename));
    }

    /**
     * @param string $filename
     * @return \SimpleXMLElement
     */
    private function parseXML($filename)
    {
        $this->zipArchive->open($filename);
        return simplexml_load_string($this->zipArchive->getFromName('WMAppManifest.xml'));
    }

    /**
     * @param \SimpleXMLElement $xmlData
     * @return WindowsPhoneInformation
     */
    private function createInformation($xmlData)
    {
        $app = $xmlData->App;

        return new WindowsPhoneInformation($app['Title'], $app['Version']);
    }
}
