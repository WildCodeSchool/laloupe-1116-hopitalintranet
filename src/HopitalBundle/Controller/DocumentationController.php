<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Documentation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Documentation controller.
 *
 */
class DocumentationController extends Controller
{
    /**
     * Lists all documentation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:index.html.twig', array(
            'documentations' => $documentations,
        ));
    }

    /**
     * Creates a new documentation entity.
     *
     */
    public function newAction(Request $request)
    {
        $documentation = new Documentation();
        $form = $this->createForm('HopitalBundle\Form\DocumentationType', $documentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($documentation);
            $em->flush($documentation);

            return $this->redirectToRoute('documentation_show', array('id' => $documentation->getId()));
        }

        return $this->render('HopitalBundle:documentation:new.html.twig', array(
            'documentation' => $documentation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a documentation entity.
     *
     */
    public function showAction(Documentation $documentation)
    {
        $deleteForm = $this->createDeleteForm($documentation);

        return $this->render('HopitalBundle:documentation:show.html.twig', array(
            'documentation' => $documentation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing documentation entity.
     *
     */
    public function editAction(Request $request, Documentation $documentation)
    {
        $deleteForm = $this->createDeleteForm($documentation);
        $editForm = $this->createForm('HopitalBundle\Form\DocumentationType', $documentation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_edit', array('id' => $documentation->getId()));
        }

        return $this->render('HopitalBundle:documentation:edit.html.twig', array(
            'documentation' => $documentation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a documentation entity.
     *
     */
    public function deleteAction(Request $request, Documentation $documentation)
    {
        $form = $this->createDeleteForm($documentation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($documentation);
            $em->flush($documentation);
        }

        return $this->redirectToRoute('documentation_index');
    }

    /**
     * Creates a form to delete a documentation entity.
     *
     * @param Documentation $documentation The documentation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Documentation $documentation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_delete', array('id' => $documentation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



    /**********************CODE AJOUTÉ ***********************************


    /**
     * Lists all documentations entities.
     *
     */
    public function noteAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:note.html.twig', array(
            'documentations' => $documentations,
        ));
    }


    /**
     * Lists all documentation entities.
     *
     */
    public function contactsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:contacts.html.twig', array(
            'documentations' => $documentations,
        ));
    }



    /**
     * Lists all documentation entities.
     *
     */
    public function astreintesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:astreintes.html.twig', array(
            'documentations' => $documentations,
        ));
    }


    /**
     * Lists all documentation entities.
     *
     */
    public function journauxAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:journaux.html.twig', array(
            'documentations' => $documentations,
        ));
    }


    /**
     * Lists all documentation entities.
     *
     */
    public function basedocAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:basedoc.html.twig', array(
            'documentations' => $documentations,
        ));
    }


    /**
     * Lists all documentation entities.
     *
     */
    public function instancesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:instances.html.twig', array(
            'documentations' => $documentations,
        ));
    }


    public function groupeAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:groupe.html.twig', array(
            'documentations' => $documentations,
        ));
    }


    public function fournisseursAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:fournisseurs.html.twig', array(
            'documentations' => $documentations,
        ));
    }


    public function galerieAction()
    {
        $em = $this->getDoctrine()->getManager();

        $documentations = $em->getRepository('HopitalBundle:Documentation')->findAll();

        return $this->render('HopitalBundle:documentation:galerie.html.twig', array(
            'documentations' => $documentations,
        ));
    }





}
