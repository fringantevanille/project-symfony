<?php

namespace Troiswa\BackBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ActeurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("prenom","text")
            ->add("nom","text")
            ->add("sexe","choice" , array(
                "choices" => array(
                    0 => 'homme', 1 => 'femme'),
                "expanded"=>true) )
            ->add("biographie","textarea")
            ->add("dateNaissance","date")
            ->add("signe_astro","text")
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Troiswa\BackBundle\Entity\Acteur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'troiswa_backbundle_acteur';
    }
}
