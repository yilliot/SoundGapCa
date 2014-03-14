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

        $form = $this->createForm(new AddStationLessonPageType($schoolAppId, $station->getGrade()->getId()), $page);

        if ($this->getRequest()->getMethod() == 'POST') {

            ## modify post value
            $stationLessonPageArray = $this->getRequest()->request->get('StationLessonPage');
            if ($stationLessonPageArray['position']=='') {
                $stationLessonPageArray['position'] = $pages->count()+1;
                $this->getRequest()->request->set('StationLessonPage', $stationLessonPageArray);
            }

            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $data->setStation($station);
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

    public function examQuestAction($stationId)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);

        $dm = $this->get('doctrine_mongodb')->getManager();
        $station = $dm->getRepository('SoundGapContentAdminBundle:Station')->find($stationId);
        $quests = $dm->createQueryBuilder('SoundGapContentAdminBundle:Quest')
            ->field('grade.id')->equals($station->getGrade()->getId())
            ->sort('id','desc')
            ->getQuery()->execute();
        $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($schoolAppId);

        return $this->render('SoundGapContentAdminBundle:Station:examQuest.html.twig',array(
            'station' => $station,
            'quests' => $quests,
            'pageName' => 'examQuest',
            'actionName' => 'link',
        ));
    }

    public function examQuestAddAction($stationId, $id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $station = $dm->getRepository('SoundGapContentAdminBundle:Station')->find($stationId);
        $quest = $dm->getRepository('SoundGapContentAdminBundle:Quest')->find($id);
        $station->addExamQuest($quest);
        $dm->flush();
        $this->getRequest()->getSession()->getFlashBag()->add('notice','added');
        return $this->redirect($this->getRequest()->headers->get('referer'));
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
}
