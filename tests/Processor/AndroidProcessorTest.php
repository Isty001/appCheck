<?php

namespace App\Tests\Processor;

use ApkParser\Application;
use ApkParser\Manifest;
use ApkParser\Parser;
use App\Information\AndroidInformation;
use App\Processor\AndroidProcessor;
use App\Tests\Stubs\ParserStub;

class AndroidProcessorTest extends \PHPUnit_Framework_TestCase
{

    public function testProcess()
    {
        $filename = 'fileName';
        $versionCode = '1.0';
        $versionName = 'JellyBean';
        $name = 'appName';

        $process = new AndroidProcessor($this->mockParser($versionName, $versionCode, $name));
    }

    public function mockParser($versionName, $versionCode, $name)
    {
        return new ParserStub($this->mockManifest($versionName, $versionCode, $name));
    }


    /**
     * @return Manifest
     */
    private function mockManifest($versionName, $versionCode, $name)
    {
        $manifest = $this->getMockBuilder(Manifest::class)->disableOriginalConstructor()->getMock();
        $manifest
            ->expects($this->once())
            ->method('getApplication')
            ->willReturn($this->mockApplication($name));
        $manifest
            ->expects($this->once())
            ->method('getVersionCode')
            ->willReturn($versionCode);
        $manifest
            ->expects($this->once())
            ->method('getVersionName')
            ->willReturn($versionName);

        return $manifest;
    }

    /**
     * @return Application
     */
    private function mockApplication($name)
    {
        $application = $this->getMockBuilder(Application::class)->disableOriginalConstructor()->getMock();
        $application
            ->expects($this->once())
            ->method('getLabel')
            ->willReturn('');

        return $application;
    }
}