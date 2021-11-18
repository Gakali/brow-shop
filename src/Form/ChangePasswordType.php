<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'disabled' => true,
                'label' => 'Mon email'
            ])
            ->add('firstname',TextType::class, [
                'disabled' => true,
                'label' => 'Mon Nom'
            ])
            ->add('lastname',TextType::class, [
                'disabled' => true,
                'label' => 'Mon Prénom'
            ])
            ->add('old_password', PasswordType::class, [ 
                'label' => 'Mon mot de passe actuel',
                'mapped' => false,
                'attr' => [
                'placeholder' => 'Veuillez saisir votre mot de passe  ']
            ])
            ->add('new_password', RepeatedType::class,[
                
                'type'=> PasswordType::class,
                'mapped' => false,

                'invalid_message' => ' les mots de passes doivent être identiques',
                'label' => 'Mon mot de passe ',
                'required' => true,

                'first_options' => ['label' =>'Mot de passe',
                'attr' =>['placeholder' => 'Merci de saisir un mot de passe']],

                'second_options' => ['label' => 'Confirmez le mot de passe',
                'attr' =>['placeholder' => 'Confirmez le mot de passe']
                ]])
            ->add ('submit', SubmitType::class ,[
                    'label' => 'Confirmer'
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
