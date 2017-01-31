<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Journaloff;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\JournaloffType;

/**
 * Journaloff controller.
 *
 */
class JournaloffController extends Controller
{
    /**
     * Lists all journaloff entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $journaloffs = $em->getRepository('HopitalBundle:Journaloff')->findAll();

        return $this->render('HopitalBundle:recommandation:journaloff_index.html.twig', array(
            'journaloffs' => $journaloffs,
        ));
    }

    /**
     * Creates a new journaloff entity.
     *
     */
    public function newAction(Request $request)
    {
        $journaloff = new Journaloff();
        $form = $this->createForm('HopitalBundle\Form\JournaloffType', $journaloff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($journaloff);
            $em->flush($journaloff);

            return $this->redirectToRoute('recommandation_journaloff_index', array('id' => $journaloff->getId()));
        }

        return $this->render('HopitalBundle:recommandation:journaloff_new.html.twig', array(
            'journaloff' => $journaloff,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing journaloff entity.
     *
     */
    public function editAction(Request $request, Journaloff $journaloff)
    {
        $journaloff_deleteForm = $this->createDeleteForm($journaloff);
        $editForm = $this->createForm('HopitalBundle\Form\JournaloffType', $journaloff);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recommandation_journaloff_edit', array('id' => $journaloff->getId()));
        }

        return $this->render('HopitalBundle:recommandation:journaloff_edit.html.twig', array(
            'journaloff' => $journaloff,
            'edit_form' => $editForm->createView(),
            'journaloff_delete_form' => $journaloff_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a journaloff entity.
     *
     */
    public function deleteAction(Request $request, Journaloff $journaloff)
    {
        $form = $this->createDeleteForm($journaloff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($journaloff);
            $em->flush($journaloff);
        }

        return $this->redirectToRoute('recommandation_journaloff_index');
    }

    /**
     * Creates a form to delete a journaloff entity.
     *
     * @param Journaloff $recommandation The journaloff entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Journaloff $journaloff)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recommandation_journaloff_delete', array('id' => $journaloff->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}