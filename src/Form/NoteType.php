<?php

namespace App\Form;

use App\Entity\Note;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class NoteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateNote', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
                 ])
            ->add('note', TextType::class)
            ->add('etudiant', EntityType::class, array('class' => 'App\Entity\Etudiant','choice_label' => 'nom' ))
            ->add('competence', EntityType::class, array('class' => 'App\Entity\Competence','choice_label' => 'libelle' ))
            ->add('matiere', EntityType::class, array('class' => 'App\Entity\Matiere','choice_label' => 'libelle' ))
            ->add('enregistrer', SubmitType::class, array('label' => 'Nouvel Note'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Note::class,
        ]);
    }
}
