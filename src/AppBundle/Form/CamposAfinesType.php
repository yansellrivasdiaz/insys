<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CamposAfinesType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('descripcion', TextType::class, array(
                'label'=>'Descripción',
                'attr'=>array(
                    'class'=>'form-control form-control-sm',
                    'placeholder'=> 'Descripción...')))
            ->add('Guardar',SubmitType::class,array('attr'  => array('class' => 'btn btn-primary btn-sm float-right')))
            ->add('Limpiar',ResetType::class,array('attr'  => array('class' => 'btn btn-warning btn-sm float-right')));
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\CamposAfines','csrf_protection'=>false
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_camposafines';
    }


}
