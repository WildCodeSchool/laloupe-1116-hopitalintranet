<?php

namespace HopitalBundle\Tests\Controller;

use Liip\FunctionalTestBundle\Test\WebTestCase;


class AccueilControllerTest extends WebTestCase
{

    public function testAccueil()
    {
        // Create a new client to browse the application
        $client = static::createClient();

        // Create a new entry in the database
        $crawler = $client->request('GET', '/accueil');

        $this->assertEquals('Symfony\Bundle\FrameworkBundle\Controller\RedirectController::urlRedirectAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertEquals(301, $client->getResponse()->getStatusCode());

        $client->followRedirect();

        $this->assertEquals('HopitalBundle\Controller\AccueilController::indexAction', $client->getRequest()->attributes->get('_controller'));
        //$this->assertEquals(200, $client->getResponse()->getStatusCode());

    }


}
