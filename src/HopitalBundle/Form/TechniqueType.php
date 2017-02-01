<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class TechniqueType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('techniqueimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file4', 'file', array('required' => false))
            ->add('titletechnique', 'text', array(
                'label'=>'Titre de l\'astreinte technique',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: Technique 2017-01",
                    'class' => "zonenew"
                )))
            ->add('idtechnique', 'text', array(
                'label'=>'ID de l\'astreinte technique',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: T0001",
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
            'data_class' => 'HopitalBundle\Entity\Technique'
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