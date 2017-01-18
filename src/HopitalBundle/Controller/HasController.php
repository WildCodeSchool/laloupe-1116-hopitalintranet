<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Has;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\HasType;

/**
 * Has controller.
 *
 */
class HasController extends Controller
{
    /**
     * Lists all has entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hass = $em->getRepository('HopitalBundle:Has')->findAll();

        return $this->render('HopitalBundle:recommandation:has_index.html.twig', array(
            'hass' => $hass,
        ));
    }

    /**
     * Creates a new has entity.
     *
     */
    public function newAction(Request $request)
    {
        $has = new Has();
        $form = $this->createForm('HopitalBundle\Form\HasType', $has);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($has);
            $em->flush($has);

            return $this->redirectToRoute('recommandation_has_show', array('id' => $has->getId()));
        }

        return $this->render('HopitalBundle:recommandation:has_new.html.twig', array(
            'has' => $has,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recommandation entity.
     *
     */
    public function showAction(Has $has)
    {
        $has_deleteForm = $this->createDeleteForm($has);

        return $this->render('HopitalBundle:recommandation:has_show.html.twig', array(
            'has' => $has,
            'has_delete_form' => $has_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing has entity.
     *
     */
    public function editAction(Request $request, Has $has)
    {
        $has_deleteForm = $this->createDeleteForm($has);
        $editForm = $this->createForm('HopitalBundle\Form\HasType', $has);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recommandation_has_edit', array('id' => $has->getId()));
        }

        return $this->render('HopitalBundle:recommandation:has_edit.html.twig', array(
            'has' => $has,
            'edit_form' => $editForm->createView(),
            'has_delete_form' => $has_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a has entity.
     *
     */
    public function deleteAction(Request $request, Has $has)
    {
        $form = $this->createDeleteForm($has);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($has);
            $em->flush($has);
        }

        return $this->redirectToRoute('recommandation_has_index');
    }

    /**
     * Creates a form to delete a has entity.
     *
     * @param Has $recommandation The has entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Has $has)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recommandation_has_delete', array('id' => $has->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}