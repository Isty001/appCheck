<?php


namespace App\Tests\Information;

use App\Information\iOSInformation;

class iOSTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider provider
     * @param string $title
     * @param string $version
     */
    public function testConstruct($title, $version)
    {
        $info = new iOSInformation($title, $version);
        $this->assertSame($title, $info->getTitle());
        $this->assertSame($version, $info->getVersion());
    }

    /**
     * @return array
     */
    public function provider()
    {
        return [
            ['title1', 'version1'],
            ['title2', 'version2'],
            ['title3', 'version3'],
        ];
    }
}
