<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class CharacterPose
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Character")
     * @MongoDB\Index
     */
    protected $character;

    /**
     * @MongoDB\String
     * @MongoDB\Index
     */
    protected $pose;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $image;

    /**
     * @MongoDB\Boolean
     */
    protected $isDeleted;

    /**
     * @MongoDB\ReferenceOne(targetDocument="SchoolApp")
     * @MongoDB\Index
     */
    protected $schoolApp;


    public function __toString()
    {
        return $this->character->getName().':'.$this->pose;
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
     * Set character
     *
     * @param SoundGap\ContentAdminBundle\Document\Character $character
     * @return self
     */
    public function setCharacter(\SoundGap\ContentAdminBundle\Document\Character $character)
    {
        $this->character = $character;
        return $this;
    }

    /**
     * Get character
     *
     * @return SoundGap\ContentAdminBundle\Document\Character $character
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Set image
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $image
     * @return self
     */
    public function setImage(\SoundGap\ContentAdminBundle\Document\Asset $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set pose
     *
     * @param string $pose
     * @return self
     */
    public function setPose($pose)
    {
        $this->pose = $pose;
        return $this;
    }

    /**
     * Get pose
     *
     * @return string $pose
     */
    public function getPose()
    {
        return $this->pose;
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
