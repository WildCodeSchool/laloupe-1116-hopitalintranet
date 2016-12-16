<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Demarches;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Demarch controller.
 *
 */
class DemarchesController extends Controller
{
    /**
     * Lists all demarch entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demarches = $em->getRepository('HopitalBundle:Demarches')->findAll();

        return $this->render('HopitalBundle:demarches:index.html.twig', array(
            'demarches' => $demarches,
        ));
    }

    /**
     * Creates a new demarch entity.
     *
     */
    public function newAction(Request $request)
    {
        $demarch = new Demarch();
        $form = $this->createForm('HopitalBundle\Form\DemarchesType', $demarch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($demarch);
            $em->flush($demarch);

            return $this->redirectToRoute('demarches_show', array('id' => $demarch->getId()));
        }

        return $this->render('HopitalBundle:demarches:new.html.twig', array(
            'demarch' => $demarch,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a demarch entity.
     *
     */
    public function showAction(Demarches $demarch)
    {
        $deleteForm = $this->createDeleteForm($demarch);

        return $this->render('HopitalBundle:demarches:show.html.twig', array(
            'demarch' => $demarch,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing demarch entity.
     *
     */
    public function editAction(Request $request, Demarches $demarch)
    {
        $deleteForm = $this->createDeleteForm($demarch);
        $editForm = $this->createForm('HopitalBundle\Form\DemarchesType', $demarch);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_edit', array('id' => $demarch->getId()));
        }

        return $this->render('HopitalBundle:demarches:edit.html.twig', array(
            'demarch' => $demarch,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a demarch entity.
     *
     */
    public function deleteAction(Request $request, Demarches $demarch)
    {
        $form = $this->createDeleteForm($demarch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($demarch);
            $em->flush($demarch);
        }

        return $this->redirectToRoute('demarches_index');
    }

    /**
     * Creates a form to delete a demarch entity.
     *
     * @param Demarches $demarch The demarch entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Demarches $demarch)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_delete', array('id' => $demarch->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    /**
     * Lists all demarch entities.
     *
     */
    public function certificationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demarches = $em->getRepository('HopitalBundle:Demarches')->findAll();

        return $this->render('HopitalBundle:demarches:certification.html.twig', array(
            'demarches' => $demarches,
        ));
    }

    /**
     * Lists all demarch entities.
     *
     */
    public function eppAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demarches = $em->getRepository('HopitalBundle:Demarches')->findAll();

        return $this->render('HopitalBundle:demarches:epp.html.twig', array(
            'demarches' => $demarches,
        ));
    }

    /**
     * Lists all demarch entities.
     *
     */
    public function processusAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demarches = $em->getRepository('HopitalBundle:Demarches')->findAll();

        return $this->render('HopitalBundle:demarches:processus.html.twig', array(
            'demarches' => $demarches,
        ));
    }

    /**
     * Lists all demarch entities.
     *
     */
    public function paqssAction()
    {
        $em = $this->getDoctrine()->getManager();

        $demarches = $em->getRepository('HopitalBundle:Demarches')->findAll();

        return $this->render('HopitalBundle:demarches:paqss.html.twig', array(
            'demarches' => $demarches,
        ));
    }
}
