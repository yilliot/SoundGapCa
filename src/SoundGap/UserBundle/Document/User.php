<?php

namespace SoundGap\UserBundle\Document;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Bundle\MongoDBBundle\Validator\Constraints\Unique;

/**
 * @MongoDB\Document
 * @Unique("email")
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @Assert\NotBlank(message = "You need email address for password recovery")
     * @Assert\Email(message = "You need email address for password recovery")
     * @Assert\Length(min = "10", minMessage = "We need a longer password")
     * @MongoDB\String
     * @MongoDB\Index
     * @MongoDB\UniqueIndex
     */
    protected $email;

    /**
     * @Assert\NotBlank(message = "We need a password")
     * @Assert\Length(min = "6", minMessage = "We need a longer password")
     */
    protected $plainPassword;

    /**
     * @MongoDB\Hash
     */
    protected $customModules;

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
     * Set email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set customModules
     *
     * @param hash $customModules
     * @return self
     */
    public function setCustomModules($customModules)
    {
        $this->customModules = $customModules;
        return $this;
    }

    /**
     * Get customModules
     *
     * @return hash $customModules
     */
    public function getCustomModules()
    {
        return $this->customModules;
    }
}
