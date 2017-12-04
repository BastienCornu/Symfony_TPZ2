<?php
/**
 * Created by PhpStorm.
 * User: bastien.cornu
 * Date: 27/11/17
 * Time: 14:42
 */

namespace App\Form;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class PlayerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('roles')
            ->addEventListener(FormEvents::PRE_SET_DATA,
                array($this, 'onPreSetData'));


    }

    public function onPreSetData(FormEvent $event)
    {
        $player = $event->getData();
        $form = $event->getForm();

        if ($player->getId() !== null) {
            $form->remove('name');
            $form->remove('roles');
            $form->add('AjouterMoney',
                null,
                [
                    'mapped' => false,
                ]);
            $form->add('AjouterExperience',
                null,
                [
                    'mapped' => false,
                ]);
        }
        $form->add('submit',SubmitType::class);

    }
}