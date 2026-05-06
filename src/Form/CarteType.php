<?php

namespace App\Form;
use App\Entity\Carte;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
class CarteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            // TYPE CARTE
            ->add('typeCarte', ChoiceType::class, [
                'choices' => [
                    'Silver' => 'SILVER',
                    'Gold' => 'GOLD',
                    'Platinum' => 'PLATINUM',
                ],
                'placeholder' => '-- Select Type ---',
                'required' => true,
                'label' => 'Type de carte',
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'typeCarte'
                ]
            ])

            // ADRESSE
            ->add('adresse', TextType::class, [
                'label' => 'Adresse de livraison',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'adresse',
                    'placeholder' => 'Entrer votre adresse'
                ]
            ])

            // MONTANT
            ->add('solde', NumberType::class, [
                'label' => 'Montant initial',
                'required' => true,
                'attr' => [
                    'class' => 'form-control',
                    'id' => 'montant',
                    'min' => 0
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carte::class,
        ]);
    }
}