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
            ->add('menu1img')
            ->add('file1', 'file', array('required' => false))
            ->add('menu2img')
            ->add('file2', 'file', array('required' => false))
            ->add('menu3img')
            ->add('file3', 'file', array('required' => false))
            ->add('menu4img')
            ->add('file4', 'file', array('required' => false))
            ->add('menuimgrempl')
            ->add('file5', 'file', array('required' => false))
            ->add('titlemenu1')
            ->add('titlemenu2')
            ->add('titlemenu3')
            ->add('titlemenu4')
            ->add('titlemenurempl')
            ->add('idmenu1')
            ->add('idmenu2')
            ->add('idmenu3')
            ->add('idmenu4')
            ->add('idmenurempl');
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
