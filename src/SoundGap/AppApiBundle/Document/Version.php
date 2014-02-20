<?php

namespace SoundGap\AppApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Version
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     * @MongoDB\Index
     */
    protected $app;

    /**
     * @MongoDB\Int
     * @MongoDB\Index
     */
    protected $appVersion;

    /**
     * @MongoDB\String
     * @MongoDB\Index
     */
    protected $moduleName;

    /**
     * @MongoDB\Int
     * @MongoDB\Index
     */
    protected $moduleVersion;

    /**
     * @MongoDB\ReferenceOne(targetDocument="VersionContent")
     */
    protected $versionContent;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set app
     *
     * @param string $app
     * @return self
     */
    public function setApp($app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * Get app
     *
     * @return string $app
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set appVersion
     *
     * @param int $appVersion
     * @return self
     */
    public function setAppVersion($appVersion)
    {
        $this->appVersion = $appVersion;
        return $this;
    }

    /**
     * Get appVersion
     *
     * @return int $appVersion
     */
    public function getAppVersion()
    {
        return $this->appVersion;
    }

    /**
     * Set moduleName
     *
     * @param string $moduleName
     * @return self
     */
    public function setModuleName($moduleName)
    {
        $this->moduleName = $moduleName;
        return $this;
    }

    /**
     * Get moduleName
     *
     * @return string $moduleName
     */
    public function getModuleName()
    {
        return $this->moduleName;
    }

    /**
     * Set moduleVersion
     *
     * @param int $moduleVersion
     * @return self
     */
    public function setModuleVersion($moduleVersion)
    {
        $this->moduleVersion = $moduleVersion;
        return $this;
    }

    /**
     * Get moduleVersion
     *
     * @return int $moduleVersion
     */
    public function getModuleVersion()
    {
        return $this->moduleVersion;
    }

    /**
     * Set versionContent
     *
     * @param SoundGap\AppApiBundle\Document\VersionContent $versionContent
     * @return self
     */
    public function setVersionContent(\SoundGap\AppApiBundle\Document\VersionContent $versionContent)
    {
        $this->versionContent = $versionContent;
        return $this;
    }

    /**
     * Get versionContent
     *
     * @return SoundGap\AppApiBundle\Document\VersionContent $versionContent
     */
    public function getVersionContent()
    {
        return $this->versionContent;
    }
}
