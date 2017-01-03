<?php

namespace Vl\AgendaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VlAgendaBundle:Default:index.html.twig');
    }
}
