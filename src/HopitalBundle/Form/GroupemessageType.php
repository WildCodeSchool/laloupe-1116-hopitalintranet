<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GroupemessageType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('utilisateur', 'text', array(
                'required' => false,
                'attr' => array(
                    'placeholder' => "Si non renseigné, anonyme"
                )
            ))
            ->add('message', 'textarea', array(
                'attr' => array('class' => 'materialize-textarea')
            ))
            ->add('file', 'file', array('label' => 'Document du message', 'required' => false
            ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HopitalBundle\Entity\Groupemessage'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopitalbundle_documentation_groupemessage';
    }


}
