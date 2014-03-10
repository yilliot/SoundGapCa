<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 * @MongoDBUnique(fields="name")
 */
class AppPackage
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
     * @MongoDB\ReferenceOne(targetDocument="App")
     * @MongoDB\Index
     */
    protected $app;



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
     * Set app
     *
     * @param SoundGap\ContentAdminBundle\Document\App $app
     * @return self
     */
    public function setApp(\SoundGap\ContentAdminBundle\Document\App $app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * Get app
     *
     * @return SoundGap\ContentAdminBundle\Document\App $app
     */
    public function getApp()
    {
        return $this->app;
    }
}
