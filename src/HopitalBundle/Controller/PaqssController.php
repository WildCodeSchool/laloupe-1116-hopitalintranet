<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Paqss;
use HopitalBundle\Entity\PaqssRubrique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $rubriques = $em->getRepository('HopitalBundle:PaqssRubrique')->findAll();




        return $this->render('HopitalBundle:demarches:paqss_index.html.twig', array(
            'paqsss' => $paqsss,
            'rubriques' => $rubriques,
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

            return $this->redirectToRoute('demarches_paqss_index', array('id' => $paqss->getId()));
        }

        return $this->render('HopitalBundle:demarches:paqss_new.html.twig', array(
            'paqss' => $paqss,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new paqss entity.
     *
     */
    public function newRubriqueAction(Request $request)
    {
        $rubrique = new PaqssRubrique();
        $form = $this->createForm('HopitalBundle\Form\PaqssRubriqueType', $rubrique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rubrique);
            $em->flush($rubrique);

            return $this->redirectToRoute('demarches_paqss_index');
        }

        return $this->render('HopitalBundle:demarches:paqssrubrique_new.html.twig', array(
            'rubrique' => $rubrique,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing paqss entity.
     *
     */
    public function editAction(Request $request, Paqss $paqss)
    {
        $deleteForm = $this->createDeleteForm($paqss);
        $editForm = $this->createForm('HopitalBundle\Form\PaqssType', $paqss);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_paqss_edit', array('id' => $paqss->getId()));
        }

        return $this->render('HopitalBundle:demarches:paqss_edit.html.twig', array(
            'paqss' => $paqss,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
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
     * @param Paqss $presentation The paqss entity
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