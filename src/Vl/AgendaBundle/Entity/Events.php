<?php

namespace Vl\AgendaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Events
 */
class Events
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $start;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var \Vl\AgendaBundle\Entity\Images
     */
    private $image;

    /**
     * @var bool
     */
    private $addHomeActu;

    /**
     * @var string
     */
    private $salle;

    /**
     * @var string
     */
    private $voiture;

    /**
     * @var string
     */
    private $evenement;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set start
     *
     * @param \DateTime $start
     * @return Events
     */
    public function setStart($start)
    {
        $this->start = $start;

        return $this;
    }

    /**
     * Get start
     *
     * @return \DateTime 
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Events
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set titre
     *
     * @param string $titre
     * @return Events
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
     * Set contenu
     *
     * @param string $contenu
     * @return Events
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set images
     *
     * @param \Vl\AgendaBundle\Entity\Images $images
     * @return Events
     */
    public function setImage(\Vl\AgendaBundle\Entity\Images $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get images
     *
     * @return \Vl\AgendaBundle\Entity\Images
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set addHomeActu
     *
     * @param boolean $addHomeActu
     * @return Events
     */
    public function setAddHomeActu($addHomeActu)
    {
        $this->addHomeActu = $addHomeActu;

        return $this;
    }

    /**
     * Get addHomeActu
     *
     * @return boolean 
     */
    public function getAddHomeActu()
    {
        return $this->addHomeActu;
    }

    /**
     * Set salle
     *
     * @param integer $salle
     * @return Events
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * Get salle
     *
     * @return integer 
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * Set voiture
     *
     * @param integer $voiture
     * @return Events
     */
    public function setVoiture($voiture)
    {
        $this->voiture = $voiture;

        return $this;
    }

    /**
     * Get voiture
     *
     * @return integer 
     */
    public function getVoiture()
    {
        return $this->voiture;
    }

    /**
     * Set evenement
     *
     * @param integer $evenement
     * @return Events
     */
    public function setEvenement($evenement)
    {
        $this->evenement = $evenement;

        return $this;
    }

    /**
     * Get evenement
     *
     * @return integer 
     */
    public function getEvenement()
    {
        return $this->evenement;
    }
    /**
     * @var string
     */
    private $color;


    /**
     * Set color
     *
     * @param string $color
     * @return Events
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string 
     */
    public function getColor()
    {
        return $this->color;
    }
    /**
     * @var \Vl\AgendaBundle\Entity\Images
     */
    private $images;


    /**
     * Set images
     *
     * @param \Vl\AgendaBundle\Entity\Images $images
     * @return Events
     */
    public function setImages(\Vl\AgendaBundle\Entity\Images $images = null)
    {
        $this->images = $images;

        return $this;
    }

    /**
     * Get images
     *
     * @return \Vl\AgendaBundle\Entity\Images 
     */
    public function getImages()
    {
        return $this->images;
    }
}
