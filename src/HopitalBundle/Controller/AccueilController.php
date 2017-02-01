<?php

namespace HopitalBundle\Controller;

use Doctrine\Common\Persistence\Mapping\ClassMetadata;
use HopitalBundle\Entity\Accueil;
use HopitalBundle\Repository\AbstractRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Accueil controller.
 *
 */
class AccueilController extends Controller
{
    /**
     * Lists all accueil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $meta = $em->getMetadataFactory()->getAllMetadata();
        
        $entities = array();
        $route_mapper = array(
            'HopitalBundle\Entity\Noteservice' => [
                'route'     => 'documentation_noteservice_index',
                'text'   => 'Il y a une nouvelle note de service.'
            ],
            'HopitalBundle\Entity\Postvacant'   => [
                'route'     => 'personnel_postvacant_index',
                'text'   => 'Il y a un nouveau poste vacant.'
            ],
            'HopitalBundle\Entity\Administratif' => [
                'route' => 'documentation_astreintes_index',
                'text'  => 'Il y a une nouvelle astreinte de disponible'
            ]
        );

        $entitiesMapper = array(
            'HopitalBundle\Entity\Administratif'    => [],
            'HopitalBundle\Entity\Articles' => [],
            'HopitalBundle\Entity\Basedoc'  => [],
            'HopitalBundle\Entity\Certification'    => [],
            'HopitalBundle\Entity\Commune'  => [],
            'HopitalBundle\Entity\Direction'    => [],
            'HopitalBundle\Entity\EppRubrique' => [],
            'HopitalBundle\Entity\GalerieCategorie'    => [],
            'HopitalBundle\Entity\Ght'    => [],
            'HopitalBundle\Entity\InstancesRubrique' => [],
            'HopitalBundle\Entity\Journaux'  => [],
            'HopitalBundle\Entity\Lettreinfo'  => [],
            'HopitalBundle\Entity\Medical'    => [],
            'HopitalBundle\Entity\Menu'  => [],
            'HopitalBundle\Entity\Noteservice' => [],
            'HopitalBundle\Entity\PaqssRubrique' => [],
            'HopitalBundle\Entity\Postvacant' => [],
            'HopitalBundle\Entity\ProcessusCategorie' => [],
            'HopitalBundle\Entity\Technique' => []
        );

        // Contient les messages que l'on affichera dans la vue finale
        $messagesDisplayer = array();
        
        /** @var ClassMetadata $m */
        foreach ($meta as $m) {
            if (strpos($m->getName(), 'HopitalBundle') !== false) {
                $entities[$m->getName()] = $em->getRepository($m->getName())->findLast();
            }
        }

        // On enlève le premier index du tableau entités, pour retirer l'instance de l'entité Accueil
        array_splice($entities, 0, 1);
        
        foreach ($entities as $entity => $data) {
            if (array_key_exists($entity, $route_mapper)) {
                $entitiesMapper[$entity] = $route_mapper[$entity];
                array_push($messagesDisplayer, $entitiesMapper[$entity]);
            } else {
                array_splice($entitiesMapper, 0, 1);
            }
        }
        $accueils = $em->getRepository('HopitalBundle:Accueil')->findAll();

        return $this->render('HopitalBundle:accueil:index.html.twig', array(
            'accueils' => $accueils,
            'messagesToDisplay' => $messagesDisplayer
        ));
    }

    /**
     * Creates a new accueil entity.
     *
     */
    /*public function newAction(Request $request)
    {
        $accueil = new Accueil();
        $form = $this->createForm('HopitalBundle\Form\AccueilType', $accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($accueil);
            $em->flush($accueil);

            return $this->redirectToRoute('accueil_index', array('id' => $accueil->getId()));
        }

        return $this->render('@Hopital/accueil/new.html.twig', array(
            'accueil' => $accueil,
            'form' => $form->createView(),
        ));
    }*/


    /**
     * Displays a form to edit an existing accueil entity.
     *
     */
    public function editAction(Request $request, Accueil $accueil)
    {
        $deleteForm = $this->createDeleteForm($accueil);
        $editForm = $this->createForm('HopitalBundle\Form\AccueilType', $accueil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('accueil_edit', array('id' => $accueil->getId()));
        }

        return $this->render('HopitalBundle:accueil:edit.html.twig', array(
            'accueil' => $accueil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a accueil entity.
     *
     */
    public function deleteAction(Request $request, Accueil $accueil)
    {
        $form = $this->createDeleteForm($accueil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($accueil);
            $em->flush($accueil);
        }

        return $this->redirectToRoute('accueil_index');
    }

    /**
     * Creates a form to delete a accueil entity.
     *
     * @param Accueil $accueil The accueil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Accueil $accueil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('accueil_delete', array('id' => $accueil->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}
