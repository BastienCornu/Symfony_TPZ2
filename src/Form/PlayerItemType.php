<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 15:20
 */

namespace App\Form;


use App\Entity\PlayerItem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayerItemType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('data_class' => PlayerItem::class,
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('player')
            ->add('item')
            ->add('position', IntegerType::class)
            ->add('created_at', DateType::class)
            ->add('save', SubmitType::class,array('label'=>"Créer"))
            ->getForm();
    }
}