<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SoundGap\ContentAdminBundle\Form\Type\AddCharacterPoseType;
use SoundGap\ContentAdminBundle\Form\Type\AddAppetizerType;
use SoundGap\ContentAdminBundle\Form\Type\AddQuestType;

use SoundGap\ContentAdminBundle\Document\CharacterPose;
use SoundGap\ContentAdminBundle\Document\Appetizer;
use SoundGap\ContentAdminBundle\Document\Quest;

class PartsController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Parts:index.html.twig');
    }
    public function appetizerAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $appetizer = $dm->getRepository('SoundGapContentAdminBundle:Appetizer')->find($id);
        $form = $this->createForm(new AddAppetizerType(), $appetizer);
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
        return $this->render('SoundGapContentAdminBundle:Parts:appetizer.html.twig',array(
            'form' => $form->createView(),
            'appetizers' => $dm->getRepository('SoundGapContentAdminBundle:Appetizer')->findAll(),
            'pageName' => 'appetizer',
            'actionName' => $actionName,
        ));
    }
    public function characterPoseAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $characterPose = $dm->getRepository('SoundGapContentAdminBundle:CharacterPose')->find($id);
        $form = $this->createForm(new AddCharacterPoseType(), $characterPose);
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
        return $this->render('SoundGapContentAdminBundle:Parts:characterPose.html.twig',array(
            'form' => $form->createView(),
            'characterPoses' => $dm->getRepository('SoundGapContentAdminBundle:CharacterPose')->findAll(),
            'pageName' => 'characterPose',
            'actionName' => $actionName,
        ));
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
    public function appetizerDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $appetizer = $dm->getRepository('SoundGapContentAdminBundle:Appetizer')->find($id);
        if ($appetizer) {
            $dm->remove($appetizer);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$appetizer->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
    public function characterPoseDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $characterPose = $dm->getRepository('SoundGapContentAdminBundle:CharacterPose')->find($id);
        if ($characterPose) {
            $dm->remove($characterPose);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$characterPose->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
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
