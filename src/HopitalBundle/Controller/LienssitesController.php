<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Lienssites;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Lienssites controller.
 *
 */
class LienssitesController extends Controller
{
    /**
     * Lists all lienssites entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lienssitess = $em->getRepository('HopitalBundle:Lienssites')->findAll();

        return $this->render('HopitalBundle:communication:lienssites_index.html.twig', array(
            'lienssitess' => $lienssitess,
        ));
    }

    /**
     * Creates a new lienssites entity.
     *
     */
    public function newAction(Request $request)
    {
        $lienssites = new Lienssites();
        $form = $this->createForm('HopitalBundle\Form\LienssitesType', $lienssites);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lienssites);
            $em->flush($lienssites);

            return $this->redirectToRoute('communication_lienssites_index', array('id' => $lienssites->getId()));
        }

        return $this->render('HopitalBundle:communication:lienssites_new.html.twig', array(
            'lienssites' => $lienssites,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing lienssites entity.
     *
     */
    public function editAction(Request $request, Lienssites $lienssites)
    {
        $lienssites_deleteForm = $this->createDeleteForm($lienssites);
        $editForm = $this->createForm('HopitalBundle\Form\LienssitesType', $lienssites);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communication_lienssites_edit', array('id' => $lienssites->getId()));
        }

        return $this->render('HopitalBundle:communication:lienssites_edit.html.twig', array(
            'lienssites' => $lienssites,
            'edit_form' => $editForm->createView(),
            'lienssites_delete_form' => $lienssites_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lienssites entity.
     *
     */
    public function deleteAction(Request $request, Lienssites $lienssites)
    {
        $form = $this->createDeleteForm($lienssites);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lienssites);
            $em->flush($lienssites);
        }

        return $this->redirectToRoute('communication_lienssites_index');
    }

    /**
     * Creates a form to delete a lienssites entity.
     *
     * @param Lienssites $communication The lienssites entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lienssites $lienssites)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('communication_lienssites_delete', array('id' => $lienssites->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}