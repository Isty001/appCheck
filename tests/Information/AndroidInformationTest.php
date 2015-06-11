<?php


namespace App\Tests\Information;

use App\Information\AndroidInformation;

class AndroidInformationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provider
     * @param string $versionName
     * @param string $version
     * @param string $title
     */
    public function testConstruct($title, $version, $versionName)
    {
        $info = new AndroidInformation($title, $version, $versionName);

        $this->assertSame($version, $info->getVersion());
        $this->assertSame($title, $info->getTitle());
        $this->assertSame($versionName, $info->getVersionName());
    }

    /**
     * @return array
     */
    public function provider()
    {
        return [
            ['title1', 'version1', 'versionName3'],
            ['title2', 'version2', 'versionName3'],
            ['title3', 'version3', 'versionName3']
        ];
    }
}
