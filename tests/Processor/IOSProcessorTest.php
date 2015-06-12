<?php

namespace App\tests\Processor;

use App\Processor\IOSProcessor;
use App\Information\IOSInformation;
use CFPropertyList\CFPropertyList;


class IOSProcessorTest extends \PHPUnit_Framework_TestCase
{
    public function testProcess()
    {
//        $filename = 'valami.ipa';
//        $title = 'iOSTile';
//        $version = 'iOSVersion';
//        $processor = new IOSProcessor($this->mockZipArchive($filename, $title, $version, $manifestXml));
//        $this->assertInstanceOf(IOSInformation::class, $processor->process());
//
//        $zipArchive = new \ZipArchive();
//        $zipArchive->open(__DIR__.'/../../src/apps/RetroGo.ipa');
//        $plistData = $zipArchive->getFromName('Info.plist');
//        var_dump($plistData);
//        $plist = new CFPropertyList();
//        $plist->parse($plistData, CFPropertyList::FORMAT_BINARY);
    }

    /**
     * @param string $filename
     * @param string $title
     * @param string $version
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    public function mockZipArchive($filename, $title, $version)
    {
        $zipArchive = $this->getMock(\ZipArchive::class);

        $zipArchive
            ->expects($this->once())
            ->method('open')
            ->with($filename);

        $zipArchive->expects($this->once())
            ->method('getFromName')
            ->with($title, $version);

        return $zipArchive;
    }


}