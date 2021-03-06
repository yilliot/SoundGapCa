<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddStationType extends AbstractType
{
    public function __construct($schoolAppId) {
        return $this->schoolAppId = $schoolAppId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('title')
            ->add('title2')
            ->add('buttonTitle')
            ->add('buttonTitle2')
            ->add('buttonImage','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b2')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('lessonAppetizer','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b3')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('lessonObjective','textarea')
            ->add('examPassRatePercentage')
            ->add('examEmitCount')
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
            'data_class' => 'SoundGap\ContentAdminBundle\Document\Station',
        ));
    }

    public function getName()
    {
        return 'Station';
    }
}