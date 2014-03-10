<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SoundGap\ContentAdminBundle\Form\Type\AddCharacterPoseType;
use SoundGap\ContentAdminBundle\Form\Type\AddQuestType;

use SoundGap\ContentAdminBundle\Document\CharacterPose;
use SoundGap\ContentAdminBundle\Document\Quest;

class PartsController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Parts:index.html.twig');
    }

    public function questAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $quest = $dm->getRepository('SoundGapContentAdminBundle:Quest')->find($id);
        $form = $this->createForm(new AddQuestType(), $quest);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice',$actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Parts:quest.html.twig',array(
            'form' => $form->createView(),
            'quests' => $dm->getRepository('SoundGapContentAdminBundle:Quest')->findAll(),
            'pageName' => 'quest',
            'actionName' => $actionName,
        ));
    }

    public function questDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $quest = $dm->getRepository('SoundGapContentAdminBundle:Quest')->find($id);
        if ($quest) {
            $dm->remove($quest);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$quest->getQuestCaption()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}
