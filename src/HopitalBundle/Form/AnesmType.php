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
            ->add('anesmtitle' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('anesmdescription' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('anesmimg' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('anesmurl' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )));
    }

    /**FIN CODE AJOUTÉ



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
