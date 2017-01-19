<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Paqss;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\PaqssType;

/**
 * Paqss controller.
 *
 */
class PaqssController extends Controller
{
    /**
     * Lists all paqss entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paqsss = $em->getRepository('HopitalBundle:Paqss')->findAll();

        return $this->render('HopitalBundle:demarches:paqss_index.html.twig', array(
            'paqsss' => $paqsss,
        ));
    }

    /**
     * Creates a new paqss entity.
     *
     */
    public function newAction(Request $request)
    {
        $paqss = new Paqss();
        $form = $this->createForm('HopitalBundle\Form\PaqssType', $paqss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paqss);
            $em->flush($paqss);

            return $this->redirectToRoute('demarches_paqss_show', array('id' => $paqss->getId()));
        }

        return $this->render('HopitalBundle:demarches:paqss_new.html.twig', array(
            'paqss' => $paqss,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demarches entity.
     *
     */
    public function showAction(Paqss $paqss)
    {
        $paqss_deleteForm = $this->createDeleteForm($paqss);

        return $this->render('HopitalBundle:demarches:paqss_show.html.twig', array(
            'paqss' => $paqss,
            'paqss_delete_form' => $paqss_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing paqss entity.
     *
     */
    public function editAction(Request $request, Paqss $paqss)
    {
        $paqss_deleteForm = $this->createDeleteForm($paqss);
        $editForm = $this->createForm('HopitalBundle\Form\PaqssType', $paqss);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_paqss_edit', array('id' => $paqss->getId()));
        }

        return $this->render('HopitalBundle:demarches:paqss_edit.html.twig', array(
            'paqss' => $paqss,
            'edit_form' => $editForm->createView(),
            'paqss_delete_form' => $paqss_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a paqss entity.
     *
     */
    public function deleteAction(Request $request, Paqss $paqss)
    {
        $form = $this->createDeleteForm($paqss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paqss);
            $em->flush($paqss);
        }

        return $this->redirectToRoute('demarches_paqss_index');
    }

    /**
     * Creates a form to delete a paqss entity.
     *
     * @param Paqss $demarches The paqss entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paqss $paqss)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_paqss_delete', array('id' => $paqss->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}