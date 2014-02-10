<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddPointContentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('type','choice',array('choices'=>array(
                'lesson' => 'Lesson',
                'practice' => 'Practice',
                'challenge' => 'Challenge',
            )))
            ->add('gradeId','document',array(
                'class' => 'SoundGapContentAdminBundle:Grade',
            ))
            ->add('image','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
            ))
            ->add('imageCenterCoordinateX','number')
            ->add('imageCenterCoordinateY','number')
            ->add('appetizer','document',array(
                'class' => 'SoundGapContentAdminBundle:Appetizer',
                'property' => 'name',
            ));
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