<?php

namespace SoundGap\ContentAdminBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Emoticon
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\String
     * @MongoDB\Index
     */
    protected $code;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Asset")
     */
    protected $icon;

    /**
     * @MongoDB\Boolean
     */
    protected $isDeleted;

    public function __toString()
    {
        return $this->code;
    }

    public function toKVArray()
    {
        return array(
            'code' => $this->code,
            'icon' => $this->icon->getFilename(),
            // 'isDeleted' => $this->isDeleted,
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
     * Set code
     *
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * Get code
     *
     * @return string $code
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set icon
     *
     * @param SoundGap\ContentAdminBundle\Document\Asset $icon
     * @return self
     */
    public function setIcon(\SoundGap\ContentAdminBundle\Document\Asset $icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * Get icon
     *
     * @return SoundGap\ContentAdminBundle\Document\Asset $icon
     */
    public function getIcon()
    {
        return $this->icon;
    }
}
