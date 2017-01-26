<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class MedicalType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('medicalimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file2', 'file', array('required' => false))
            ->add('titlemedical', 'text', array(
                'label'=>'Titre de l\'astreinte médical',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: Medical 2017-01",
                    'class' => "zonenew"
                )))
            ->add('idmedical', 'text', array(
                'label'=>'ID de l\'astreinte médical',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: M0001",
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
            'data_class' => 'HopitalBundle\Entity\Medical'
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