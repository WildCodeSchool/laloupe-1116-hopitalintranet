<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JournaloffType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('journalofftitle' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('journaloffdescription' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('journaloffimg' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('journaloffurl' , 'text', array(
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
            'data_class' => 'HopitalBundle\Entity\Journaloff'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_journaloff';
    }

}
