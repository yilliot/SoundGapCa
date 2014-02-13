<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddQuestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $imageOptions = array(
            'class' => 'SoundGapContentAdminBundle:Media',
            'property' => 'name',
            'empty_value' => 'Choose an option',
            'required' => false,
            'query_builder' => function(DocumentRepository $dr) {
                return $dr->createQueryBuilder()->field('type')->equals('image')->sort('id','desc');
            },
        );

        $builder
            ->add('isForChallenge', 'checkbox', array('required' => false))
            ->add('questCaption')
            ->add('questImage', 'document', $imageOptions)
            ->add('questAudio', 'document', $imageOptions)
            ->add('option1Image', 'document', $imageOptions)
            ->add('option2Image', 'document', $imageOptions)
            ->add('option3Image', 'document', $imageOptions)
            ->add('option4Image', 'document', $imageOptions)
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