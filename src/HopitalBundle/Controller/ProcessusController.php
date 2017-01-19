<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Processus;
use HopitalBundle\Entity\ProcessusCategorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Processus controller.
 *
 */
class ProcessusController extends Controller
{
    /**
     * Lists all processus entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $processuss = $em->getRepository('HopitalBundle:Processus')->findAll();
        $categories = $em->getRepository('HopitalBundle:ProcessusCategorie')->findAll();




        return $this->render('HopitalBundle:demarches:processus_index.html.twig', array(
            'processuss' => $processuss,
            'categories' => $categories,
        ));
    }

    /**
     * Creates a new processus entity.
     *
     */
    public function newAction(Request $request)
    {
        $processus = new Processus();
        $form = $this->createForm('HopitalBundle\Form\ProcessusType', $processus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($processus);
            $em->flush($processus);

            return $this->redirectToRoute('demarches_processus_show', array('id' => $processus->getId()));
        }

        return $this->render('HopitalBundle:demarches:processus_new.html.twig', array(
            'processus' => $processus,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new processus entity.
     *
     */
    public function newCategorieAction(Request $request)
    {
        $categorie = new ProcessusCategorie();
        $form = $this->createForm('HopitalBundle\Form\ProcessusCategorieType', $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush($categorie);

            return $this->redirectToRoute('demarches_processus_index');
        }

        return $this->render('HopitalBundle:demarches:processus_new.html.twig', array(
            'categorie' => $categorie,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a presentation entity.
     *
     */
    public function showAction(Processus $processus)
    {
        $deleteForm = $this->createDeleteForm($processus);

        return $this->render('HopitalBundle:demarches:processus_show.html.twig', array(
            'processus' => $processus,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing processus entity.
     *
     */
    public function editAction(Request $request, Processus $processus)
    {
        $deleteForm = $this->createDeleteForm($processus);
        $editForm = $this->createForm('HopitalBundle\Form\ProcessusType', $processus);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_processus_edit', array('id' => $processus->getId()));
        }

        return $this->render('HopitalBundle:demarches:processus_edit.html.twig', array(
            'processus' => $processus,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a processus entity.
     *
     */
    public function deleteAction(Request $request, Processus $processus)
    {
        $form = $this->createDeleteForm($processus);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($processus);
            $em->flush($processus);
        }

        return $this->redirectToRoute('demarches_processus_index');
    }

    /**
     * Creates a form to delete a processus entity.
     *
     * @param Processus $presentation The processus entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Processus $processus)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_processus_delete', array('id' => $processus->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}