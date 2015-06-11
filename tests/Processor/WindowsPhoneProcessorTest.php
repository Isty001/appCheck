<?php


namespace App\Tests\Processor;

use App\Information\WindowsPhoneInformation;
use App\Processor\WindowsPhoneProcessor;

class WindowsPhoneProcessorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     *
     * @param string $title
     * @param string $version
     */
    public function testProcess($title, $version)
    {
        $filename = 'pina.apk';
        $manifestXml = 'WMAppManifest.xml';
        $processor = new WindowsPhoneProcessor($this->mockZipArchive($filename, $manifestXml, $title, $version));
        $actual = $processor->process($filename);
        $this->assertInstanceOf(WindowsPhoneInformation::class, $actual);
        $expected = new WindowsPhoneInformation($title, $version);
        $this->assertEquals($expected, $actual);
    }

    /**
     * @return array
     */
    public function provider()
    {
        return [
            ['PhoneApp1', '1.0'],
            ['PhoneApp2', '2.0'],
        ];
    }

    /**
     * @param string $filename
     * @param string $manifestXml
     * @param string $title
     * @param string $version
     * @return \PHPUnit_Framework_MockObject_MockObject
     */
    private function mockZipArchive($filename, $manifestXml, $title, $version)
    {
        $zipArchive = $this->getMock(\ZipArchive::class);
        $zipArchive
            ->expects($this->once())
            ->method('open')
            ->with($filename);
        $zipArchive
            ->expects($this->once())
            ->method('getFromName')
            ->with($manifestXml)
            ->willReturn($this->getWindowsPhoneManifest($title, $version));

        return $zipArchive;
    }

    /**
     * @param string $title
     * @param string $version
     * @return string
     */
    private function getWindowsPhoneManifest($title, $version)
    {
        return '<?'. 'xml version="1.0" encoding="utf-8"?>
            <Deployment xmlns="http://schemas.microsoft.com/windowsphone/2012/deployment" AppPlatformVersion="8.0">
              <DefaultLanguage xmlns="" code="en-US" />
              <Languages xmlns="">
                <Language code="en" />
                <Language code="hu" />
              </Languages>
              <App xmlns="" ProductID="{65b75b38-93a7-4a60-bbb7-1c308d61699b}"
                   Title="' . $title . '"
                   RuntimeType="Silverlight"
                   Version="' . $version . '"
                   Genre="apps.normal"
                   Author="PhoneApp1
                   author"
                   Description="Sample description"
                   Publisher="PhoneApp1"
                   PublisherID="{a807092f-e46b-4c44-b001-049f9d98b0fe}">
                <IconPath IsRelative="true" IsResource="false">Assets\ApplicationIcon.png</IconPath>
                <Capabilities>
                  <Capability Name="ID_CAP_NETWORKING" />
                  <Capability Name="ID_CAP_MEDIALIB_AUDIO" />
                  <Capability Name="ID_CAP_MEDIALIB_PLAYBACK" />
                  <Capability Name="ID_CAP_SENSORS" />
                  <Capability Name="ID_CAP_WEBBROWSERCOMPONENT" />
                  <Capability Name="ID_CAP_LOCATION" />
                  <Capability Name="ID_CAP_ISV_CAMERA" />
                  <Capability Name="ID_CAP_IDENTITY_DEVICE" />
                  <Capability Name="ID_CAP_IDENTITY_USER" />
                  <Capability Name="ID_CAP_CONTACTS" />
                </Capabilities>
                <Tasks>
                  <DefaultTask Name="_default" NavigationPage="MainPage.xaml" />
                </Tasks>
                <Tokens>
                  <PrimaryToken TokenID="PhoneApp1Token" TaskName="_default">
                    <TemplateFlip>
                      <SmallImageURI IsRelative="true" IsResource="false">Assets\Tiles\FlipCycleTileSmall.png</SmallImageURI>
                      <Count>0</Count>
                      <BackgroundImageURI IsRelative="true" IsResource="false">Assets\Tiles\FlipCycleTileMedium.png</BackgroundImageURI>
                      <Title>PhoneApp1</Title>
                      <BackContent></BackContent>
                      <BackBackgroundImageURI></BackBackgroundImageURI>
                      <BackTitle></BackTitle>
                      <DeviceLockImageURI></DeviceLockImageURI>
                      <HasLarge></HasLarge>
                    </TemplateFlip>
                  </PrimaryToken>
                </Tokens>
                <ScreenResolutions>
                  <ScreenResolution Name="ID_RESOLUTION_WVGA" />
                  <ScreenResolution Name="ID_RESOLUTION_WXGA" />
                  <ScreenResolution Name="ID_RESOLUTION_HD720P" />
                </ScreenResolutions>
                <Requirements>
                  <Requirement Name="ID_REQ_GYROSCOPE" />
                  <Requirement Name="ID_REQ_MAGNETOMETER" />
                </Requirements>
              </App>
            </Deployment>
            <!-- WPSDK Version 8.0.9900 -->
        ';
    }

}
