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
    protected $isForExam;

    /**
     * @MongoDB\String
     */
    protected $questCaption;

    /**
     * @MongoDB\Hash
     */
    protected $questImage;

    /**
     * @MongoDB\Hash
     */
    protected $questAudio;

    /**
     * @MongoDB\Hash
     */
    protected $option1Image;

    /**
     * @MongoDB\Hash
     */
    protected $option2Image;

    /**
     * @MongoDB\Hash
     */
    protected $option3Image;

    /**
     * @MongoDB\Hash
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
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set isForExam
     *
     * @param boolean $isForExam
     * @return self
     */
    public function setIsForExam($isForExam)
    {
        $this->isForExam = $isForExam;
        return $this;
    }

    /**
     * Get isForExam
     *
     * @return boolean $isForExam
     */
    public function getIsForExam()
    {
        return $this->isForExam;
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
     * Set questImage
     *
     * @param hash $questImage
     * @return self
     */
    public function setQuestImage($questImage)
    {
        $this->questImage = array(
            'webPath' => $questImage->getWebPath(),
            'name' => $questImage->getName(),
            'id' => $questImage->getId()
        );
        return $this;
    }

    /**
     * Get questImage
     *
     * @return hash $questImage
     */
    public function getQuestImage()
    {
        return $this->questImage;
    }

    /**
     * Set questAudio
     *
     * @param hash $questAudio
     * @return self
     */
    public function setQuestAudio($questAudio)
    {
        $this->questAudio = array(
            'webPath' => $questAudio->getWebPath(),
            'name' => $questAudio->getName(),
            'id' => $questAudio->getId()
        );
        return $this;
    }

    /**
     * Get questAudio
     *
     * @return hash $questAudio
     */
    public function getQuestAudio()
    {
        return $this->questAudio;
    }

    /**
     * Set option1Image
     *
     * @param hash $option1Image
     * @return self
     */
    public function setOption1Image($option1Image)
    {
        $this->option1Image = array(
            'webPath' => $option1Image->getWebPath(),
            'name' => $option1Image->getName(),
            'id' => $option1Image->getId()
        );
        return $this;
    }

    /**
     * Get option1Image
     *
     * @return hash $option1Image
     */
    public function getOption1Image()
    {
        return $this->option1Image;
    }

    /**
     * Set option2Image
     *
     * @param hash $option2Image
     * @return self
     */
    public function setOption2Image($option2Image)
    {
        $this->option2Image = array(
            'webPath' => $option2Image->getWebPath(),
            'name' => $option2Image->getName(),
            'id' => $option2Image->getId()
        );
        return $this;
    }

    /**
     * Get option2Image
     *
     * @return hash $option2Image
     */
    public function getOption2Image()
    {
        return $this->option2Image;
    }

    /**
     * Set option3Image
     *
     * @param hash $option3Image
     * @return self
     */
    public function setOption3Image($option3Image)
    {
        $this->option3Image = array(
            'webPath' => $option3Image->getWebPath(),
            'name' => $option3Image->getName(),
            'id' => $option3Image->getId()
        );
        return $this;
    }

    /**
     * Get option3Image
     *
     * @return hash $option3Image
     */
    public function getOption3Image()
    {
        return $this->option3Image;
    }

    /**
     * Set option4Image
     *
     * @param hash $option4Image
     * @return self
     */
    public function setOption4Image($option4Image)
    {
        $this->option4Image = array(
            'webPath' => $option4Image->getWebPath(),
            'name' => $option4Image->getName(),
            'id' => $option4Image->getId()
        );
        return $this;
    }

    /**
     * Get option4Image
     *
     * @return hash $option4Image
     */
    public function getOption4Image()
    {
        return $this->option4Image;
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
}
