<?php

namespace App\Form;
use App\Entity\Bijoux;
use App\Entity\Commande;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateCommande')
            ->add('codeCommande')
            ->add('nomsClient')
            ->add('bijoux', EntityType::class, [
          // looks for choices from this entity
                  'class' => Bijoux::class,

          // uses the User.username property as the visible option string
            'choice_label' => 'libelle',

          // used to render a select box, check boxes or radios
          // 'multiple' => true,
          // 'expanded' => true,
      ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
