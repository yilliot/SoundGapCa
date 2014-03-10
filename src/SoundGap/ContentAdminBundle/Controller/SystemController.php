<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SoundGap\ContentAdminBundle\Form\Type\AddSchoolType;
use SoundGap\ContentAdminBundle\Form\Type\AddSchoolAppType;
use SoundGap\ContentAdminBundle\Form\Type\AddAppType;
use SoundGap\ContentAdminBundle\Form\Type\UserSchoolType;
use SoundGap\ContentAdminBundle\Form\Type\UserSchoolAppType;
use SoundGap\ContentAdminBundle\Form\Type\AddAppPackageType;
use SoundGap\ContentAdminBundle\Constants\SessionConstants;


class SystemController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Default:index.html.twig');
    }

    public function embedSchoolAppAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $appQb = $dm->createQueryBuilder('SoundGapContentAdminBundle:SchoolApp');
        return $this->render('SoundGapContentAdminBundle:System:embedSchoolApp.html.twig',array(
            'schoolApps' => $appQb
                ->getQuery()->execute(),
            'schoolAppId' => $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID),
            ));
    }

    public function schoolAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $school = $dm->getRepository('SoundGapContentAdminBundle:School')->find($id);
        $form = $this->createForm(new AddSchoolType(), $school);
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
        return $this->render('SoundGapContentAdminBundle:System:school.html.twig',array(
            'form' => $form->createView(),
            'schools' => $dm->getRepository('SoundGapContentAdminBundle:School')->findAll(),
            'pageName' => 'school',
            'actionName' => $actionName,
        ));
    }

    public function userSchoolAction()
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $actionName = 'update';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($schoolAppId);
        $school = $schoolApp->getSchool();
        $form = $this->createForm(new UserSchoolType($schoolAppId), $school);
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
        return $this->render('SoundGapContentAdminBundle:System:userSchool.html.twig',array(
            'form' => $form->createView(),
            'pageName' => 'school',
            'actionName' => $actionName,
        ));
    }
    public function userAppAction($id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $actionName = 'update';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($schoolAppId);
        $form = $this->createForm(new UserSchoolAppType($schoolAppId), $schoolApp);
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
        return $this->render('SoundGapContentAdminBundle:System:userschoolApp.html.twig',array(
            'form' => $form->createView(),
            'pageName' => 'schoolApp',
            'actionName' => $actionName,
        ));
    }

    public function appAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $app = $dm->getRepository('SoundGapContentAdminBundle:App')->find($id);
        $form = $this->createForm(new AddAppType(), $app);
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
        return $this->render('SoundGapContentAdminBundle:System:app.html.twig',array(
            'form' => $form->createView(),
            'apps' => $dm->getRepository('SoundGapContentAdminBundle:App')->findAll(),
            'pageName' => 'app',
            'actionName' => $actionName,
        ));
    }
    public function schoolAppAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($id);
        $form = $this->createForm(new AddSchoolAppType(), $schoolApp);
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
        return $this->render('SoundGapContentAdminBundle:System:schoolApp.html.twig',array(
            'form' => $form->createView(),
            'schoolApps' => $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->findAll(),
            'pageName' => 'schoolApp',
            'actionName' => $actionName,
        ));
    }

    public function appPackageAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $appPackage = $dm->getRepository('SoundGapContentAdminBundle:AppPackage')->find($id);
        $form = $this->createForm(new AddAppPackageType(), $appPackage);
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
        return $this->render('SoundGapContentAdminBundle:System:appPackage.html.twig',array(
            'form' => $form->createView(),
            'appPackages' => $dm->getRepository('SoundGapContentAdminBundle:AppPackage')->findAll(),
            'pageName' => 'appPackage',
            'actionName' => $actionName,
        ));
    }

    public function setSchoolAppIdAction($id)
    {
        $this->getRequest()->getSession()->set(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID,$id);
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}