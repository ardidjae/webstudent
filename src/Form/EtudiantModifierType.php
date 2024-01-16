<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EtudiantModifierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, array('label' => 'Nom'))
            ->add('prenom', TextType::class, array('label' => 'Prenom'))
            ->add('dateNaiss', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('ville', TextType::class, array('label' => 'Ville'))
            ->add('rue', TextType::class, array('label' => 'Rue'))
            ->add('copos', TextType::class, array('label' => 'Code Postal'))
            ->add('surnom', TextType::class, array('label' => 'Surnom'))
            ->add('baguette', EntityType::class, array('class' => 'App\Entity\Baguette','choice_label' => 'nom' ))
            ->add('promotion', EntityType::class, array('class' => 'App\Entity\Promotion','choice_label' => 'code' ))
            ->add('maison', EntityType::class, array('class' => 'App\Entity\Maison','choice_label' => 'nom' ))
            ->add('enregistrer', SubmitType::class, array('label' => 'Modifier étudiant'))
        ;
    }

    public function getParent(){
        return EtudiantType::class;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
