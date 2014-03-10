<?php

namespace SoundGap\ContentAdminBundle\DataFixtures\ODM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use SoundGap\ContentAdminBundle\Document\School;
use SoundGap\ContentAdminBundle\Document\App;
use SoundGap\ContentAdminBundle\Document\AssetType;
use SoundGap\ContentAdminBundle\Document\StationType;
use SoundGap\ContentAdminBundle\Document\StationLessonPageType;

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
        $obj->setId('531a88de0d982620600041a9');
        $obj->setName('conversation character');
        $manager->persist($obj);
        $obj = new StationLessonPageType();
        $obj->setId('531a88de0d982620600041aa');
        $obj->setName('conversation scene');
        $manager->persist($obj);
        $obj = new StationLessonPageType();
        $obj->setId('531a88de0d982620600041ab');
        $obj->setName('fullscreen video');
        $manager->persist($obj);
        $obj = new StationLessonPageType();
        $obj->setId('531a88de0d982620600041ac');
        $obj->setName('fullscreen audioImage');
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
        $assetType->setId('531a81ca0d9826ce5f004191');
        $assetType->setName('school.logo');
        $manager->persist($assetType);

        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a1');
        $assetType->setName('music.background');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a2');
        $assetType->setName('music.ambient');
        $manager->persist($assetType);
        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041a3');
        $assetType->setName('music.trigger');
        $manager->persist($assetType);

        $assetType = new AssetType();
        $assetType->setId('531a81ca0d9826ce5f0041b1');
        $assetType->setName('image.background');
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

        $obj = new School();
        $obj->setName('Bird Music');
        $manager->persist($obj);
        $obj = new School();
        $obj->setName('BIGBAG');
        $manager->persist($obj);

        $obj = new App();
        $obj->setName('SoundGap');
        $manager->persist($obj);
        $obj = new App();
        $obj->setName('Theory Voyage');
        $manager->persist($obj);

        $manager->flush();
    }
}