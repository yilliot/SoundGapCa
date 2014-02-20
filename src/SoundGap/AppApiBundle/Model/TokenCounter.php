<?php

namespace SoundGap\AppApiBundle\Model;
use SoundGap\UserBundle\Document\UserAccessToken;

class TokenCounter
{
    public function __construct($dm)
    {
        $this->dm = $dm->getManager();
    }

    public function generateUserAccessToken($user)
    {
        $userAccessToken = new UserAccessToken();
        $userAccessToken->setUser($user);
        $userAccessToken->setExpiry(strtotime('next year'));
        $this->dm->persist($userAccessToken);
        $this->dm->flush();
        return $userAccessToken->getId();
    }

    public function getUser($token)
    {
        $token = $this->dm->getRepository('SoundGapUserBundle:UserAccessToken')->find($token);
        return $token->getUser();
    }
}