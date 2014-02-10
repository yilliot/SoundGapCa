<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class PointQuest
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ObjectId
     * @MongoDB\Index 
     */
    protected $pointId;

    /**
     * @MongoDB\Int
     */
    protected $numberToPass;

    /**
     * @MongoDB\Int
     */
    protected $numberOfQuest;

    /**
     * @MongoDB\Collection
     */
    protected $quests;

    /**
     * @MongoDB\ObjectId
     */
    protected $backgroundImageId;


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
     * Set pointId
     *
     * @param object_id $pointId
     * @return self
     */
    public function setPointId($pointId)
    {
        $this->pointId = $pointId;
        return $this;
    }

    /**
     * Get pointId
     *
     * @return object_id $pointId
     */
    public function getPointId()
    {
        return $this->pointId;
    }

    /**
     * Set numberToPass
     *
     * @param int $numberToPass
     * @return self
     */
    public function setNumberToPass($numberToPass)
    {
        $this->numberToPass = $numberToPass;
        return $this;
    }

    /**
     * Get numberToPass
     *
     * @return int $numberToPass
     */
    public function getNumberToPass()
    {
        return $this->numberToPass;
    }

    /**
     * Set numberOfQuest
     *
     * @param int $numberOfQuest
     * @return self
     */
    public function setNumberOfQuest($numberOfQuest)
    {
        $this->numberOfQuest = $numberOfQuest;
        return $this;
    }

    /**
     * Get numberOfQuest
     *
     * @return int $numberOfQuest
     */
    public function getNumberOfQuest()
    {
        return $this->numberOfQuest;
    }

    /**
     * Set backgroundImageId
     *
     * @param object_id $backgroundImageId
     * @return self
     */
    public function setBackgroundImageId($backgroundImageId)
    {
        $this->backgroundImageId = $backgroundImageId;
        return $this;
    }

    /**
     * Get backgroundImageId
     *
     * @return object_id $backgroundImageId
     */
    public function getBackgroundImageId()
    {
        return $this->backgroundImageId;
    }


    /**
     * Set quests
     *
     * @param collection $quests
     * @return self
     */
    public function setQuests($quests)
    {
        $this->quests = $quests;
        return $this;
    }

    /**
     * Get quests
     *
     * @return collection $quests
     */
    public function getQuests()
    {
        return $this->quests;
    }
}
