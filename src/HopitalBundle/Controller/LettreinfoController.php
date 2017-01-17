<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Lettreinfo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lettreinfo controller.
 *
 */
class LettreinfoController extends Controller
{
    /**
     * Lists all lettreinfo entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lettreinfos = $em->getRepository('HopitalBundle:Lettreinfo')->findAll();

        return $this->render('HopitalBundle:communication:lettreinfo_index.html.twig', array(
            'lettreinfos' => $lettreinfos,
        ));
    }

    /**
     * Creates a new lettreinfo entity.
     *
     */
    public function newAction(Request $request)
    {
        $lettreinfo = new Lettreinfo();
        $form = $this->createForm('HopitalBundle\Form\LettreinfoType', $lettreinfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lettreinfo);
            $em->flush($lettreinfo);

            return $this->redirectToRoute('communication_lettreinfo_show', array('id' => $lettreinfo->getId()));
        }

        return $this->render('@Hopital/communication/lettreinfo_new.html.twig', array(
            'lettreinfo' => $lettreinfo,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a presentation entity.
     *
     */
    public function showAction(Lettreinfo $lettreinfo)
    {
        $lettreinfo_deleteForm = $this->createDeleteForm($lettreinfo);

        return $this->render('@Hopital/communication/lettreinfo_show.html.twig', array(
            'lettreinfo' => $lettreinfo,
            'lettreinfo_delete_form' => $lettreinfo_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lettreinfo entity.
     *
     */
    public function editAction(Request $request, Lettreinfo $lettreinfo)
    {
        $lettreinfo_deleteForm = $this->createDeleteForm($lettreinfo);
        $editForm = $this->createForm('HopitalBundle\Form\LettreinfoType', $lettreinfo);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communication_lettreinfo_edit', array('id' => $lettreinfo->getId()));
        }

        return $this->render('@Hopital/communication/lettreinfo_edit.html.twig', array(
            'lettreinfo' => $lettreinfo,
            'edit_form' => $editForm->createView(),
            'lettreinfo_delete_form' => $lettreinfo_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lettreinfo entity.
     *
     */
    public function deleteAction(Request $request, Lettreinfo $lettreinfo)
    {
        $form = $this->createDeleteForm($lettreinfo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lettreinfo);
            $em->flush($lettreinfo);
        }

        return $this->redirectToRoute('communication_lettreinfo_index');
    }

    /**
     * Creates a form to delete a lettreinfo entity.
     *
     * @param Lettreinfo $presentation The lettreinfo entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lettreinfo $lettreinfo)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('communication_lettreinfo_delete', array('id' => $lettreinfo->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}