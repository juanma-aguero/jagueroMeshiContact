<?php

namespace Jaguero\MeshiContactBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('name')
            ->add('yourName')
            ->add('yourEmail')
            ->add('subject')
            ->add('yourMessage')
            ->add('redirectUrl')
            ->add('toEmail')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jaguero\MeshiContactBundle\Entity\ContactForm',
            'translation_domain' => 'ContactForm',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'contactform';
    }
}
