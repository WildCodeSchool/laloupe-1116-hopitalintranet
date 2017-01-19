<?php


namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Accueil
 */
class Accueil
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
