<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 * @MongoDB\UniqueIndex(keys={"fromStation"="asc", "toStation"="asc"})
 */
class StationPath
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Station")
     * @MongoDB\Index 
     */
    protected $fromStation;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Station")
     * @MongoDB\Index 
     */
    protected $toStation;

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
     * Set fromStationId
     *
     * @param SoundGap\ContentAdminBundle\Document\Station $fromStationId
     * @return self
     */
    public function setFromStation(\SoundGap\ContentAdminBundle\Document\Station $fromStation)
    {
        $this->fromStation = $fromStation;
        return $this;
    }

    /**
     * Get fromStation
     *
     * @return SoundGap\ContentAdminBundle\Document\Station $fromStation
     */
    public function getFromStation()
    {
        return $this->fromStation;
    }

    /**
     * Set toStation
     *
     * @param SoundGap\ContentAdminBundle\Document\Station $toStation
     * @return self
     */
    public function setToStation(\SoundGap\ContentAdminBundle\Document\Station $toStation)
    {
        $this->toStation = $toStation;
        return $this;
    }

    /**
     * Get toStation
     *
     * @return SoundGap\ContentAdminBundle\Document\Station $toStation
     */
    public function getToStation()
    {
        return $this->toStation;
    }
}
