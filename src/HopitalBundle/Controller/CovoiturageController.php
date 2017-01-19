<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Covoiturage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\CovoiturageType;

/**
 * Covoiturage controller.
 *
 */
class CovoiturageController extends Controller
{
    /**
     * Lists all covoiturage entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $covoiturages = $em->getRepository('HopitalBundle:Covoiturage')->findAll();

        return $this->render('HopitalBundle:personnel:covoiturage_index.html.twig', array(
            'covoiturages' => $covoiturages,
        ));
    }

    /**
     * Creates a new covoiturage entity.
     *
     */
    public function newAction(Request $request)
    {
        $covoiturage = new Covoiturage();
        $form = $this->createForm('HopitalBundle\Form\CovoiturageType', $covoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($covoiturage);
            $em->flush($covoiturage);

            return $this->redirectToRoute('personnel_covoiturage_index', array('id' => $covoiturage->getId()));
        }

        return $this->render('HopitalBundle:personnel:covoiturage_new.html.twig', array(
            'covoiturage' => $covoiturage,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing covoiturage entity.
     *
     */
    public function editAction(Request $request, Covoiturage $covoiturage)
    {
        $covoiturage_deleteForm = $this->createDeleteForm($covoiturage);
        $editForm = $this->createForm('HopitalBundle\Form\CovoiturageType', $covoiturage);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_covoiturage_edit', array('id' => $covoiturage->getId()));
        }

        return $this->render('HopitalBundle:personnel:covoiturage_edit.html.twig', array(
            'covoiturage' => $covoiturage,
            'edit_form' => $editForm->createView(),
            'covoiturage_delete_form' => $covoiturage_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a covoiturage entity.
     *
     */
    public function deleteAction(Request $request, Covoiturage $covoiturage)
    {
        $form = $this->createDeleteForm($covoiturage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($covoiturage);
            $em->flush($covoiturage);
        }

        return $this->redirectToRoute('personnel_covoiturage_index');
    }

    /**
     * Creates a form to delete a covoiturage entity.
     *
     * @param Covoiturage $personnel The covoiturage entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Covoiturage $covoiturage)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_covoiturage_delete', array('id' => $covoiturage->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}