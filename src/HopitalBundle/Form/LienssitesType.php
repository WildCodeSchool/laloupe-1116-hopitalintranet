<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LienssitesType extends AbstractType
{
    /**CODE AJOUTÉ
     /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sitechartres')

            ->add('file1', 'file', array('required' => false))
            ->add('sitenogent', 'text', array(
                'label'=>'URL du site Nogent'
            ))
            ->add('file2', 'file', array('required' => false))
            ->add('sitedreux', 'text', array(
                'label'=>'URL du site Dreux'
            ))
            ->add('file3', 'file', array('required' => false))
            ->add('sitebonneval', 'text', array(
                'label'=>'URL du site Bonneval'
            ))
            ->add('file4', 'file', array('required' => false))
            ->add('sitechateaudun', 'text', array(
                'label'=>'URL du site Chateaudun'
            ))
            ->add('file5', 'file', array('required' => false));
    }



    /**FIN CODE AJOUTÉ



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HopitalBundle\Entity\Lienssites'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_lienssites';
    }

}
