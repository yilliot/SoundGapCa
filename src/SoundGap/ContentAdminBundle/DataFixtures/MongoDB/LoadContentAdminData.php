<?php

namespace SoundGap\ContentAdminBundle\DataFixtures\ODM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use SoundGap\ContentAdminBundle\Document\AppPackage;
use SoundGap\ContentAdminBundle\Document\School;
use SoundGap\ContentAdminBundle\Document\App;
use SoundGap\ContentAdminBundle\Document\SchoolApp;

use SoundGap\ContentAdminBundle\Document\Character;
use SoundGap\ContentAdminBundle\Document\AssetType;

use SoundGap\ContentAdminBundle\Document\StationType;
use SoundGap\ContentAdminBundle\Document\StationLessonPageType;

use SoundGap\ContentAdminBundle\Document\Category;
use SoundGap\ContentAdminBundle\Document\Grade;

/**
* 
*/
class LoadContentAdminData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {

        ## station type
        $obj = new StationType();
        $obj->setId('531a88de0d982620600041a7');
        $obj->setName('Lesson');
        $manager->persist($obj);
        $obj = new StationType();
        $obj->setId('531a88de0d982620600041a8');
        $obj->setName('Exam');
        $manager->persist($obj);

        ## station lesson page type
        $obj = new StationLessonPageType();
        $obj->setId('531a88de0d982620600041aa');
        $obj->setName('conversation');
        $manager->persist($obj);
        // $obj = new StationLessonPageType();
        // $obj->setId('531a88de0d982620600041ab');
        // $obj->setName('video');
        // $manager->persist($obj);
        $obj = new StationLessonPageType();
        $obj->setId('531a88de0d982620600041ac');
        $obj->setName('audioImage');
        $manager->persist($obj);
        $obj = new StationLessonPageType();
        $obj->setId('531a88de0d982620600041ad');
        $obj->setName('quest');
        $manager->persist($obj);
        $obj = new StationLessonPageType();
        $obj->setId('531a88de0d982620600041ae');
        $obj->setName('ads');
        $manager->persist($obj);

        ## asset type
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a1');
        $assetType->setName('sound.loop.music');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a2');
        $assetType->setName('sound.loop.ambient');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a3');
        $assetType->setName('sound.once.ambient');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a4');
        $assetType->setName('sound.once.conversation');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a5');
        $assetType->setName('sound.once.system');
        $manager->persist($assetType);

        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b0');
        $assetType->setName('image.background');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b1');
        $assetType->setName('image.foreground');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b2');
        $assetType->setName('image.button');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b3');
        $assetType->setName('image.appetizer');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b4');
        $assetType->setName('image.emoticon');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b5');
        $assetType->setName('image.character');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b6');
        $assetType->setName('image.quest');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b7');
        $assetType->setName('image.questOption');
        $manager->persist($assetType);

        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b8');
        $assetType->setName('image.system');
        $manager->persist($assetType);

        $school1 = new School();
        $school1->setName('BIGBAG');
        $manager->persist($school1);
        $school2 = new School();
        $school2->setName('Bird Studio');
        $manager->persist($school2);

        $app1 = new App();
        $app1->setName('SoundGap');
        $manager->persist($app1);
        $app2 = new App();
        $app2->setName('Theory Voyage');
        $manager->persist($app2);

        $schoolApp1 = new SchoolApp();
        $schoolApp1->setId('531eff260d9826bf7e0041ab');
        $schoolApp1->setApp($app1);
        $schoolApp1->setSchool($school1);
        $manager->persist($schoolApp1);

        $schoolApp2 = new SchoolApp();
        $schoolApp2->setId('531eff260d9826bf7e0041ac');
        $schoolApp2->setApp($app2);
        $schoolApp2->setSchool($school2);
        $manager->persist($schoolApp2);

        $obj = new AppPackage();
        $obj->setName('Default');
        $obj->setApp($app1);
        $manager->persist($obj);

        $obj = new Character();
        $obj->setName('Mario');
        $obj->setSchoolApp($schoolApp1);
        $manager->persist($obj);
        $obj = new Character();
        $obj->setName('Hippo');
        $obj->setSchoolApp($schoolApp1);
        $manager->persist($obj);

        $c1 = new Category();
        $c1->setTitle('Basic');
        $c1->setTitle2('Basic');
        $c1->setButtonTitle('Basic');
        $c1->setButtonTitle2('Basic');
        $c1->setSchoolApp($schoolApp1);
        $manager->persist($c1);
        $c2 = new Category();
        $c2->setTitle('Rhythm');
        $c2->setTitle2('Rhythm');
        $c2->setButtonTitle('Rhythm');
        $c2->setButtonTitle2('Rhythm');
        $c2->setSchoolApp($schoolApp1);
        $manager->persist($c2);
        $c3 = new Category();
        $c3->setTitle('Melody');
        $c3->setTitle2('Melody');
        $c3->setButtonTitle('Melody');
        $c3->setButtonTitle2('Melody');
        $c3->setSchoolApp($schoolApp1);
        $manager->persist($c3);
        $c4 = new Category();
        $c4->setTitle('Unknown');
        $c4->setTitle2('Unknown');
        $c4->setButtonTitle('Unknown');
        $c4->setButtonTitle2('Unknown');
        $c4->setSchoolApp($schoolApp1);
        $manager->persist($c4);
        $c5 = new Category();
        $c5->setTitle('Unknown2');
        $c5->setTitle2('Unknown2');
        $c5->setButtonTitle('Unknown2');
        $c5->setButtonTitle2('Unknown2');
        $c5->setSchoolApp($schoolApp1);
        $manager->persist($c5);

        $g1 = new Grade();
        $g1->setButtonTitle('g1');
        $g1->setCategory($c1);
        $manager->persist($g1);
        $g2 = new Grade();
        $g2->setButtonTitle('g2');
        $g2->setCategory($c1);
        $manager->persist($g2);
        $g3 = new Grade();
        $g3->setButtonTitle('g3');
        $g3->setCategory($c1);
        $manager->persist($g3);
        $g4 = new Grade();
        $g4->setButtonTitle('g4');
        $g4->setCategory($c1);
        $manager->persist($g4);
        $g5 = new Grade();
        $g5->setButtonTitle('g5');
        $g5->setCategory($c1);
        $manager->persist($g5);
        $g1 = new Grade();
        $g1->setButtonTitle('g1');
        $g1->setCategory($c2);
        $manager->persist($g1);
        $g2 = new Grade();
        $g2->setButtonTitle('g2');
        $g2->setCategory($c2);
        $manager->persist($g2);
        $g3 = new Grade();
        $g3->setButtonTitle('g3');
        $g3->setCategory($c2);
        $manager->persist($g3);
        $g4 = new Grade();
        $g4->setButtonTitle('g4');
        $g4->setCategory($c2);
        $manager->persist($g4);
        $g5 = new Grade();
        $g5->setButtonTitle('g5');
        $g5->setCategory($c2);
        $manager->persist($g5);

        $g1 = new Grade();
        $g1->setButtonTitle('g1');
        $g1->setCategory($c3);
        $manager->persist($g1);
        $g2 = new Grade();
        $g2->setButtonTitle('g2');
        $g2->setCategory($c3);
        $manager->persist($g2);
        $g3 = new Grade();
        $g3->setButtonTitle('g3');
        $g3->setCategory($c3);
        $manager->persist($g3);
        $g4 = new Grade();
        $g4->setButtonTitle('g4');
        $g4->setCategory($c3);
        $manager->persist($g4);
        $g5 = new Grade();
        $g5->setButtonTitle('g5');
        $g5->setCategory($c3);
        $manager->persist($g5);

        $g1 = new Grade();
        $g1->setButtonTitle('g1');
        $g1->setCategory($c4);
        $manager->persist($g1);
        $g2 = new Grade();
        $g2->setButtonTitle('g2');
        $g2->setCategory($c4);
        $manager->persist($g2);
        $g3 = new Grade();
        $g3->setButtonTitle('g3');
        $g3->setCategory($c4);
        $manager->persist($g3);
        $g4 = new Grade();
        $g4->setButtonTitle('g4');
        $g4->setCategory($c4);
        $manager->persist($g4);
        $g5 = new Grade();
        $g5->setButtonTitle('g5');
        $g5->setCategory($c4);
        $manager->persist($g5);

        $g1 = new Grade();
        $g1->setButtonTitle('g1');
        $g1->setCategory($c5);
        $manager->persist($g1);
        $g2 = new Grade();
        $g2->setButtonTitle('g2');
        $g2->setCategory($c5);
        $manager->persist($g2);
        $g3 = new Grade();
        $g3->setButtonTitle('g3');
        $g3->setCategory($c5);
        $manager->persist($g3);
        $g4 = new Grade();
        $g4->setButtonTitle('g4');
        $g4->setCategory($c5);
        $manager->persist($g4);
        $g5 = new Grade();
        $g5->setButtonTitle('g5');
        $g5->setCategory($c5);
        $manager->persist($g5);

        $manager->flush();
    }
}