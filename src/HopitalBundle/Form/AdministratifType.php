<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class AdministratifType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('administratifimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('titleadministratif', 'text', array(
                'label'=>'Titre astreinte administratif',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: Administratif 2017-01",
                    'class' => "zonenew"
                )))
            ->add('idadministratif', 'text', array(
                'label'=>'ID de astreinte administratif',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: A0001",
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
            'data_class' => 'HopitalBundle\Entity\Administratif'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_astreintes';
    }
}