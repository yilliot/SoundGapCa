<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddStationLessonPageType extends AbstractType
{
    public function __construct($schoolAppId) {
        return $this->schoolAppId = $schoolAppId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $poseOptions = array(
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
            ->add('triggerVideo')
            ->add('backgroundImage','document',array(
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
            ->add('backgroundMusic','document',array(
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
            ->add('backgroundAmbient','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_value' => '',
                'empty_data' => null,
                'required' => false,
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041a2')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('characterPose1','document',$poseOptions)
            ->add('isCharacter1Speech','checkbox',array('required'=>false))
            ->add('characterPose2','document',$poseOptions)
            ->add('isCharacter2Speech','checkbox',array('required'=>false))
            ->add('characterPose3','document',$poseOptions)
            ->add('isCharacter3Speech','checkbox',array('required'=>false))
            ->add('characterPose4','document',$poseOptions)
            ->add('isCharacter4Speech','checkbox',array('required'=>false))
            ->add('characterPose5','document',$poseOptions)
            ->add('isCharacter5Speech','checkbox',array('required'=>false))
            ->add('characterPose6','document',$poseOptions)
            ->add('isCharacter6Speech','checkbox',array('required'=>false));
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