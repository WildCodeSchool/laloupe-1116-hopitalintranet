<?php

namespace IuchBundle\Entity;

/**
 * ServiceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServiceRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAll()
    {
        return $this->findBy(array(), array('nom' => 'ASC'));
    }
}
