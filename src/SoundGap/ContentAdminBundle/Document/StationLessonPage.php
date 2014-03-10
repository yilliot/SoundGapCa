<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class StationLessonPage
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="StationLessonPageType")
     */
    protected $type;

    /**
     * @MongoDB\Int
     */
    protected $position;

    /**
     * @MongoDB\String
     */
    protected $caption;

    /**
     * @MongoDB\String
     */
    protected $title;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundMusic;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundAmbient;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $triggerAudio;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $triggerVideo;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose1;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose2;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose3;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose4;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose5;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $characterPose6;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter1Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter2Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter3Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter4Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter5Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter6Speech;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Station")
     * @MongoDB\Index 
     */
    protected $station;

    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    public function __toString()
    {
        return $this->position.':'.$this->caption;
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
     * Set caption
     *
     * @param string $caption
     * @return self
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * Get caption
     *
     * @return string $caption
     */
    public function getCaption()
    {
        return $this->caption;
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
     * Set backgroundImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundImage
     * @return self
     */
    public function setBackgroundImage(\SoundGap\ContentAdminBundle\Document\Asset $backgroundImage)
    {
        $this->backgroundImage = $backgroundImage;
        return $this;
    }

    /**
     * Get backgroundImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundImage
     */
    public function getBackgroundImage()
    {
        return $this->backgroundImage;
    }

    /**
     * Set backgroundMusic
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundMusic
     * @return self
     */
    public function setBackgroundMusic(\SoundGap\ContentAdminBundle\Document\Asset $backgroundMusic)
    {
        $this->backgroundMusic = $backgroundMusic;
        return $this;
    }

    /**
     * Get backgroundMusic
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundMusic
     */
    public function getBackgroundMusic()
    {
        return $this->backgroundMusic;
    }

    /**
     * Set backgroundAmbient
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundAmbient
     * @return self
     */
    public function setBackgroundAmbient(\SoundGap\ContentAdminBundle\Document\Asset $backgroundAmbient)
    {
        $this->backgroundAmbient = $backgroundAmbient;
        return $this;
    }

    /**
     * Get backgroundAmbient
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundAmbient
     */
    public function getBackgroundAmbient()
    {
        return $this->backgroundAmbient;
    }

    /**
     * Set triggerAudio
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $triggerAudio
     * @return self
     */
    public function setTriggerAudio(\SoundGap\ContentAdminBundle\Document\Asset $triggerAudio)
    {
        $this->triggerAudio = $triggerAudio;
        return $this;
    }

    /**
     * Get triggerAudio
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $triggerAudio
     */
    public function getTriggerAudio()
    {
        return $this->triggerAudio;
    }

    /**
     * Set triggerVideo
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $triggerVideo
     * @return self
     */
    public function setTriggerVideo(\SoundGap\ContentAdminBundle\Document\Asset $triggerVideo)
    {
        $this->triggerVideo = $triggerVideo;
        return $this;
    }

    /**
     * Get triggerVideo
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $triggerVideo
     */
    public function getTriggerVideo()
    {
        return $this->triggerVideo;
    }

    /**
     * Set characterPose1
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose1
     * @return self
     */
    public function setCharacterPose1(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose1)
    {
        $this->characterPose1 = $characterPose1;
        return $this;
    }

    /**
     * Get characterPose1
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose1
     */
    public function getCharacterPose1()
    {
        return $this->characterPose1;
    }

    /**
     * Set characterPose2
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose2
     * @return self
     */
    public function setCharacterPose2(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose2)
    {
        $this->characterPose2 = $characterPose2;
        return $this;
    }

    /**
     * Get characterPose2
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose2
     */
    public function getCharacterPose2()
    {
        return $this->characterPose2;
    }

    /**
     * Set characterPose3
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose3
     * @return self
     */
    public function setCharacterPose3(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose3)
    {
        $this->characterPose3 = $characterPose3;
        return $this;
    }

    /**
     * Get characterPose3
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose3
     */
    public function getCharacterPose3()
    {
        return $this->characterPose3;
    }

    /**
     * Set characterPose4
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose4
     * @return self
     */
    public function setCharacterPose4(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose4)
    {
        $this->characterPose4 = $characterPose4;
        return $this;
    }

    /**
     * Get characterPose4
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose4
     */
    public function getCharacterPose4()
    {
        return $this->characterPose4;
    }

    /**
     * Set characterPose5
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose5
     * @return self
     */
    public function setCharacterPose5(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose5)
    {
        $this->characterPose5 = $characterPose5;
        return $this;
    }

    /**
     * Get characterPose5
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose5
     */
    public function getCharacterPose5()
    {
        return $this->characterPose5;
    }

    /**
     * Set characterPose6
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose6
     * @return self
     */
    public function setCharacterPose6(\SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose6)
    {
        $this->characterPose6 = $characterPose6;
        return $this;
    }

    /**
     * Get characterPose6
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $characterPose6
     */
    public function getCharacterPose6()
    {
        return $this->characterPose6;
    }

    /**
     * Set isCharacter1Speech
     *
     * @param boolean $isCharacter1Speech
     * @return self
     */
    public function setIsCharacter1Speech($isCharacter1Speech)
    {
        $this->isCharacter1Speech = $isCharacter1Speech;
        return $this;
    }

    /**
     * Get isCharacter1Speech
     *
     * @return boolean $isCharacter1Speech
     */
    public function getIsCharacter1Speech()
    {
        return $this->isCharacter1Speech;
    }

    /**
     * Set isCharacter2Speech
     *
     * @param boolean $isCharacter2Speech
     * @return self
     */
    public function setIsCharacter2Speech($isCharacter2Speech)
    {
        $this->isCharacter2Speech = $isCharacter2Speech;
        return $this;
    }

    /**
     * Get isCharacter2Speech
     *
     * @return boolean $isCharacter2Speech
     */
    public function getIsCharacter2Speech()
    {
        return $this->isCharacter2Speech;
    }

    /**
     * Set isCharacter3Speech
     *
     * @param boolean $isCharacter3Speech
     * @return self
     */
    public function setIsCharacter3Speech($isCharacter3Speech)
    {
        $this->isCharacter3Speech = $isCharacter3Speech;
        return $this;
    }

    /**
     * Get isCharacter3Speech
     *
     * @return boolean $isCharacter3Speech
     */
    public function getIsCharacter3Speech()
    {
        return $this->isCharacter3Speech;
    }

    /**
     * Set isCharacter4Speech
     *
     * @param boolean $isCharacter4Speech
     * @return self
     */
    public function setIsCharacter4Speech($isCharacter4Speech)
    {
        $this->isCharacter4Speech = $isCharacter4Speech;
        return $this;
    }

    /**
     * Get isCharacter4Speech
     *
     * @return boolean $isCharacter4Speech
     */
    public function getIsCharacter4Speech()
    {
        return $this->isCharacter4Speech;
    }

    /**
     * Set isCharacter5Speech
     *
     * @param boolean $isCharacter5Speech
     * @return self
     */
    public function setIsCharacter5Speech($isCharacter5Speech)
    {
        $this->isCharacter5Speech = $isCharacter5Speech;
        return $this;
    }

    /**
     * Get isCharacter5Speech
     *
     * @return boolean $isCharacter5Speech
     */
    public function getIsCharacter5Speech()
    {
        return $this->isCharacter5Speech;
    }

    /**
     * Set isCharacter6Speech
     *
     * @param boolean $isCharacter6Speech
     * @return self
     */
    public function setIsCharacter6Speech($isCharacter6Speech)
    {
        $this->isCharacter6Speech = $isCharacter6Speech;
        return $this;
    }

    /**
     * Get isCharacter6Speech
     *
     * @return boolean $isCharacter6Speech
     */
    public function getIsCharacter6Speech()
    {
        return $this->isCharacter6Speech;
    }

    /**
     * Set station
     *
     * @param SoundGap\ContentAdminBundle\Document\Station $station
     * @return self
     */
    public function setStation(\SoundGap\ContentAdminBundle\Document\Station $station)
    {
        $this->station = $station;
        return $this;
    }

    /**
     * Get station
     *
     * @return SoundGap\ContentAdminBundle\Document\Station $station
     */
    public function getStation()
    {
        return $this->station;
    }

    /**
     * Set type
     *
     * @param SoundGap\ContentAdminBundle\Document\StationLessonPageType $type
     * @return self
     */
    public function setType(\SoundGap\ContentAdminBundle\Document\StationLessonPageType $type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * Get type
     *
     * @return SoundGap\ContentAdminBundle\Document\StationLessonPageType $type
     */
    public function getType()
    {
        return $this->type;
    }
}
