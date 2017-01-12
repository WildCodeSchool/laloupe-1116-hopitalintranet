<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Astreintes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\AstreintesType;

/**
 * Astreintes controller.
 *
 */
class AstreintesController extends Controller
{
    /**
     * Lists all astreintes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $astreintess = $em->getRepository('HopitalBundle:Astreintes')->findAll();

        return $this->render('HopitalBundle:documentation:astreintes_index.html.twig', array(
            'astreintess' => $astreintess,
            'astreintes' => $astreintess,
        ));

        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('SdzBlogBundle:Article');

        $article = $repository->findOneBy(array('titre' => 'Mon dernier weekend'));
// $article est une instance de Article


    }
    /**
     * Creates a new astreintes entity.
     *
     */
    public function newAction(Request $request)
    {
        $astreintes = new Astreintes();
        $form = $this->createForm('HopitalBundle\Form\AstreintesType', $astreintes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($astreintes);
            $em->flush($astreintes);

            return $this->redirectToRoute('documentation_astreintes_show', array('id' => $astreintes->getId()));
        }

        return $this->render('HopitalBundle:documentation:astreintes_new.html.twig', array(
            'astreintes' => $astreintes,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a documentation entity.
     *
     */
    public function showAction(Astreintes $astreintes)
    {
        $astreintes_deleteForm = $this->createDeleteForm($astreintes);

        return $this->render('HopitalBundle:documentation:astreintes_show.html.twig', array(
            'astreintes' => $astreintes,
            'astreintes_delete_form' => $astreintes_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing astreintes entity.
     *
     */
    public function editAction(Request $request, Astreintes $astreintes)
    {
        $astreintes_deleteForm = $this->createDeleteForm($astreintes);
        $editForm = $this->createForm('HopitalBundle\Form\AstreintesType', $astreintes);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_astreintes_edit', array('id' => $astreintes->getId()));
        }

        return $this->render('HopitalBundle:documentation:astreintes_edit.html.twig', array(
            'astreintes' => $astreintes,
            'edit_form' => $editForm->createView(),
            'astreintes_delete_form' => $astreintes_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a astreintes entity.
     *
     */
    public function deleteAction(Request $request, Astreintes $astreintes)
    {
        $form = $this->createDeleteForm($astreintes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($astreintes);
            $em->flush($astreintes);
        }

        return $this->redirectToRoute('documentation_astreintes_index');
    }

    /**
     * Creates a form to delete a astreintes entity.
     *
     * @param Astreintes $documentation The astreintes entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Astreintes $astreintes)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_astreintes_delete', array('id' => $astreintes->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}