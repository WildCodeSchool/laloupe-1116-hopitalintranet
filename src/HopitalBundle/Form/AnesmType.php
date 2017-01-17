<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnesmType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('anesmimg')
            ->add('file1', 'file', array('required' => false));
    }

    /**FIN CODE AJOUTÉ

     *
     *

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HopitalBundle\Entity\Anesm'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_anesm';
    }

}
