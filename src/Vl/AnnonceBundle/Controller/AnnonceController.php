<?php

namespace Vl\AnnonceBundle\Controller;

use Vl\AnnonceBundle\Entity\Annonce;
use Vl\AnnonceBundle\Entity\Cgos;
use Vl\AnnonceBundle\Entity\Amicale;
use Vl\AnnonceBundle\Entity\Commentaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use IuchBundle\Entity\Service;
use IuchBundle\Entity\ServiceRepository;

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


    public function indexCgosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cgoss = $em->getRepository('VlAnnonceBundle:Cgos')->findAll();

        return $this->render('VlAnnonceBundle:annonce:indexCgos.html.twig', array(
            'cgoss' => $cgoss,
        ));
    }

    public function indexAmicaleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $amicales = $em->getRepository('VlAnnonceBundle:Amicale')->findAll();
        $services = $em->getRepository('IuchBundle:Service')->findAll();

        return $this->render('VlAnnonceBundle:annonce:indexAmicale.html.twig', array(
            'amicales' => $amicales,
            'services' => $services
        ));
    }

    public function SupprAction()
    {
        $em = $this->getDoctrine()->getManager();

        $annonces = $em->getRepository('VlAnnonceBundle:Annonce')->findAll();

        return $this->render('VlAnnonceBundle:annonce:suppr.html.twig', array(
            'annonces' => $annonces,
        ));
    }

    public function SupprAmicaleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $amicales = $em->getRepository('VlAnnonceBundle:Amicale')->findAll();

        return $this->render('VlAnnonceBundle:annonce:supprAmicale.html.twig', array(
            'amicales' => $amicales,
        ));
    }

    public function SupprCgosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cgoss = $em->getRepository('VlAnnonceBundle:Cgos')->findAll();

        return $this->render('VlAnnonceBundle:annonce:supprCgos.html.twig', array(
            'cgoss' => $cgoss,
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
        $date = DateTime::createFromFormat('d/m',$maDate);

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

    public function newCgosAction(Request $request)
    {
        $cgos = new Cgos();
        $form = $this->createForm('Vl\AnnonceBundle\Form\CgosType', $cgos);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cgos);
            $em->flush($cgos);

            return $this->redirectToRoute('annonce_showCgos', array('id' => $cgos->getId()));
        }

        return $this->render('VlAnnonceBundle:annonce:newCgos.html.twig', array(
            'cgos' => $cgos,
            'form' => $form->createView(),
        ));
    }

    public function newAmicaleAction(Request $request)
    {
        $amicale = new Amicale();
        $form = $this->createForm('Vl\AnnonceBundle\Form\AmicaleType', $amicale);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($amicale);
            $em->flush($amicale);

            return $this->redirectToRoute('annonce_showAmicale', array('id' => $amicale->getId()));
        }

        return $this->render('VlAnnonceBundle:annonce:newAmicale.html.twig', array(
            'amicale' => $amicale,
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

    public function showCgosAction(Cgos $cgos, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $commentaire = $em->getRepository('VlAnnonceBundle:Commentaire')->findBy(array('cgoss' => $cgos->getId()));
        $newCommentaire = new Commentaire();
        $form = $this->createForm('Vl\AnnonceBundle\Form\CommentaireType', $newCommentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($newCommentaire->getUtilisateur() == null) {
                $newCommentaire->setUtilisateur('Anonyme');
            }
            $newCommentaire->setCgoss($cgos);
            $em->persist($newCommentaire);
            $em->flush();

            return $this->redirectToRoute('annonce_showCgos', array('id' => $cgos->getId()));
        }

        return $this->render('VlAnnonceBundle:annonce:showCgos.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'cgos' => $cgos,
        ));
    }

    public function showAmicaleAction(Amicale $amicale, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $commentaire = $em->getRepository('VlAnnonceBundle:Commentaire')->findBy(array('amicales' => $amicale->getId()));
        $newCommentaire = new Commentaire();
        $form = $this->createForm('Vl\AnnonceBundle\Form\CommentaireType', $newCommentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($newCommentaire->getUtilisateur() == null) {
                $newCommentaire->setUtilisateur('Anonyme');
            }
            $newCommentaire->setAmicales($amicale);
            $em->persist($newCommentaire);
            $em->flush();

            return $this->redirectToRoute('annonce_showAmicale', array('id' => $amicale->getId()));
        }

        return $this->render('VlAnnonceBundle:annonce:showAmicale.html.twig', array(
            'commentaire' => $commentaire,
            'form' => $form->createView(),
            'amicale' => $amicale,
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
    public function editCgosAction(Request $request, Cgos $cgos)
    {
        $editForm = $this->createForm('Vl\AnnonceBundle\Form\CgosType', $cgos);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $cgos->preUpload();
            $em->persist($cgos);
            $em->flush();
            return $this->redirectToRoute('annonce_indexCgos');
        }

        return $this->render('VlAnnonceBundle:annonce:editCgos.html.twig', array(
            'cgos' => $cgos,
            'edit_form' => $editForm->createView(),

        ));
    }

    public function editAmicaleAction(Request $request, Amicale $amicale)
    {
        $editForm = $this->createForm('Vl\AnnonceBundle\Form\AmicaleType', $amicale);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $amicale->preUpload();
            $em->persist($amicale);
            $em->flush();
            return $this->redirectToRoute('annonce_indexAmicale');
        }

        return $this->render('VlAnnonceBundle:annonce:editAmicale.html.twig', array(
            'amicale' => $amicale,
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
     * Delete an cgos
     *
     */
    public function deleteCgosAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $cgos = $em->getRepository('VlAnnonceBundle:Cgos')->findOneById($id);

        $em->remove($cgos);
        $em->flush();

        return $this->redirectToRoute('annonce_indexCgos');
    }



    /**
     * Delete an amicale
     *
     */
    public function deleteAmicaleAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $amicale = $em->getRepository('VlAnnonceBundle:Amicale')->findOneById($id);

        $em->remove($amicale);
        $em->flush();

        return $this->redirectToRoute('annonce_indexAmicale');
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


    /**
     * Delete Commentaire
     *
     */
    public function deleteCommentaireAmicaleAction($id, $id_amicale){
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('VlAnnonceBundle:Commentaire')->findOneById($id);

        $em->remove($commentaire);
        $em->flush();

        return $this->redirectToRoute('annonce_showAmicale', array('id' => $id_amicale ));
    }


    /**
     * Delete Commentaire
     *
     */
    public function deleteCommentaireCgosAction($id, $id_cgos){
        $em = $this->getDoctrine()->getManager();
        $commentaire = $em->getRepository('VlAnnonceBundle:Commentaire')->findOneById($id);

        $em->remove($commentaire);
        $em->flush();

        return $this->redirectToRoute('annonce_showCgos', array('id' => $id_cgos ));
    }
}
