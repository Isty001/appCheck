<?php


namespace App\Information;


abstract class AbstractInformation
{
    /**
     * @var string $version
     */
    private $title;

    /**
     * @var string $version
     */
    private $version;

    /**
     * @param $title
     * @param $version
     */
    public function __construct($title, $version)
    {
        $this->title = $title;
        $this->version = $version;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
}
