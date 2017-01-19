<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Basedoc;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Basedoc controller.
 *
 */
class BasedocController extends Controller
{
    /**
     * Lists all basedoc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $basedocs = $em->getRepository('HopitalBundle:Basedoc')->findAll();

        return $this->render('HopitalBundle:documentation:basedoc_index.html.twig', array(
            'basedocs' => $basedocs,
        ));
    }

    /**
     * Creates a new basedoc entity.
     *
     */
    public function newAction(Request $request)
    {
        $basedoc = new Basedoc();
        $form = $this->createForm('HopitalBundle\Form\BasedocType', $basedoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($basedoc);
            $em->flush($basedoc);

            return $this->redirectToRoute('documentation_basedoc_index', array('id' => $basedoc->getId()));
        }

        return $this->render('HopitalBundle:documentation:basedoc_new.html.twig', array(
            'basedoc' => $basedoc,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing basedoc entity.
     *
     */
    public function editAction(Request $request, Basedoc $basedoc)
    {
        $deleteForm = $this->createDeleteForm($basedoc);
        $editForm = $this->createForm('HopitalBundle\Form\BasedocType', $basedoc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_basedoc_edit', array('id' => $basedoc->getId()));
        }

        return $this->render('HopitalBundle:documentation:basedoc_edit.html.twig', array(
            'basedoc' => $basedoc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a basedoc entity.
     *
     */
    public function deleteAction(Request $request, Basedoc $basedoc)
    {
        $form = $this->createDeleteForm($basedoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($basedoc);
            $em->flush($basedoc);
        }

        return $this->redirectToRoute('documentation_basedoc_index');
    }

    /**
     * Creates a form to delete a basedoc entity.
     *
     * @param Basedoc $presentation The basedoc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Basedoc $basedoc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_basedoc_delete', array('id' => $basedoc->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}