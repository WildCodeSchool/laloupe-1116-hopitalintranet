<?php

namespace Vl\AgendaBundle\Form;

use Vl\AgendaBundle\Form\ImagesType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType ;

class EventsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('start', 'datetime' , array(
                'minutes' => range(0, 30, 30),
                //  'model_timezone' => 'Europe/Paris'
            ))
            ->add('end', 'datetime' , array(
                'minutes' => range(0, 30, 30),
                //   'model_timezone' => 'Europe/Paris'
            ))
            ->add('titre')
            ->add('contenu', 'textarea')
            ->add('images', ImagesType::class, array(
                'label' => 'Image de l\'évènement'
            ))
            ->add('addHomeActu', CheckboxType::class, array(
                'required' => false
            ))
            ->add('salle', choiceType :: class, array(
                'choices' => array(
                    'Salles' => array(
                        'Sélectionnez' => null,
                        'Salle de réunion' => 'Salle de réunion',
                        'Restaurant du personnel' => 'Restaurant du personnel',
                        'Cuisine Thérapeutique' => 'Cuisine Thérapeutique',
                        'Restaurant C.P.' => 'Restaurant C.P.',
                        'Restaurant O.B.' => 'Restaurant O.B.',
                        'CAJA' => 'CAJA',
                        'PASA' => 'PASA',
                    ),
                ),
                'choices_as_values' => true,
            ))
            ->add('voiture', choiceType :: class, array(
                'choices' => array(
                    'Voitures' => array(
                        'Sélectionnez' => null,
                        'Clio' => 'Clio',
                        '407' => '407',
                        'Voiture du SIAD' => 'Voiture du SIAD',
                        'Boxer' => 'Boxer',
                        'Mini-bus' => 'Mini-bus',
                    ),
                ),
                'choices_as_values' => true,

            ))
            ->add('evenement', choiceType :: class, array(
                'choices' => array(
                    'Évènements' => array(
                        'Sélectionnez' => null,
                        'Instances' => 'Instances',
                        'Animations' => 'Animations',
                        'Interventions techniques' => 'Interventions techniques',
                        'Interventions extérieures' => 'Interventions extérieures',
                        'Cérémonies' => 'Cérémonies',
                        'Autres' => 'Autres',
                    ),
                ),
                'choices_as_values' => true,

            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Vl\AgendaBundle\Entity\Events'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'vl_agendabundle_events';
    }


}
