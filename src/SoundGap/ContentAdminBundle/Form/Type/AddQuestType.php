<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddQuestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('isForExam','checkbox',array('required' => false))
            ->add('questCaption')
            ->add('questImage','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'required' => false,
            ))
            ->add('questAudio','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'required' => false,
            ))
            ->add('option1Image','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'required' => false,
            ))
            ->add('option2Image','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'required' => false,
            ))
            ->add('option3Image','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'required' => false,
            ))
            ->add('option4Image','document',array(
                'class' => 'SoundGapContentAdminBundle:Media',
                'property' => 'name',
                'empty_value' => 'Choose an option',
                'required' => false,
            ))
            ->add('option1Caption')
            ->add('option2Caption')
            ->add('option3Caption')
            ->add('option4Caption');
        if (!isset($options['data'])) {
            $builder->add('create','submit',array('attr'=>array('class'=>'btn btn-primary pull-right')));
        } else {
            $builder->add('save','submit',array('attr'=>array('class'=>'btn btn-warning pull-right')));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SoundGap\ContentAdminBundle\Document\Quest',
        ));
    }

    public function getName()
    {
        return 'Quest';
    }
}