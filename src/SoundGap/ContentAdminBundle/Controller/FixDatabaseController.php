<?php

namespace SoundGap\ContentAdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SoundGap\ContentAdminBundle\Document\App;
use SoundGap\ContentAdminBundle\Document\AppPackage;
use SoundGap\ContentAdminBundle\Document\School;
use SoundGap\ContentAdminBundle\Document\SchoolApp;

use SoundGap\ContentAdminBundle\Document\Category;
use SoundGap\ContentAdminBundle\Document\Grade;
use SoundGap\ContentAdminBundle\Document\Station;
use SoundGap\ContentAdminBundle\Document\StationLessonPage;
use SoundGap\ContentAdminBundle\Document\Quest;

use SoundGap\ContentAdminBundle\Document\Asset;
use SoundGap\ContentAdminBundle\Document\Character;
use SoundGap\ContentAdminBundle\Document\CharacterPose;
use SoundGap\ContentAdminBundle\Document\Emoticon;

use Symfony\Component\HttpFoundation\JsonResponse;


class FixDatabaseController extends Controller
{

    //http://soundgap.l/app_dev.php/ca/fix/detect/debref
    public function detectDBRefAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $schoolApps = $dm->createQueryBuilder('SoundGapContentAdminBundle:SchoolApp')
            ->getQuery()->execute();
        $data = array();
        foreach ($schoolApps as $schoolApp) {
            $data[] = $this->makeArraysBySchoolApp($schoolApp);
        }
        $response = new JsonResponse();
        $response->setData($data);
        return $response;
        exit;
        return $this->render('SoundGapContentAdminBundle:Default:index.html.twig');
    }

    public function tempJsonAction()
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        $schoolApp = $dm->getRepository('SoundGapContentAdminBundle:SchoolApp')->find('531eff260d9826bf7e0041ab');
        $data = $this->makeArraysBySchoolApp($schoolApp);
        $response = new JsonResponse();
        $response->setData($data);
        return $response;
    }

    private function makeArraysBySchoolApp($schoolApp)
    {
        $dm = $this->get('doctrine_mongodb')->getManager();
        
        # category by categories by schoolApp
        $categoriesArray = array();
        $categories = $dm->createQueryBuilder('SoundGapContentAdminBundle:Category')
            ->field('schoolApp.id')->equals($schoolApp->getId())
            ->field('isDeleted')->notEqual(true)
            ->getQuery()->execute();
        foreach ($categories as $category) {
            $categoriesArray[$category->getId()] = $category;
        }

        # grade by grades by categories
        $gradesByCategoriesArray = array();
        foreach ($categoriesArray as $categoryId => $category) {
            $gradesByCategoriesArray[$categoryId] = array();
            $grades = $dm->createQueryBuilder('SoundGapContentAdminBundle:Grade')
            ->field('category.id')->equals($categoryId)
            ->sort('position')
            ->getQuery()->execute();
            foreach ($grades as $grade) {
                $gradesByCategoriesArray[$categoryId][$grade->getId()] = $grade->toKVArray();
            }
        }

        # station by stations by grades |split| by categories
        $stationsByGradesArray = array();
        foreach ($gradesByCategoriesArray as $categoryId => $grades) {
            $stationsByGradesArray[$categoryId] = array();
            foreach ($grades as $gradeId => $grade) {
                $stationsByGradesArray[$categoryId][$gradeId] = array();
                $stations = $dm->createQueryBuilder('SoundGapContentAdminBundle:Station')
                ->field('grade.id')->equals($gradeId)
                ->sort('position')
                ->getQuery()->execute();
                foreach ($stations as $station) {
                    $stationsByGradesArray[$categoryId][$gradeId][$station->getId()] = $station->toKVArray();
                }
            }
        }

        # where station is Lesson
        # page by pages by stations |split| by grades by categories
        $pagesByStationsArray = array();
        foreach ($stationsByGradesArray as $categoryId => $grades) {
            $pagesByStationsArray[$categoryId] = array();
            foreach ($grades as $gradeId => $stations) {
                $pagesByStationsArray[$categoryId][$gradeId] = array();
                foreach ($stations as $stationId => $station) {
                    if ($station['type']=='531a88de0d982620600041a7') {
                        $pagesByStationsArray[$categoryId][$gradeId][$stationId] = array();
                        $pages = $dm->createQueryBuilder('SoundGapContentAdminBundle:StationLessonPage')
                        ->field('station.id')->equals($stationId)
                        ->sort('position')
                        ->getQuery()->execute();
                        foreach ($pages as $page) {
                            $pagesByStationsArray[$categoryId][$gradeId][$stationId][$page->getId()] = $page->toKVArray();
                        }
                    }
                }
            }
        }
        # where station is Exam
        # quest by quests by stations |split| by grades by categories
        $questsByStationsArray = array();
        foreach ($stationsByGradesArray as $categoryId => $grades) {
            $questsByStationsArray[$categoryId] = array();
            foreach ($grades as $gradeId => $stations) {
                $questsByStationsArray[$categoryId][$gradeId] = array();
                foreach ($stations as $stationId => $station) {
                    if ($station['type']=='531a88de0d982620600041a8') {
                        $questsByStationsArray[$categoryId][$gradeId][$stationId] = array();
                        foreach ($station['examQuests'] as $quest) {
                            $questsByStationsArray[$categoryId][$gradeId][$stationId][] = $quest->toKVArray();
                        }
                    }
                }
            }
        }

        # assets
        $assetsArray = array();
        $assets = $dm->createQueryBuilder('SoundGapContentAdminBundle:Asset')
            ->field('isDeleted')->notEqual(true)
            ->field('schoolApp.id')->equals($schoolApp->getId())
            ->getQuery()->execute();
        foreach ($assets as $asset) {
            $assetsArray[$asset->getId()] = $asset->toKVArray();
        }

        $emoticonsArray = array();
        $emoticons = $dm->createQueryBuilder('SoundGapContentAdminBundle:Emoticon')
            ->field('isDeleted')->notEqual(true)
            ->getQuery()->execute();
        foreach ($emoticons as $emoticon) {
            $emoticonsArray[$emoticon->getId()] = $emoticon->toKVArray();
        }

        $system = $schoolApp->toKVArray();

        ## 
        ## BREAK DOWN INTO ARRAYS
        ##
        return array(
            'categories' => $categoriesArray,
            'grades' => $gradesByCategoriesArray,
            'stations' => $stationsByGradesArray,
            'pages' => $pagesByStationsArray,
            'quests' => $questsByStationsArray,
            'assets' => $assetsArray,
            'emoticons' => $emoticonsArray,
            'system' => $system
        );
    }
}
