<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('menu1img', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('menu2img', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file2', 'file', array('required' => false))
            ->add('menu3img', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file3', 'file', array('required' => false))
            ->add('menu4img', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file4', 'file', array('required' => false))
            ->add('menuimgrempl', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file5', 'file', array('required' => false))
            ->add('titlemenu1', 'text', array(
                'label'=>'Titre menu 1',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('titlemenu2', 'text', array(
                'label'=>'Titre menu 2',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('titlemenu3', 'text', array(
                'label'=>'Titre menu 3',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('titlemenu4', 'text', array(
                'label'=>'Titre menu 4',
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('titlemenurempl', 'text', array(
                'label'=>'Titre de menu de remplacement',
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
            'data_class' => 'HopitalBundle\Entity\Menu'
        ));
    }


    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_menu';
    }

}
