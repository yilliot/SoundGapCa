<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoundGap\ContentAdminBundle\Form\Type\AddQuestType;
use SoundGap\ContentAdminBundle\Form\Type\AddStationType;
use SoundGap\ContentAdminBundle\Form\Type\AddStationLessonPageType;

use SoundGap\ContentAdminBundle\Document\Station;
use SoundGap\ContentAdminBundle\Document\StationLessonPage;
use SoundGap\ContentAdminBundle\Document\Quest;


use SoundGap\ContentAdminBundle\Constants\SessionConstants;


class StationController extends Controller
{
    public function indexAction($gradeId, $id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $dm = $this->get('doctrine_mongodb')->getManager();
        $station = $dm->getRepository('SoundGapContentAdminBundle:Station')->find($id);
        $grade = $dm->getRepository('SoundGapContentAdminBundle:Grade')->find($gradeId);
        $stations = $dm->createQueryBuilder('SoundGapContentAdminBundle:Station')
                ->field('grade.id')->equals($gradeId)
                ->field('isDeleted')->notEqual(true)
                ->sort('position')
                ->getQuery()->execute();

        $form = $this->createForm(new AddStationType($schoolAppId), $station);
        if ($this->getRequest()->getMethod() == 'POST') {

            ## modify post value
            $stationArray = $this->getRequest()->request->get('Station');
            if ($stationArray['position']=='') {
                $stationArray['position'] = $stations->count()+1;
                $this->getRequest()->request->set('Station', $stationArray);
            }
            $form->bind($this->getRequest());

            if ($form->isValid()) {
                $data = $form->getData();
                $data->setGrade($grade);
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice','Added');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Station:index.html.twig',array(
            'form' => $form->createView(),
            'grade' => $grade,
            'stations' => $dm->createQueryBuilder('SoundGapContentAdminBundle:Station')
                ->field('grade.id')->equals($gradeId)
                ->field('isDeleted')->notEqual(true)
                ->sort('position')
                ->getQuery()->execute(),
            'pageName' => 'station',
            'actionName' => $id ? 'update' : 'create',
        ));
    }

    public function lessonAction($stationId, $id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $dm = $this->get('doctrine_mongodb')->getManager();
        $station = $dm->getRepository('SoundGapContentAdminBundle:Station')->find($stationId);
        $page = $dm->getRepository('SoundGapContentAdminBundle:StationLessonPage')->find($id);
        $pages = $dm->createQueryBuilder('SoundGapContentAdminBundle:StationLessonPage')
            ->field('station.id')->equals($stationId)
            ->field('isDeleted')->notEqual(true)
            ->getQuery()->execute();

        $form = $this->createForm(new AddStationLessonPageType($schoolAppId), $page);

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

        return $this->render('SoundGapContentAdminBundle:Station:lesson.html.twig',array(
            'form' => $form->createView(),
            'station' => $station,
            'pages' => $pages,
            'pageName' => 'Lesson Page',
            'actionName' => $actionName,
        ));
    }

    public function lessonUpdateAction($pointContentId)
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

        return $this->render('SoundGapContentAdminBundle:Station:pointContent.html.twig',array(
            'form' => $form->createView(),
            'point' => $point,
            'contents' => $dm->createQueryBuilder('SoundGapContentAdminBundle:PointContent')->sort('pageNumber','asc')->getQuery()->execute(),
            'pageName' => 'point content',
            'actionName' => $actionName,
        ));
    }

    public function examQuestAction($stationId, $id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $actionName = $id ? 'update' : 'create';

        $dm = $this->get('doctrine_mongodb')->getManager();
        $station = $dm->getRepository('SoundGapContentAdminBundle:Station')->find($stationId);
        $quest = $dm->getRepository('SoundGapContentAdminBundle:Quest')->find($id);
        $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($schoolAppId);

        $form = $this->createForm(new AddQuestType($schoolAppId), $quest);

        if ($this->getRequest()->getMethod() == 'POST') {

            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $data->setGrade($station->getGrade());
                $data->setSchoolApp($schoolApp);
                $dm->persist($data);
                if ($actionName == 'create') {
                    $station->addExamQuest($data);
                }
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice','updated');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Station:examQuest.html.twig',array(
            'form' => $form->createView(),
            'station' => $station,
            'pageName' => 'examQuest',
            'actionName' => $actionName,
        ));
    }

    public function examQuestRemoveAction($stationId, $id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $station = $dm->getRepository('SoundGapContentAdminBundle:Station')->find($stationId);
        $quest = $dm->getRepository('SoundGapContentAdminBundle:Quest')->find($id);
        $station->removeExamQuest($quest);
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

        return $this->render('SoundGapContentAdminBundle:Station:pointPath.html.twig',array(
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
