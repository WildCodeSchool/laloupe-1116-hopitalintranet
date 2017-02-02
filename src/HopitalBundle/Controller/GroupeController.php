<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Groupe;
use HopitalBundle\Entity\Groupemessage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\GroupeType;

/**
 * Groupe controller.
 *
 */
class GroupeController extends Controller
{
    /**
     * Lists all groupe entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $groupes = $em->getRepository('HopitalBundle:Groupe')->findAll();
        return $this->render('HopitalBundle:documentation:groupe_index.html.twig', array(
            'groupes' => $groupes,
        ));
    }

    public function SupprAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupes = $em->getRepository('HopitalBundle:Groupe')->findAll();

        return $this->render('HopitalBundle:documentation:groupe_suppr.html.twig', array(
            'groupes' => $groupes,
        ));
    }

    /**
     * Creates a new groupe entity.
     *
     */
    public function newAction(Request $request)
    {
        $groupe = new Groupe();
        $form = $this->createForm('HopitalBundle\Form\GroupeType', $groupe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupe);
            $em->flush($groupe);
            return $this->redirectToRoute('documentation_groupe_show', array('id' => $groupe->getId()));
        }
        return $this->render('HopitalBundle:documentation:groupe_new.html.twig', array(
            'groupe' => $groupe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupe entity.
     *
     */
    public function showAction(Groupe $groupe, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $groupemessage = $em->getRepository('HopitalBundle:Groupemessage')->findBy(array('groupes' => $groupe->getId()));
        $newGroupemessage = new Groupemessage();
        $form = $this->createForm('HopitalBundle\Form\GroupemessageType', $newGroupemessage);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($newGroupemessage->getUtilisateur() == null) {
                $newGroupemessage->setUtilisateur('Anonyme');
            }
            $newGroupemessage->setGroupes($groupe);
            $em->persist($newGroupemessage);
            $em->flush();
            return $this->redirectToRoute('documentation_groupe_show', array('id' => $groupe->getId()));
        }
        return $this->render('HopitalBundle:documentation:groupe_show.html.twig', array(
            'groupemessage' => $groupemessage,
            'form' => $form->createView(),
            'groupe' => $groupe,
        ));
    }

    /**
     * Displays a form to edit an existing groupe entity.
     *
     */
    public function editAction(Request $request, Groupe $groupe)
    {
        $editForm = $this->createForm('HopitalBundle\Form\GroupeType', $groupe);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $groupe->preUpload();
            $em->persist($groupe);
            $em->flush();
            return $this->redirectToRoute('documentation_groupe_index');
        }
        return $this->render('HopitalBundle:documentation:groupe_edit.html.twig', array(
            'groupe' => $groupe,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Delete a groupe
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $groupe = $em->getRepository('HopitalBundle:Groupe')->findOneBy(array('id' => $id));
        $em->remove($groupe);
        $em->flush();
        return $this->redirectToRoute('documentation_groupe_index');
    }

    /**
     * Delete Groupemessage
     *
     */
    public function deleteGroupeMessageAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $groupemessage = $em->getRepository('HopitalBundle:Groupemessage')->findOneBy(array('id' => $id));
        $em->remove($groupemessage);
        $em->flush();
        return $this->redirectToRoute('documentation_groupe_index');
    }
}
