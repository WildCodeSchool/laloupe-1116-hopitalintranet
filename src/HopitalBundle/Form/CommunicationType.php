<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class CommunicationType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('directionimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('titledirection', 'text', array(
                'label'=>'Titre de la direction',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: Direction commune 2017-01",
                    'class' => "zonenew"
                )))
            ->add('iddirection', 'text', array(
                'label'=>'ID de la direction',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: D0001",
                    'class' => "zonenew"
                )))

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
                )))

            ->add('lettreinfoimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file3', 'file', array('required' => false))
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
                )))

            ->add('articlesimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file4', 'file', array('required' => false))
            ->add('titlearticles', 'text', array(
                'label'=>'Titre de l\'article de presse',
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: Article 2017-01",
                    'class' => "zonenew"
                )))
            ->add('idarticles', 'text', array(
                'label'=>'ID de l\'article de presse',
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
            'data_class' => 'HopitalBundle\Entity\Communication'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_direction';
    }
}