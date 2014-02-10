<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 * @MongoDBUnique(fields="name")
 */
class Category
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
     * @MongoDB\Hash
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
