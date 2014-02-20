<?php

namespace SoundGap\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SoundGapUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
