<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class GhtType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ghtimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file2', 'file', array('required' => false))
            ->add('titleght', 'text', array(
                'label'=>'Titre GHT',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: GHT 2017-01",
                    'class' => "zonenew"
                )))
            ->add('idght', 'text', array(
                'label'=>'ID GHT',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: G0001",
                    'class' => "zonenew"
                )
            ));
    }
    /**FIN CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'HopitalBundle\Entity\Ght'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_ght';
    }
}