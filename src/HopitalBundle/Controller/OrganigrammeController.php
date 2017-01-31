<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Organigramme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\OrganigrammeType;

/**
 * Organigramme controller.
 *
 */
class OrganigrammeController extends Controller
{
    /**
     * Lists all organigramme entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $organigrammes = $em->getRepository('HopitalBundle:Organigramme')->findAll();

        return $this->render('HopitalBundle:presentation:organigramme_index.html.twig', array(
            'organigrammes' => $organigrammes,
        ));
    }

    /**
     * Creates a new organigramme entity.
     *
     */
    public function newAction(Request $request)
    {
        $organigramme = new Organigramme();
        $form = $this->createForm('HopitalBundle\Form\OrganigrammeType', $organigramme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($organigramme);
            $em->flush($organigramme);

            return $this->redirectToRoute('presentation_organigramme_index', array('id' => $organigramme->getId()));
        }

        return $this->render('HopitalBundle:presentation:organigramme_new.html.twig', array(
            'organigramme' => $organigramme,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing organigramme entity.
     *
     */
    public function editAction(Request $request, Organigramme $organigramme)
    {
        $organigramme_deleteForm = $this->createDeleteForm($organigramme);
        $editForm = $this->createForm('HopitalBundle\Form\OrganigrammeType', $organigramme);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('presentation_organigramme_edit', array('id' => $organigramme->getId()));
        }

        return $this->render('HopitalBundle:presentation:organigramme_edit.html.twig', array(
            'organigramme' => $organigramme,
            'edit_form' => $editForm->createView(),
            'organigramme_delete_form' => $organigramme_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a organigramme entity.
     *
     */
    public function deleteAction(Request $request, Organigramme $organigramme)
    {
        $form = $this->createDeleteForm($organigramme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($organigramme);
            $em->flush($organigramme);
        }

        return $this->redirectToRoute('presentation_organigramme_index');
    }

    /**
     * Creates a form to delete a organigramme entity.
     *
     * @param Organigramme $presentation The organigramme entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Organigramme $organigramme)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presentation_organigramme_delete', array('id' => $organigramme->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}