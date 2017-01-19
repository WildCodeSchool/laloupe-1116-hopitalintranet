<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Idees;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\IdeesType;
use HopitalBundle\Repository\IdeesRepository;

/**
 * Idees controller.
 *
 */
class IdeesController extends Controller
{
    /**
     * Lists all idees entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $idees = $em->getRepository('HopitalBundle:Idees')->findAll();

        return $this->render('HopitalBundle:personnel:idees_index.html.twig', array(
            'idees' => $idees,
        ));
    }

    /**
     * Creates a new idees entity.
     *
     */
    public function newAction(Request $request)
    {
        $idees = new Idees();
        $form = $this->createForm('HopitalBundle\Form\IdeesType', $idees);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($idees);
            $em->flush($idees);

            return $this->redirectToRoute('personnel_idees_show', array('id' => $idees->getId()));
        }

        return $this->render('HopitalBundle:personnel:idees_new.html.twig', array(
            'idees' => $idees,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a idees entity.
     *
     */
    public function showAction(Idees $idees)
    {
        $idees_deleteForm = $this->createDeleteForm($idees);

        return $this->render('HopitalBundle:personnel:idees_show.html.twig', array(
            'idees' => $idees,
            'idees_delete_form' => $idees_deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing idees entity.
     *
     */
    public function editAction(Request $request, Idees $idees)
    {
        $idees_deleteForm = $this->createDeleteForm($idees);
        $editForm = $this->createForm('HopitalBundle\Form\IdeesType', $idees);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_idees_edit', array('id' => $idees->getId()));
        }

        return $this->render('HopitalBundle:personnel:idees_edit.html.twig', array(
            'idees' => $idees,
            'edit_form' => $editForm->createView(),
            'idees_delete_form' => $idees_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a idees entity.
     *
     */
    public function deleteAction(Request $request, Idees $idees)
    {
        $form = $this->createDeleteForm($idees);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($idees);
            $em->flush($idees);
        }

        return $this->redirectToRoute('personnel_idees_index');
    }

    /**
     * Creates a form to delete a idees entity.
     *
     * @param Idees $idees The idees entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Idees $idees)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_idees_delete', array('id' => $idees->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }


    public function ideesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Request = $this->getRequest();
        if ($Request->getMethod() == "POST") {
            $subject = $Request->get("object");

            $message = "" . "\n\n" . $Request->get("message");

            $message = \Swift_Message::newInstance('Test')
                ->setSubject($subject)
                ->setFrom(array('boiteaidees28@gmail.com' => 'Site internet'))
                ->setTo(array('retatsylvie@gmail.com'))
                ->setBody($message);
            $this->get('mailer')->send($message);



        }
        return $this->render('HopitalBundle:personnel:idees_index.html.twig');
    }

}