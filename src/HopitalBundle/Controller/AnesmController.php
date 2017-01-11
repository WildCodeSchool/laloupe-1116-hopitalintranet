<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Anesm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\AnesmType;

/**
 * Anesm controller.
 *
 */
class AnesmController extends Controller
{
    /**
     * Lists all anesm entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $anesms = $em->getRepository('HopitalBundle:Anesm')->findAll();

        return $this->render('HopitalBundle:recommandation:anesm_index.html.twig', array(
            'anesms' => $anesms,
        ));
    }

    /**
     * Creates a new anesm entity.
     *
     */
    public function newAction(Request $request)
    {
        $anesm = new Anesm();
        $form = $this->createForm('HopitalBundle\Form\AnesmType', $anesm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($anesm);
            $em->flush($anesm);

            return $this->redirectToRoute('recommandation_anesm_show', array('id' => $anesm->getId()));
        }

        return $this->render('HopitalBundle:recommandation:anesm_new.html.twig', array(
            'anesm' => $anesm,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recommandation entity.
     *
     */
    public function showAction(Anesm $anesm)
    {
        $anesm_deleteForm = $this->createDeleteForm($anesm);

        return $this->render('HopitalBundle:recommandation:anesm_show.html.twig', array(
            'anesm' => $anesm,
            'anesm_delete_form' => $anesm_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing anesm entity.
     *
     */
    public function editAction(Request $request, Anesm $anesm)
    {
        $anesm_deleteForm = $this->createDeleteForm($anesm);
        $editForm = $this->createForm('HopitalBundle\Form\AnesmType', $anesm);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recommandation_anesm_edit', array('id' => $anesm->getId()));
        }

        return $this->render('HopitalBundle:recommandation:anesm_edit.html.twig', array(
            'anesm' => $anesm,
            'edit_form' => $editForm->createView(),
            'anesm_delete_form' => $anesm_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a anesm entity.
     *
     */
    public function deleteAction(Request $request, Anesm $anesm)
    {
        $form = $this->createDeleteForm($anesm);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($anesm);
            $em->flush($anesm);
        }

        return $this->redirectToRoute('recommandation_anesm_index');
    }

    /**
     * Creates a form to delete a anesm entity.
     *
     * @param Anesm $recommandation The anesm entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Anesm $anesm)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recommandation_anesm_delete', array('id' => $anesm->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}