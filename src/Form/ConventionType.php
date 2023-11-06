<?php

namespace App\Form;

use App\Entity\Convention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ConventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $isEdit = $options['is_edit'];

        $builder
            ->add('societe', null, [
                'label' => 'Société',
                'attr' => [
                    'class' => 'custom-css-class',
                ],
            ])
            ->add('adresse', null, [
                'label' => 'Adresse',
                'attr' => [
                    'class' => 'custom-css-class',
                ],
            ])
            ->add('email', null, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'custom-css-class',
                ],
            ])
            ->add('telephone', null, [
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'custom-css-class',
                ],
            ]);

        if ($isEdit) {
            $builder->add('status', ChoiceType::class, [
                'choices' => [
                    'convention déposée' => 'convention déposée',
                    'convention acceptée' => 'convention acceptée',
                    'convention refusé' => 'convention refusé',
                ],
                'label' => 'Catégorie',
                'required' => true,
                'placeholder' => 'Sélectionnez un status',
            ]);
        }

        $builder->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Convention::class,
            'is_edit' => false, // Default is_edit value is set to false
        ]);
    }
}
