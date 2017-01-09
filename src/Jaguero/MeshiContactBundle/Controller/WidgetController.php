<?php

namespace Jaguero\MeshiContactBundle\Controller;

use Jaguero\MeshiContactBundle\Entity\ContactFormData;
use Jaguero\MeshiContactBundle\Form\Type\StandardContactFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Jaguero\MeshiContactBundle\Entity\ContactForm;
use Jaguero\MeshiContactBundle\Form\Type\ContactFormType;
use Doctrine\ORM\QueryBuilder;

/**
 * ContactForm controller.
 */
class WidgetController extends Controller
{

    /**
     * Finds and displays a ContactForm entity.
     * @Template()
     */
    public function defaultAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $contactFormConfig = $em->getRepository('JagueroMeshiContactBundle:ContactForm')->findOneBy(array(
            'name' => $name,
        ));

        $contactForm = new ContactFormData();

        $form = $this->createForm(new StandardContactFormType(), $contactForm, array(
            'action' => $this->generateUrl('meshi_contactform_send', array('id' => $contactFormConfig->getId())),
            'method' => 'POST',
        ));


        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a new ContactForm entity.
     *
     * @Route("/contact/form/{id}", name="meshi_contactform_send")
     * @Method("POST")
     * @Template("JagueroMeshiContactBundle:ContactForm:new.html.twig")
     */
    public function createAction(Request $request, ContactForm $config)
    {

        $contactForm = new ContactFormData();
        $form = $this->createForm(new StandardContactFormType(), $contactForm);
        if ($form->handleRequest($request)->isValid()) {

            //$this->addFlash('success', 'Mensaje enviado, ¡Gracias!');

            $message = \Swift_Message::newInstance()
                ->setSubject($contactForm->getSubject())
                ->setFrom($contactForm->getYourEmail())
                ->setTo($config->getToEmail())
                ->setBody(
                    $this->renderView(
                        'JagueroMeshiContactBundle:Email:contact.html.twig',
                        array(
                            'contact' => $contactForm
                        )
                    ), 'text/html');
            $this->get('mailer')->send($message);

            return $this->redirect($config->getRedirectUrl());
        }

        return array(
            'form' => $form->createView(),
        );
    }

}
