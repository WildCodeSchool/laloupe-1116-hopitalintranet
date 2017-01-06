<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Personnel;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Personnel controller.
 *
 */
class PersonnelController extends Controller
{
    /**
     * Lists all personnel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personnels = $em->getRepository('HopitalBundle:Personnel')->findAll();

        return $this->render('HopitalBundle:personnel:index.html.twig', array(
            'personnels' => $personnels,
        ));
    }

    /**
     * Creates a new personnel entity.
     *
     */
    public function newAction(Request $request)
    {
        $personnel = new Personnel();
        $form = $this->createForm('HopitalBundle\Form\PersonnelType', $personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($personnel);
            $em->flush($personnel);

            return $this->redirectToRoute('personnel_show', array('id' => $personnel->getId()));
        }

        return $this->render('HopitalBundle:personnel:new.html.twig', array(
            'personnel' => $personnel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a personnel entity.
     *
     */
    public function showAction(Personnel $personnel)
    {
        $deleteForm = $this->createDeleteForm($personnel);

        return $this->render('HopitalBundle:personnel:show.html.twig', array(
            'personnel' => $personnel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing personnel entity.
     *
     */
    public function editAction(Request $request, Personnel $personnel)
    {
        $deleteForm = $this->createDeleteForm($personnel);
        $editForm = $this->createForm('HopitalBundle\Form\PersonnelType', $personnel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_edit', array('id' => $personnel->getId()));
        }

        return $this->render('HopitalBundle:personnel:edit.html.twig', array(
            'personnel' => $personnel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a personnel entity.
     *
     */
    public function deleteAction(Request $request, Personnel $personnel)
    {
        $form = $this->createDeleteForm($personnel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($personnel);
            $em->flush($personnel);
        }

        return $this->redirectToRoute('personnel_index');
    }

    /**
     * Creates a form to delete a personnel entity.
     *
     * @param Personnel $personnel The personnel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Personnel $personnel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_delete', array('id' => $personnel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }



    /**********************CODE AJOUTÉ ***********************************



    /**
     * Lists all personnel entities.
     *
     */
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personnels = $em->getRepository('HopitalBundle:Personnel')->findAll();

        return $this->render('HopitalBundle:personnel:menu.html.twig', array(
            'personnels' => $personnels,
        ));
    }

    /**
     * Lists all personnel entities.
     *
     */
    public function postvacantAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personnels = $em->getRepository('HopitalBundle:Personnel')->findAll();

        return $this->render('HopitalBundle:personnel:postvacant.html.twig', array(
            'personnels' => $personnels,
        ));
    }

    /**
     * Lists all personnel entities.
     *
     */
    public function covoiturageAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personnels = $em->getRepository('HopitalBundle:Personnel')->findAll();

        return $this->render('HopitalBundle:personnel:covoiturage.html.twig', array(
            'personnels' => $personnels,
        ));
    }

    /**
     * Lists all personnel entities.
     *
     */
    public function plannicielAction()
    {
        $em = $this->getDoctrine()->getManager();

        $personnels = $em->getRepository('HopitalBundle:Personnel')->findAll();

        return $this->render('HopitalBundle:personnel:planniciel.html.twig', array(
            'personnels' => $personnels,
        ));
    }

    /**
     * Lists all personnel entities.
     *
     */
    public function ideesAction()
    {
        $Request = $this->getRequest();
        if ($Request->getMethod() == "POST") {
            $subject = $Request->get("object");

            $message = ""."\n\n".$Request->get("message");

            $message = \Swift_Message::newInstance('Test')
                ->setSubject($subject)
                ->setFrom(array('boiteaidees28@gmail.com' =>'Site internet'))
                ->setTo(array('retatsylvie@gmail.com'))
                ->setBody($message);
            $this->get('mailer')->send($message);

        }
        return $this->render('HopitalBundle:personnel:idees.html.twig');
    }



}
