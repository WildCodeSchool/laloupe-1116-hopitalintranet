<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Articles;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Articles controller.
 *
 */
class ArticlesController extends Controller
{
    /**
     * Lists all articles entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articless = $em->getRepository('HopitalBundle:Articles')->findAll();

        return $this->render('HopitalBundle:communication:articles_index.html.twig', array(
            'articless' => $articless,
        ));
    }

    /**
     * Creates a new articles entity.
     *
     */
    public function newAction(Request $request)
    {
        $articles = new Articles();
        $form = $this->createForm('HopitalBundle\Form\ArticlesType', $articles);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($articles);
            $em->flush($articles);

            return $this->redirectToRoute('communication_articles_index', array('id' => $articles->getId()));
        }

        return $this->render('HopitalBundle:communication:articles_new.html.twig', array(
            'articles' => $articles,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing articles entity.
     *
     */
    public function editAction(Request $request, Articles $articles)
    {
        $articles_deleteForm = $this->createDeleteForm($articles);
        $editForm = $this->createForm('HopitalBundle\Form\ArticlesType', $articles);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('communication_articles_edit', array('id' => $articles->getId()));
        }

        return $this->render('HopitalBundle:communication:articles_edit.html.twig', array(
            'articles' => $articles,
            'edit_form' => $editForm->createView(),
            'articles_delete_form' => $articles_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a articles entity.
     *
     */
    public function deleteAction(Request $request, Articles $articles)
    {
        $form = $this->createDeleteForm($articles);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($articles);
            $em->flush($articles);
        }

        return $this->redirectToRoute('communication_articles_index');
    }

    /**
     * Creates a form to delete a articles entity.
     *
     * @param Articles $communication The articles entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Articles $articles)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('communication_articles_delete', array('id' => $articles->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}