<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 * @MongoDB\UniqueIndex(keys={"fromPoint"="asc", "toPoint"="asc"})
 */
class PointPath
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Point")
     * @MongoDB\Index 
     */
    protected $fromPoint;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Point")
     * @MongoDB\Index 
     */
    protected $toPoint;

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
     * @param SoundGap\ContentAdminBundle\Document\Point $fromPointId
     * @return self
     */
    public function setFromPoint(\SoundGap\ContentAdminBundle\Document\Point $fromPoint)
    {
        $this->fromPoint = $fromPoint;
        return $this;
    }

    /**
     * Get fromPoint
     *
     * @return SoundGap\ContentAdminBundle\Document\Point $fromPoint
     */
    public function getFromPoint()
    {
        return $this->fromPoint;
    }

    /**
     * Set toPoint
     *
     * @param SoundGap\ContentAdminBundle\Document\Point $toPoint
     * @return self
     */
    public function setToPoint(\SoundGap\ContentAdminBundle\Document\Point $toPoint)
    {
        $this->toPoint = $toPoint;
        return $this;
    }

    /**
     * Get toPoint
     *
     * @return SoundGap\ContentAdminBundle\Document\Point $toPoint
     */
    public function getToPoint()
    {
        return $this->toPoint;
    }
}
