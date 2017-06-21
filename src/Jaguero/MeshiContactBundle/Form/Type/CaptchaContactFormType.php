<?php

namespace Jaguero\MeshiContactBundle\Form\Type;

use EWZ\Bundle\RecaptchaBundle\Form\Type\EWZRecaptchaType;
use EWZ\Bundle\RecaptchaBundle\Validator\Constraints\IsTrue as RecaptchaTrue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CaptchaContactFormType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('yourName', TextType::class)
            ->add('yourEmail', EmailType::class)
            ->add('subject', TextType::class)
            ->add('yourMessage', TextareaType::class)
            ->add('send', SubmitType::class, array(
                'attr' => array(
                    'class' => 'btn btn-lg btn-special btn-inversed',
                )
            ))
            ->add('recaptcha', EWZRecaptchaType::class, [
                'required' => true,
                'mapped' => false,
                'constraints' => array(
                    new RecaptchaTrue
                ),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Jaguero\MeshiContactBundle\Entity\ContactFormData',
            'translation_domain' => 'JagueroMeshiContact',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'contactformdata';
    }
}
