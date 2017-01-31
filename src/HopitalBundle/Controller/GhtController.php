<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Ght;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Ght controller.
 *
 */
class GhtController extends Controller
{
    /**
     * Lists all ght entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ghts = $em->getRepository('HopitalBundle:Ght')->findAll();

        return $this->render('HopitalBundle:communication:ght_index.html.twig', array(
            'ghts' => $ghts,
        ));
    }

    /**
     * Creates a new ght entity.
     *
     */
    /*public function newAction(Request $request)
    {
        $ght = new Ght();
        $form = $this->createForm('HopitalBundle\Form\GhtType', $ght);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ght);
            $em->flush($ght);

            return $this->redirectToRoute('communication_ght_index', array('id' => $ght->getId()));
        }

        return $this->render('HopitalBundle:communication:ght_new.html.twig', array(
            'ght' => $ght,
            'form' => $form->createView(),
        ));
    }*/

    /**
     * Displays a form to edit an existing ght entity.
     *
     */
    public function editAction(Request $request, Ght $ght)
    {
        $ght_deleteForm = $this->createDeleteForm($ght);
        $editForm = $this->createForm('HopitalBundle\Form\GhtType', $ght);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communication_ght_edit', array('id' => $ght->getId()));
        }

        return $this->render('HopitalBundle:communication:ght_edit.html.twig', array(
            'ght' => $ght,
            'edit_form' => $editForm->createView(),
            'ght_delete_form' => $ght_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ght entity.
     *
     */
    public function deleteAction(Request $request, Ght $ght)
    {
        $form = $this->createDeleteForm($ght);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ght);
            $em->flush($ght);
        }

        return $this->redirectToRoute('communication_ght_index');
    }

    /**
     * Creates a form to delete a ght entity.
     *
     * @param Ght $communication The ght entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ght $ght)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('communication_ght_delete', array('id' => $ght->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}