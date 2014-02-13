<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

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
     * @MongoDB\Boolean
     */
    protected $isForChallenge;

    /**
     * @MongoDB\String
     */
    protected $questCaption;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $questImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $questAudio;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $option1Image;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $option2Image;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
     */
    protected $option3Image;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Media")
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

    public function __toString()
    {
        return $this->questCaption.' : ['.$this->option1Caption.']';
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
     * Set isForChallenge
     *
     * @param boolean $isForChallenge
     * @return self
     */
    public function setIsForChallenge($isForChallenge)
    {
        $this->isForChallenge = $isForChallenge;
        return $this;
    }

    /**
     * Get isForChallenge
     *
     * @return boolean $isForChallenge
     */
    public function getIsForChallenge()
    {
        return $this->isForChallenge;
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
     * @param SoundGap\ContentAdminBundle\Document\Media $questImage
     * @return self
     */
    public function setQuestImage(\SoundGap\ContentAdminBundle\Document\Media $questImage)
    {
        $this->questImage = $questImage;
        return $this;
    }

    /**
     * Get questImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $questImage
     */
    public function getQuestImage()
    {
        return $this->questImage;
    }

    /**
     * Set questAudio
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $questAudio
     * @return self
     */
    public function setQuestAudio(\SoundGap\ContentAdminBundle\Document\Media $questAudio)
    {
        $this->questAudio = $questAudio;
        return $this;
    }

    /**
     * Get questAudio
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $questAudio
     */
    public function getQuestAudio()
    {
        return $this->questAudio;
    }

    /**
     * Set option1Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $option1Image
     * @return self
     */
    public function setOption1Image(\SoundGap\ContentAdminBundle\Document\Media $option1Image)
    {
        $this->option1Image = $option1Image;
        return $this;
    }

    /**
     * Get option1Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $option1Image
     */
    public function getOption1Image()
    {
        return $this->option1Image;
    }

    /**
     * Set option2Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $option2Image
     * @return self
     */
    public function setOption2Image(\SoundGap\ContentAdminBundle\Document\Media $option2Image)
    {
        $this->option2Image = $option2Image;
        return $this;
    }

    /**
     * Get option2Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $option2Image
     */
    public function getOption2Image()
    {
        return $this->option2Image;
    }

    /**
     * Set option3Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $option3Image
     * @return self
     */
    public function setOption3Image(\SoundGap\ContentAdminBundle\Document\Media $option3Image)
    {
        $this->option3Image = $option3Image;
        return $this;
    }

    /**
     * Get option3Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $option3Image
     */
    public function getOption3Image()
    {
        return $this->option3Image;
    }

    /**
     * Set option4Image
     *
     * @param SoundGap\ContentAdminBundle\Document\Media $option4Image
     * @return self
     */
    public function setOption4Image(\SoundGap\ContentAdminBundle\Document\Media $option4Image)
    {
        $this->option4Image = $option4Image;
        return $this;
    }

    /**
     * Get option4Image
     *
     * @return SoundGap\ContentAdminBundle\Document\Media $option4Image
     */
    public function getOption4Image()
    {
        return $this->option4Image;
    }
}
