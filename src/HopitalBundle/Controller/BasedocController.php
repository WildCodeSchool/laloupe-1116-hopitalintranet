<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Basedoc;
use HopitalBundle\Entity\BasedocOption;
use HopitalBundle\Form\BasedocOptionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Basedoc controller.
 *
 */
class BasedocController extends Controller
{
    /**
     * Lists all basedoc entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $basedocs = $em->getRepository('HopitalBundle:Basedoc')->findAll();
        $divisions = $em->getRepository('HopitalBundle:BasedocOption')->findAll();


        return $this->render('HopitalBundle:documentation:basedoc_index.html.twig', array(
            'basedocs' => $basedocs,
            'divisions' => $divisions,
        ));
    }

    /**
     * Lists all basedoc entities.
     *
     */
    public function index_adminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $basedocs = $em->getRepository('HopitalBundle:Basedoc')->findAll();
        $options = $em->getRepository('HopitalBundle:BasedocOption')->findAll();


        return $this->render('HopitalBundle:documentation:basedoc_index_admin.html.twig', array(
            'basedocs' => $basedocs,
            'options' => $options,
        ));
    }

    public function index_showAction(BasedocOption $basedocOption)
    {
        $em = $this->getDoctrine()->getManager();
        $basedocs = $em->getRepository('HopitalBundle:Basedoc')->findAll();


        return $this->render('HopitalBundle:documentation:basedoc_index_show.html.twig', array(
            'basedocs' => $basedocs,
            'division' => $basedocOption,
        ));
    }

    /**
     * Creates a new basedoc entity.
     *
     */
    public function newAction(Request $request)
    {
        $basedoc = new Basedoc();
        $form = $this->createForm('HopitalBundle\Form\BasedocType', $basedoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($basedoc);
            $em->flush($basedoc);

            return $this->redirectToRoute('documentation_basedoc_index', array('id' => $basedoc->getId()));
        }

        return $this->render('HopitalBundle:documentation:basedoc_new.html.twig', array(
            'basedoc' => $basedoc,
            'form' => $form->createView(),
        ));
    }

    public function newOptionAction(Request $request)
    {
        $division = new BasedocOption();
        $form = $this->createForm('HopitalBundle\Form\BasedocOptionType', $division);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($division);
            $em->flush($division);

            return $this->redirectToRoute('documentation_basedoc_index');
        }

        return $this->render('HopitalBundle:documentation:basedocoption_new.html.twig', array(
            'division' => $division,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing basedoc entity.
     *
     */
    public function editAction(Request $request, Basedoc $basedoc)
    {
        $deleteForm = $this->createDeleteForm($basedoc);
        $editForm = $this->createForm('HopitalBundle\Form\BasedocType', $basedoc);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_basedoc_index', array('id' => $basedoc->getId()));
        }

        return $this->render('HopitalBundle:documentation:basedoc_edit.html.twig', array(
            'basedoc' => $basedoc,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing basedoc entity.
     *
     */
    public function editOptionAction(Request $request, BasedocOption $basedocOption)
    {
        $deleteForm = $this->createDeleteOptionForm($basedocOption);
        $editForm = $this->createForm('HopitalBundle\Form\BasedocOptionType', $basedocOption);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_basedoc_index', array('id' => $basedocOption->getId()));
        }

        return $this->render('HopitalBundle:documentation:basedocoption_edit.html.twig', array(
            'basedoc' => $basedocOption,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a basedoc entity.
     *
     */
    public function deleteOptionAction(Request $request, BasedocOption $basedocOption)
    {
        $form = $this->createDeleteOptionForm($basedocOption);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($basedocOption);
            $em->flush($basedocOption);
        }

        return $this->redirectToRoute('documentation_basedoc_index');
    }
    /**
     * Deletes a basedoc entity.
     *
     */
    public function deleteAction(Request $request, Basedoc $basedoc)
    {
        $form = $this->createDeleteForm($basedoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($basedoc);
            $em->flush($basedoc);
        }

        return $this->redirectToRoute('documentation_basedoc_index');
    }

    /**
     * Creates a form to delete a basedoc entity.
     *
     * @param Basedoc $presentation The basedoc entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Basedoc $basedoc)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_basedoc_delete', array('id' => $basedoc->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    private function createDeleteOptionForm(BasedocOption $basedocOption)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_basedocoption_delete', array('id' => $basedocOption->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}