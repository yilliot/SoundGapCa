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
     * @MongoDB\ObjectId
     * @MongoDB\Index 
     */
    protected $pointId;

    /**
     * @MongoDB\ObjectId
     */
    protected $startAudioId;

    /**
     * @MongoDB\ObjectId
     */
    protected $backgroundAudioId;

    /**
     * @MongoDB\ObjectId
     */
    protected $backgroundImageId;

    /**
     * @MongoDB\ObjectId
     */
    protected $characterPose1Id;

    /**
     * @MongoDB\ObjectId
     */
    protected $characterPose2Id;

    /**
     * @MongoDB\ObjectId
     */
    protected $characterPose3Id;

    /**
     * @MongoDB\ObjectId
     */
    protected $characterPose4Id;

    /**
     * @MongoDB\ObjectId
     */
    protected $characterPose5Id;

    /**
     * @MongoDB\ObjectId
     */
    protected $characterPose6Id;

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
     * Set pointId
     *
     * @param object_id $pointId
     * @return self
     */
    public function setPointId($pointId)
    {
        $this->pointId = $pointId;
        return $this;
    }

    /**
     * Get pointId
     *
     * @return object_id $pointId
     */
    public function getPointId()
    {
        return $this->pointId;
    }

    /**
     * Set startAudioId
     *
     * @param object_id $startAudioId
     * @return self
     */
    public function setStartAudioId($startAudioId)
    {
        $this->startAudioId = $startAudioId;
        return $this;
    }

    /**
     * Get startAudioId
     *
     * @return object_id $startAudioId
     */
    public function getStartAudioId()
    {
        return $this->startAudioId;
    }

    /**
     * Set backgroundAudioId
     *
     * @param object_id $backgroundAudioId
     * @return self
     */
    public function setBackgroundAudioId($backgroundAudioId)
    {
        $this->backgroundAudioId = $backgroundAudioId;
        return $this;
    }

    /**
     * Get backgroundAudioId
     *
     * @return object_id $backgroundAudioId
     */
    public function getBackgroundAudioId()
    {
        return $this->backgroundAudioId;
    }

    /**
     * Set backgroundImageId
     *
     * @param object_id $backgroundImageId
     * @return self
     */
    public function setBackgroundImageId($backgroundImageId)
    {
        $this->backgroundImageId = $backgroundImageId;
        return $this;
    }

    /**
     * Get backgroundImageId
     *
     * @return object_id $backgroundImageId
     */
    public function getBackgroundImageId()
    {
        return $this->backgroundImageId;
    }

    /**
     * Set characterPose1Id
     *
     * @param object_id $characterPose1Id
     * @return self
     */
    public function setCharacterPose1Id($characterPose1Id)
    {
        $this->characterPose1Id = $characterPose1Id;
        return $this;
    }

    /**
     * Get characterPose1Id
     *
     * @return object_id $characterPose1Id
     */
    public function getCharacterPose1Id()
    {
        return $this->characterPose1Id;
    }

    /**
     * Set characterPose2Id
     *
     * @param object_id $characterPose2Id
     * @return self
     */
    public function setCharacterPose2Id($characterPose2Id)
    {
        $this->characterPose2Id = $characterPose2Id;
        return $this;
    }

    /**
     * Get characterPose2Id
     *
     * @return object_id $characterPose2Id
     */
    public function getCharacterPose2Id()
    {
        return $this->characterPose2Id;
    }

    /**
     * Set characterPose3Id
     *
     * @param object_id $characterPose3Id
     * @return self
     */
    public function setCharacterPose3Id($characterPose3Id)
    {
        $this->characterPose3Id = $characterPose3Id;
        return $this;
    }

    /**
     * Get characterPose3Id
     *
     * @return object_id $characterPose3Id
     */
    public function getCharacterPose3Id()
    {
        return $this->characterPose3Id;
    }

    /**
     * Set characterPose4Id
     *
     * @param object_id $characterPose4Id
     * @return self
     */
    public function setCharacterPose4Id($characterPose4Id)
    {
        $this->characterPose4Id = $characterPose4Id;
        return $this;
    }

    /**
     * Get characterPose4Id
     *
     * @return object_id $characterPose4Id
     */
    public function getCharacterPose4Id()
    {
        return $this->characterPose4Id;
    }

    /**
     * Set characterPose5Id
     *
     * @param object_id $characterPose5Id
     * @return self
     */
    public function setCharacterPose5Id($characterPose5Id)
    {
        $this->characterPose5Id = $characterPose5Id;
        return $this;
    }

    /**
     * Get characterPose5Id
     *
     * @return object_id $characterPose5Id
     */
    public function getCharacterPose5Id()
    {
        return $this->characterPose5Id;
    }

    /**
     * Set characterPose6Id
     *
     * @param object_id $characterPose6Id
     * @return self
     */
    public function setCharacterPose6Id($characterPose6Id)
    {
        $this->characterPose6Id = $characterPose6Id;
        return $this;
    }

    /**
     * Get characterPose6Id
     *
     * @return object_id $characterPose6Id
     */
    public function getCharacterPose6Id()
    {
        return $this->characterPose6Id;
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
