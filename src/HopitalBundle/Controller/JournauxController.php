<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Journaux;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\JournauxType;

/**
 * Journaux controller.
 *
 */
class JournauxController extends Controller
{
    /**
     * Lists all journaux entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $journauxs = $em->getRepository('HopitalBundle:Journaux')->findAll();


        return $this->render('HopitalBundle:documentation:journaux_index.html.twig', array(
            'journauxs' => $journauxs,
        ));
    }

    /**
     * Creates a new journaux entity.
     *
     */
    public function newAction(Request $request)
    {
        $journaux = new Journaux();
        $form = $this->createForm('HopitalBundle\Form\JournauxType', $journaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($journaux);
            $em->flush($journaux);

            return $this->redirectToRoute('documentation_journaux_index', array('id' => $journaux->getId()));
        }

        return $this->render('HopitalBundle:documentation:journaux_new.html.twig', array(
            'journaux' => $journaux,
            'form' => $form->createView(),

        ));
    }

    /**
     * Displays a form to edit an existing journaux entity.
     *
     */
    public function editAction(Request $request, Journaux $journaux)
    {
        $journaux_deleteForm = $this->createDeleteForm($journaux);
        $editForm = $this->createForm('HopitalBundle\Form\JournauxType', $journaux);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_journaux_edit', array('id' => $journaux->getId()));
        }

        return $this->render('HopitalBundle:documentation:journaux_edit.html.twig', array(
            'journaux' => $journaux,
            'edit_form' => $editForm->createView(),
            'journaux_delete_form' => $journaux_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a journaux entity.
     *
     */
    public function deleteAction(Request $request, Journaux $journaux)
    {
        $form = $this->createDeleteForm($journaux);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($journaux);
            $em->flush($journaux);
        }

        return $this->redirectToRoute('documentation_journaux_index');
    }

    /**
     * Creates a form to delete a journaux entity.
     *
     * @param Journaux $documentation The journaux entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Journaux $journaux)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_journaux_delete', array('id' => $journaux->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}