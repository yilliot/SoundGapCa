<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddCharacterPoseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pose','document',array(
                'class' => 'SoundGapContentAdminBundle:Pose',
                'property' => 'name',
            ))
            ->add('character','document',array(
                'class' => 'SoundGapContentAdminBundle:Character',
                'property' => 'name',
            ))
            ->add('image','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'property' => 'name',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()->field('type')->equals('image')->sort('id','desc');
                },
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
            'data_class' => 'SoundGap\ContentAdminBundle\Document\CharacterPose',
        ));
    }

    public function getName()
    {
        return 'CharacterPose';
    }
}