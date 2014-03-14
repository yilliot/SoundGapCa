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
    protected $foregroundImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundMusicLoop;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundAmbientLoop;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundAmbient;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $triggerAudioConversation;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $character1;

    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $character2;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter1Speech;

    /**
     * @MongoDB\Boolean
     */
    protected $isCharacter2Speech;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Station")
     * @MongoDB\Index 
     */
    protected $station;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Quest")
     */
    protected $quest;

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

    public function toKVArray()
    {
        return array(
            'id' => $this->id,
            'type' => $this->type->getId(),
            'position' => $this->position,
            'caption' => $this->caption,
            'title' => $this->title,
            'backgroundImage' => ($this->backgroundImage)?$this->backgroundImage->getFilename():null,
            'foregroundImage' => ($this->foregroundImage)?$this->foregroundImage->getFilename():null,
            'backgroundMusicLoop' => ($this->backgroundMusicLoop)?$this->backgroundMusicLoop->getFilename():null,
            'backgroundAmbientLoop' => ($this->backgroundAmbientLoop)?$this->backgroundAmbientLoop->getFilename():null,
            'backgroundAmbient' => ($this->backgroundAmbient)?$this->backgroundAmbient->getFilename():null,
            'triggerAudioConversation' => ($this->triggerAudioConversation)?$this->triggerAudioConversation->getFilename():null,
            'character1' => ($this->character1)?$this->character1->getImage->getFilename():null,
            'character2' => ($this->character2)?$this->character2->getImage->getFilename():null,
            'isCharacter1Speech' => $this->isCharacter1Speech,
            'isCharacter2Speech' => $this->isCharacter2Speech,
            // 'station' => $this->station->getId(),
        );
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

    /**
     * Set foregroundImage
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $foregroundImage
     * @return self
     */
    public function setForegroundImage(\SoundGap\ContentAdminBundle\Document\Asset $foregroundImage)
    {
        $this->foregroundImage = $foregroundImage;
        return $this;
    }

    /**
     * Get foregroundImage
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $foregroundImage
     */
    public function getForegroundImage()
    {
        return $this->foregroundImage;
    }

    /**
     * Set character1
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $character1
     * @return self
     */
    public function setCharacter1(\SoundGap\ContentAdminBundle\Document\CharacterPose $character1)
    {
        $this->character1 = $character1;
        return $this;
    }

    /**
     * Get character1
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $character1
     */
    public function getCharacter1()
    {
        return $this->character1;
    }

    /**
     * Set character2
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $character2
     * @return self
     */
    public function setCharacter2(\SoundGap\ContentAdminBundle\Document\CharacterPose $character2)
    {
        $this->character2 = $character2;
        return $this;
    }

    /**
     * Get character2
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $character2
     */
    public function getCharacter2()
    {
        return $this->character2;
    }

    /**
     * Set backgroundMusicLoop
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundMusicLoop
     * @return self
     */
    public function setBackgroundMusicLoop(\SoundGap\ContentAdminBundle\Document\Asset $backgroundMusicLoop)
    {
        $this->backgroundMusicLoop = $backgroundMusicLoop;
        return $this;
    }

    /**
     * Get backgroundMusicLoop
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundMusicLoop
     */
    public function getBackgroundMusicLoop()
    {
        return $this->backgroundMusicLoop;
    }

    /**
     * Set backgroundAmbientLoop
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundAmbientLoop
     * @return self
     */
    public function setBackgroundAmbientLoop(\SoundGap\ContentAdminBundle\Document\Asset $backgroundAmbientLoop)
    {
        $this->backgroundAmbientLoop = $backgroundAmbientLoop;
        return $this;
    }

    /**
     * Get backgroundAmbientLoop
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundAmbientLoop
     */
    public function getBackgroundAmbientLoop()
    {
        return $this->backgroundAmbientLoop;
    }

    /**
     * Set triggerAudioConversation
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $triggerAudioConversation
     * @return self
     */
    public function setTriggerAudioConversation(\SoundGap\ContentAdminBundle\Document\Asset $triggerAudioConversation)
    {
        $this->triggerAudioConversation = $triggerAudioConversation;
        return $this;
    }

    /**
     * Get triggerAudioConversation
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $triggerAudioConversation
     */
    public function getTriggerAudioConversation()
    {
        return $this->triggerAudioConversation;
    }

    /**
     * Set quest
     *
     * @param SoundGap\ContentAdminBundle\Document\Quest $quest
     * @return self
     */
    public function setQuest(\SoundGap\ContentAdminBundle\Document\Quest $quest)
    {
        $this->quest = $quest;
        return $this;
    }

    /**
     * Get quest
     *
     * @return SoundGap\ContentAdminBundle\Document\Quest $quest
     */
    public function getQuest()
    {
        return $this->quest;
    }
}
