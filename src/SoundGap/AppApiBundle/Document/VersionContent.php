<?php

namespace SoundGap\AppApiBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class VersionContent
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\Hash
     */
    protected $content;

    /**
     * @MongoDB\Hash
     */
    protected $media;

    /**
     * @MongoDB\Int
     */
    protected $contentSize;

    /**
     * @MongoDB\Int
     */
    protected $mediaSize;


    public function totalSize()
    {
        return $this->mediaSize+$this->contentSize;
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
     * Set content
     *
     * @param hash $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return hash $content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set media
     *
     * @param hash $media
     * @return self
     */
    public function setMedia($media)
    {
        $this->media = $media;
        return $this;
    }

    /**
     * Get media
     *
     * @return hash $media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set contentSize
     *
     * @param int $contentSize
     * @return self
     */
    public function setContentSize($contentSize)
    {
        $this->contentSize = $contentSize;
        return $this;
    }

    /**
     * Get contentSize
     *
     * @return int $contentSize
     */
    public function getContentSize()
    {
        return $this->contentSize;
    }

    /**
     * Set mediaSize
     *
     * @param int $mediaSize
     * @return self
     */
    public function setMediaSize($mediaSize)
    {
        $this->mediaSize = $mediaSize;
        return $this;
    }

    /**
     * Get mediaSize
     *
     * @return int $mediaSize
     */
    public function getMediaSize()
    {
        return $this->mediaSize;
    }
}
