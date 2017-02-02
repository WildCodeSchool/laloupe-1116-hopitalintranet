<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PagesjaunesType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pagesjaunestitle' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('pagesjaunesdescription' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('pagesjaunesimg' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('pagesjaunesurl', 'text', array(
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
            'data_class' => 'HopitalBundle\Entity\Pagesjaunes'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_pagesjaunes';
    }

}
