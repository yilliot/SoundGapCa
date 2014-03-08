<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document
 */
class Grade
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Category")
     * @MongoDB\Index
     * @Assert\NotBlank()
     */
    protected $category;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Package")
     * @MongoDB\Index
     * @Assert\NotBlank()
     */
    protected $package;

    /**
     * @MongoDB\String
     */
    protected $buttonTitle;

    /**
     * @MongoDB\String
     */
    protected $buttonTitle2;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $buttonImage;

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
     * @Assert\NotBlank()
     */
    protected $position;

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
     * Set category
     *
     * @param SoundGap\ContentAdminBundle\Document\Category $category
     * @return self
     */
    public function setCategory(\SoundGap\ContentAdminBundle\Document\Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return SoundGap\ContentAdminBundle\Document\Category $category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set package
     *
     * @param SoundGap\ContentAdminBundle\Document\Package $package
     * @return self
     */
    public function setPackage(\SoundGap\ContentAdminBundle\Document\Package $package)
    {
        $this->package = $package;
        return $this;
    }

    /**
     * Get package
     *
     * @return SoundGap\ContentAdminBundle\Document\Package $package
     */
    public function getPackage()
    {
        return $this->package;
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
}
