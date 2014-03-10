<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 */
class Station
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="StationType")
     */
    protected $type;

    /**
     * @MongoDB\String
     * @Assert\NotBlank()
     */
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $title2;

    /**
     * @MongoDB\String
     */
    protected $buttonTitle;

    /**
     * @MongoDB\String
     */
    protected $buttonTitle2;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $buttonImage;

    /**
     * @MongoDB\Int
     * @MongoDB\Index
     * @Assert\NotBlank()
     */
    protected $position;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $lessonAppetizer;

    /**
     * @MongoDB\String
     */
    protected $lessonObjective;

    /**
     * @MongoDB\Int
     */
    protected $examPassRatePercentage;

    /**
     * @MongoDB\Int
     */
    protected $examEmitCount;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Quest")
     * @MongoDB\Index 
     */
    protected $examQuests;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Grade")
     * @MongoDB\Index
     */
    protected $grade;

    public function __toString()
    {
        return $this->title;
    }
    public function __construct()
    {
        $this->examQuests = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title2
     *
     * @param string $title2
     * @return self
     */
    public function setTitle2($title2)
    {
        $this->title2 = $title2;
        return $this;
    }

    /**
     * Get title2
     *
     * @return string $title2
     */
    public function getTitle2()
    {
        return $this->title2;
    }

    /**
     * Set buttonTitle
     *
     * @param string $buttonTitle
     * @return self
     */
    public function setButtonTitle($buttonTitle)
    {
        $this->buttonTitle = $buttonTitle;
        return $this;
    }

    /**
     * Get buttonTitle
     *
     * @return string $buttonTitle
     */
    public function getButtonTitle()
    {
        return $this->buttonTitle;
    }

    /**
     * Set buttonTitle2
     *
     * @param string $buttonTitle2
     * @return self
     */
    public function setButtonTitle2($buttonTitle2)
    {
        $this->buttonTitle2 = $buttonTitle2;
        return $this;
    }

    /**
     * Get buttonTitle2
     *
     * @return string $buttonTitle2
     */
    public function getButtonTitle2()
    {
        return $this->buttonTitle2;
    }

    /**
     * Set buttonImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $buttonImage
     * @return self
     */
    public function setButtonImage(\SoundGap\ContentAdminBundle\Document\Asset $buttonImage)
    {
        $this->buttonImage = $buttonImage;
        return $this;
    }

    /**
     * Get buttonImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $buttonImage
     */
    public function getButtonImage()
    {
        return $this->buttonImage;
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
     * Set lessonAppetizer
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $lessonAppetizer
     * @return self
     */
    public function setLessonAppetizer(\SoundGap\ContentAdminBundle\Document\Asset $lessonAppetizer)
    {
        $this->lessonAppetizer = $lessonAppetizer;
        return $this;
    }

    /**
     * Get lessonAppetizer
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $lessonAppetizer
     */
    public function getLessonAppetizer()
    {
        return $this->lessonAppetizer;
    }

    /**
     * Set lessonObjective
     *
     * @param string $lessonObjective
     * @return self
     */
    public function setLessonObjective($lessonObjective)
    {
        $this->lessonObjective = $lessonObjective;
        return $this;
    }

    /**
     * Get lessonObjective
     *
     * @return string $lessonObjective
     */
    public function getLessonObjective()
    {
        return $this->lessonObjective;
    }

    /**
     * Set examPassRatePercentage
     *
     * @param int $examPassRatePercentage
     * @return self
     */
    public function setExamPassRatePercentage($examPassRatePercentage)
    {
        $this->examPassRatePercentage = $examPassRatePercentage;
        return $this;
    }

    /**
     * Get examPassRatePercentage
     *
     * @return int $examPassRatePercentage
     */
    public function getExamPassRatePercentage()
    {
        return $this->examPassRatePercentage;
    }

    /**
     * Set examEmitCount
     *
     * @param int $examEmitCount
     * @return self
     */
    public function setExamEmitCount($examEmitCount)
    {
        $this->examEmitCount = $examEmitCount;
        return $this;
    }

    /**
     * Get examEmitCount
     *
     * @return int $examEmitCount
     */
    public function getExamEmitCount()
    {
        return $this->examEmitCount;
    }

    /**
     * Add examQuest
     *
     * @param SoundGap\ContentAdminBundle\Document\Quest $examQuest
     */
    public function addExamQuest(\SoundGap\ContentAdminBundle\Document\Quest $examQuest)
    {
        $this->examQuests[] = $examQuest;
    }

    /**
     * Remove examQuest
     *
     * @param SoundGap\ContentAdminBundle\Document\Quest $examQuest
     */
    public function removeExamQuest(\SoundGap\ContentAdminBundle\Document\Quest $examQuest)
    {
        $this->examQuests->removeElement($examQuest);
    }

    /**
     * Get examQuests
     *
     * @return Doctrine\Common\Collections\Collection $examQuests
     */
    public function getExamQuests()
    {
        return $this->examQuests;
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
     * Set type
     *
     * @param SoundGap\ContentAdminBundle\Document\StationType $type
     * @return self
     */
    public function setType(\SoundGap\ContentAdminBundle\Document\StationType $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return SoundGap\ContentAdminBundle\Document\StationType $type
     */
    public function getType()
    {
        return $this->type;
    }
}
