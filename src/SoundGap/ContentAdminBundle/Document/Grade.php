<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document
 */
class Grade
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Category")
     * @MongoDB\Index
     * @Assert\NotBlank()
     */
    protected $category;

    /**
     * @MongoDB\String
     * @MongoDB\Index
     * @Assert\NotBlank()
     */
    protected $package;

    /**
     * @MongoDB\String
     * @Assert\NotBlank()
     */
    protected $name;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $image;

    /**
     * @MongoDB\Int
     * @MongoDB\Index
     * @Assert\NotBlank()
     */
    protected $position;

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

    public function __toString()
    {
        return $this->category.'['.$this->name.']';
    }

    /**
     * Set position
     *
     * @param int $position
     * @return self
     */
    public function setPosition($position)
    {
        $this->position = $position;
        return $this;
    }

    /**
     * Get position
     *
     * @return int $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set category
     *
     * @param Category $category
     * @return self
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * Get category
     *
     * @return Category $category
     */
    public function getCategory()
    {
        return $this->category;
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
