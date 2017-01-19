<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Direction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Direction controller.
 *
 */
class DirectionController extends Controller
{
    /**
     * Lists all direction entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $directions = $em->getRepository('HopitalBundle:Direction')->findAll();

        return $this->render('HopitalBundle:communication:direction_index.html.twig', array(
            'directions' => $directions,
        ));
    }

    /**
     * Creates a new direction entity.
     *
     */
    public function newAction(Request $request)
    {
        $direction = new Direction();
        $form = $this->createForm('HopitalBundle\Form\DirectionType', $direction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($direction);
            $em->flush($direction);

            return $this->redirectToRoute('communication_direction_index', array('id' => $direction->getId()));
        }

        return $this->render('HopitalBundle:communication:direction_new.html.twig', array(
            'direction' => $direction,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing direction entity.
     *
     */
    public function editAction(Request $request, Direction $direction)
    {
        $direction_deleteForm = $this->createDeleteForm($direction);
        $editForm = $this->createForm('HopitalBundle\Form\DirectionType', $direction);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communication_direction_edit', array('id' => $direction->getId()));
        }

        return $this->render('HopitalBundle:communication:direction_edit.html.twig', array(
            'direction' => $direction,
            'edit_form' => $editForm->createView(),
            'direction_delete_form' => $direction_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a direction entity.
     *
     */
    public function deleteAction(Request $request, Direction $direction)
    {
        $form = $this->createDeleteForm($direction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($direction);
            $em->flush($direction);
        }

        return $this->redirectToRoute('communication_direction_index');
    }

    /**
     * Creates a form to delete a direction entity.
     *
     * @param Direction $communication The direction entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Direction $direction)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('communication_direction_delete', array('id' => $direction->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}