<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BulletinoffType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bulletinofftitle' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('bulletinoffdescription' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('bulletinoffimg' , 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('bulletinoffurl' , 'text', array(
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
            'data_class' => 'HopitalBundle\Entity\Bulletinoff'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_bulletinoff';
    }

}
