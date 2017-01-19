<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Contacts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\ContactsType;

/**
 * Contacts controller.
 *
 */
class ContactsController extends Controller
{
    /**
     * Lists all contacts entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contactss = $em->getRepository('HopitalBundle:Contacts')->findAll();

        return $this->render('HopitalBundle:documentation:contacts_index.html.twig', array(
            'contactss' => $contactss,
        ));
    }

    /**
     * Creates a new contacts entity.
     *
     */
    public function newAction(Request $request)
    {
        $contacts = new Contacts();
        $form = $this->createForm('HopitalBundle\Form\ContactsType', $contacts);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacts);
            $em->flush($contacts);

            return $this->redirectToRoute('documentation_contacts_show', array('id' => $contacts->getId()));
        }

        return $this->render('HopitalBundle:documentation:contacts_new.html.twig', array(
            'contacts' => $contacts,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a documentation entity.
     *
     */
    public function showAction(Contacts $contacts)
    {
        $contacts_deleteForm = $this->createDeleteForm($contacts);

        return $this->render('HopitalBundle:documentation:contacts_show.html.twig', array(
            'contacts' => $contacts,
            'contacts_delete_form' => $contacts_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing contacts entity.
     *
     */
    public function editAction(Request $request, Contacts $contacts)
    {
        $contacts_deleteForm = $this->createDeleteForm($contacts);
        $editForm = $this->createForm('HopitalBundle\Form\ContactsType', $contacts);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_contacts_edit', array('id' => $contacts->getId()));
        }

        return $this->render('HopitalBundle:documentation:contacts_edit.html.twig', array(
            'contacts' => $contacts,
            'edit_form' => $editForm->createView(),
            'contacts_delete_form' => $contacts_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a contacts entity.
     *
     */
    public function deleteAction(Request $request, Contacts $contacts)
    {
        $form = $this->createDeleteForm($contacts);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contacts);
            $em->flush($contacts);
        }

        return $this->redirectToRoute('documentation_contacts_index');
    }

    /**
     * Creates a form to delete a contacts entity.
     *
     * @param Contacts $documentation The contacts entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contacts $contacts)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_contacts_delete', array('id' => $contacts->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}