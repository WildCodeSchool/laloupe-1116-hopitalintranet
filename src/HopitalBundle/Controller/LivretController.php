<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Livret;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Livret controller.
 *
 */
class LivretController extends Controller
{
    /**
     * Lists all livret entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livrets = $em->getRepository('HopitalBundle:Livret')->findAll();

        return $this->render('HopitalBundle:presentation:livret_index.html.twig', array(
            'livrets' => $livrets,
        ));
    }

    /**
     * Creates a new livret entity.
     *
     */
    public function newAction(Request $request)
    {
        $livret = new Livret();
        $form = $this->createForm('HopitalBundle\Form\LivretType', $livret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livret);
            $em->flush($livret);

            return $this->redirectToRoute('presentation_livret_show', array('id' => $livret->getId()));
        }

        return $this->render('HopitalBundle:presentation:livret_new.html.twig', array(
            'livret' => $livret,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a presentation entity.
     *
     */
    public function showAction(Livret $livret)
    {
        $livret_deleteForm = $this->createDeleteForm($livret);

        return $this->render('HopitalBundle:presentation:livret_show.html.twig', array(
            'livret' => $livret,
            'livret_delete_form' => $livret_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing livret entity.
     *
     */
    public function editAction(Request $request, Livret $livret)
    {
        $livret_deleteForm = $this->createDeleteForm($livret);
        $editForm = $this->createForm('HopitalBundle\Form\LivretType', $livret);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('presentation_livret_edit', array('id' => $livret->getId()));
        }

        return $this->render('HopitalBundle:presentation:livret_edit.html.twig', array(
            'livret' => $livret,
            'edit_form' => $editForm->createView(),
            'livret_delete_form' => $livret_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a livret entity.
     *
     */
    public function deleteAction(Request $request, Livret $livret)
    {
        $form = $this->createDeleteForm($livret);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livret);
            $em->flush($livret);
        }

        return $this->redirectToRoute('presentation_livret_index');
    }

    /**
     * Creates a form to delete a livret entity.
     *
     * @param Livret $presentation The livret entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Livret $livret)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presentation_livret_delete', array('id' => $livret->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}