<?php
namespace HopitalBundle\Controller;
use HopitalBundle\Entity\Administratif;
use HopitalBundle\Entity\Commune;
use HopitalBundle\Entity\Medical;
use HopitalBundle\Entity\Technique;
use HopitalBundle\Repository\AdministratifRepository;
use HopitalBundle\Repository\MedicalRepository;
use HopitalBundle\Repository\CommuneRepository;
use HopitalBundle\Repository\TechniqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use HopitalBundle\Form\AdministratifType;
use HopitalBundle\Form\MedicalType;
use HopitalBundle\Form\CommuneType;
use HopitalBundle\Form\TechniqueType;
/**
 * Astreintes controller.
 *
 */
class AstreintesController extends Controller
{
    /***********INDEX ACTION*************/
    /**
     * Lists all astreintes entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $administratifs = $em->getRepository('HopitalBundle:Administratif')->findAll();
        $medicals = $em->getRepository('HopitalBundle:Medical')->findAll();
        $communes = $em->getRepository('HopitalBundle:Commune')->findAll();
        $techniques = $em->getRepository('HopitalBundle:Technique')->findAll();
        return $this->render('HopitalBundle:documentation:astreintes_index.html.twig', array(
            'administratifs' => $administratifs,
            'medicals' => $medicals,
            'communes' => $communes,
            'techniques' => $techniques,
        ));
    }
    /***********NEW ACTION*************/
    /**
     * Creates a new administratif entity.
     *
     */
    public function newAdministratifAction(Request $request)
    {
        $administratif = new Administratif();
        $formAdministratif = $this->createForm('HopitalBundle\Form\AdministratifType', $administratif);
        $formAdministratif->handleRequest($request);
        if ($formAdministratif->isSubmitted() && $formAdministratif->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($administratif);
            $em->flush($administratif);
            return $this->redirectToRoute('documentation_astreintesadministratif_index', array('id' => $administratif->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintesadministratif_new.html.twig', array(
            'administratif' => $administratif,
            'formAdministratif' => $formAdministratif->createView(),
        ));
    }
    /**
     * Creates a new medical entity.
     *
     */
    public function newMedicalAction(Request $request)
    {
        $medical = new Medical();
        $formMedical = $this->createForm('HopitalBundle\Form\MedicalType', $medical);
        $formMedical->handleRequest($request);
        if ($formMedical->isSubmitted() && $formMedical->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($medical);
            $em->flush($medical);
            return $this->redirectToRoute('documentation_astreintesmedical_index', array('id' => $medical->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintesmedical_new.html.twig', array(
            'medical' => $medical,
            'formMedical' => $formMedical->createView(),
        ));
    }
    /**
     * Creates a new commune entity.
     *
     */
    public function newCommuneAction(Request $request)
    {
        $commune = new Commune();
        $formCommune = $this->createForm('HopitalBundle\Form\CommuneType', $commune);
        $formCommune->handleRequest($request);
        if ($formCommune->isSubmitted() && $formCommune->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commune);
            $em->flush($commune);
            return $this->redirectToRoute('documentation_astreintescommune_index', array('id' => $commune->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintescommune_new.html.twig', array(
            'commune' => $commune,
            'formCommune' => $formCommune->createView(),
        ));
    }
    /**
     * Creates a new technique entity.
     *
     */
    public function newTechniqueAction(Request $request)
    {
        $technique = new Technique();
        $formTechnique = $this->createForm('HopitalBundle\Form\TechniqueType', $technique);
        $formTechnique->handleRequest($request);
        if ($formTechnique->isSubmitted() && $formTechnique->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($technique);
            $em->flush($technique);
            return $this->redirectToRoute('documentation_astreintestechnique_index', array('id' => $technique->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintestechnique_new.html.twig', array(
            'technique' => $technique,
            'formTechnique' => $formTechnique->createView(),
        ));
    }

    /***********EDIT ACTION*************/
    /**
     * Displays a form to edit an existing administratif entity.
     *
     */
    public function editAdministratifAction(Request $request, Administratif $administratif)
    {
        $astreintes_deleteAdministratifForm = $this->createDeleteAdministratifForm($administratif);
        $editAdministratifForm = $this->createForm('HopitalBundle\Form\AdministratifType', $administratif);
        $editAdministratifForm->handleRequest($request);
        if ($editAdministratifForm->isSubmitted() && $editAdministratifForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('documentation_astreintesadministratif_edit', array('id' => $administratif->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintesadministratif_edit.html.twig', array(
            'administratif' => $administratif,
            'edit_form_administratif' => $editAdministratifForm->createView(),
            'astreintes_delete_form_administratif' => $astreintes_deleteAdministratifForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing medical entity.
     *
     */
    public function editMedicalAction(Request $request, Medical $medical)
    {
        $astreintes_deleteMedicalForm = $this->createDeleteMedicalForm($medical);
        $editMedicalForm = $this->createForm('HopitalBundle\Form\MedicalType', $medical);
        $editMedicalForm->handleRequest($request);
        if ($editMedicalForm->isSubmitted() && $editMedicalForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('documentation_astreintesmedical_edit', array('id' => $medical->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintesmedical_edit.html.twig', array(
            'medical' => $medical,
            'edit_form_medical' => $editMedicalForm->createView(),
            'astreintes_delete_form_medical' => $astreintes_deleteMedicalForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing commune entity.
     *
     */
    public function editCommuneAction(Request $request, Commune $commune)
    {
        $astreintes_deleteCommuneForm = $this->createDeleteCommuneForm($commune);
        $editCommuneForm = $this->createForm('HopitalBundle\Form\CommuneType', $commune);
        $editCommuneForm->handleRequest($request);
        if ($editCommuneForm->isSubmitted() && $editCommuneForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('documentation_astreintescommune_edit', array('id' => $commune->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintescommune_edit.html.twig', array(
            'commune' => $commune,
            'edit_form_commune' => $editCommuneForm->createView(),
            'astreintes_delete_form_commune' => $astreintes_deleteCommuneForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing technique entity.
     *
     */
    public function editTechniqueAction(Request $request, Technique $technique)
    {
        $astreintes_deleteTechniqueForm = $this->createDeleteTechniqueForm($technique);
        $editTechniqueForm = $this->createForm('HopitalBundle\Form\TechniqueType', $technique);
        $editTechniqueForm->handleRequest($request);
        if ($editTechniqueForm->isSubmitted() && $editTechniqueForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('documentation_astreintestechnique_edit', array('id' => $technique->getId()));
        }
        return $this->render('HopitalBundle:documentation:astreintestechnique_edit.html.twig', array(
            'technique' => $technique,
            'edit_form_technique' => $editTechniqueForm->createView(),
            'astreintes_delete_form_technique' => $astreintes_deleteTechniqueForm->createView(),
        ));
    }
    /***********DELETE ACTION*************/
    /**
     * Deletes a administratif entity.
     *
     */
    public function deleteAdministratifAction(Request $request, Administratif $administratif)
    {
        $formAdministratif = $this->createDeleteAdministratifForm($administratif);
        $formAdministratif->handleRequest($request);
        if ($formAdministratif->isSubmitted() && $formAdministratif->isValid()) {
            $administratifem = $this->getDoctrine()->getManager();
            $administratifem->remove($administratif);
            $administratifem->flush($administratif);
        }
        return $this->redirectToRoute('documentation_astreintes_index');
    }
    /**
     * Creates a form to delete a administratif entity.
     *
     * @param Astreintes $documentation The administratif entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteAdministratifForm(Administratif $administratif)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_astreintesadministratif_delete', array('id' => $administratif->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
    /**
     * Deletes a medical entity.
     *
     */
    public function deleteMedicalAction(Request $request, Medical $medical)
    {
        $formMedical = $this->createDeleteMedicalForm($medical);
        $formMedical->handleRequest($request);
        if ($formMedical->isSubmitted() && $formMedical->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($medical);
            $em->flush($medical);
        }
        return $this->redirectToRoute('documentation_astreintes_index');
    }
    /**
     * Creates a form to delete a medical entity.
     *
     * @param Astreintes $documentation The medical entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteMedicalForm(Medical $medical)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_astreintesmedical_delete', array('id' => $medical->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
    /**
     * Deletes a commune entity.
     *
     */
    public function deleteCommuneAction(Request $request, Commune $commune)
    {
        $formCommune = $this->createDeleteCommuneForm($commune);
        $formCommune->handleRequest($request);
        if ($formCommune->isSubmitted() && $formCommune->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commune);
            $em->flush($commune);
        }
        return $this->redirectToRoute('documentation_astreintes_index');
    }
    /**
     * Creates a form to delete a commune entity.
     *
     * @param Astreintes $documentation The v entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteCommuneForm(Commune $commune)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_astreintescommune_delete', array('id' => $commune->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
    /**
     * Deletes a technique entity.
     *
     */
    public function deleteTechniqueAction(Request $request, Technique $technique)
    {
        $formTechnique = $this->createDeleteTechniqueForm($technique);
        $formTechnique->handleRequest($request);
        if ($formTechnique->isSubmitted() && $formTechnique->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($technique);
            $em->flush($technique);
        }
        return $this->redirectToRoute('documentation_astreintes_index');
    }
    /**
     * Creates a form to delete a technique entity.
     *
     * @param Astreintes $documentation The technique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteTechniqueForm(Technique $technique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('documentation_astreintestechnique_delete', array('id' =>$technique->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }
}