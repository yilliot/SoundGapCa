<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 * @MongoDBUnique(fields="name")
 */
class Character
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
}
