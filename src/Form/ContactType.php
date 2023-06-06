<?php

namespace App\Form;

use App\Entity\Evenements;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, [
                "mapped"=>false
            ])
            ->add('prenom', null, [
                "mapped"=>false
            ])
            ->add('email', null, [
                "mapped"=>false
            ])
            ->add('telephone', null, [
                "mapped"=>false
            ])
            ->add('date')
            ->add('ville')
            ->add('invite')
            ->add('destination')
            ->add('prestation')
            ->add('budget')
            ->add('precisions')


        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
