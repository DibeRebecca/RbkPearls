<?php

namespace App\Form;

use App\Entity\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxprix',IntegerType::class,
            [
                'label'=>false,
                'attr'=>
                ['placeholder'=>'budget maximal']
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method'=>'get',
            'csrf_protection'=>false,
        ]);
    }
    public function getBlockPrefix()
    
    {
        return '';
    }
}
