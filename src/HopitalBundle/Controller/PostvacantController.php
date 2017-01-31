<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Postvacant;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\PostvacantType;

/**
 * Postvacant controller.
 *
 */
class PostvacantController extends Controller
{
    /**
     * Lists all postvacant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $postvacants = $em->getRepository('HopitalBundle:Postvacant')->findAll();


        return $this->render('HopitalBundle:personnel:postvacant_index.html.twig', array(
            'postvacants' => $postvacants,
        ));
    }

    /**
     * Creates a new postvacant entity.
     *
     */
    public function newAction(Request $request)
    {
        $postvacant = new Postvacant();
        $form = $this->createForm('HopitalBundle\Form\PostvacantType', $postvacant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($postvacant);
            $em->flush($postvacant);

            return $this->redirectToRoute('personnel_postvacant_index', array('id' => $postvacant->getId()));
        }

        return $this->render('HopitalBundle:personnel:postvacant_new.html.twig', array(
            'postvacant' => $postvacant,
            'form' => $form->createView(),

        ));
    }


    /**
     * Displays a form to edit an existing postvacant entity.
     *
     */
    public function editAction(Request $request, Postvacant $postvacant)
    {
        $postvacant_deleteForm = $this->createDeleteForm($postvacant);
        $editForm = $this->createForm('HopitalBundle\Form\PostvacantType', $postvacant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_postvacant_edit', array('id' => $postvacant->getId()));
        }

        return $this->render('HopitalBundle:personnel:postvacant_edit.html.twig', array(
            'postvacant' => $postvacant,
            'edit_form' => $editForm->createView(),
            'postvacant_delete_form' => $postvacant_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a postvacant entity.
     *
     */
    public function deleteAction(Request $request, Postvacant $postvacant)
    {
        $form = $this->createDeleteForm($postvacant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($postvacant);
            $em->flush($postvacant);
        }

        return $this->redirectToRoute('personnel_postvacant_index');
    }

    /**
     * Creates a form to delete a postvacant entity.
     *
     * @param Postvacant $personnel The postvacant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Postvacant $postvacant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_postvacant_delete', array('id' => $postvacant->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}