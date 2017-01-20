<?php

namespace HopitalBundle\Controller;

use HopitalBundle\Entity\Menu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\MenuType;

/**
 * Menu controller.
 *
 */
class MenuController extends Controller
{
    /**
     * Lists all menu entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $menus = $em->getRepository('HopitalBundle:Menu')->findAll();

        return $this->render('HopitalBundle:personnel:menu_index.html.twig', array(
            'menus' => $menus,

        ));
    }

    /**
     * Creates a new menu entity.
     *
     */
    public function newAction(Request $request)
    {
        $menu = new Menu();
        $form = $this->createForm('HopitalBundle\Form\MenuType', $menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($menu);
            $em->flush($menu);

            return $this->redirectToRoute('personnel_menu_index', array('id' => $menu->getId()));
        }

        return $this->render('HopitalBundle:personnel:menu_new.html.twig', array(
            'menu' => $menu,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing menu entity.
     *
     */
    public function editAction(Request $request, Menu $menu)
    {
        $menu_deleteForm = $this->createDeleteForm($menu);
        $editForm = $this->createForm('HopitalBundle\Form\MenuType', $menu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personnel_menu_edit', array('id' => $menu->getId()));
        }

        return $this->render('HopitalBundle:personnel:menu_edit.html.twig', array(
            'menu' => $menu,
            'edit_form' => $editForm->createView(),
            'menu_delete_form' => $menu_deleteForm->createView(),
        ));
    }

    /**
     * Deletes a menu entity.
     *
     */
    public function deleteAction(Request $request, Menu $menu)
    {
        $form = $this->createDeleteForm($menu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($menu);
            $em->flush($menu);
        }

        return $this->redirectToRoute('personnel_menu_index');
    }

    /**
     * Creates a form to delete a menu entity.
     *
     * @param Menu $personnel The menu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Menu $menu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('personnel_menu_delete', array('id' => $menu->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

}