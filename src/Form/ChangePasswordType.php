<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
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
            ->add('password', PasswordType::class, [ 
                'label' => 'Mon mot de passe actuel',
                'attr' => [
                'placeholder' => 'Veuillez saisir un nouveau mot de passe ']
            ])
            ->add('new_password', RepeatedType::class,[
                // 'constraints' => new Length([
                //     'min' => 4,
                //     'max' => 30,
                //     'minMessage' => 'Vous devez saisir au moins 4 caractères',
                //     'maxMessage' => 'Vous devez saisir au maximum 30 caractères',
                // ]),
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

                
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
