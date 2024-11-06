<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Votre nom(s)',
                'attr' => [
                    'placeholder' => 'Votre nom(s)*',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => "Votre e-mail",
                'attr' => [
                    'placeholder' => 'Votre e-mail*',
                ],
                'constraints' => [
                    new Email()
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Téléphone*',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Sujet',
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Sujet*',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ])
            ->add('message', TextareaType::class, [
                'mapped' => false,
                'attr' => [
                    'placeholder' => 'Ecrivez votre message*',
                    'class' => 'focus textarea-style-1',
                ],
                'constraints' => [
                    new NotBlank()
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            #'data_class' => User::class,
        ]);
    }
}
