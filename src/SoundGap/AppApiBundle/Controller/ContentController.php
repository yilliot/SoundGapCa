<?php

namespace SoundGap\AppApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class ContentController extends Controller
{
    public function writeContentAction($userId = null)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        # ground
        $appetizer = $dm->getRepository('SoundGapContentAdminBundle:Appetizer')->findAll();
        $category = $dm->getRepository('SoundGapContentAdminBundle:Category')->findAll();
        $character = $dm->getRepository('SoundGapContentAdminBundle:Character')->findAll();
        $data = array(
        );
        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }
}
