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

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('dateNaiss', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                 ])
            ->add('ville', TextType::class)
            ->add('rue', TextType::class)
            ->add('copos', TextType::class)
            ->add('surnom', TextType::class)
            ->add('baguette', EntityType::class, array('class' => 'App\Entity\Baguette','choice_label' => 'nom' ))
            ->add('promotion', EntityType::class, array('class' => 'App\Entity\Promotion','choice_label' => 'code' ))
            ->add('maison', EntityType::class, array('class' => 'App\Entity\Maison','choice_label' => 'nom' ))
            ->add('enregistrer', SubmitType::class, array('label' => 'Nouvel étudiant'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
