<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoundGap\ContentAdminBundle\Document\Media;
use SoundGap\ContentAdminBundle\Form\Type\AddMediaType;


class MediaController extends Controller
{
    public function indexAction()
    {
        return $this->render('SoundGapContentAdminBundle:Media:index.html.twig');
    }

    public function imageAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $media = $dm->getRepository('SoundGapContentAdminBundle:Media')->find($id);
        $form = $this->createForm(new AddMediaType(), $media);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $data->setType('image');
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice',$actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Media:media.html.twig',array(
            'form' => $form->createView(),
            'medias' => $dm->getRepository('SoundGapContentAdminBundle:Media')->createQueryBuilder()->field('type')->equals('image')->getQuery()->execute(),
            'pageName' => 'image',
            'actionName' => $actionName,
        ));
    }

    public function audioAction($id = null)
    {
        $actionName = $id ? 'update' : 'create';
        $dm = $this->get('doctrine_mongodb')->getManager();
        $media = $dm->getRepository('SoundGapContentAdminBundle:Media')->find($id);
        $form = $this->createForm(new AddMediaType(), $media);

        if ($this->getRequest()->getMethod() == 'POST') {
            $form->bind($this->getRequest());
            if ($form->isValid()) {
                $data = $form->getData();
                $data->setType('audio');
                $dm->persist($data);
                $dm->flush();
                $this->getRequest()->getSession()->getFlashBag()->add('notice',$actionName.'d');
                return $this->redirect($this->getRequest()->getUri());
            }
        }
        return $this->render('SoundGapContentAdminBundle:Media:media.html.twig',array(
            'form' => $form->createView(),
            'medias' => $dm->getRepository('SoundGapContentAdminBundle:Media')->createQueryBuilder()->field('type')->equals('audio')->getQuery()->execute(),
            'pageName' => 'audio',
            'actionName' => $actionName,
        ));
    }

    public function mediaDeleteAction($id)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $media = $dm->getRepository('SoundGapContentAdminBundle:Media')->find($id);
        if ($media) {
            $dm->remove($media);
            $dm->flush();
            $this->getRequest()->getSession()->getFlashBag()->add('notice', "'{$media->getName()}' deleted");
        } else {
            $this->getRequest()->getSession()->getFlashBag()->add('notice','not found');
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}
