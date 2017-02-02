<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Epp;
use HopitalBundle\Entity\EppRubrique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Epp controller.
 *
 */
class EppController extends Controller
{
    /**
     * Lists all epp entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $epps = $em->getRepository('HopitalBundle:Epp')->findAll();
        $rubriques = $em->getRepository('HopitalBundle:EppRubrique')->findAll();




        return $this->render('HopitalBundle:demarches:epp_index.html.twig', array(
            'epps' => $epps,
            'rubriques' => $rubriques,
        ));
    }

    /**
     * Creates a new epp entity.
     *
     */
    public function newAction(Request $request)
    {
        $epp = new Epp();
        $form = $this->createForm('HopitalBundle\Form\EppType', $epp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($epp);
            $em->flush($epp);

            return $this->redirectToRoute('demarches_epp_index', array('id' => $epp->getId()));
        }

        return $this->render('HopitalBundle:demarches:epp_new.html.twig', array(
            'epp' => $epp,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new epp entity.
     *
     */
    public function newRubriqueAction(Request $request)
    {
        $rubrique = new EppRubrique();
        $form = $this->createForm('HopitalBundle\Form\EppRubriqueType', $rubrique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rubrique);
            $em->flush($rubrique);

            return $this->redirectToRoute('demarches_epp_index');
        }

        return $this->render('HopitalBundle:demarches:epprubrique_new.html.twig', array(
            'rubrique' => $rubrique,
            'form' => $form->createView(),
        ));
    }

    public function index_showAction(EppRubrique $eppRubrique)
    {
        $em = $this->getDoctrine()->getManager();
        $epps = $em->getRepository('HopitalBundle:Epp')->findAll();


        return $this->render('HopitalBundle:demarches:epp_index_show.html.twig', array(
            'epps' => $epps,
            'rubrique' => $eppRubrique,
        ));
    }
    public function index_adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $epps = $em->getRepository('HopitalBundle:Epp')->findAll();
        $rubriques = $em->getRepository('HopitalBundle:EppRubrique')->findAll();

        return $this->render('@Hopital/demarches/epp_index_admin.html.twig', array(
            'epps' => $epps,
            'rubriques' => $rubriques,
        ));
    }
    public function editRubriqueAction(Request $request, EppRubrique $eppRubrique)
    {
        $deleteForm = $this->createDeleteRubriqueForm($eppRubrique);
        $editForm = $this->createForm('HopitalBundle\Form\EppRubriqueType', $eppRubrique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_epp_index', array('id' => $eppRubrique->getId()));
        }

        return $this->render('@Hopital/demarches/epprubrique_edit.html.twig', array(
            'eppRubrique' => $eppRubrique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function deleteRubriqueAction(Request $request, EppRubrique $eppRubrique)
    {
        $form = $this->createDeleteRubriqueForm($eppRubrique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($eppRubrique);
            $em->flush($eppRubrique);
        }

        return $this->redirectToRoute('demarches_epp_index');
    }
    private function createDeleteRubriqueForm(EppRubrique $eppRubrique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_epprubrique_delete', array('id' => $eppRubrique->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
    /**
     * Displays a form to edit an existing epp entity.
     *
     */
    public function editAction(Request $request, Epp $epp)
    {
        $deleteForm = $this->createDeleteForm($epp);
        $editForm = $this->createForm('HopitalBundle\Form\EppType', $epp);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_epp_index');
        }

        return $this->render('HopitalBundle:demarches:epp_edit.html.twig', array(
            'epp' => $epp,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a epp entity.
     *
     */
    public function deleteAction(Request $request, Epp $epp)
    {
        $form = $this->createDeleteForm($epp);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($epp);
            $em->flush($epp);
        }

        return $this->redirectToRoute('demarches_epp_index');
    }

    /**
     * Creates a form to delete a epp entity.
     *
     * @param Epp $presentation The epp entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Epp $epp)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_epp_delete', array('id' => $epp->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}