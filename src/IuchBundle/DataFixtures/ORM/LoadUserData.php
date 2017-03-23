<?php

// src/IuchBundle/DataFixtures/ORM/LoadUserData.php

namespace IuchBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadUserData extends AbstractFixture implements ContainerAwareInterface, FixtureInterface, OrderedFixtureInterface

{
    /**
     * @var ContainerInterface
     */
    private $container;
    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    public function load(ObjectManager $manager)
    {

        // Get our userManager, you must implement `ContainerAwareInterface`
        $userManager = $this->container->get('fos_user.user_manager');

        // Create our users and set details
        $user1 = $userManager->createUser();
        $user1->setUsername('admin');
        $user1->setPlainPassword('admin');
        $user1->setRoles(array('ROLE_SUPER_ADMIN'));
        $user1->setLastLogin(new \DateTime('now'));
        $user1->setFonction($this->getReference('10'));
        $user1->setService($this->getReference('4'));
        $user1->setcodeCopieur('3');
        $userManager->updateUser($user1, true);

        $user2 = $userManager->createUser();
        $user2->setUsername('erwan');
        $user2->setPlainPassword('erwan');
        $user2->setRoles(array('ROLE_SUPER_ADMIN'));
        $user2->setLastLogin(new \DateTime('now'));
        $user2->setFonction($this->getReference('10'));
        $user2->setService($this->getReference('4'));
        $user2->setcodeCopieur('3');
        $userManager->updateUser($user2, true);

        // store reference to admin role for User relation to Role
        $this->addReference('201', $user1);

    }
    public function getOrder()
    {
        return 3; // ordre d'appel
    }
}
