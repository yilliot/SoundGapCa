<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SoundGap\ContentAdminBundle\Form\Type\AddPointType;
use SoundGap\ContentAdminBundle\Form\Type\AddPointContentType;
use SoundGap\ContentAdminBundle\Form\Type\AddPointQuestType;
use SoundGap\ContentAdminBundle\Document\Point;
use SoundGap\ContentAdminBundle\Document\PointContent;
use SoundGap\ContentAdminBundle\Document\PointQuest;
use SoundGap\ContentAdminBundle\Document\PointPath;

class MainController extends Controller
{

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
                $grade = $dm->getRepository('SoundGapContentAdminBundle:Grade')->find($data->getGrade()->getId());
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

    public function pointContentAction($pointId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $point = $dm->getRepository('SoundGapContentAdminBundle:Point')->find($pointId);
        return $this->pointContentSubfunction(
            $point,
            new PointContent(),
            'create'
        );
    }

    public function pointContentUpdateAction($pointContentId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pointContent = $dm->getRepository('SoundGapContentAdminBundle:PointContent')->find($pointContentId);
        return $this->pointContentSubfunction(
            $pointContent->getPoint(),
            $pointContent,
            'update'
        );
    }

    private function pointContentSubfunction($point, $pointContent, $actionName)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $form = $this->createForm(new AddPointContentType(), $pointContent);

        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $data = $form->getData();
                if ($actionName === 'create') {
                    $lastPointContent = $dm->createQueryBuilder('SoundGapContentAdminBundle:PointContent')
                        ->sort('pageNumber','desc')->limit(1)->getQuery()->getSingleResult();
                    $lastPageNumber = 0;
                    if ($lastPointContent)
                        $lastPageNumber = $lastPointContent->getPageNumber();
                    $data->setPageNumber($lastPageNumber+1);
                    $data->setPoint($point);
                }

                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice',$actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }

        return $this->render('SoundGapContentAdminBundle:Main:pointContent.html.twig',array(
            'form' => $form->createView(),
            'point' => $point,
            'contents' => $dm->createQueryBuilder('SoundGapContentAdminBundle:PointContent')->sort('pageNumber','asc')->getQuery()->execute(),
            'pageName' => 'point content',
            'actionName' => $actionName,
        ));
    }

    public function pointQuestAction($pointId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pointQuest = $dm->getRepository('SoundGapContentAdminBundle:PointQuest')->findOneBy(array(
            'point.id'=>$pointId
        ));
        $point = $pointQuest->getPoint();

        $form = $this->createForm(new AddPointQuestType(), $pointQuest);

        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bind($this->getRequest());
            if ($form->isValid()) {

                $data = $form->getData();

                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice','updated');
                return $this->redirect($this->getRequest()->getUri());
            }
        }

        return $this->render('SoundGapContentAdminBundle:Main:pointQuest.html.twig',array(
            'form' => $form->createView(),
            'pointQuest' => $pointQuest,
            'contents' => $pointQuest->getQuests(),
            'quests' => $dm->getRepository('SoundGapContentAdminBundle:Quest')->findAll(),
            'pageName' => 'point quest',
            'actionName' => 'update',
        ));
    }

    public function pointQuestAddAction($pointQuestId, $questId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pointQuest = $dm->getRepository('SoundGapContentAdminBundle:PointQuest')->find($pointQuestId);
        $quest = $dm->getRepository('SoundGapContentAdminBundle:Quest')->find($questId);
        $pointQuest->addQuest($quest);
        $dm->persist($pointQuest);
        $dm->flush();
        $this->getRequest()->getSession()->getFlashBag()->add('notice','added');
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    public function pointQuestRemoveAction($pointQuestId, $questId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pointQuest = $dm->getRepository('SoundGapContentAdminBundle:PointQuest')->find($pointQuestId);
        $quest = $dm->getRepository('SoundGapContentAdminBundle:Quest')->find($questId);
        $pointQuest->removeQuest($quest);
        $dm->persist($pointQuest);
        $dm->flush();
        $this->getRequest()->getSession()->getFlashBag()->add('notice','removed');
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    public function pointPathAction($gradeId, $fromId, $toId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $fromPoint = $dm->getRepository('SoundGapContentAdminBundle:Point')->find($fromId);

        // link
        if ($toId) {
            $toPoint = $dm->getRepository('SoundGapContentAdminBundle:Point')->find($toId);
            $pointPath = new PointPath();
            $pointPath->setFromPoint($fromPoint);
            $pointPath->setToPoint($toPoint);
            $dm->persist($pointPath);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice','added to point');
            return $this->redirect($this->getRequest()->headers->get('referer'));
        }

        // choose to
        $toPoints = array();
        if ($fromId) {
            $fromPointLinks = $dm->createQueryBuilder('SoundGapContentAdminBundle:PointPath')
                ->field('fromPoint.id')->equals($fromId)
                ->getQuery()->execute();
            foreach ($fromPointLinks as $fromPointLink) {
                $toPoints[] = $fromPointLink->getToPoint();
            }
        }

        // choose from
        if ($gradeId) {
            $points = $dm->getRepository('SoundGapContentAdminBundle:Point')->findBy(array('grade.id'=>$gradeId));
        } else {
            $points = $dm->getRepository('SoundGapContentAdminBundle:Point')->findAll();
        }

        return $this->render('SoundGapContentAdminBundle:Main:pointPath.html.twig',array(
            'categories' => $dm->getRepository('SoundGapContentAdminBundle:Category')->findAll(),
            'grades' => $dm->getRepository('SoundGapContentAdminBundle:Grade')->findAll(),
            'points' => $points,
            'pageName' => 'point path',
            'fromPoint' => $fromPoint,
            'toPoints' => $toPoints,
        ));
    }

    public function pointPathRemoveAction($fromId, $toId)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $pointPath = $dm->createQueryBuilder('SoundGapContentAdminBundle:PointPath')
            ->remove()
            ->field('fromPoint.id')->equals($fromId)
            ->field('toPoint.id')->equals($toId)
            ->getQuery()
            ->execute();

        $this->getRequest()->getSession()->getFlashBag()->add('notice', 'removed');
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}
