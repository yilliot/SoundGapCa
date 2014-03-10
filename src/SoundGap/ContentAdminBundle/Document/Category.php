<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 */
class Category
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     * @Assert\NotBlank()
     */
    protected $buttonTitle;

    /**
     * @MongoDB\String
     */
    protected $buttonTitle2;

    /**
     * @MongoDB\String
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $title2;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $buttonImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $buttonImageTouch;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundMusic;

    /**
     * @MongoDB\Int
     * @MongoDB\Index
     */
    protected $position;

    /**
     * @MongoDB\ReferenceOne(targetDocument="SchoolApp")
     * @MongoDB\Index
     */
    protected $schoolApp;

    /**
     * @MongoDB\Boolean
     */
    protected $isDeleted;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->title;
    }

    /**
     * Set buttonTitle
     *
     * @param string $buttonTitle
     * @return self
     */
    public function setButtonTitle($buttonTitle)
    {
        $this->buttonTitle = $buttonTitle;
        return $this;
    }

    /**
     * Get buttonTitle
     *
     * @return string $buttonTitle
     */
    public function getButtonTitle()
    {
        return $this->buttonTitle;
    }

    /**
     * Set buttonTitle2
     *
     * @param string $buttonTitle2
     * @return self
     */
    public function setButtonTitle2($buttonTitle2)
    {
        $this->buttonTitle2 = $buttonTitle2;
        return $this;
    }

    /**
     * Get buttonTitle2
     *
     * @return string $buttonTitle2
     */
    public function getButtonTitle2()
    {
        return $this->buttonTitle2;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title2
     *
     * @param string $title2
     * @return self
     */
    public function setTitle2($title2)
    {
        $this->title2 = $title2;
        return $this;
    }

    /**
     * Get title2
     *
     * @return string $title2
     */
    public function getTitle2()
    {
        return $this->title2;
    }

    /**
     * Set buttonImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $buttonImage
     * @return self
     */
    public function setButtonImage(\SoundGap\ContentAdminBundle\Document\Asset $buttonImage)
    {
        $this->buttonImage = $buttonImage;
        return $this;
    }

    /**
     * Get buttonImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $buttonImage
     */
    public function getButtonImage()
    {
        return $this->buttonImage;
    }

    /**
     * Set buttonImageTouch
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $buttonImageTouch
     * @return self
     */
    public function setButtonImageTouch(\SoundGap\ContentAdminBundle\Document\Asset $buttonImageTouch)
    {
        $this->buttonImageTouch = $buttonImageTouch;
        return $this;
    }

    /**
     * Get buttonImageTouch
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $buttonImageTouch
     */
    public function getButtonImageTouch()
    {
        return $this->buttonImageTouch;
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
     * Set position
     *
     * @param int $position
     * @return self
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return int $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set schoolApp
     *
     * @param SoundGap\ContentAdminBundle\Document\SchoolApp $schoolApp
     * @return self
     */
    public function setSchoolApp(\SoundGap\ContentAdminBundle\Document\SchoolApp $schoolApp)
    {
        $this->schoolApp = $schoolApp;
        return $this;
    }

    /**
     * Get schoolApp
     *
     * @return SoundGap\ContentAdminBundle\Document\SchoolApp $schoolApp
     */
    public function getSchoolApp()
    {
        return $this->schoolApp;
    }

    /**
     * Set isDeleted
     *
     * @return self
     */
    public function softDelete()
    {
        $this->isDeleted = true;
        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean $isDeleted
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return self
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
        return $this;
    }
}
