<?php

namespace SoundGap\AppApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

class VersionController extends Controller
{
    public function getVersionAction()
    {
        # param check
        $token = $this->getRequest()->request->get('token');
        $appName = $this->getRequest()->request->get('appName');
        $appVersion = $this->getRequest()->request->get('appVersion');
        $modulesVersion = $this->getRequest()->request->get('modulesVersion');
        $hash = $this->getRequest()->request->get('hash');

        if(is_null($appName) || is_null($appVersion) || empty($modulesVersion)) {
            throw new HttpException(400, 'Invalid Parameter');
        }

        # check hash
        // if($hashLab->check($hash, $appName.$appVersion))

        # get userId
        // $user = $tokenCounter->getUser($token)

        ## get all user's modules of app
        // $modules = $user->getModules($appName);

        $outdated = array(
            array('module'=>'main','latestVersion'=>0),
        );
        return $this->jsonOutput(array(
            'hasUpdate' => !empty($outdated),
            'outdated' => $outdated,
        ));
    }

    public function getContentSizeAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        # ground
        $appetizer = $dm->getRepository('SoundGapContentAdminBundle:Appetizer')->findAll();
        $category = $dm->getRepository('SoundGapContentAdminBundle:Category')->findAll();
        $character = $dm->getRepository('SoundGapContentAdminBundle:Character')->findAll();
        return $this->jsonOutput(array(
            'documentSize' => 0,
            'mediaSize' => 0,
            'totalSize' => 0,
        ));
    }

    public function getContentAction($param)
    {

    }

    private function jsonOutput($data)
    {
        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }
}
