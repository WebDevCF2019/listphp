<?php

namespace App\Form;

use App\Entity\Listephp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ListephpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('thetitle')
            ->add('thedesc')
            ->add('thetext')
            ->add('thedate')
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
