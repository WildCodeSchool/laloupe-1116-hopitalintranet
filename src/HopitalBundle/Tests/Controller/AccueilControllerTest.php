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

        $this->assertEquals('HopitalBundle\Controller\AccueilController::indexAction', $client->getRequest()->attributes->get('_controller'));
        $this->assertTrue(200 === $client->getResponse()->getStatusCode());


    }


}
