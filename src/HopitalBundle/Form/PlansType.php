<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlansType extends AbstractType
{
    /**CODE AJOUTÉ
     /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('plansglobal')
            ->add('file1', 'file', array('required' => false))
            ->add('plansbatarc')
            ->add('file2', 'file', array('required' => false))
            ->add('plansbatae')
            ->add('file3', 'file', array('required' => false))
            ->add('plansbatbrj')
            ->add('file4', 'file', array('required' => false))
            ->add('plansbatbrc')
            ->add('file5', 'file', array('required' => false))
            ->add('plansbatbe')
            ->add('file6', 'file', array('required' => false));
    }

    /**FIN CODE AJOUTÉ



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HopitalBundle\Entity\Plans'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {

        return 'hopitalbundle_plans';

    }



}
