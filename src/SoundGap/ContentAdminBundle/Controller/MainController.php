<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SoundGap\ContentAdminBundle\Form\Type\AddPointType;
use SoundGap\ContentAdminBundle\Form\Type\AddPointContentType;
use SoundGap\ContentAdminBundle\Form\Type\AddPointQuestType;
use SoundGap\ContentAdminBundle\Document\Point;
use SoundGap\ContentAdminBundle\Document\PointContent;
use SoundGap\ContentAdminBundle\Document\PointQuest;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Main:index.html.twig');
    }

    public function pointAction($id = null)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $point = $dm->getRepository('SoundGapContentAdminBundle:Point')->find($id);

        $form = $this->createForm(new AddPointType(), $point);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();

                # get grade info
                $grade = $dm->getRepository('SoundGapContentAdminBundle:Grade')->find($data->getGradeId()->getId());
                $data->setCategoryInfo(array(
                    'category' => $grade->getCategory(), 
                    'grade' => $grade->getName(),
                ));
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice','Added');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Main:point.html.twig',array(
            'form' => $form->createView(),
            'points' => $dm->getRepository('SoundGapContentAdminBundle:Point')->findAll(),
            'pageName' => 'point',
            'actionName' => $id ? 'update' : 'create',
        ));
    }

    public function pointPathAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $form = $this->createForm(new AddPointType(), new Point());
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice','Added');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Main:pointPath.html.twig',array(
            'form' => $form->createView(),
            'points' => $dm->getRepository('SoundGapContentAdminBundle:Point')->findAll(),
            'pageName' => 'point',
        ));
    }

    public function pointContentAction($pointId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $point = $dm->getRepository('SoundGapContentAdminBundle:Point')->find($pointId);

        $form = $this->createForm(new AddPointContentType(), new PointContent());
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $lastPointContent = $dm->createQueryBuilder('SoundGapContentAdminBundle:PointContent')
                    ->sort('pageNumber','desc')->limit(1)->getQuery()->getSingleResult();
                $lastPageNumber = 0;
                if ($lastPointContent)
                    $lastPageNumber = $lastPointContent->getPageNumber();

                $data = $form->getData();
                $data->setPointId($pointId);
                $data->setPageNumber($lastPageNumber+1);
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice','Added');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Main:pointContent.html.twig',array(
            'form' => $form->createView(),
            'point' => $point,
            'pointContents' => $dm->createQueryBuilder('SoundGapContentAdminBundle:PointContent')->sort('pageNumber','asc')->getQuery()->execute(),
            'pageName' => 'point content',
        ));
    }

    public function pointContentUpdateAction($pointContentId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pointContent = $dm->getRepository('SoundGapContentAdminBundle:PointContent')->find($pointContentId);
        $point = $dm->getRepository('SoundGapContentAdminBundle:Point')->find($pointContent->getPointId());

        // $pointContent->setBackgroundImageId('52f5fcf30d9826033c000001');
        $form = $this->createForm(new AddPointContentType(), $pointContent);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice','Added');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Main:pointContent.html.twig',array(
            'form' => $form->createView(),
            'point' => $point,
            'pointContents' => $dm->createQueryBuilder('SoundGapContentAdminBundle:PointContent')->sort('pageNumber','asc')->getQuery()->execute(),
            'pageName' => 'point content',
        ));
    }

    public function pointQuestAction($pointId)
    {
        return $this->render('SoundGapContentAdminBundle:Main:pointQuest.html.twig');
    }
}
