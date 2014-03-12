<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 * @MongoDBUnique(fields="name")
 */
class School
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     * @MongoDB\UniqueIndex
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $logo;
    public function __toString()
    {
        return $this->name;
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

    public function setId($id)
    {
        $this->id = $id;
        return $this;
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
     * Set logo
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $logo
     * @return self
     */
    public function setLogo(\SoundGap\ContentAdminBundle\Document\Asset $logo)
    {
        $this->logo = $logo;
        return $this;
    }

    /**
     * Get logo
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $logo
     */
    public function getLogo()
    {
        return $this->logo;
    }
}
