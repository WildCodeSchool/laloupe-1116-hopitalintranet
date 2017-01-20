<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Pagesjaunes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\PagesjaunesType;

/**
 * Pagesjaunes controller.
 *
 */
class PagesjaunesController extends Controller
{
    /**
     * Lists all pagesjaunes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $pagesjauness = $em->getRepository('HopitalBundle:Pagesjaunes')->findAll();

        return $this->render('HopitalBundle:recommandation:pagesjaunes_index.html.twig', array(
            'pagesjauness' => $pagesjauness,
        ));
    }

    /**
     * Creates a new pagesjaunes entity.
     *
     */
    public function newAction(Request $request)
    {
        $pagesjaunes = new Pagesjaunes();
        $form = $this->createForm('HopitalBundle\Form\PagesjaunesType', $pagesjaunes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pagesjaunes);
            $em->flush($pagesjaunes);

            return $this->redirectToRoute('recommandation_pagesjaunes_index', array('id' => $pagesjaunes->getId()));
        }

        return $this->render('HopitalBundle:recommandation:pagesjaunes_new.html.twig', array(
            'pagesjaunes' => $pagesjaunes,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing pagesjaunes entity.
     *
     */
    public function editAction(Request $request, Pagesjaunes $pagesjaunes)
    {
        $pagesjaunes_deleteForm = $this->createDeleteForm($pagesjaunes);
        $editForm = $this->createForm('HopitalBundle\Form\PagesjaunesType', $pagesjaunes);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recommandation_pagesjaunes_edit', array('id' => $pagesjaunes->getId()));
        }

        return $this->render('HopitalBundle:recommandation:pagesjaunes_edit.html.twig', array(
            'pagesjaunes' => $pagesjaunes,
            'edit_form' => $editForm->createView(),
            'pagesjaunes_delete_form' => $pagesjaunes_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pagesjaunes entity.
     *
     */
    public function deleteAction(Request $request, Pagesjaunes $pagesjaunes)
    {
        $form = $this->createDeleteForm($pagesjaunes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pagesjaunes);
            $em->flush($pagesjaunes);
        }

        return $this->redirectToRoute('recommandation_pagesjaunes_index');
    }

    /**
     * Creates a form to delete a pagesjaunes entity.
     *
     * @param Pagesjaunes $recommandation The pagesjaunes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Pagesjaunes $pagesjaunes)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recommandation_pagesjaunes_delete', array('id' => $pagesjaunes->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}