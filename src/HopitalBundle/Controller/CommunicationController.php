<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Communication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Communication controller.
 *
 */
class CommunicationController extends Controller
{
    /**
     * Lists all communication entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communications = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:index.html.twig', array(
            'communications' => $communications,
        ));
    }

    /**
     * Creates a new communication entity.
     *
     */
    public function newAction(Request $request)
    {
        $communication = new Communication();
        $form = $this->createForm('HopitalBundle\Form\CommunicationType', $communication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($communication);
            $em->flush($communication);

            return $this->redirectToRoute('communication_show', array('id' => $communication->getId()));
        }

        return $this->render('HopitalBundle:communication:new.html.twig', array(
            'communication' => $communication,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a communication entity.
     *
     */
    public function showAction(Communication $communication)
    {
        $deleteForm = $this->createDeleteForm($communication);

        return $this->render('HopitalBundle:communication:show.html.twig', array(
            'communication' => $communication,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing communication entity.
     *
     */
    public function editAction(Request $request, Communication $communication)
    {
        $deleteForm = $this->createDeleteForm($communication);
        $editForm = $this->createForm('HopitalBundle\Form\CommunicationType', $communication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communication_edit', array('id' => $communication->getId()));
        }

        return $this->render('HopitalBundle:communication:edit.html.twig', array(
            'communication' => $communication,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a communication entity.
     *
     */
    public function deleteAction(Request $request, Communication $communication)
    {
        $form = $this->createDeleteForm($communication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($communication);
            $em->flush($communication);
        }

        return $this->redirectToRoute('communication_index');
    }

    /**
     * Creates a form to delete a communication entity.
     *
     * @param Communication $communication The communication entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Communication $communication)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('communication_delete', array('id' => $communication->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }





    /**********************CODE AJOUTÉ ***********************************



    /**
     * Lists all communication entities.
     *
     */
    public function lienssitesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communications = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:lienssites.html.twig', array(
            'communications' => $communications,
        ));
    }

    /**
     * Lists all communication entities.
     *
     */
    public function directionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communications = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:direction.html.twig', array(
            'communications' => $communications,
        ));
    }

    /**
     * Lists all communication entities.
     *
     */
    public function ghtAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communications = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:ght.html.twig', array(
            'communications' => $communications,
        ));
    }

    /**
     * Lists all communication entities.
     *
     */
    public function lettreinfoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communications = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:lettreinfo.html.twig', array(
            'communications' => $communications,
        ));
    }

    /**
     * Lists all communication entities.
     *
     */
    public function articlesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $communications = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:articles.html.twig', array(
            'communications' => $communications,
        ));
    }
}
