<?php
namespace HopitalBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
class NoteserviceType extends AbstractType
{
    /**CODE AJOUTÉ
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('noteserviceimg', 'text', array(
                'required' => false,
                'attr' => array(
                        'class' => "zonenew"
                )))
            ->add('file1', 'file', array('required' => false))
            ->add('titlenoteservice', 'text', array(
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: Note de service 2017-01",
                    'class' => "zonenew"
                )))
            ->add('idnoteservice', 'text', array(
                'required' => false,
                'attr' => array(
                    'placeholder' => "ex: NS0001",
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
            'data_class' => 'HopitalBundle\Entity\Noteservice'
        ));
    }
    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'hopital_noteservice';
    }
}