<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 */
class Groupe
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;


    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Groupe
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $groupemessage;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupemessage = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add groupemessage
     *
     * @param \HopitalBundle\Entity\Groupe $groupemessage
     *
     * @return Groupe
     */
    public function addGroupemessage(\HopitalBundle\Entity\Groupe $groupemessage)
    {
        $this->groupemessage[] = $groupemessage;

        return $this;
    }

    /**
     * Remove groupemessage
     *
     * @param \HopitalBundle\Entity\Groupe $groupemessage
     */
    public function removeGroupemessage(\HopitalBundle\Entity\Groupe $groupemessage)
    {
        $this->groupemessage->removeElement($groupemessage);
    }

    /**
     * Get groupemessage
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupemessage()
    {
        return $this->groupemessage;
    }
}
