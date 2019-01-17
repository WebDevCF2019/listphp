<?php

namespace App\Form;

use App\Entity\Linkphp;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LinkphpType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('thetitle')
            ->add('thedesc')
            ->add('theurl')
            ->add('listephplistephp')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Linkphp::class,
        ]);
    }
}
