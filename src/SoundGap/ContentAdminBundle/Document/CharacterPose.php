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

    public function __toString()
    {
        return $this->character->getName().':'.$this->pose->getName();
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
     * Set pose
     *
     * @param SoundGap\ContentAdminBundle\Document\Pose $pose
     * @return self
     */
    public function setPose(\SoundGap\ContentAdminBundle\Document\Pose $pose)
    {
        $this->pose = $pose;
        return $this;
    }

    /**
     * Get pose
     *
     * @return SoundGap\ContentAdminBundle\Document\Pose $pose
     */
    public function getPose()
    {
        return $this->pose;
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
}
