<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document(repositoryClass="SoundGap\ContentAdminBundle\Repository\PointRepository")
 */
class Point
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
     * @MongoDB\ReferenceOne(targetDocument="Grade")
     * @MongoDB\Index
     */
    protected $grade;

    /**
     * @MongoDB\String
     */
    protected $type;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Appetizer")
     */
    protected $appetizer;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $image;

    /**
     * @MongoDB\Hash
     */
    protected $imageCenterCoordinate;
    protected $imageCenterCoordinateX;
    protected $imageCenterCoordinateY;

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
     * Set type
     *
     * @param string $type
     * @return self
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set imageCenterCoordinate
     *
     * @param hash $imageCenterCoordinate
     * @return self
     */
    public function setImageCenterCoordinate($imageCenterCoordinate)
    {
        $this->imageCenterCoordinate = $imageCenterCoordinate;
        return $this;
    }
    public function setImageCenterCoordinateX($imageCenterCoordinateX)
    {
        $this->imageCenterCoordinate['x'] = $imageCenterCoordinateX;
        return $this;
    }
    public function setImageCenterCoordinateY($imageCenterCoordinateY)
    {
        $this->imageCenterCoordinate['y'] = $imageCenterCoordinateY;
        return $this;
    }
    public function getImageCenterCoordinateX()
    {
        if (isset($this->imageCenterCoordinate['x'])) {
            return $this->imageCenterCoordinate['x'];
        }
        return null;
    }
    public function getImageCenterCoordinateY()
    {
        if (isset($this->imageCenterCoordinate['y'])) {
            return $this->imageCenterCoordinate['y'];
        }
        return null;
    }

    /**
     * Get imageCenterCoordinate
     *
     * @return hash $imageCenterCoordinate
     */
    public function getImageCenterCoordinate()
    {
        return $this->imageCenterCoordinate;
    }

    /**
     * Set grade
     *
     * @param SoundGap\ContentAdminBundle\Document\Grade $grade
     * @return self
     */
    public function setGrade(\SoundGap\ContentAdminBundle\Document\Grade $grade)
    {
        $this->grade = $grade;
        return $this;
    }

    /**
     * Get grade
     *
     * @return SoundGap\ContentAdminBundle\Document\Grade $grade
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set appetizer
     *
     * @param SoundGap\ContentAdminBundle\Document\Appetizer $appetizer
     * @return self
     */
    public function setAppetizer(\SoundGap\ContentAdminBundle\Document\Appetizer $appetizer)
    {
        $this->appetizer = $appetizer;
        return $this;
    }

    /**
     * Get appetizer
     *
     * @return SoundGap\ContentAdminBundle\Document\Appetizer $appetizer
     */
    public function getAppetizer()
    {
        return $this->appetizer;
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
