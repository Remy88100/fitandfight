<?php

namespace App\Form;

use App\Entity\Member;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MemberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('username')
            ->add('adress')
            ->add('postalcode',NumberType::class)
            ->add('ville')
            ->add('phone',TelType::class)
            ->add('email')
            ->add('birthday',BirthdayType::class)
            ->add('doctor_name')
            ->add('doctor_adress')
            ->add('doctor_phone',TelType::class)
            ->add('emergency_people')
            ->add('emergency_phone',TelType::class)
            ->add('medical_agreement')
            ->add('blood_group')
            ->add('allergy')
            ->add('pictures_agreement')
            ->add('pack_choice', ChoiceType::class, [
                'choices'=> $this->getChoices()
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Member::class,
            'translation_domain' => 'form'
        ]);
        
    }
    public function getChoices()
    {
        $choices = Member::Pack;
        $output = [];

        foreach ($choices as $key =>$value)
        {
            $output[$value] = $key;
        }

        return $output;
    }
}
