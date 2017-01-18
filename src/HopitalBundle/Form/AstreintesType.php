<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AstreintesType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('administratifimg')
            ->add('file1', 'file', array('required' => false))
            ->add('medicalimg')
            ->add('file2', 'file', array('required' => false))
            ->add('communeimg')
            ->add('file3', 'file', array('required' => false))
            ->add('techniqueimg')
            ->add('file4', 'file', array('required' => false))
            ->add('titleadministratif')
            ->add('titlemedical')
            ->add('titlecommune')
            ->add('titletechnique');
    }

    /**FIN CODE AJOUTÉ



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HopitalBundle\Entity\Astreintes'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_astreintes';
    }

}
