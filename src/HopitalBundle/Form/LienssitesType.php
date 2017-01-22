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
            ->add('sitechartres', 'text', array(
                    'label'=>'ID journaux')
            )
            ->add('file1', 'file', array('required' => false))
            ->add('sitenogent')
            ->add('file2', 'file', array('required' => false))
            ->add('sitedreux')
            ->add('file3', 'file', array('required' => false))
            ->add('sitebonneval')
            ->add('file4', 'file', array('required' => false))
            ->add('sitechateaudun')
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
