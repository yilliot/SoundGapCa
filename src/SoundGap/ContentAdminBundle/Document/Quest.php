<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @MongoDB\Document
 */
class Quest
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Int
     * @Assert\NotBlank()
     */
    protected $priority;

    /**
     * @MongoDB\String
     */
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $questCaption;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $questImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $questAudio;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $option1Image;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $option2Image;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $option3Image;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $option4Image;

    /**
     * @MongoDB\String
     */
    protected $option1Caption;

    /**
     * @MongoDB\String
     */
    protected $option2Caption;

    /**
     * @MongoDB\String
     */
    protected $option3Caption;

    /**
     * @MongoDB\String
     */
    protected $option4Caption;
    
    /**
     * @MongoDB\ReferenceOne(targetDocument="Grade")
     * @MongoDB\Index
     */
    protected $grade;

    /**
     * @MongoDB\ReferenceOne(targetDocument="SchoolApp")
     * @MongoDB\Index
     */
    protected $schoolApp;


    public function __toString()
    {
        return $this->questCaption.' : ['.$this->option1Caption.']';
    }

    public function toKVArray()
    {
        return array(
            'id' => $this->id,
            'priority' => $this->priority,
            'title' => $this->title,
            'questCaption' => $this->questCaption,
            'questImage' => ($this->questImage)?$this->questImage->getFilename():null,
            'questAudio' => ($this->questAudio)?$this->questAudio->getFilename():null,
            'option1Image' => ($this->option1Image)?$this->option1Image->getFilename():null,
            'option2Image' => ($this->option2Image)?$this->option2Image->getFilename():null,
            'option3Image' => ($this->option3Image)?$this->option3Image->getFilename():null,
            'option4Image' => ($this->option4Image)?$this->option4Image->getFilename():null,
            'option1Caption' => $this->option1Caption,
            'option2Caption' => $this->option2Caption,
            'option3Caption' => $this->option3Caption,
            'option4Caption' => $this->option4Caption,
            // 'grade' => $this->grade->getId(),
            // 'schoolApp' => $this->schoolApp->getId(),
        );
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
     * Set questCaption
     *
     * @param string $questCaption
     * @return self
     */
    public function setQuestCaption($questCaption)
    {
        $this->questCaption = $questCaption;
        return $this;
    }

    /**
     * Get questCaption
     *
     * @return string $questCaption
     */
    public function getQuestCaption()
    {
        return $this->questCaption;
    }

    /**
     * Set option1Caption
     *
     * @param string $option1Caption
     * @return self
     */
    public function setOption1Caption($option1Caption)
    {
        $this->option1Caption = $option1Caption;
        return $this;
    }

    /**
     * Get option1Caption
     *
     * @return string $option1Caption
     */
    public function getOption1Caption()
    {
        return $this->option1Caption;
    }

    /**
     * Set option2Caption
     *
     * @param string $option2Caption
     * @return self
     */
    public function setOption2Caption($option2Caption)
    {
        $this->option2Caption = $option2Caption;
        return $this;
    }

    /**
     * Get option2Caption
     *
     * @return string $option2Caption
     */
    public function getOption2Caption()
    {
        return $this->option2Caption;
    }

    /**
     * Set option3Caption
     *
     * @param string $option3Caption
     * @return self
     */
    public function setOption3Caption($option3Caption)
    {
        $this->option3Caption = $option3Caption;
        return $this;
    }

    /**
     * Get option3Caption
     *
     * @return string $option3Caption
     */
    public function getOption3Caption()
    {
        return $this->option3Caption;
    }

    /**
     * Set option4Caption
     *
     * @param string $option4Caption
     * @return self
     */
    public function setOption4Caption($option4Caption)
    {
        $this->option4Caption = $option4Caption;
        return $this;
    }

    /**
     * Get option4Caption
     *
     * @return string $option4Caption
     */
    public function getOption4Caption()
    {
        return $this->option4Caption;
    }

    /**
     * Set questImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $questImage
     * @return self
     */
    public function setQuestImage(\SoundGap\ContentAdminBundle\Document\Asset $questImage)
    {
        $this->questImage = $questImage;
        return $this;
    }

    /**
     * Get questImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $questImage
     */
    public function getQuestImage()
    {
        return $this->questImage;
    }

    /**
     * Set questAudio
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $questAudio
     * @return self
     */
    public function setQuestAudio(\SoundGap\ContentAdminBundle\Document\Asset $questAudio)
    {
        $this->questAudio = $questAudio;
        return $this;
    }

    /**
     * Get questAudio
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $questAudio
     */
    public function getQuestAudio()
    {
        return $this->questAudio;
    }

    /**
     * Set option1Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $option1Image
     * @return self
     */
    public function setOption1Image(\SoundGap\ContentAdminBundle\Document\Asset $option1Image)
    {
        $this->option1Image = $option1Image;
        return $this;
    }

    /**
     * Get option1Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $option1Image
     */
    public function getOption1Image()
    {
        return $this->option1Image;
    }

    /**
     * Set option2Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $option2Image
     * @return self
     */
    public function setOption2Image(\SoundGap\ContentAdminBundle\Document\Asset $option2Image)
    {
        $this->option2Image = $option2Image;
        return $this;
    }

    /**
     * Get option2Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $option2Image
     */
    public function getOption2Image()
    {
        return $this->option2Image;
    }

    /**
     * Set option3Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $option3Image
     * @return self
     */
    public function setOption3Image(\SoundGap\ContentAdminBundle\Document\Asset $option3Image)
    {
        $this->option3Image = $option3Image;
        return $this;
    }

    /**
     * Get option3Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $option3Image
     */
    public function getOption3Image()
    {
        return $this->option3Image;
    }

    /**
     * Set option4Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $option4Image
     * @return self
     */
    public function setOption4Image(\SoundGap\ContentAdminBundle\Document\Asset $option4Image)
    {
        $this->option4Image = $option4Image;
        return $this;
    }

    /**
     * Get option4Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $option4Image
     */
    public function getOption4Image()
    {
        return $this->option4Image;
    }

    /**
     * Set priority
     *
     * @param int $priority
     * @return self
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
        return $this;
    }

    /**
     * Get priority
     *
     * @return int $priority
     */
    public function getPriority()
    {
        return $this->priority;
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
     * Set schoolApp
     *
     * @param SoundGap\ContentAdminBundle\Document\SchoolApp $schoolApp
     * @return self
     */
    public function setSchoolApp(\SoundGap\ContentAdminBundle\Document\SchoolApp $schoolApp)
    {
        $this->schoolApp = $schoolApp;
        return $this;
    }

    /**
     * Get schoolApp
     *
     * @return SoundGap\ContentAdminBundle\Document\SchoolApp $schoolApp
     */
    public function getSchoolApp()
    {
        return $this->schoolApp;
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
}
