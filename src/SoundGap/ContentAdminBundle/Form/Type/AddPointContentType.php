<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddPointContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // var_dump($options['data']->getBackgroundImageId());exit;
        $builder
            ->add('contentType','choice',array('choices'=>array(
                'conversation' => 'Conversation',
                'television' => 'Television',
            )))
            ->add('caption')
            ->add('backgroundImageId','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
                // 'data' => $options['data']->getBackgroundImageId(),
            ))
            ->add('backgroundAudioId','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
            ->add('startAudioId','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
            ->add('characterPose1Id','document',array(
                'class' => 'SoundGapContentAdminBundle:CharacterPose',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
            ->add('isCharacter1Speech','checkbox',array('required'=>false))
            ->add('characterPose2Id','document',array(
                'class' => 'SoundGapContentAdminBundle:CharacterPose',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
            ->add('isCharacter2Speech','checkbox',array('required'=>false))
            ->add('characterPose3Id','document',array(
                'class' => 'SoundGapContentAdminBundle:CharacterPose',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
            ->add('isCharacter3Speech','checkbox',array('required'=>false))
            ->add('characterPose4Id','document',array(
                'class' => 'SoundGapContentAdminBundle:CharacterPose',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
            ->add('isCharacter4Speech','checkbox',array('required'=>false))
            ->add('characterPose5Id','document',array(
                'class' => 'SoundGapContentAdminBundle:CharacterPose',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
            ->add('isCharacter5Speech','checkbox',array('required'=>false))
            ->add('characterPose6Id','document',array(
                'class' => 'SoundGapContentAdminBundle:CharacterPose',
                'empty_value' => 'Choose an option',
                'empty_data' => null,
                'required' => false,
            ))
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