<?php

namespace App\Form;

use App\Entity\Menu;
use App\Entity\Restauration;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\ChoiceList\ChoiceList;

class MenuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder


            ->add('cafe', EntityType::class, [
                'class'     => 'App:Cafe',
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $repo) {
                    return $repo->createQueryBuilder('f')
                        ->where('f.id > :id')
                        ->setParameter('id', 1);
                },
                'label'     => 'Who is Cafe?',
                'expanded'  => true,
                'multiple'  => true,
            ])

        ->add('plat', EntityType::class, [
        'class'     => 'App:Plat',
        'choice_label' => 'name',
        'query_builder' => function (EntityRepository $repo) {
            return $repo->createQueryBuilder('f')
                ->where('f.id > :id')
                ->setParameter('id', 1);
        },
        'label'     => 'Who is Plat?',
        'expanded'  => true,
        'multiple'  => true,
    ])
            ->add('boissons', EntityType::class, [
                'class'     => 'App:Boissons',
                'choice_label' => 'name',
                'query_builder' => function (EntityRepository $repo) {
                    return $repo->createQueryBuilder('f')
                        ->where('f.id > :id')
                        ->setParameter('id', 1);
                },
                'label'     => 'Who is fBoissons?',
                'expanded'  => true,
                'multiple'  => true,
            ])

       ->add('restauration',EntityType::class,array(
            'class' => 'App:Restauration',
            'multiple'=>false,
            'choice_label'=>'nom'
        ));


    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Menu::class,
        ]);
    }
}
