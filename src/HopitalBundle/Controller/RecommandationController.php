<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Recommandation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Recommandation controller.
 *
 */
class RecommandationController extends Controller
{
    /**
     * Lists all recommandation entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recommandations = $em->getRepository('HopitalBundle:Recommandation')->findAll();

        return $this->render('HopitalBundle:recommandation:index.html.twig', array(
            'recommandations' => $recommandations,
        ));
    }

    /**
     * Creates a new recommandation entity.
     *
     */
    public function newAction(Request $request)
    {
        $recommandation = new Recommandation();
        $form = $this->createForm('HopitalBundle\Form\RecommandationType', $recommandation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recommandation);
            $em->flush($recommandation);

            return $this->redirectToRoute('recommandation_show', array('id' => $recommandation->getId()));
        }

        return $this->render('HopitalBundle:recommandation:new.html.twig', array(
            'recommandation' => $recommandation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a recommandation entity.
     *
     */
    public function showAction(Recommandation $recommandation)
    {
        $deleteForm = $this->createDeleteForm($recommandation);

        return $this->render('HopitalBundle:recommandation:show.html.twig', array(
            'recommandation' => $recommandation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing recommandation entity.
     *
     */
    public function editAction(Request $request, Recommandation $recommandation)
    {
        $deleteForm = $this->createDeleteForm($recommandation);
        $editForm = $this->createForm('HopitalBundle\Form\RecommandationType', $recommandation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('recommandation_edit', array('id' => $recommandation->getId()));
        }

        return $this->render('HopitalBundle:recommandation:edit.html.twig', array(
            'recommandation' => $recommandation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a recommandation entity.
     *
     */
    public function deleteAction(Request $request, Recommandation $recommandation)
    {
        $form = $this->createDeleteForm($recommandation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($recommandation);
            $em->flush($recommandation);
        }

        return $this->redirectToRoute('recommandation_index');
    }

    /**
     * Creates a form to delete a recommandation entity.
     *
     * @param Recommandation $recommandation The recommandation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Recommandation $recommandation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('recommandation_delete', array('id' => $recommandation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



    /**********************CODE AJOUTÉ ***********************************



    /**
     * Lists all recommandation entities.
     *
     */
    public function hasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recommandations = $em->getRepository('HopitalBundle:Recommandation')->findAll();

        return $this->render('HopitalBundle:recommandation:has.html.twig', array(
            'recommandations' => $recommandations,
        ));
    }

    /**
     * Lists all recommandation entities.
     *
     */
    public function anesmAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recommandations = $em->getRepository('HopitalBundle:Recommandation')->findAll();

        return $this->render('HopitalBundle:recommandation:anesm.html.twig', array(
            'recommandations' => $recommandations,
        ));
    }

    /**
     * Lists all recommandation entities.
     *
     */
    public function journaloffAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recommandations = $em->getRepository('HopitalBundle:Recommandation')->findAll();

        return $this->render('HopitalBundle:recommandation:journaloff.html.twig', array(
            'recommandations' => $recommandations,
        ));
    }

    /**
     * Lists all recommandation entities.
     *
     */
    public function bulletinoffAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recommandations = $em->getRepository('HopitalBundle:Recommandation')->findAll();

        return $this->render('HopitalBundle:recommandation:bulletinoff.html.twig', array(
            'recommandations' => $recommandations,
        ));
    }


    /**
     * Lists all recommandation entities.
     *
     */
    public function pagesjaunesAction()
    {
        $em = $this->getDoctrine()->getManager();

        $recommandations = $em->getRepository('HopitalBundle:Recommandation')->findAll();

        return $this->render('HopitalBundle:recommandation:pagesjaunes.html.twig', array(
            'recommandations' => $recommandations,
        ));
    }
}
