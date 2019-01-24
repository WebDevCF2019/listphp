<?php

namespace App\Form;

use App\Entity\Listephp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListephpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('thetitle',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('thedesc',TextType::class,['attr' => ['class' => 'form-control']])
            ->add('thetext',TextareaType::class,['attr' => ['class' => 'form-control']])
            ->add('thedate',DateTimeType::class,['attr' => ['class' => 'form-control']])
            ->add('userlistuserlist')
            ->add('linkphplinkphp')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Listephp::class,
        ]);
    }
}
