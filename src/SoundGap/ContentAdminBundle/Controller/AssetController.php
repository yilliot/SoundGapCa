<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoundGap\ContentAdminBundle\Document\Asset;
use SoundGap\ContentAdminBundle\Form\Type\AddAssetType;
use SoundGap\ContentAdminBundle\Constants\SessionConstants;


class AssetController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Asset:index.html.twig');
    }

    public function assetAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $asset = $dm->getRepository('SoundGapContentAdminBundle:Asset')->find($id);
        $form = $this->createForm(new AddAssetType(), $asset);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $forSchoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find($this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID));
                $data = $form->getData();
                $data->setSchoolApp($forSchoolApp);
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
                ->field('schoolApp.id')->equals($this->getRequest()->getSession()->get(SessionConstants::SESSION_SYSTEM_SCHOOLAPP_ID))
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
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $character = $dm->getRepository('SoundGapContentAdminBundle:Character')->find($id);
        $form = $this->createForm(new AddCharacterType(), $character);
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
        return $this->render('SoundGapContentAdminBundle:Ground:character.html.twig',array(
            'form' => $form->createView(),
            'characters' => $dm->getRepository('SoundGapContentAdminBundle:Character')->findAll(),
            'pageName' => 'character',
            'actionName' => $actionName,
        ));
    }
    public function characterDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $result = $dm->createQueryBuilder('SoundGapContentAdminBundle:Character')
            ->findAndremove()
            ->field('id')->equals($id)
            ->getQuery()
            ->execute();
        if ($result) {
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$result->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->generateUrl('soundgap_ca_ground_character'));
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
}
