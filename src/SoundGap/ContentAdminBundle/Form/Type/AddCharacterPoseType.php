<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddCharacterPoseType extends AbstractType
{
    public function __construct($schoolAppId) {
        $this->schoolAppId = $schoolAppId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pose')
            ->add('character','document',array(
                'class' => 'SoundGapContentAdminBundle:Character',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('image','document',array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b5')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
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