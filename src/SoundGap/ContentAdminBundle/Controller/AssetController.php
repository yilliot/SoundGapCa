<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoundGap\ContentAdminBundle\Document\Asset;
use SoundGap\ContentAdminBundle\Document\Character;
use SoundGap\ContentAdminBundle\Document\CharacterPose;
use SoundGap\ContentAdminBundle\Document\Emoticon;

use SoundGap\ContentAdminBundle\Form\Type\AddAssetType;
use SoundGap\ContentAdminBundle\Form\Type\AddCharacterType;
use SoundGap\ContentAdminBundle\Form\Type\AddCharacterPoseType;
use SoundGap\ContentAdminBundle\Form\Type\AddEmoticonType;

use SoundGap\ContentAdminBundle\Constants\SessionConstants;



class AssetController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Asset:index.html.twig');
    }

    public function assetAction($id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $asset = $dm->getRepository('SoundGapContentAdminBundle:Asset')->find($id);
        $form = $this->createForm(new AddAssetType(), $asset);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($schoolAppId);
                $data = $form->getData();
                $data->setSchoolApp($schoolApp);
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice',$actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Asset:asset.html.twig',array(
            'form' => $form->createView(),
            'assets' => $dm->getRepository('SoundGapContentAdminBundle:Asset')->createQueryBuilder()
                ->field('isDeleted')->notEqual(true)
                ->field('schoolApp.id')->equals($schoolAppId)
                ->getQuery()->execute(),
            'pageName' => 'asset',
            'actionName' => $actionName,
        ));
    }

    public function assetDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $asset = $dm->getRepository('SoundGapContentAdminBundle:Asset')->find($id);
        if ($asset) {
            // soft delete
            $asset->softDelete();
            // $dm->remove($asset);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$asset->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgapca_asset'));
    }

    public function characterAction($id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);

        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $character = $dm->getRepository('SoundGapContentAdminBundle:Character')->find($id);
        $form = $this->createForm(new AddCharacterType(), $character);
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
        return $this->render('SoundGapContentAdminBundle:Asset:character.html.twig',array(
            'form' => $form->createView(),
            'characters' => $dm->createQueryBuilder('SoundGapContentAdminBundle:Character')
                ->field('schoolApp.id')->equals($schoolAppId)
                ->field('isDeleted')->notEqual(true)
                ->getQuery()->execute(),
            'pageName' => 'character',
            'actionName' => $actionName,
        ));
    }
    public function characterDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $result = $dm->getRepository('SoundGapContentAdminBundle:Character')->find($id);
        if ($result) {
            $result->softDelete();
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$result->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgapca_asset_character'));
    }

    public function characterPoseAction($id = null)
    {
        $schoolAppId = $this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID);
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $characterPose = $dm->getRepository('SoundGapContentAdminBundle:CharacterPose')->find($id);
        $form = $this->createForm(new AddCharacterPoseType($schoolAppId), $characterPose);
        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($schoolAppId);
                $data->setSchoolApp($schoolApp);
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice',$actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Asset:characterPose.html.twig',array(
            'form' => $form->createView(),
            'characterPoses' => $dm->createQueryBuilder('SoundGapContentAdminBundle:CharacterPose')
                ->field('schoolApp.id')->equals($schoolAppId)
                ->field('isDeleted')->notEqual(true)
                ->getQuery()->execute(),
            'pageName' => 'characterPose',
            'actionName' => $actionName,
        ));
    }
    public function characterPoseDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $characterPose = $dm->getRepository('SoundGapContentAdminBundle:CharacterPose')->find($id);
        if ($characterPose) {
            $characterPose->softDelete();
            // $dm->remove($characterPose);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$characterPose}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgapca_asset_characterpose'));
    }

    public function emoticonAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $emoticon = $dm->getRepository('SoundGapContentAdminBundle:Emoticon')->find($id);
        $form = $this->createForm(new AddEmoticonType(), $emoticon);
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
        return $this->render('SoundGapContentAdminBundle:Asset:emoticon.html.twig',array(
            'form' => $form->createView(),
            'emoticons' => $dm->createQueryBuilder('SoundGapContentAdminBundle:Emoticon')
                ->field('isDeleted')->notEqual(true)
                ->getQuery()->execute(),
            'pageName' => 'emoticon',
            'actionName' => $actionName,
        ));
    }
    public function emoticonDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $emoticon = $dm->getRepository('SoundGapContentAdminBundle:Emoticon')->find($id);
        if ($emoticon) {
            $emoticon->softDelete();
            // $dm->remove($emoticon);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$emoticon}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgapca_asset_emoticon'));
    }
}
