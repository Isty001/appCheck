<?php


namespace App\Information;


class AndroidInformation extends AbstractInformation
{
    /**
     * @var string $versionName
     */
    protected $versionName;

    public function __construct($title, $version, $versionName)
    {
        parent::__construct($title, $version);
        $this->versionName = $versionName;
    }

    /**
     * @return string
     */
    public function getVersionName()
    {
        return $this->versionName;
    }
}
