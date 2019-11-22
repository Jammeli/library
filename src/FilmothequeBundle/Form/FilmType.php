<?php

namespace FilmothequeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FilmType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre')
        ->add('description')
        ->add('categorie', EntityType::class, array( 
            'class' => 'FilmothequeBundle:Categorie',
            'choice_label' => 'nom'
        ))
        ->add('acteurs', EntityType::class, array( 
            'class' => 'FilmothequeBundle:Acteur',
            'choice_label' => 'nom',
            'multiple' => 'true'
        ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FilmothequeBundle\Entity\Film'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'filmothequebundle_film';
    }


}
