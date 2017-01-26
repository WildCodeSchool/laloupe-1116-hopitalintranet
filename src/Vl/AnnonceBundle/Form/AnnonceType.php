<?php

namespace Vl\AnnonceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zoneannonce"
                )))
            ->add('description', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zoneannoncedesc"
                )))
            ->add('auteur', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zoneannonce"
                )))
            ->add('file', 'file', array('label' => 'Image annonce', 'required' => false))
            ->add('prix')        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vl\AnnonceBundle\Entity\Annonce'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vl_annoncebundle_annonce';
    }


}
