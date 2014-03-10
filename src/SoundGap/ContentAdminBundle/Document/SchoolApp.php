<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 */
class SchoolApp
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundImageGameOver;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundMusic;

    /**
     * @MongoDB\ReferenceOne(targetDocument="School")
     * @MongoDB\Index
     */
    protected $school;
    /**
     * @MongoDB\ReferenceOne(targetDocument="App")
     * @MongoDB\Index
     */
    protected $app;

    public function __toString()
    {
        return $this->school->getName().':'.$this->app->getName();
    }

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
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set backgroundImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundImage
     * @return self
     */
    public function setBackgroundImage(\SoundGap\ContentAdminBundle\Document\Asset $backgroundImage)
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
    }

    /**
     * Get backgroundImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundImage
     */
    public function getBackgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * Set backgroundImageGameOver
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundImageGameOver
     * @return self
     */
    public function setBackgroundImageGameOver(\SoundGap\ContentAdminBundle\Document\Asset $backgroundImageGameOver)
    {
        $this->backgroundImageGameOver = $backgroundImageGameOver;
        return $this;
    }

    /**
     * Get backgroundImageGameOver
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundImageGameOver
     */
    public function getBackgroundImageGameOver()
    {
        return $this->backgroundImageGameOver;
    }

    /**
     * Set backgroundMusic
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundMusic
     * @return self
     */
    public function setBackgroundMusic(\SoundGap\ContentAdminBundle\Document\Asset $backgroundMusic)
    {
        $this->backgroundMusic = $backgroundMusic;
        return $this;
    }

    /**
     * Get backgroundMusic
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundMusic
     */
    public function getBackgroundMusic()
    {
        return $this->backgroundMusic;
    }

    /**
     * Set school
     *
     * @param SoundGap\ContentAdminBundle\Document\School $school
     * @return self
     */
    public function setSchool(\SoundGap\ContentAdminBundle\Document\School $school)
    {
        $this->school = $school;
        return $this;
    }

    /**
     * Get school
     *
     * @return SoundGap\ContentAdminBundle\Document\School $school
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set app
     *
     * @param SoundGap\ContentAdminBundle\Document\App $app
     * @return self
     */
    public function setApp(\SoundGap\ContentAdminBundle\Document\App $app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * Get app
     *
     * @return SoundGap\ContentAdminBundle\Document\App $app
     */
    public function getApp()
    {
        return $this->app;
    }
}
