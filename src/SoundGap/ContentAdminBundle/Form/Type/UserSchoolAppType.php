<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;
use SoundGap\ContentAdminBundle\Constants\SessionConstants;

class UserSchoolAppType extends AbstractType
{
    public function __construct($schoolAppId) {
        $this->schoolAppId = $schoolAppId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $backgroundImageQueryBuilder = array(
            'class' => 'SoundGapContentAdminBundle:Asset',
            'empty_data' => null,
            'empty_value' => '',
            'query_builder' => function(DocumentRepository $dr) {
                return $dr->createQueryBuilder()
                    ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b1')
                    ->field('schoolApp.id')->equals($this->schoolAppId)
                    ->field('isDeleted')->notEqual(true)
                    ->sort('id','desc');
            }
        );
        $characterQueryBuilder = array(
            'class' => 'SoundGapContentAdminBundle:CharacterPose',
            'empty_value' => '',
            'empty_data' => null,
            'query_builder' => function(DocumentRepository $dr)
            {
                return $dr->createQueryBuilder()
                    ->field('schoolApp.id')->equals($this->schoolAppId)
                    ->field('isDeleted')->notEqual(true)
                    ->sort('id','desc');
            }
        );
        $ambientAudioQueryBuilder = array(
            'class' => 'SoundGapContentAdminBundle:Asset',
            'empty_data' => null,
            'empty_value' => '',
            'query_builder' => function(DocumentRepository $dr) {
                return $dr->createQueryBuilder()
                    ->field('assetType.id')->equals('531a81ca0d9826ce5f0041a2')
                    ->field('schoolApp.id')->equals($this->schoolAppId)
                    ->field('isDeleted')->notEqual(true)
                    ->sort('id','desc');
            }
        );

        $backgroundMusicQueryBuilder = array(
            'class' => 'SoundGapContentAdminBundle:Asset',
            'empty_data' => null,
            'empty_value' => '',
            'query_builder' => function(DocumentRepository $dr)
            {
                return $dr->createQueryBuilder()
                    ->field('assetType.id')->equals('531a81ca0d9826ce5f0041a1')
                    ->field('schoolApp.id')->equals($this->schoolAppId)
                    ->field('isDeleted')->notEqual(true)
                    ->sort('id','desc');
            },
        );

        $builder
            ->add('backgroundImage','document',$backgroundImageQueryBuilder)
            ->add('backgroundImageGameOver','document',$backgroundImageQueryBuilder)
            ->add('backgroundMusic','document',$backgroundMusicQueryBuilder)
            ->add('questCharacterAlert','document',$characterQueryBuilder)
            ->add('questCharacterWaiting','document',$characterQueryBuilder)
            ->add('questCharacterSleepy','document',$characterQueryBuilder)
            ->add('questCharacterCorrect','document',$characterQueryBuilder)
            ->add('questCharacterWrong','document',$characterQueryBuilder)
            ->add('questAudioCorrectFirstTime','document',$ambientAudioQueryBuilder)
            ->add('questAudioCorrectFollowing','document',$ambientAudioQueryBuilder)
            ->add('questAudioWrong','document',$ambientAudioQueryBuilder)
            ;
        if (!isset($options['data'])) {
            $builder->add('create','submit',array('attr'=>array('class'=>'btn btn-primary pull-right')));
        } else {
            $builder->add('save','submit',array('attr'=>array('class'=>'btn btn-warning pull-right')));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SoundGap\ContentAdminBundle\Document\SchoolApp',
        ));
    }

    public function getName()
    {
        return 'SchoolApp';
    }
}