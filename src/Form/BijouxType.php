<?php

namespace App\Form;

use App\Entity\Bijoux;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class BijouxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('prix')
            ->add('categorie')
            ->add('quantite')
            ->add('description')
            ->add('etat',ChoiceType::class,
            ['choices'=>$this->getChoices()])
            ->add('image', FileType::class,array('data_class' => null), [
                'label' => 'Choisir une image ',
                   ])
            
               ;
        

           }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bijoux::class,
        ]);
    }
    public function getChoices(){
        $choices=Bijoux::ETAT;
        $ouput=[];
        foreach($choices as $k=>$v){
            $ouput[$v]=$k;
        }
        return $ouput;
    }
}
