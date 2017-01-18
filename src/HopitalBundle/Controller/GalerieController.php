<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Galerie;
use HopitalBundle\Entity\GalerieCategorie;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Galerie controller.
 *
 */
class GalerieController extends Controller
{
    /**
     * Lists all galerie entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $galeries = $em->getRepository('HopitalBundle:Galerie')->findAll();
        $categories = $em->getRepository('HopitalBundle:GalerieCategorie')->findAll();




        return $this->render('HopitalBundle:documentation:galerie_index.html.twig', array(
            'galeries' => $galeries,
            'categories' => $categories,
        ));
    }

    /**
     * Creates a new galerie entity.
     *
     */
    public function newAction(Request $request)
    {
        $galerie = new Galerie();
        $form = $this->createForm('HopitalBundle\Form\GalerieType', $galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($galerie);
            $em->flush($galerie);

            return $this->redirectToRoute('documentation_galerie_show', array('id' => $galerie->getId()));
        }

        return $this->render('HopitalBundle:documentation:galerie_new.html.twig', array(
            'galerie' => $galerie,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new galerie entity.
     *
     */
    public function newCategorieAction(Request $request)
    {
        $categorie = new GalerieCategorie();
        $form = $this->createForm('HopitalBundle\Form\GalerieCategorieType', $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush($categorie);

            return $this->redirectToRoute('documentation_galerie_index');
        }

        return $this->render('HopitalBundle:documentation:galerie_new.html.twig', array(
            'categorie' => $categorie,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a presentation entity.
     *
     */
    public function showAction(Galerie $galerie)
    {
        $deleteForm = $this->createDeleteForm($galerie);

        return $this->render('HopitalBundle:documentation:galerie_show.html.twig', array(
            'galerie' => $galerie,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing galerie entity.
     *
     */
    public function editAction(Request $request, Galerie $galerie)
    {
        $deleteForm = $this->createDeleteForm($galerie);
        $editForm = $this->createForm('HopitalBundle\Form\GalerieType', $galerie);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_galerie_edit', array('id' => $galerie->getId()));
        }

        return $this->render('HopitalBundle:documentation:galerie_edit.html.twig', array(
            'galerie' => $galerie,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a galerie entity.
     *
     */
    public function deleteAction(Request $request, Galerie $galerie)
    {
        $form = $this->createDeleteForm($galerie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($galerie);
            $em->flush($galerie);
        }

        return $this->redirectToRoute('documentation_galerie_index');
    }

    /**
     * Creates a form to delete a galerie entity.
     *
     * @param Galerie $presentation The galerie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Galerie $galerie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_galerie_delete', array('id' => $galerie->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}