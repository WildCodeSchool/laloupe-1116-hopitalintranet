<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Bulletinoff;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\BulletinoffType;

/**
 * Bulletinoff controller.
 *
 */
class BulletinoffController extends Controller
{
    /**
     * Lists all bulletinoff entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $bulletinoffs = $em->getRepository('HopitalBundle:Bulletinoff')->findAll();

        return $this->render('HopitalBundle:recommandation:bulletinoff_index.html.twig', array(
            'bulletinoffs' => $bulletinoffs,
        ));
    }

    /**
     * Creates a new bulletinoff entity.
     *
     */
    public function newAction(Request $request)
    {
        $bulletinoff = new Bulletinoff();
        $form = $this->createForm('HopitalBundle\Form\BulletinoffType', $bulletinoff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($bulletinoff);
            $em->flush($bulletinoff);

            return $this->redirectToRoute('recommandation_bulletinoff_show', array('id' => $bulletinoff->getId()));
        }

        return $this->render('HopitalBundle:recommandation:bulletinoff_new.html.twig', array(
            'bulletinoff' => $bulletinoff,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recommandation entity.
     *
     */
    public function showAction(Bulletinoff $bulletinoff)
    {
        $bulletinoff_deleteForm = $this->createDeleteForm($bulletinoff);

        return $this->render('HopitalBundle:recommandation:bulletinoff_show.html.twig', array(
            'bulletinoff' => $bulletinoff,
            'bulletinoff_delete_form' => $bulletinoff_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing bulletinoff entity.
     *
     */
    public function editAction(Request $request, Bulletinoff $bulletinoff)
    {
        $bulletinoff_deleteForm = $this->createDeleteForm($bulletinoff);
        $editForm = $this->createForm('HopitalBundle\Form\BulletinoffType', $bulletinoff);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recommandation_bulletinoff_edit', array('id' => $bulletinoff->getId()));
        }

        return $this->render('HopitalBundle:recommandation:bulletinoff_edit.html.twig', array(
            'bulletinoff' => $bulletinoff,
            'edit_form' => $editForm->createView(),
            'bulletinoff_delete_form' => $bulletinoff_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a bulletinoff entity.
     *
     */
    public function deleteAction(Request $request, Bulletinoff $bulletinoff)
    {
        $form = $this->createDeleteForm($bulletinoff);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($bulletinoff);
            $em->flush($bulletinoff);
        }

        return $this->redirectToRoute('recommandation_bulletinoff_index');
    }

    /**
     * Creates a form to delete a bulletinoff entity.
     *
     * @param Bulletinoff $recommandation The bulletinoff entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Bulletinoff $bulletinoff)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recommandation_bulletinoff_delete', array('id' => $bulletinoff->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}