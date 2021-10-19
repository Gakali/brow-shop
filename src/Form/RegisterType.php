<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class,[
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                    'minMessage' => 'Vous devez saisir au moins 2 caractères',
                    'maxMessage' => 'Vous devez saisir au maximum 30 caractères',
                ]),
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre prénom'
                ]
            ] )
            ->add('lastname', TextType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                    'minMessage' => 'Vous devez saisir au moins 2 caractères',
                    'maxMessage' => 'Vous devez saisir au maximum 30 caractères',
                ]),
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Merci de saisir le Nom '
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 30,
                    'minMessage' => 'Vous devez saisir au moins 2 caractères',
                    'maxMessage' => 'Vous devez saisir au maximum 30 caractères',
                ]),
                'label' => 'Votre email',
                'attr' => [
                    'placeholder' => 'Merci de saisir votre email'
                    ]
            ])
            ->add('password', RepeatedType::class,[
            'constraints' => new Length([
                'min' => 4,
                'max' => 30,
                'minMessage' => 'Vous devez saisir au moins 4 caractères',
                'maxMessage' => 'Vous devez saisir au maximum 30 caractères',
            ]),
            'type'=> PasswordType::class,
            'invalid_message' => ' les mots de passes doivent être identiques',
            'label' => 'Votre mot de passe ',
            'required' => true,
            'first_options' => ['label' =>'Mot de passe'],
            'second_options' => ['label' => 'Confirmez le mot de passe']])
            

             ->add ('submit', SubmitType::class ,[
                 'label' => 'S\'inscrire'
             ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
