<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Noteservice;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Noteservice controller.
 *
 */
class NoteserviceController extends Controller
{
    /**
     * Lists all noteservice entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $noteservices = $em->getRepository('HopitalBundle:Noteservice')->findAll();

        return $this->render('HopitalBundle:documentation:noteservice_index.html.twig', array(
            'noteservices' => $noteservices,
        ));
    }

    /**
     * Creates a new noteservice entity.
     *
     */
    public function newAction(Request $request)
    {
        $noteservice = new Noteservice();
        $form = $this->createForm('HopitalBundle\Form\NoteserviceType', $noteservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noteservice);
            $em->flush($noteservice);

            return $this->redirectToRoute('documentation_noteservice_show', array('id' => $noteservice->getId()));
        }

        return $this->render('HopitalBundle:documentation:noteservice_new.html.twig', array(
            'noteservice' => $noteservice,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a documentation entity.
     *
     */
    public function showAction(Noteservice $noteservice)
    {
        $noteservice_deleteForm = $this->createDeleteForm($noteservice);

        return $this->render('HopitalBundle:documentation:noteservice_show.html.twig', array(
            'noteservice' => $noteservice,
            'noteservice_delete_form' => $noteservice_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing noteservice entity.
     *
     */
    public function editAction(Request $request, Noteservice $noteservice)
    {
        $noteservice_deleteForm = $this->createDeleteForm($noteservice);
        $editForm = $this->createForm('HopitalBundle\Form\NoteserviceType', $noteservice);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_noteservice_edit', array('id' => $noteservice->getId()));
        }

        return $this->render('HopitalBundle:documentation:noteservice_edit.html.twig', array(
            'noteservice' => $noteservice,
            'edit_form' => $editForm->createView(),
            'noteservice_delete_form' => $noteservice_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a noteservice entity.
     *
     */
    public function deleteAction(Request $request, Noteservice $noteservice)
    {
        $form = $this->createDeleteForm($noteservice);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($noteservice);
            $em->flush($noteservice);
        }

        return $this->redirectToRoute('documentation_noteservice_index');
    }

    /**
     * Creates a form to delete a noteservice entity.
     *
     * @param Noteservice $documentation The noteservice entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Noteservice $noteservice)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_noteservice_delete', array('id' => $noteservice->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}