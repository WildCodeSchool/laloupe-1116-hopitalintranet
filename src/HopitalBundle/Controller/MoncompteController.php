<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Moncompte;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Moncompte controller.
 *
 */
class MoncompteController extends Controller
{
    /**
     * Lists all moncompte entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $moncomptes = $em->getRepository('HopitalBundle:Moncompte')->findAll();

        return $this->render('HopitalBundle:moncompte:index.html.twig', array(
            'moncomptes' => $moncomptes,
        ));
    }

    /**
     * Creates a new moncompte entity.
     *
     */
    public function newAction(Request $request)
    {
        $moncompte = new Moncompte();
        $form = $this->createForm('HopitalBundle\Form\MoncompteType', $moncompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($moncompte);
            $em->flush($moncompte);

            return $this->redirectToRoute('moncompte_show', array('id' => $moncompte->getId()));
        }

        return $this->render('HopitalBundle:moncompte:new.html.twig', array(
            'moncompte' => $moncompte,
            'form' => $form->createView(),
        ));
    }


    /**
     * Finds and displays a moncompte entity.
     *
     */
    public function showAction(Moncompte $moncompte)
    {
        $deleteForm = $this->createDeleteForm($moncompte);

        return $this->render('HopitalBundle:moncompte:show.html.twig', array(
            'moncompte' => $moncompte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function showAmicaleAction(Moncompte $moncompte)
    {
        $deleteForm = $this->createDeleteForm($moncompte);

        return $this->render('VlAnnonceBundle:annonce:showAmicale.html.twig', array(
            'moncompte' => $moncompte,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing moncompte entity.
     *
     */
    public function editAction(Request $request, Moncompte $moncompte)
    {
        $deleteForm = $this->createDeleteForm($moncompte);
        $editForm = $this->createForm('HopitalBundle\Form\MoncompteType', $moncompte);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('moncompte_edit', array('id' => $moncompte->getId()));
        }

        return $this->render('HopitalBundle:moncompte:edit.html.twig', array(
            'moncompte' => $moncompte,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Deletes a moncompte entity.
     *
     */
    public function deleteAction(Request $request, Moncompte $moncompte)
    {
        $form = $this->createDeleteForm($moncompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($moncompte);
            $em->flush($moncompte);
        }

        return $this->redirectToRoute('moncompte_index');
    }

    public function deleteAmicaleAction(Request $request, Moncompte $moncompte)
    {
        $form = $this->createDeleteForm($moncompte);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($moncompte);
            $em->flush($moncompte);
        }

        return $this->redirectToRoute('annonce_indexAmicale');
    }

    /**
     * Creates a form to delete a moncompte entity.
     *
     * @param Moncompte $moncompte The moncompte entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Moncompte $moncompte)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('moncompte_delete', array('id' => $moncompte->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }




    /**********************CODE AJOUTÉ CGOS***********************************


    /**
     * Lists all moncompte entities.
     *
     */
    public function cgosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $moncomptes = $em->getRepository('HopitalBundle:Moncompte')->findAll();

        return $this->render('HopitalBundle:moncompte:cgos.html.twig', array(
            'moncomptes' => $moncomptes,
        ));
    }

    /**
     * Lists all moncompte entities.
     *
     */
    public function amicaleAction()
    {
        $em = $this->getDoctrine()->getManager();

        $moncomptes = $em->getRepository('HopitalBundle:Annonce')->findAll();

        return $this->render('HopitalBundle:moncompte:amicale.html.twig', array(
            'moncomptes' => $moncomptes,
        ));
    }


    /**
     * Lists all moncompte entities.
     *
     */
    public function petitesannoncesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $moncomptes = $em->getRepository('HopitalBundle:Moncompte')->findAll();

        return $this->render('HopitalBundle:moncompte:petitesannonces.html.twig', array(
            'moncomptes' => $moncomptes,
        ));
    }

    /**
     * Lists all moncompte entities.
     *
     */
    public function agendaAction()
    {
        $em = $this->getDoctrine()->getManager();

        $moncomptes = $em->getRepository('HopitalBundle:Moncompte')->findAll();

        return $this->render('HopitalBundle:moncompte:agenda.html.twig', array(
            'moncomptes' => $moncomptes,
        ));
    }


}
