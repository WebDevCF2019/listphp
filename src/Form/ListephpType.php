<?php

namespace App\Form;

use App\Entity\Linkphp;
use App\Entity\Listephp;
use App\Entity\Userlist;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
            ->add('userlistuserlist',EntityType::class,['class' => Userlist::class,'choice_label' => 'thelogin'])
            ->add('linkphplinkphp',EntityType::class,['class'=>Linkphp::class,'choice_label' => 'thetitle','expanded' => true,'multiple'=>true])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Listephp::class,
        ]);
    }
}
