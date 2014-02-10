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
     * @MongoDB\String
     * @MongoDB\Index
     */
    protected $character;

    /**
     * @MongoDB\String
     * @MongoDB\Index
     */
    protected $pose;

    /**
     * @MongoDB\Hash
     */
    protected $image;

    public function __toString()
    {
        return $this->character.':'.$this->pose;
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
     * @param string $character
     * @return self
     */
    public function setCharacter($character)
    {
        $this->character = $character->getName();
        return $this;
    }

    /**
     * Get character
     *
     * @return string $character
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Set pose
     *
     * @param string $pose
     * @return self
     */
    public function setPose($pose)
    {
        $this->pose = $pose->getName();
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
     * Set image
     *
     * @param hash $image
     * @return self
     */
    public function setImage($image)
    {
        $this->image = array(
            'webPath' => $image->getWebPath(),
            'name' => $image->getName(),
            'id' => $image->getId()
        );
        return $this;
    }

    /**
     * Get image
     *
     * @return hash $image
     */
    public function getImage()
    {
        return $this->image;
    }
}
