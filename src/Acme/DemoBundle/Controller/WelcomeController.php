<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SoundGap\ContentAdminBundle\Document\PointQuest;
use SoundGap\ContentAdminBundle\Document\Appetizer;

class WelcomeController extends Controller
{
    public function indexAction()
    {
        $point = new PointQuest();
        $point->setQuests(array(
            'a','b','c'
        ));

        $dm = $this->get('doctrine_mongodb')->getManager();
        $dm->persist($point);
        $dm->flush();

        exit($point->getId());

        /*
         * The action's view can be rendered using render() method
         * or @Template annotation as demonstrated in DemoController.
         *
         */
        return $this->render('AcmeDemoBundle:Welcome:index.html.twig');
    }
}
