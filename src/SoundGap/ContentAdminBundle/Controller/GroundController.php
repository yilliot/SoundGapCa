<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoundGap\ContentAdminBundle\Form\Type\AddTagType;
use SoundGap\ContentAdminBundle\Form\Type\AddCategoryType;
use SoundGap\ContentAdminBundle\Form\Type\AddCharacterType;
use SoundGap\ContentAdminBundle\Form\Type\AddGradeType;

use SoundGap\ContentAdminBundle\Document\Category;
use SoundGap\ContentAdminBundle\Document\Grade;
use SoundGap\ContentAdminBundle\Document\Character;
use SoundGap\ContentAdminBundle\Document\Tag;

class GroundController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Ground:index.html.twig');
    }

    public function categoryAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $category = $dm->getRepository('SoundGapContentAdminBundle:Category')->find($id);
        $form = $this->createForm(new AddCategoryType(), $category);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Ground:category.html.twig',array(
            'form' => $form->createView(),
            'categories' => $dm->getRepository('SoundGapContentAdminBundle:Category')->findAll(),
            'pageName' => 'category',
            'actionName' => $actionName,
        ));
    }

    public function gradeAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $grade = $dm->getRepository('SoundGapContentAdminBundle:Grade')->find($id);
        $form = $this->createForm(new AddGradeType(), $grade);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Ground:grade.html.twig',array(
            'form' => $form->createView(),
            'grades' => $dm->getRepository('SoundGapContentAdminBundle:Grade')->createQueryBuilder()->sort('position')->getQuery()->execute(),
            'pageName' => 'grade',
            'actionName' => $actionName,
        ));
    }


    public function poseAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pose = $dm->getRepository('SoundGapContentAdminBundle:Pose')->find($id);
        $form = $this->createForm(new AddPoseType(), $pose);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Ground:pose.html.twig',array(
            'form' => $form->createView(),
            'poses' => $dm->getRepository('SoundGapContentAdminBundle:Pose')->findAll(),
            'pageName' => 'pose',
            'actionName' => $actionName,
        ));
    }

    public function poseDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $result = $dm->createQueryBuilder('SoundGapContentAdminBundle:Pose')
            ->findAndremove()
            ->field('id')->equals($id)
            ->getQuery()
            ->execute();
        if ($result) {
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$result->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgap_ca_ground_pose'));
    }


    public function gradeDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $result = $dm->createQueryBuilder('SoundGapContentAdminBundle:Grade')
            ->findAndremove()
            ->field('id')->equals($id)
            ->getQuery()
            ->execute();
        if ($result) {
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$result->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgap_ca_ground_grade'));
    }
    public function categoryDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $result = $dm->createQueryBuilder('SoundGapContentAdminBundle:Category')
            ->findAndremove()
            ->field('id')->equals($id)
            ->getQuery()
            ->execute();
        if ($result) {
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$result->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgap_ca_ground_category'));
    }
}
