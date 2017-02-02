<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Instances;
use HopitalBundle\Entity\InstancesRubrique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Instances controller.
 *
 */
class InstancesController extends Controller
{
    /**
     * Lists all instances entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $instancess = $em->getRepository('HopitalBundle:Instances')->findAll();
        $rubriques = $em->getRepository('HopitalBundle:InstancesRubrique')->findAll();


        return $this->render('HopitalBundle:documentation:instances_index.html.twig', array(
            'instancess' => $instancess,
            'rubriques' => $rubriques,
        ));
    }

    /**
     * Lists all instances entities.
     *
     */
    public function index_adminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $instancess = $em->getRepository('HopitalBundle:Instances')->findAll();
        $rubriques = $em->getRepository('HopitalBundle:InstancesRubrique')->findAll();


        return $this->render('HopitalBundle:documentation:instances_index_admin.html.twig', array(
            'instancess' => $instancess,
            'rubriques' => $rubriques,
        ));
    }

    /**
     * Lists all instances entities.
     *
     */
    public function index_showAction(InstancesRubrique $instancesRubrique)
    {
        $em = $this->getDoctrine()->getManager();
        $instancess = $em->getRepository('HopitalBundle:Instances')->findAll();


        return $this->render('HopitalBundle:documentation:instances_index_show.html.twig', array(
            'instancess' => $instancess,
            'rubrique' => $instancesRubrique,
        ));
    }

    /**
     * Creates a new instances entity.
     *
     */
    public function newAction(Request $request)
    {
        $instances = new Instances();
        $form = $this->createForm('HopitalBundle\Form\InstancesType', $instances);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($instances);
            $em->flush($instances);

            return $this->redirectToRoute('documentation_instances_index', array('id' => $instances->getId()));
        }

        return $this->render('HopitalBundle:documentation:instances_new.html.twig', array(
            'instances' => $instances,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new instances entity.
     *
     */
    public function newRubriqueAction(Request $request)
    {
        $rubrique = new InstancesRubrique();
        $form = $this->createForm('HopitalBundle\Form\InstancesRubriqueType', $rubrique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rubrique);
            $em->flush($rubrique);

            return $this->redirectToRoute('documentation_instances_index');
        }

        return $this->render('HopitalBundle:documentation:instancesrubrique_new.html.twig', array(
            'rubrique' => $rubrique,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing instances entity.
     *
     */
    public function editAction(Request $request, Instances $instances)
    {
        $deleteForm = $this->createDeleteForm($instances);
        $editForm = $this->createForm('HopitalBundle\Form\InstancesType', $instances);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_instances_index', array('id' => $instances->getId()));
        }

        return $this->render('HopitalBundle:documentation:instances_edit.html.twig', array(
            'instances' => $instances,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing instances entity.
     *
     */
    public function editRubriqueAction(Request $request, InstancesRubrique $instancesRubrique)
    {
        $deleteForm = $this->createDeleteRubriqueForm($instancesRubrique);
        $editForm = $this->createForm('HopitalBundle\Form\InstancesRubriqueType', $instancesRubrique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('documentation_instances_index', array('id' => $instancesRubrique->getId()));
        }

        return $this->render('HopitalBundle:documentation:instancesrubrique_edit.html.twig', array(
            'instances' => $instancesRubrique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a instances entity.
     *
     */
    public function deleteRubriqueAction(Request $request, InstancesRubrique $instancesRubrique)
    {
        $form = $this->createDeleteRubriqueForm($instancesRubrique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($instancesRubrique);
            $em->flush($instancesRubrique);
        }

        return $this->redirectToRoute('documentation_instances_index');
    }

    /**
     * Deletes a instances entity.
     *
     */
    public function deleteAction(Request $request, Instances $instances)
    {
        $form = $this->createDeleteForm($instances);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($instances);
            $em->flush($instances);
        }

        return $this->redirectToRoute('documentation_instances_index');
    }

    /**
     * Creates a form to delete a instances entity.
     *
     * @param Instances $presentation The instances entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Instances $instances)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_instances_delete', array('id' => $instances->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
    private function createDeleteRubriqueForm(InstancesRubrique $instancesRubrique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_instancesrubrique_delete', array('id' => $instancesRubrique->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}