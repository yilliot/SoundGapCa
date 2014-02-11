<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Appetizer
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $image;

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
     * Set image
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $image
     * @return self
     */
    public function setImage(\SoundGap\ContentAdminBundle\Document\Media $image)
    {
        $this->image = $image;
        return $this;
    }

    /**
     * Get image
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $image
     */
    public function getImage()
    {
        return $this->image;
    }
}
