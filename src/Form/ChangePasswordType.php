<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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
                'label' => 'mon Nom'
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
