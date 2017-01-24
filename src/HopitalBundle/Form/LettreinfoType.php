<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class LettreinfoType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lettreinfoimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('titlelettreinfo', 'text', array(
                'label'=>'Titre de la lettre d\'information',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: Lettre d'information",
                    'class' => "zonenew"
                )))
            ->add('idlettreinfo', 'text', array(
                'label'=>'ID de la lettre d\'information',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: LI0001",
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
            'data_class' => 'HopitalBundle\Entity\Lettreinfo'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_lettreinfo';
    }
}