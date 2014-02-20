<?php

namespace SoundGap\AppApiBundle\Model;

use Symfony\Component\HttpFoundation\JsonResponse;

/**
* ContentVersionGenerator
*/
class ContentVersionGenerator
{
    function __construct()
    {
        $documents = array('keys' => array(
            'Appetizer',
            'Category',
            'Character',
            'CharacterPose',
            'Grade',
            'Media',
            'Point',
            'PointContent',
            'PointPath',
            'PointQuest',
            'Pose',
            'Quest',
            'Tag',
        ) );
    }
}