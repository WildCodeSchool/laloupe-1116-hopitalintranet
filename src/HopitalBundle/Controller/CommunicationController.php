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

    //INDEX

    /**
     * Lists all communication entities.
     *
     */
    public function indexDirectionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $directions = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:direction_index.html.twig', array(
            'directions' => $directions,
        ));
    }

    /**
     * Lists all communication entities.
     *
     */
    public function indexGhtAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ghts = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:ght_index.html.twig', array(
            'ghts' => $ghts,
        ));
    }

    /**
     * Lists all communication entities.
     *
     */
    public function indexLettreinfoAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lettreinfos = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:lettreinfo_index.html.twig', array(
            'lettreinfos' => $lettreinfos,
        ));
    }

    /**
     * Lists all communication entities.
     *
     */
    public function indexArticlesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articless = $em->getRepository('HopitalBundle:Communication')->findAll();

        return $this->render('HopitalBundle:communication:articles_index.html.twig', array(
            'articless' => $articless,
        ));
    }




    //NEW



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

            return $this->redirectToRoute('communication_direction_index', array('id' => $communication->getId()));
        }

        return $this->render('HopitalBundle:communication:new.html.twig', array(
            'communication' => $communication,
            'form' => $form->createView(),
        ));
    }


    //EDIT

    /**
     * Displays a form to edit an existing communication entity.
     *
     */
    public function editAction(Request $request, Communication $communication)
    {
        $communication_deleteForm = $this->createDeleteForm($communication);
        $editForm = $this->createForm('HopitalBundle\Form\CommunicationType', $communication);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communication_edit', array('id' => $communication->getId()));
        }

        return $this->render('HopitalBundle:communication:edit.html.twig', array(
            'communication' => $communication,
            'edit_form' => $editForm->createView(),
            'communication_delete_form' => $communication_deleteForm->createView(),
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

        return $this->redirectToRoute('communication_direction_index');
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
            ->getForm();
    }


}