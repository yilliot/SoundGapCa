<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddStationLessonPageType extends AbstractType
{
    public function __construct($schoolAppId, $gradeId) {
        $this->schoolAppId = $schoolAppId;
        $this->gradeId = $gradeId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $characterQueryBuilder = array(
            'class' => 'SoundGapContentAdminBundle:CharacterPose',
            'empty_value' => '',
            'empty_data' => null,
            'required' => false,
            'query_builder' => function(DocumentRepository $dr)
            {
                return $dr->createQueryBuilder()
                    ->field('schoolApp.id')->equals($this->schoolAppId)
                    ->field('isDeleted')->notEqual(true)
                    ->sort('id','desc');
            }
        );
        $builder
            ->add('type','document',array(
                'class' => 'SoundGapContentAdminBundle:StationLessonPageType'
            ))
            ->add('title')
            ->add('caption')
            ->add('backgroundImage','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b0')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('foregroundImage','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b1')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('backgroundMusicLoop','document',array(
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
            ))
            ->add('backgroundAmbientLoop','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041a2')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('backgroundAmbient','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_value' => '',
                'empty_data' => null,
                'required' => false,
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041a3')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('triggerAudioConversation','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_value' => '',
                'empty_data' => null,
                'required' => false,
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041a4')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('character1','document',$characterQueryBuilder)
            ->add('isCharacter1Speech','checkbox',array('required'=>false))
            ->add('character2','document',$characterQueryBuilder)
            ->add('isCharacter2Speech','checkbox',array('required'=>false))
            ->add('quest','document',array(
                'attr' => array('class'=>'select2'),
                'class' => 'SoundGapContentAdminBundle:Quest',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('grade.id')->equals($this->gradeId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('position')
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
            'data_class' => 'SoundGap\ContentAdminBundle\Document\StationLessonPage',
        ));
    }

    public function getName()
    {
        return 'StationLessonPage';
    }
}