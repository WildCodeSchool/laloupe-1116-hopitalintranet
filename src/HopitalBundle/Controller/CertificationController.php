<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Certification;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\CertificationType;

/**
 * Certification controller.
 *
 */
class CertificationController extends Controller
{
    /**
     * Lists all certification entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $certifications = $em->getRepository('HopitalBundle:Certification')->findAll();


        return $this->render('HopitalBundle:demarches:certification_index.html.twig', array(
            'certifications' => $certifications,
        ));
    }

    /**
     * Creates a new certification entity.
     *
     */
    public function newAction(Request $request)
    {
        $certification = new Certification();
        $form = $this->createForm('HopitalBundle\Form\CertificationType', $certification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($certification);
            $em->flush($certification);

            return $this->redirectToRoute('demarches_certification_show', array('id' => $certification->getId()));
        }

        return $this->render('HopitalBundle:demarches:certification_new.html.twig', array(
            'certification' => $certification,
            'form' => $form->createView(),

        ));
    }

    /**
     * Finds and displays a certification entity.
     *
     */
    public function showAction(certification $certification)
    {
        $certification_deleteForm = $this->createDeleteForm($certification);

        return $this->render('HopitalBundle:demarches:certification_show.html.twig', array(
            'certification' => $certification,
            'certification_delete_form' => $certification_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing certification entity.
     *
     */
    public function editAction(Request $request, Certification $certification)
    {
        $certification_deleteForm = $this->createDeleteForm($certification);
        $editForm = $this->createForm('HopitalBundle\Form\CertificationType', $certification);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('demarches_certification_edit', array('id' => $certification->getId()));
        }

        return $this->render('HopitalBundle:demarches:certification_edit.html.twig', array(
            'certification' => $certification,
            'edit_form' => $editForm->createView(),
            'certification_delete_form' => $certification_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a certification entity.
     *
     */
    public function deleteAction(Request $request, Certification $certification)
    {
        $form = $this->createDeleteForm($certification);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($certification);
            $em->flush($certification);
        }

        return $this->redirectToRoute('demarches_certification_index');
    }

    /**
     * Creates a form to delete a certification entity.
     *
     * @param Certification $demarches The certification entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Certification $certification)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('demarches_certification_delete', array('id' => $certification->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}