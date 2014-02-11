<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class PointContent
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Point")
     * @MongoDB\Index 
     */
    protected $point;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $startAudio;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $backgroundAudio;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $backgroundImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose1;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose2;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose3;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose4;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose5;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose6;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter1Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter2Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter3Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter4Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter5Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter6Speech;

    /**
     * @MongoDB\String
     */
    protected $caption;

    /**
     * @MongoDB\String
     */
    protected $contentType;

    /**
     * @MongoDB\Int
     */
    protected $pageNumber;

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
     * Set point
     *
     * @param SoundGap\ContentAdminBundle\Document\Point $point
     * @return self
     */
    public function setPoint(\SoundGap\ContentAdminBundle\Document\Point $point)
    {
        $this->point = $point;
        return $this;
    }

    /**
     * Get point
     *
     * @return SoundGap\ContentAdminBundle\Document\Point $point
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set startAudio
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $startAudio
     * @return self
     */
    public function setStartAudio(\SoundGap\ContentAdminBundle\Document\Media $startAudio)
    {
        $this->startAudio = $startAudio;
        return $this;
    }

    /**
     * Get startAudio
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $startAudio
     */
    public function getStartAudio()
    {
        return $this->startAudio;
    }

    /**
     * Set backgroundAudio
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $backgroundAudio
     * @return self
     */
    public function setBackgroundAudio(\SoundGap\ContentAdminBundle\Document\Media $backgroundAudio)
    {
        $this->backgroundAudio = $backgroundAudio;
        return $this;
    }

    /**
     * Get backgroundAudio
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $backgroundAudio
     */
    public function getBackgroundAudio()
    {
        return $this->backgroundAudio;
    }

    /**
     * Set backgroundImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $backgroundImage
     * @return self
     */
    public function setBackgroundImage(\SoundGap\ContentAdminBundle\Document\Media $backgroundImage)
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
    }

    /**
     * Get backgroundImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $backgroundImage
     */
    public function getBackgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * Set characterPose1
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose1
     * @return self
     */
    public function setCharacterPose1(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose1)
    {
        $this->characterPose1 = $characterPose1;
        return $this;
    }

    /**
     * Get characterPose1
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose1
     */
    public function getCharacterPose1()
    {
        return $this->characterPose1;
    }

    /**
     * Set characterPose2
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose2
     * @return self
     */
    public function setCharacterPose2(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose2)
    {
        $this->characterPose2 = $characterPose2;
        return $this;
    }

    /**
     * Get characterPose2
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose2
     */
    public function getCharacterPose2()
    {
        return $this->characterPose2;
    }

    /**
     * Set characterPose3
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose3
     * @return self
     */
    public function setCharacterPose3(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose3)
    {
        $this->characterPose3 = $characterPose3;
        return $this;
    }

    /**
     * Get characterPose3
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose3
     */
    public function getCharacterPose3()
    {
        return $this->characterPose3;
    }

    /**
     * Set characterPose4
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose4
     * @return self
     */
    public function setCharacterPose4(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose4)
    {
        $this->characterPose4 = $characterPose4;
        return $this;
    }

    /**
     * Get characterPose4
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose4
     */
    public function getCharacterPose4()
    {
        return $this->characterPose4;
    }

    /**
     * Set characterPose5
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose5
     * @return self
     */
    public function setCharacterPose5(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose5)
    {
        $this->characterPose5 = $characterPose5;
        return $this;
    }

    /**
     * Get characterPose5
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose5
     */
    public function getCharacterPose5()
    {
        return $this->characterPose5;
    }

    /**
     * Set characterPose6
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose6
     * @return self
     */
    public function setCharacterPose6(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose6)
    {
        $this->characterPose6 = $characterPose6;
        return $this;
    }

    /**
     * Get characterPose6
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose6
     */
    public function getCharacterPose6()
    {
        return $this->characterPose6;
    }

    /**
     * Set isCharacter1Speech
     *
     * @param boolean $isCharacter1Speech
     * @return self
     */
    public function setIsCharacter1Speech($isCharacter1Speech)
    {
        $this->isCharacter1Speech = $isCharacter1Speech;
        return $this;
    }

    /**
     * Get isCharacter1Speech
     *
     * @return boolean $isCharacter1Speech
     */
    public function getIsCharacter1Speech()
    {
        return $this->isCharacter1Speech;
    }

    /**
     * Set isCharacter2Speech
     *
     * @param boolean $isCharacter2Speech
     * @return self
     */
    public function setIsCharacter2Speech($isCharacter2Speech)
    {
        $this->isCharacter2Speech = $isCharacter2Speech;
        return $this;
    }

    /**
     * Get isCharacter2Speech
     *
     * @return boolean $isCharacter2Speech
     */
    public function getIsCharacter2Speech()
    {
        return $this->isCharacter2Speech;
    }

    /**
     * Set isCharacter3Speech
     *
     * @param boolean $isCharacter3Speech
     * @return self
     */
    public function setIsCharacter3Speech($isCharacter3Speech)
    {
        $this->isCharacter3Speech = $isCharacter3Speech;
        return $this;
    }

    /**
     * Get isCharacter3Speech
     *
     * @return boolean $isCharacter3Speech
     */
    public function getIsCharacter3Speech()
    {
        return $this->isCharacter3Speech;
    }

    /**
     * Set isCharacter4Speech
     *
     * @param boolean $isCharacter4Speech
     * @return self
     */
    public function setIsCharacter4Speech($isCharacter4Speech)
    {
        $this->isCharacter4Speech = $isCharacter4Speech;
        return $this;
    }

    /**
     * Get isCharacter4Speech
     *
     * @return boolean $isCharacter4Speech
     */
    public function getIsCharacter4Speech()
    {
        return $this->isCharacter4Speech;
    }

    /**
     * Set isCharacter5Speech
     *
     * @param boolean $isCharacter5Speech
     * @return self
     */
    public function setIsCharacter5Speech($isCharacter5Speech)
    {
        $this->isCharacter5Speech = $isCharacter5Speech;
        return $this;
    }

    /**
     * Get isCharacter5Speech
     *
     * @return boolean $isCharacter5Speech
     */
    public function getIsCharacter5Speech()
    {
        return $this->isCharacter5Speech;
    }

    /**
     * Set isCharacter6Speech
     *
     * @param boolean $isCharacter6Speech
     * @return self
     */
    public function setIsCharacter6Speech($isCharacter6Speech)
    {
        $this->isCharacter6Speech = $isCharacter6Speech;
        return $this;
    }

    /**
     * Get isCharacter6Speech
     *
     * @return boolean $isCharacter6Speech
     */
    public function getIsCharacter6Speech()
    {
        return $this->isCharacter6Speech;
    }

    /**
     * Set caption
     *
     * @param string $caption
     * @return self
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Get caption
     *
     * @return string $caption
     */
    public function getCaption()
    {
        return $this->caption;
    }

    /**
     * Set contentType
     *
     * @param string $contentType
     * @return self
     */
    public function setContentType($contentType)
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * Get contentType
     *
     * @return string $contentType
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * Set pageNumber
     *
     * @param int $pageNumber
     * @return self
     */
    public function setPageNumber($pageNumber)
    {
        $this->pageNumber = $pageNumber;
        return $this;
    }

    /**
     * Get pageNumber
     *
     * @return int $pageNumber
     */
    public function getPageNumber()
    {
        return $this->pageNumber;
    }
}
