<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Default:index.html.twig');
    }

    public function wwwAction()
    {
        return $this->redirect('http://www.soundgap.com', 301);
    }
}
