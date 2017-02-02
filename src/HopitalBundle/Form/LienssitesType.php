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
                'label'=>'URL du site Chartres',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))

            ->add('sitenogent', 'text', array(
                'label'=>'URL du site Nogent',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file2', 'file', array('required' => false))

            ->add('sitedreux', 'text', array(
                'label'=>'URL du site Dreux',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file3', 'file', array('required' => false))

            ->add('sitebonneval', 'text', array(
                'label'=>'URL du site Bonneval',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file4', 'file', array('required' => false))
            ->add('sitechateaudun', 'text', array(
                'label'=>'URL du site Chateaudun',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
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
