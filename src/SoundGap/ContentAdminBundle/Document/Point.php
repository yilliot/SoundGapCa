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
     * @MongoDB\ObjectId
     * @MongoDB\Index
     */
    protected $gradeId;

    /**
     * @MongoDB\String
     */
    protected $type;

    /**
     * @MongoDB\Hash
     */
    protected $appetizer;

    /**
     * @MongoDB\Hash
     */
    protected $image;

    /**
     * @MongoDB\Hash
     */
    protected $imageCenterCoordinate;
    protected $imageCenterCoordinateX;
    protected $imageCenterCoordinateY;

    /**
     * @MongoDB\Hash
     */
    protected $categoryInfo;

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
     * Set gradeId
     *
     * @param object_id $gradeId
     * @return self
     */
    public function setGradeId($gradeId)
    {
        $this->gradeId = $gradeId;
        return $this;
    }

    /**
     * Get gradeId
     *
     * @return object_id $gradeId
     */
    public function getGradeId()
    {
        return $this->gradeId;
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
     * Set appetizer
     *
     * @param hash $appetizer
     * @return self
     */
    public function setAppetizer($appetizer)
    {
        $this->appetizer = array(
            'id'=>$appetizer->getId(),
            'name'=>$appetizer->getName(),
            'image'=>$appetizer->getImage(),
        );
        return $this;
    }

    /**
     * Get appetizer
     *
     * @return hash $appetizer
     */
    public function getAppetizer()
    {
        return $this->appetizer;
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
            'id' => $image->getId(),
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
     * Set categoryInfo
     *
     * @param hash $categoryInfo
     * @return self
     */
    public function setCategoryInfo($categoryInfo)
    {
        $this->categoryInfo = $categoryInfo;
        return $this;
    }

    /**
     * Get categoryInfo
     *
     * @return hash $categoryInfo
     */
    public function getCategoryInfo()
    {
        return $this->categoryInfo;
    }
}
