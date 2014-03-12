<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoundGap\ContentAdminBundle\Form\Type\AddCategoryType;
use SoundGap\ContentAdminBundle\Form\Type\AddGradeType;

use SoundGap\ContentAdminBundle\Document\Category;
use SoundGap\ContentAdminBundle\Document\Grade;

use SoundGap\ContentAdminBundle\Constants\SessionConstants;



class GroundController extends Controller
{
    public function categoryAction($id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $category = $dm->getRepository('SoundGapContentAdminBundle:Category')->find($id);
        $form = $this->createForm(new AddCategoryType($schoolAppId), $category);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($schoolAppId);
                $data->setSchoolApp($schoolApp);
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Ground:category.html.twig',array(
            'form' => $form->createView(),
            'categories' => $dm->createQueryBuilder('SoundGapContentAdminBundle:Category')
                ->field('isDeleted')->notEqual(true)
                ->field('schoolApp.id')->equals($schoolAppId)
                ->getQuery()->execute(),
            'pageName' => 'category',
            'actionName' => $actionName,
        ));
    }
    public function categoryDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $result = $dm->createQueryBuilder('SoundGapContentAdminBundle:Category')->find('id');
        if ($result) {
            $result->softDelete();
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$result->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgapca_ground_category'));
    }

    public function gradeAction($categoryId, $id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $grade = $dm->getRepository('SoundGapContentAdminBundle:Grade')->find($id);
        $category = $dm->getRepository('SoundGapContentAdminBundle:Category')->find($categoryId);
        $form = $this->createForm(new AddGradeType($schoolAppId), $grade);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $data->setCategory($category);
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice', $actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Ground:grade.html.twig',array(
            'form' => $form->createView(),
            'category' => $category,
            'grades' => $dm->createQueryBuilder('SoundGapContentAdminBundle:Grade')
                ->field('category.id')->equals($categoryId)
                ->field('isDeleted')->notEqual(true)
                ->sort('position')
                ->getQuery()->execute(),
            'pageName' => 'grade',
            'actionName' => $actionName,
        ));
    }

    public function gradeDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $result = $dm->getRepository('SoundGapContentAdminBundle:Grade')->find($id);
        if ($result) {
            $categoryId = $result->getCategory()->getId();
            $result->softDelete();
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$result}' deleted");
            return $this->redirect($this->generateUrl('soundgapca_ground_grade',array('categoryId'=>$categoryId)));
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
            return $this->redirect($this->generateUrl('soundgapca_ground_category'));
        }
        return $this->redirect($this->generateUrl('soundgapca_ground_grade'));
    }
}
