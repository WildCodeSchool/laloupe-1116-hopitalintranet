<?php

namespace Vl\AgendaBundle\Controller;

use Vl\AgendaBundle\Entity\Events;
use Vl\AgendaBundle\Form\EventsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Event controller.
 *
 */
class EventsController extends Controller
{
    /**
     * Lists all event entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('VlAgendaBundle:Events')->findAll();

        $normalizer = new ObjectNormalizer();

        $encoder = new JsonEncoder();

        $dateCallback = function ($dateTime) {
            return $dateTime instanceof \DateTime
                ? $dateTime->format(\DateTime::ISO8601)
                : '';
        };

        $normalizer->setCallbacks(array('start' => $dateCallback, 'end' => $dateCallback));

        $serializer = new Serializer(array($normalizer), array($encoder));
        $jsonObject = $serializer->serialize($entities, 'json');

        $response = new Response();
        $response->setContent($jsonObject);

        return $response;
    }

    /**
     * Creates a new event entity.
     *
     */
    public function newAction(Request $request, $start)
    {
        $event = new Events();
        if ($start == 0) {
            $newTime = new \DateTime();
            $startEvent = $newTime->format('d-m-Y H:i:s');
            $event->setStart(new \DateTime($startEvent));
            $endtime = new \DateTime();
            $endEvent = $endtime->format('d-m-Y H:i:s');
            $event->setEnd(new \DateTime($endEvent));
        }


        else {
            $event->setStart(new \DateTime($start));
            $event->setEnd(new \DateTime($start));
        }

        $form = $this->createForm('Vl\AgendaBundle\Form\EventsType', $event);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('vl_agenda_homepage');
        }

        return $this->render('VlAgendaBundle:events:new.html.twig', array(
            'event' => $event,
            'form' => $form->createView(),
        ));
    }



/**
     * Finds and displays all events entity.
     *
     */
    public function showAllEventsAction(){
        $em = $this->getDoctrine()->getManager();
        $events = $em->getRepository('VlAgendaBundle:Events')->findBy(array(), array('start' => 'desc'));

        return $this->render('@VlAgenda/events/index.html.twig', array(
            'events' => $events
        ));
    }

    /**
     * Displays a form to edit an existing event entity.
     *
     */
    public function editAction(Request $request, Events $event)
    {
        $editForm = $this->createForm('Vl\AgendaBundle\Form\EventsType', $event);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($event);
            $em->flush();

            return $this->redirectToRoute('vl_agenda_homepage', array('id' => $event->getId()));
        }

        return $this->render('VlAgendaBundle:events:edit.html.twig', array(
            'event' => $event,
            'edit_form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a event entity.
     *
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $event = $em->getRepository('VlAgendaBundle:Events')->findOneById($id);
        $img_evenement = $em->getRepository('VlAgendaBundle:Images')->findOneById($event->getImages()->getId());

        if (!empty($event))
        {
            $em->remove($img_evenement);
            $em->remove($event);
            $em->flush();
        }

        return $this->redirectToRoute('vl_agenda_homepage');
    }


}
