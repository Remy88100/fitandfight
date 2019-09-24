<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Captcha\Bundle\CaptchaBundle\Form\Type\CaptchaType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre nom...']
            ])
            ->add('prenom', TextType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre prénom...']
            ])
            ->add('adresse', TextType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre adresse...']
            ])
            ->add('postalcode', NumberType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre code postal...']
            ])
            ->add('ville', TextType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre ville...']
            ])
            ->add('birthday', BirthdayType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre date de naissance...']
            ])
            ->add('email', EmailType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre mail...']
            ])
            ->add('phone', TelType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre téléphone...']
            ])
            ->add('message', TextareaType::class, [
                'attr' => [ 'placeholder' => 'Entrer votre message...',
                            'rows' => 8
                            ]
            ]);
            // ->add('captchaCode', CaptchaType::class, array (
            //     'captchaConfig' => 'ContactCaptcha',
                
            // ))
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
            'translation_domain' => 'form'
        ]);
    }


}
