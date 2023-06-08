<?php

namespace App\Form;

use App\Entity\Evenements;
use App\Entity\Utilisateurs;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('date', DateType::class,[
                'html5' => true,
                'widget' => 'single_text',
            ])
            ->add('ville')
            ->add('invite')
            ->add('destination', ChoiceType::class,[
                'choices' => [
                    'Rhône-Alpes' => 'Rhône-Alpes',
                    'Loire' => 'Loire',
                    'Isère' => 'Isère',
                    'Drôme' => 'Drôme'
                ],
                'multiple' => false
            ])
            ->add('prestation', ChoiceType::class,[
                'choices' => [
                    'Prestation 1' => 'Prestation 1',
                    'Prestation 2' => 'Prestation 2',
                    'Prestation 3' => 'Prestation 3'
                ],
                'multiple' => false
            ])
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
