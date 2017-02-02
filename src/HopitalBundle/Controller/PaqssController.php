<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Paqss;
use HopitalBundle\Entity\PaqssDivision;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Paqss controller.
 *
 */
class PaqssController extends Controller
{
    /**
     * Lists all paqss entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paqsss = $em->getRepository('HopitalBundle:Paqss')->findAll();
        $divisions = $em->getRepository('HopitalBundle:PaqssDivision')->findAll();




        return $this->render('HopitalBundle:demarches:paqss_index.html.twig', array(
            'paqsss' => $paqsss,
            'divisions' => $divisions,
        ));
    }

    /**
     * Lists all instances entities.
     *
     */
    public function index_adminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $paqsss = $em->getRepository('HopitalBundle:Paqss')->findAll();
        $divisions = $em->getRepository('HopitalBundle:PaqssDivision')->findAll();


        return $this->render('HopitalBundle:demarches:paqss_index_admin.html.twig', array(
            'paqsss' => $paqsss,
            'divisions' => $divisions,
        ));
    }

    /**
     * Lists all instances entities.
     *
     */
    public function index_showAction(PaqssDivision $paqssDivision)
    {
        $em = $this->getDoctrine()->getManager();
        $paqsss = $em->getRepository('HopitalBundle:Paqss')->findAll();


        return $this->render('@Hopital/demarches/paqss_index_show.hrml.twig', array(
            'paqsss' => $paqsss,
            'division' => $paqssDivision,
        ));
    }


    /**
     * Creates a new paqss entity.
     *
     */
    public function newAction(Request $request)
    {
        $paqss = new Paqss();
        $form = $this->createForm('HopitalBundle\Form\PaqssType', $paqss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($paqss);
            $em->flush($paqss);

            return $this->redirectToRoute('demarches_paqss_index', array('id' => $paqss->getId()));
        }

        return $this->render('HopitalBundle:demarches:paqss_new.html.twig', array(
            'paqss' => $paqss,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new paqss entity.
     *
     */
    public function newDivisionAction(Request $request)
    {
        $division = new PaqssDivision();
        $form = $this->createForm('HopitalBundle\Form\PaqssDivisionType', $division);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($division);
            $em->flush($division);

            return $this->redirectToRoute('demarches_paqss_index');
        }

        return $this->render('HopitalBundle:demarches:paqssdivision_new.html.twig', array(
            'division' => $division,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing paqss entity.
     *
     */
    public function editAction(Request $request, Paqss $paqss)
    {
        $deleteForm = $this->createDeleteForm($paqss);
        $editForm = $this->createForm('HopitalBundle\Form\PaqssType', $paqss);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_paqss_index');
        }

        return $this->render('HopitalBundle:demarches:paqss_edit.html.twig', array(
            'paqss' => $paqss,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing instances entity.
     *
     */
    public function editDivisionAction(Request $request, PaqssDivision $paqssDivision)
    {
        $deleteForm = $this->createDeleteDivisionForm($paqssDivision);
        $editForm = $this->createForm('HopitalBundle\Form\PaqssDivisionType', $paqssDivision);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_paqss_index', array('id' => $paqssDivision->getId()));
        }

        return $this->render('HopitalBundle:demarches:paqssdivision_edit.html.twig', array(
            'paqss' => $paqssDivision,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a instances entity.
     *
     */
    public function deleteDivisionAction(Request $request, PaqssDivision $paqssDivision)
    {
        $form = $this->createDeleteDivisionForm($paqssDivision);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paqssDivision);
            $em->flush($paqssDivision);
        }

        return $this->redirectToRoute('demarches_paqss_index');
    }

    /**
     * Deletes a paqss entity.
     *
     */
    public function deleteAction(Request $request, Paqss $paqss)
    {
        $form = $this->createDeleteForm($paqss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($paqss);
            $em->flush($paqss);
        }

        return $this->redirectToRoute('demarches_paqss_index');
    }

    /**
     * Creates a form to delete a paqss entity.
     *
     * @param Paqss $presentation The paqss entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Paqss $paqss)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_paqss_delete', array('id' => $paqss->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    private function createDeleteDivisionForm(PaqssDivision $paqssDivision)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_paqssdivision_delete', array('id' => $paqssDivision->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}