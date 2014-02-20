<?php

namespace SoundGap\AppApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $name = $this->getRequest()->request->get('name');
        $data = $this->getRequest()->request->all();
        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }
}
