<?php

namespace HopitalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccueilType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bluemedititle')
            ->add('bluemediurl')
            ->add('viatrajectoirtitle')
            ->add('viatrajectoirurl')
            ->add('vidaltitle')
            ->add('vidalurl')
            ->add('dgstitle')
            ->add('dgsurl')
            ->add('dgstitle')
            ->add('meteourl')
            ->add('actuurl')
            ->add('actuparam');
    }

    /**FIN CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HopitalBundle\Entity\Accueil'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopitalbundle_accueil';
    }


}
