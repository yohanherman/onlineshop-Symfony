<?php

namespace App\Form;

use App\Entity\Reviews;
use App\Entity\vins;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReviewsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('commentaires')
            ->add('vins', EntityType::class, [
                'class' => vins::class,
                'choice_label' => 'id',

            ])

            ->add('user', EntityType::class, [
                'class' => User::class,
                'choice_label' => 'id',
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reviews::class,
        ]);
    }
}
