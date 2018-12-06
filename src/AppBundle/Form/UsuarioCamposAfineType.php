<?php

namespace AppBundle\Form;

use AppBundle\Entity\CamposAfines;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;

class UsuarioCamposAfineType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
//        $camposafines = new CamposAfines();
//        $builder-> add('camposafines', ChoiceType::class ,array('label'=>'Campos Afines:','choices'=>$camposafines->getDescripcion(),
//            'choices_as_values' => true,'multiple'=>true,'expanded'=>true
//        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\UsuarioCamposAfine'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_usuariocamposafine';
    }


}
