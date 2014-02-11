<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddPointContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $poseOptions = array(
            'class' => 'SoundGapContentAdminBundle:CharacterPose',
            'empty_value' => 'Choose an option',
            'empty_data' => null,
            'required' => false,
            'query_builder' => function(DocumentRepository $dr)
            {
                return $dr->createQueryBuilder()->field('type')->equals('image')->sort('id','desc');
            }
        );
        $builder
            ->add('contentType','choice',array('choices'=>array(
                'conversation' => 'Conversation',
                'television' => 'Television',
            )))
            ->add('caption')
            ->add('backgroundImage','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()->field('type')->equals('image')->sort('id','desc');
                },
            ))
            ->add('backgroundAudio','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()->field('type')->equals('audio')->sort('id','desc');
                },
            ))
            ->add('startAudio','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()->field('type')->equals('audio')->sort('id','desc');
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
            'data_class' => 'SoundGap\ContentAdminBundle\Document\PointContent',
        ));
    }

    public function getName()
    {
        return 'PointContent';
    }
}