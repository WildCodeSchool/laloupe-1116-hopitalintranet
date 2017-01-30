<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Planniciel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Planniciel controller.
 *
 */
class PlannicielController extends Controller
{
    /**
     * Lists all planniciel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $planniciels = $em->getRepository('HopitalBundle:Planniciel')->findAll();

        return $this->render('@Hopital/personnel/planniciel_index.html.twig', array(
            'planniciels' => $planniciels,
        ));
    }

    /**
     * Creates a new planniciel entity.
     *
     */
    public function newAction(Request $request)
    {
        $planniciel = new Planniciel();
        $form = $this->createForm('HopitalBundle\Form\PlannicielType', $planniciel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($planniciel);
            $em->flush($planniciel);

            return $this->redirectToRoute('personnel_planniciel_index', array('id' => $planniciel->getId()));
        }

        return $this->render('@Hopital/personnel/planniciel_new.html.twig', array(
            'planniciel' => $planniciel,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing planniciel entity.
     *
     */
    public function editAction(Request $request, Planniciel $planniciel)
    {
        $deleteForm = $this->createDeleteForm($planniciel);
        $editForm = $this->createForm('HopitalBundle\Form\PlannicielType', $planniciel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_planniciel_edit', array('id' => $planniciel->getId()));
        }

        return $this->render('@Hopital/personnel/planniciel_edit.html.twig', array(
            'planniciel' => $planniciel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a planniciel entity.
     *
     */
    public function deleteAction(Request $request, Planniciel $planniciel)
    {
        $form = $this->createDeleteForm($planniciel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($planniciel);
            $em->flush($planniciel);
        }

        return $this->redirectToRoute('personnel_planniciel_index');
    }

    /**
     * Creates a form to delete a planniciel entity.
     *
     * @param Planniciel $presentation The planniciel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Planniciel $planniciel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_planniciel_delete', array('id' => $planniciel->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}