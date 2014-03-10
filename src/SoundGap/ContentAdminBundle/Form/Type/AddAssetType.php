<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddAssetType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('AssetType','document',array(
                'class' => 'SoundGapContentAdminBundle:AssetType',
            ))
            ->add('attachment','file');
        if (!isset($options['data'])) {
            $builder->add('create','submit',array('attr'=>array('class'=>'btn btn-primary pull-right')));
        } else {
            $builder->add('save','submit',array('attr'=>array('class'=>'btn btn-warning pull-right')));
        }
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SoundGap\ContentAdminBundle\Document\Asset',
        ));
    }

    public function getName()
    {
        return 'Asset';
    }
}