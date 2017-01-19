<?php
namespace HopitalBundle\Controller;
use HopitalBundle\Entity\Plans;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Plans controller.
 *
 */
class PlansController extends Controller
{
    /**
     * Lists all plans entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $planss = $em->getRepository('HopitalBundle:Plans')->findAll();
        return $this->render('HopitalBundle:presentation:plans_index.html.twig', array(
            'planss' => $planss,
        ));
    }
    /**
     * Creates a new plans entity.
     *
     */
    public function newAction(Request $request)
    {
        $plans = new Plans();
        $form = $this->createForm('HopitalBundle\Form\PlansType', $plans);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($plans);
            $em->flush($plans);
            return $this->redirectToRoute('presentation_plans_index', array('id' => $plans->getId()));
        }
        return $this->render('HopitalBundle:presentation:plans_new.html.twig', array(
            'plans' => $plans,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing plans entity.
     *
     */
    public function editAction(Request $request, Plans $plans)
    {
        $plans_deleteForm = $this->createDeleteForm($plans);
        $editForm = $this->createForm('HopitalBundle\Form\PlansType', $plans);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('presentation_plans_edit', array('id' => $plans->getId()));
        }
        return $this->render('HopitalBundle:presentation:plans_edit.html.twig', array(
            'plans' => $plans,
            'edit_form' => $editForm->createView(),
            'plans_delete_form' => $plans_deleteForm->createView(),
        ));
    }
    /**
     * Deletes a plans entity.
     *
     */
    public function deleteAction(Request $request, Plans $plans)
    {
        $form = $this->createDeleteForm($plans);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($plans);
            $em->flush($plans);
        }
        return $this->redirectToRoute('presentation_plans_index');
    }
    /**
     * Creates a form to delete a plans entity.
     *
     * @param Plans $presentation The plans entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Plans $plans)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('presentation_plans_delete', array('id' => $plans->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}