<?php

namespace Vl\AnnonceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VlAnnonceBundle:Default:index.html.twig');
    }
}
