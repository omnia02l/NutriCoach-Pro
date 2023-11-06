<?php

namespace App\Form;

use App\Entity\Offre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Convention;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nomDuSoin', null, [
                'label' => 'Nom Du Soin',
            ])
            ->add('categorie', ChoiceType::class, [
                'choices' => [
                    'Soin 1' => 'soin_1',
                    'Soin 2' => 'soin_2',
                    'Soin 3' => 'soin_3',
                ],
                'label' => 'Catégorie',
                'required' => true,
                'placeholder' => 'Sélectionnez une catégorie',
            ])
            ->add('prix', null, [
                'label' => 'Prix',
            ])
            ->add('dateDebut', null, [
                'widget' => 'single_text',
                'data' => $options['is_edit'] ? $options['data']->getDateDebut() : new \DateTime(),
            ])
            ->add('dateFin', null, [
                'widget' => 'single_text',
                'data' => $options['is_edit'] ? $options['data']->getDateFin() : new \DateTime(),
            ])
            ->add('image', FileType::class, [
                'label' => 'Image',
                'mapped' => false,
                'required' => false,

            ])            
            ->add('convention', EntityType::class, [
                'class' => Convention::class,
                'choice_label' => 'societe',
                'label' => 'Societe',
                'placeholder' => 'Sélectionner une Societe',
                'required' => true,
            ])
            ->add('save', SubmitType::class);
    
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offre::class,
            'is_edit' => false,
        ]);
    }
}
