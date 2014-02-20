<?php

namespace SoundGap\UserBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class UserAccessToken
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="User")
     * @MongoDB\Index
     */
    protected $user;

    /**
     * @MongoDB\Date
     */
    protected $expiry;

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
     * Set user
     *
     * @param SoundGap\UserBundle\Document\User $user
     * @return self
     */
    public function setUser(\SoundGap\UserBundle\Document\User $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Get user
     *
     * @return SoundGap\UserBundle\Document\User $user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set expiry
     *
     * @param date $expiry
     * @return self
     */
    public function setExpiry($expiry)
    {
        $this->expiry = $expiry;
        return $this;
    }

    /**
     * Get expiry
     *
     * @return date $expiry
     */
    public function getExpiry()
    {
        return $this->expiry;
    }
}
