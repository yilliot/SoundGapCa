<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 * @MongoDB\UniqueIndex(keys={"fromPointId"="asc", "toPointId"="asc"})
 */
class PointPath
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ObjectId
     * @MongoDB\Index 
     */
    protected $fromPointId;

    /**
     * @MongoDB\ObjectId
     */
    protected $toPointId;

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
     * Set fromPointId
     *
     * @param object_id $fromPointId
     * @return self
     */
    public function setFromPointId($fromPointId)
    {
        $this->fromPointId = $fromPointId;
        return $this;
    }

    /**
     * Get fromPointId
     *
     * @return object_id $fromPointId
     */
    public function getFromPointId()
    {
        return $this->fromPointId;
    }

    /**
     * Set toPointId
     *
     * @param object_id $toPointId
     * @return self
     */
    public function setToPointId($toPointId)
    {
        $this->toPointId = $toPointId;
        return $this;
    }

    /**
     * Get toPointId
     *
     * @return object_id $toPointId
     */
    public function getToPointId()
    {
        return $this->toPointId;
    }
}
