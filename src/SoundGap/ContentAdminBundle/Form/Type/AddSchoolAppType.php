<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddSchoolAppType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('school','document',array(
                'empty_data' => null,
                'empty_value' => '',
                'class' => 'SoundGapContentAdminBundle:School',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()->sort('id','desc');
                },
            ))
            ->add('app','document',array(
                'empty_data' => null,
                'empty_value' => '',
                'class' => 'SoundGapContentAdminBundle:App',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()->sort('id','desc');
                },
            ))
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