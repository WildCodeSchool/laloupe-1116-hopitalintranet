<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Groupe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\GroupeType;

/**
 * Groupe controller.
 *
 */
class GroupeController extends Controller
{
    /**
     * Lists all groupe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupes = $em->getRepository('HopitalBundle:Groupe')->findAll();

        return $this->render('HopitalBundle:documentation:groupe_index.html.twig', array(
            'groupes' => $groupes,
        ));
    }

    /**
     * Creates a new groupe entity.
     *
     */
    public function newAction(Request $request)
    {
        $groupe = new Groupe();
        $form = $this->createForm('HopitalBundle\Form\GroupeType', $groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush($groupe);

            return $this->redirectToRoute('documentation_groupe_show', array('id' => $groupe->getId()));
        }

        return $this->render('HopitalBundle:documentation:groupe_new.html.twig', array(
            'groupe' => $groupe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a documentation entity.
     *
     */
    public function showAction(Groupe $groupe)
    {
        $groupe_deleteForm = $this->createDeleteForm($groupe);

        return $this->render('HopitalBundle:documentation:groupe_show.html.twig', array(
            'groupe' => $groupe,
            'groupe_delete_form' => $groupe_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupe entity.
     *
     */
    public function editAction(Request $request, Groupe $groupe)
    {
        $groupe_deleteForm = $this->createDeleteForm($groupe);
        $editForm = $this->createForm('HopitalBundle\Form\GroupeType', $groupe);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_groupe_edit', array('id' => $groupe->getId()));
        }

        return $this->render('HopitalBundle:documentation:groupe_edit.html.twig', array(
            'groupe' => $groupe,
            'edit_form' => $editForm->createView(),
            'groupe_delete_form' => $groupe_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupe entity.
     *
     */
    public function deleteAction(Request $request, Groupe $groupe)
    {
        $form = $this->createDeleteForm($groupe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupe);
            $em->flush($groupe);
        }

        return $this->redirectToRoute('documentation_groupe_index');
    }

    /**
     * Creates a form to delete a groupe entity.
     *
     * @param Groupe $documentation The groupe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Groupe $groupe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_groupe_delete', array('id' => $groupe->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}