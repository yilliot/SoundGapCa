<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @MongoDB\Document
 * @MongoDB\HasLifecycleCallbacks
 */
class Asset
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     * @MongoDB\Index
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $path;

    /**
     * @MongoDB\ReferenceOne(targetDocument="AssetType")
     * @MongoDB\Index
     */
    protected $assetType;

    /**
     * @MongoDB\String
     */
    protected $mimeType;

    /**
     * @MongoDB\Date
     * @MongoDB\Index
     */
    protected $createdAt;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $attachment;
    private $temp;

    /**
     * @MongoDB\Boolean
     */
    protected $isDeleted;

    /**
     * @MongoDB\ReferenceOne(targetDocument="SchoolApp")
     * @MongoDB\Index
     */
    protected $schoolApp;

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @MongoDB\PrePersist()
     * @MongoDB\PreUpdate()
     */
    public function preUpload()
    {
        $this->path = 'second';
        if (null !== $this->getAttachment()) {
            $this->path = $this->getAttachment()->guessExtension();
        }
    }

    /**
     * @MongoDB\PostPersist()
     * @MongoDB\PostUpdate()
     */
    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getAttachment()) {
            return;
        }

        // check if we have an old image
        if (isset($this->temp)) {
            // delete the old image
            unlink($this->temp);
            // clear the temp image path
            $this->temp = null;
        }

        // you must throw an exception here if the file cannot be moved
        // so that the entity is not persisted to the database
        // which the UploadedFile move() method does
        $this->getAttachment()->move(
            $this->getUploadRootDir(),
            $this->id.'.'.$this->path
        );

        $this->file = null;
    }

    /**
     * @MongoDB\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->temp = $this->getAbsolutePath();
    }

    /**
     * @MongoDB\PostRemove()
     */
    public function removeUpload()
    {
        if ($this->temp) {
            unlink($this->temp);
        }
    }

    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->id.'.'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->id.'.'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/asset';
    }

    /**
     * Sets attachment.
     *
     * @param UploadedFile $attachment
     */
    public function setAttachment(UploadedFile $attachment = null)
    {
        $this->attachment = $attachment;
        // check if we have an old image path
        if (is_file($this->getAbsolutePath())) {
            // store the old name to delete after the update
            $this->temp = $this->getAbsolutePath();
        } else {
            $this->path = 'initial';
        }
    }

    /**
     * Get attachment.
     *
     * @return UploadedFile
     */
    public function getAttachment()
    {
        return $this->attachment;
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
     * Set mimeType
     *
     * @param string $mimeType
     * @return self
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string $mimeType
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set createdAt
     *
     * @param date $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return date $createdAt
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return self
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Get path
     *
     * @return string $path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set assetType
     *
     * @param SoundGap\ContentAdminBundle\Document\AssetType $assetType
     * @return self
     */
    public function setAssetType(\SoundGap\ContentAdminBundle\Document\AssetType $assetType)
    {
        $this->assetType = $assetType;
        return $this;
    }

    /**
     * Get assetType
     *
     * @return SoundGap\ContentAdminBundle\Document\AssetType $assetType
     */
    public function getAssetType()
    {
        return $this->assetType;
    }

    /**
     * Set isDeleted
     *
     * @return self
     */
    public function softDelete()
    {
        $this->isDeleted = true;
        return $this;
    }

    /**
     * Get isDeleted
     *
     * @return boolean $isDeleted
     */
    public function getIsDeleted()
    {
        return $this->isDeleted;
    }

    /**
     * Set isDeleted
     *
     * @param boolean $isDeleted
     * @return self
     */
    public function setIsDeleted($isDeleted)
    {
        $this->isDeleted = $isDeleted;
        return $this;
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
}
