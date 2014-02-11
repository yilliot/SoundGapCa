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
     * @MongoDB\ReferenceOne(targetDocument="Point")
     * @MongoDB\Index 
     */
    protected $point;

    /**
     * @MongoDB\Int
     */
    protected $numberToPass;

    /**
     * @MongoDB\Int
     */
    protected $numberOfQuest;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Quest")
     * @MongoDB\Index 
     */
    protected $quests;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $backgroundImage;

    public function __construct()
    {
        $this->quests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set point
     *
     * @param SoundGap\ContentAdminBundle\Document\Point $point
     * @return self
     */
    public function setPoint(\SoundGap\ContentAdminBundle\Document\Point $point)
    {
        $this->point = $point;
        return $this;
    }

    /**
     * Get point
     *
     * @return SoundGap\ContentAdminBundle\Document\Point $point
     */
    public function getPoint()
    {
        return $this->point;
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
     * Add quest
     *
     * @param SoundGap\ContentAdminBundle\Document\Quest $quest
     */
    public function addQuest(\SoundGap\ContentAdminBundle\Document\Quest $quest)
    {
        $this->quests[] = $quest;
    }

    /**
     * Remove quest
     *
     * @param SoundGap\ContentAdminBundle\Document\Quest $quest
     */
    public function removeQuest(\SoundGap\ContentAdminBundle\Document\Quest $quest)
    {
        $this->quests->removeElement($quest);
    }

    /**
     * Get quests
     *
     * @return Doctrine\Common\Collections\Collection $quests
     */
    public function getQuests()
    {
        return $this->quests;
    }

    /**
     * Set backgroundImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $backgroundImage
     * @return self
     */
    public function setBackgroundImage(\SoundGap\ContentAdminBundle\Document\Media $backgroundImage)
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
    }

    /**
     * Get backgroundImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $backgroundImage
     */
    public function getBackgroundImage()
    {
        return $this->backgroundImage;
    }
}
