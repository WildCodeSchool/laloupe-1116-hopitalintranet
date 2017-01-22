<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class ArticlesType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('articlesimg', 'text', array(
                'required' => false,
                'attr' => array(
                    'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
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
            'data_class' => 'HopitalBundle\Entity\Articles'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_articles';
    }
}