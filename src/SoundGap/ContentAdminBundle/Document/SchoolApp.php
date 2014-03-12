<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique as MongoDBUnique;

/**
 * @MongoDB\Document
 */
class SchoolApp
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundImage;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundImageGameOver;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $backgroundMusic;


    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $questCharacterAlert;
    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $questCharacterWaiting;
    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $questCharacterSleepy;
    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $questCharacterCorrect;
    /**
     * @MongoDB\ReferenceOne(targetDocument="CharacterPose")
     */
    protected $questCharacterWrong;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $questAudioCorrectFirstTime;
    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $questAudioCorrectFollowing;
    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $questAudioWrong;

    /**
     * @MongoDB\ReferenceOne(targetDocument="School")
     * @MongoDB\Index
     */
    protected $school;
    /**
     * @MongoDB\ReferenceOne(targetDocument="App")
     * @MongoDB\Index
     */
    protected $app;

    public function __toString()
    {
        return $this->school->getName().':'.$this->app->getName();
    }

    public function toKVArray()
    {
        return array(
            'id' => $this->id,
            'backgroundImage' => ($this->backgroundImage)?$this->backgroundImage->getFilename():null,
            'backgroundImageGameOver' => ($this->backgroundImageGameOver)?$this->backgroundImageGameOver->getFilename():null,
            'backgroundMusic' => ($this->backgroundMusic)?$this->backgroundMusic->getFilename():null,
            'questCharacterAlert' => ($this->questCharacterAlert)?$this->questCharacterAlert->getImage()->getFilename():null,
            'questCharacterWaiting' => ($this->questCharacterWaiting)?$this->questCharacterWaiting->getImage()->getFilename():null,
            'questCharacterSleepy' => ($this->questCharacterSleepy)?$this->questCharacterSleepy->getImage()->getFilename():null,
            'questCharacterCorrect' => ($this->questCharacterCorrect)?$this->questCharacterCorrect->getImage()->getFilename():null,
            'questCharacterWrong' => ($this->questCharacterWrong)?$this->questCharacterWrong->getImage()->getFilename():null,
            'questAudioCorrectFirstTime' => ($this->questAudioCorrectFirstTime)?$this->questAudioCorrectFirstTime->getFilename():null,
            'questAudioCorrectFollowing' => ($this->questAudioCorrectFollowing)?$this->questAudioCorrectFollowing->getFilename():null,
            'questAudioWrong' => ($this->questAudioWrong)?$this->questAudioWrong->getFilename():null,
            // 'school' => $this->school->getId(),
            // 'app' => $this->app->getId(),
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

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
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
     * Set backgroundImageGameOver
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $backgroundImageGameOver
     * @return self
     */
    public function setBackgroundImageGameOver(\SoundGap\ContentAdminBundle\Document\Asset $backgroundImageGameOver)
    {
        $this->backgroundImageGameOver = $backgroundImageGameOver;
        return $this;
    }

    /**
     * Get backgroundImageGameOver
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $backgroundImageGameOver
     */
    public function getBackgroundImageGameOver()
    {
        return $this->backgroundImageGameOver;
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
     * Set school
     *
     * @param SoundGap\ContentAdminBundle\Document\School $school
     * @return self
     */
    public function setSchool(\SoundGap\ContentAdminBundle\Document\School $school)
    {
        $this->school = $school;
        return $this;
    }

    /**
     * Get school
     *
     * @return SoundGap\ContentAdminBundle\Document\School $school
     */
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Set app
     *
     * @param SoundGap\ContentAdminBundle\Document\App $app
     * @return self
     */
    public function setApp(\SoundGap\ContentAdminBundle\Document\App $app)
    {
        $this->app = $app;
        return $this;
    }

    /**
     * Get app
     *
     * @return SoundGap\ContentAdminBundle\Document\App $app
     */
    public function getApp()
    {
        return $this->app;
    }

    /**
     * Set questCharacterAlert
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterAlert
     * @return self
     */
    public function setQuestCharacterAlert(\SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterAlert)
    {
        $this->questCharacterAlert = $questCharacterAlert;
        return $this;
    }

    /**
     * Get questCharacterAlert
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterAlert
     */
    public function getQuestCharacterAlert()
    {
        return $this->questCharacterAlert;
    }

    /**
     * Set questCharacterWaiting
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterWaiting
     * @return self
     */
    public function setQuestCharacterWaiting(\SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterWaiting)
    {
        $this->questCharacterWaiting = $questCharacterWaiting;
        return $this;
    }

    /**
     * Get questCharacterWaiting
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterWaiting
     */
    public function getQuestCharacterWaiting()
    {
        return $this->questCharacterWaiting;
    }

    /**
     * Set questCharacterSleepy
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterSleepy
     * @return self
     */
    public function setQuestCharacterSleepy(\SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterSleepy)
    {
        $this->questCharacterSleepy = $questCharacterSleepy;
        return $this;
    }

    /**
     * Get questCharacterSleepy
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterSleepy
     */
    public function getQuestCharacterSleepy()
    {
        return $this->questCharacterSleepy;
    }

    /**
     * Set questCharacterCorrect
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterCorrect
     * @return self
     */
    public function setQuestCharacterCorrect(\SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterCorrect)
    {
        $this->questCharacterCorrect = $questCharacterCorrect;
        return $this;
    }

    /**
     * Get questCharacterCorrect
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterCorrect
     */
    public function getQuestCharacterCorrect()
    {
        return $this->questCharacterCorrect;
    }

    /**
     * Set questCharacterWrong
     *
     * @param SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterWrong
     * @return self
     */
    public function setQuestCharacterWrong(\SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterWrong)
    {
        $this->questCharacterWrong = $questCharacterWrong;
        return $this;
    }

    /**
     * Get questCharacterWrong
     *
     * @return SoundGap\ContentAdminBundle\Document\CharacterPose $questCharacterWrong
     */
    public function getQuestCharacterWrong()
    {
        return $this->questCharacterWrong;
    }

    /**
     * Set questAudioCorrectFirstTime
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $questAudioCorrectFirstTime
     * @return self
     */
    public function setQuestAudioCorrectFirstTime(\SoundGap\ContentAdminBundle\Document\Asset $questAudioCorrectFirstTime)
    {
        $this->questAudioCorrectFirstTime = $questAudioCorrectFirstTime;
        return $this;
    }

    /**
     * Get questAudioCorrectFirstTime
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $questAudioCorrectFirstTime
     */
    public function getQuestAudioCorrectFirstTime()
    {
        return $this->questAudioCorrectFirstTime;
    }

    /**
     * Set questAudioCorrectFollowing
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $questAudioCorrectFollowing
     * @return self
     */
    public function setQuestAudioCorrectFollowing(\SoundGap\ContentAdminBundle\Document\Asset $questAudioCorrectFollowing)
    {
        $this->questAudioCorrectFollowing = $questAudioCorrectFollowing;
        return $this;
    }

    /**
     * Get questAudioCorrectFollowing
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $questAudioCorrectFollowing
     */
    public function getQuestAudioCorrectFollowing()
    {
        return $this->questAudioCorrectFollowing;
    }

    /**
     * Set questAudioWrong
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $questAudioWrong
     * @return self
     */
    public function setQuestAudioWrong(\SoundGap\ContentAdminBundle\Document\Asset $questAudioWrong)
    {
        $this->questAudioWrong = $questAudioWrong;
        return $this;
    }

    /**
     * Get questAudioWrong
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $questAudioWrong
     */
    public function getQuestAudioWrong()
    {
        return $this->questAudioWrong;
    }
}
