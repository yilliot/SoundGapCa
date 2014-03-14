<?php

namespace SoundGap\ContentAdminBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ODM\MongoDB\DocumentRepository;

class AddQuestType extends AbstractType
{
    public function __construct($schoolAppId) {
        $this->schoolAppId = $schoolAppId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $questionOptionImage = array(
            'class' => 'SoundGapContentAdminBundle:Asset',
            'empty_data' => null,
            'empty_value' => '',
            'query_builder' => function(DocumentRepository $dr)
            {
                return $dr->createQueryBuilder()
                    ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b7')
                    ->field('schoolApp.id')->equals($this->schoolAppId)
                    ->field('isDeleted')->notEqual(true)
                    ->sort('id','desc');
            },
        );

        $builder
            ->add('grade','document',array(
                'class' => 'SoundGapContentAdminBundle:Grade',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    $dm = $dr->getDocumentManager();
                    $categories = $dm->createQueryBuilder('SoundGapContentAdminBundle:Category')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->getQuery()->execute();
                    $categoriesIdArray = array();
                    foreach ($categories as $category) {
                        $categoriesIdArray[] = $category->getId();
                    }
                    return $dr->createQueryBuilder()
                        ->field('category.id')->in($categoriesIdArray)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','asc');
                },
            ))
            ->add('title')
            ->add('questCaption')
            ->add('questImage', 'document', array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b6')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('questAudio', 'document', array(
                'class' => 'SoundGapContentAdminBundle:Asset',
                'empty_data' => null,
                'empty_value' => '',
                'query_builder' => function(DocumentRepository $dr)
                {
                    return $dr->createQueryBuilder()
                        ->field('assetType.id')->equals('531a81ca0d9826ce5f0041b6')
                        ->field('schoolApp.id')->equals($this->schoolAppId)
                        ->field('isDeleted')->notEqual(true)
                        ->sort('id','desc');
                },
            ))
            ->add('option1Caption')
            ->add('option2Caption')
            ->add('option3Caption')
            ->add('option4Caption')
            ->add('option1Image', 'document', $questionOptionImage)
            ->add('option2Image', 'document', $questionOptionImage)
            ->add('option3Image', 'document', $questionOptionImage)
            ->add('option4Image', 'document', $questionOptionImage)
            ->add('priority','integer',array('empty_data'=>0,'required'=>true))
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
            'data_class' => 'SoundGap\ContentAdminBundle\Document\Quest',
        ));
    }

    public function getName()
    {
        return 'Quest';
    }
}