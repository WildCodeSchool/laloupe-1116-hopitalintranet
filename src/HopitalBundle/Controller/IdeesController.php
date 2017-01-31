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


    public function mailAction()
    {
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
        return $this->render('HopitalBundle:personnel:idees_mail.html.twig');
    }

}