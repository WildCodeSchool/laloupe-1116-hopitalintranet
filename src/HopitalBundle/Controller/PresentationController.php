<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Presentation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Presentation controller.
 *
 */
class PresentationController extends Controller
{
    /**
     * Lists all presentation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presentations = $em->getRepository('HopitalBundle:Presentation')->findAll();

        return $this->render('HopitalBundle:presentation:index.html.twig', array(
            'presentations' => $presentations,
        ));
    }

    /**
     * Creates a new presentation entity.
     *
     */
    public function newAction(Request $request)
    {
        $presentation = new Presentation();
        $form = $this->createForm('HopitalBundle\Form\PresentationType', $presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($presentation);
            $em->flush($presentation);

            return $this->redirectToRoute('presentation_show', array('id' => $presentation->getId()));
        }

        return $this->render('HopitalBundle:presentation:new.html.twig', array(
            'presentation' => $presentation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a presentation entity.
     *
     */
    public function showAction(Presentation $presentation)
    {
        $deleteForm = $this->createDeleteForm($presentation);

        return $this->render('HopitalBundle:presentation:show.html.twig', array(
            'presentation' => $presentation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing presentation entity.
     *
     */
    public function editAction(Request $request, Presentation $presentation)
    {
        $deleteForm = $this->createDeleteForm($presentation);
        $editForm = $this->createForm('HopitalBundle\Form\PresentationType', $presentation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('presentation_edit', array('id' => $presentation->getId()));
        }

        return $this->render('HopitalBundle:presentation:edit.html.twig', array(
            'presentation' => $presentation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a presentation entity.
     *
     */
    public function deleteAction(Request $request, Presentation $presentation)
    {
        $form = $this->createDeleteForm($presentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($presentation);
            $em->flush($presentation);
        }

        return $this->redirectToRoute('presentation_index');
    }

    /**
     * Creates a form to delete a presentation entity.
     *
     * @param Presentation $presentation The presentation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Presentation $presentation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presentation_delete', array('id' => $presentation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**********************CODE AJOUTÉ ***********************************


    /**
     * Lists all presentation entities.
     *
     */
    public function livretAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presentations = $em->getRepository('HopitalBundle:Presentation')->findAll();

        return $this->render('HopitalBundle:presentation:livret.html.twig', array(
            'presentations' => $presentations,
        ));
    }



    /**
     * Lists all presentation entities.
     *
     */
    public function organigrammesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presentations = $em->getRepository('HopitalBundle:Presentation')->findAll();

        return $this->render('HopitalBundle:presentation:organigrammes.html.twig', array(
            'presentations' => $presentations,
        ));
    }



    /**
     * Lists all presentation entities.
     *
     */
    public function plansAction()
    {
        $em = $this->getDoctrine()->getManager();

        $presentations = $em->getRepository('HopitalBundle:Presentation')->findAll();

        return $this->render('HopitalBundle:presentation:plans.html.twig', array(
            'presentations' => $presentations,
        ));
    }
}






