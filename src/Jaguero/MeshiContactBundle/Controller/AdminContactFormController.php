<?php

namespace Jaguero\MeshiContactBundle\Controller;

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
 *
 * @Route("/admin/contactform")
 */
class AdminContactFormController extends Controller
{
    /**
     * Lists all ContactForm entities.
     *
     * @Route("/", name="admin_contactform")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->getRepository('JagueroMeshiContactBundle:ContactForm')->createQueryBuilder('c');
        $paginator = $this->get('knp_paginator')->paginate($qb, $request->query->get('page', 1), 20);
        return array(
            'paginator' => $paginator,
        );
    }

    /**
     * Finds and displays a ContactForm entity.
     *
     * @Route("/{id}/show", name="admin_contactform_show", requirements={"id"="\d+"})
     * @Method("GET")
     * @Template()
     */
    public function showAction(ContactForm $contactform)
    {
        $editForm = $this->createForm(new ContactFormType(), $contactform, array(
            'action' => $this->generateUrl('admin_contactform_update', array('id' => $contactform->getid())),
            'method' => 'PUT',
        ));
        $deleteForm = $this->createDeleteForm($contactform->getId(), 'admin_contactform_delete');

        return array(

            'contactform' => $contactform, 'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),

        );
    }

    /**
     * Displays a form to create a new ContactForm entity.
     *
     * @Route("/new", name="admin_contactform_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $contactform = new ContactForm();
        $form = $this->createForm(new ContactFormType(), $contactform);

        return array(
            'contactform' => $contactform,
            'form' => $form->createView(),
        );
    }

    /**
     * Creates a new ContactForm entity.
     *
     * @Route("/create", name="admin_contactform_create")
     * @Method("POST")
     * @Template("JagueroMeshiContactBundle:ContactForm:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $contactform = new ContactForm();
        $form = $this->createForm(new ContactFormType(), $contactform);
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contactform);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_contactform_show', array('id' => $contactform->getId())));
        }

        return array(
            'contactform' => $contactform,
            'form' => $form->createView(),
        );
    }

    /**
     * Edits an existing ContactForm entity.
     *
     * @Route("/{id}/update", name="admin_contactform_update", requirements={"id"="\d+"})
     * @Method("PUT")
     * @Template("JagueroMeshiContactBundle:ContactForm:edit.html.twig")
     */
    public function updateAction(ContactForm $contactform, Request $request)
    {
        $editForm = $this->createForm(new ContactFormType(), $contactform, array(
            'action' => $this->generateUrl('admin_contactform_update', array('id' => $contactform->getid())),
            'method' => 'PUT',
        ));
        if ($editForm->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirect($this->generateUrl('admin_contactform_show', array('id' => $contactform->getId())));
        }
        $deleteForm = $this->createDeleteForm($contactform->getId(), 'admin_contactform_delete');

        return array(
            'contactform' => $contactform,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a ContactForm entity.
     *
     * @Route("/{id}/delete", name="admin_contactform_delete", requirements={"id"="\d+"})
     * @Method("DELETE")
     */
    public function deleteAction(ContactForm $contactform, Request $request)
    {
        $form = $this->createDeleteForm($contactform->getId(), 'admin_contactform_delete');
        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contactform);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_contactform'));
    }

    /**
     * Create Delete form
     *
     * @param integer $id
     * @param string $route
     * @return \Symfony\Component\Form\Form
     */
    protected function createDeleteForm($id, $route)
    {
        return $this->createFormBuilder(null, array('attr' => array('id' => 'delete')))
            ->setAction($this->generateUrl($route, array('id' => $id)))
            ->setMethod('DELETE')
            ->getForm();
    }

}
