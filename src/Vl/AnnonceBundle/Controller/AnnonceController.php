<?php

namespace Vl\AnnonceBundle\Controller;

use Vl\AnnonceBundle\Entity\Annonce;
use Vl\AnnonceBundle\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Annonce controller.
 *
 */
class AnnonceController extends Controller
{
    /**
     * Lists all annonce entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $annonces = $em->getRepository('VlAnnonceBundle:Annonce')->findAll();

        return $this->render('VlAnnonceBundle:annonce:index.html.twig', array(
            'annonces' => $annonces,
        ));
    }

    /**
     * Creates a new annonce entity.
     *
     */
    public function newAction(Request $request)
    {
        $annonce = new Annonce();
        $form = $this->createForm('Vl\AnnonceBundle\Form\AnnonceType', $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($annonce);
            $em->flush($annonce);

            return $this->redirectToRoute('annonce_show', array('id' => $annonce->getId()));
        }

        return $this->render('VlAnnonceBundle:annonce:new.html.twig', array(
            'annonce' => $annonce,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a annonce entity.
     *
     */
    public function showAction(Annonce $annonce, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $commentaire = $em->getRepository('VlAnnonceBundle:Commentaire')->findBy(array('annonces' => $annonce->getId()));
        $newCommentaire = new Commentaire();
        $form = $this->createForm('Vl\AnnonceBundle\Form\CommentaireType', $newCommentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($newCommentaire->getUtilisateur() == null) {
                $newCommentaire->setUtilisateur('Anonyme');
            }
            $newCommentaire->setAnnonces($annonce);
            $em->persist($newCommentaire);
            $em->flush();

            return $this->redirectToRoute('annonce_show', array('id' => $annonce->getId()));
        }

        return $this->render('VlAnnonceBundle:annonce:show.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'annonce' => $annonce,
        ));
    }

    /**
     * Displays a form to edit an existing annonce entity.
     *
     */
    public function editAction(Request $request, Annonce $annonce)
    {
        $editForm = $this->createForm('Vl\AnnonceBundle\Form\AnnonceType', $annonce);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $annonce->preUpload();
            $em->persist($annonce);
            $em->flush();
            return $this->redirectToRoute('annonce_index');
        }

        return $this->render('VlAnnonceBundle:annonce:edit.html.twig', array(
            'annonce' => $annonce,
            'edit_form' => $editForm->createView(),

        ));
    }

    /**
     * Delete an advert
     *
     */
    public function deleteAdvertAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $advert = $em->getRepository('VlAnnonceBundle:Annonce')->findOneById($id);

        $em->remove($advert);
        $em->flush();

        return $this->redirectToRoute('annonce_index');
    }

    /**
     * Delete Commentaire
     *
     */
    public function deleteCommentaireAction($id, $id_advert){
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('VlAnnonceBundle:Commentaire')->findOneById($id);

        $em->remove($commentaire);
        $em->flush();

        return $this->redirectToRoute('annonce_show', array('id' => $id_advert ));
    }

}
