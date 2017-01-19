<?php

namespace Vl\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 */
class Commentaire
{

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $utilisateur;

    /**
     * @var string
     */
    private $message;


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
     * Set utilisateur
     *
     * @param string $utilisateur
     * @return Commentaire
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return string 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Commentaire
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }
    /**
     * @var \Vl\AnnonceBundle\Entity\Annonce
     */
    private $annonce;


    /**
     * Set annonces
     *
     * @param \Vl\AnnonceBundle\Entity\Annonce $annonces
     *
     * @return Commentaire
     */
    public function setAnnonces(\Vl\AnnonceBundle\Entity\Annonce $annonces = null)
    {
        $this->annonces = $annonces;

        return $this;
    }

    /**
     * Get annonces
     *
     * @return \Vl\AnnonceBundle\Entity\Annonce
     */
    public function getAnnonces()
    {
        return $this->annonces;
    }
    /**
     * @var \Vl\AnnonceBundle\Entity\Annonce
     */
    private $annonces;


    /**
     * @var \Vl\AnnonceBundle\Entity\Cgos
     */
    private $cgos;


    /**
     * Set cgoss
     *
     * @param \Vl\AnnonceBundle\Entity\Cgos $cgoss
     *
     * @return Commentaire
     */
    public function setCgoss(\Vl\AnnonceBundle\Entity\Cgos $cgoss = null)
    {
        $this->cgoss = $cgoss;

        return $this;
    }

    /**
     * Get cgoss
     *
     * @return \Vl\AnnonceBundle\Entity\Cgos
     */
    public function getCgoss()
    {
        return $this->cgoss;
    }
    /**
     * @var \Vl\AnnonceBundle\Entity\Cgos
     */
    private $cgoss;




    /**
     * @var \Vl\AnnonceBundle\Entity\Amicale
     */
    private $amicale;


    /**
     * Set amicales
     *
     * @param \Vl\AnnonceBundle\Entity\Amicale $amicales
     *
     * @return Commentaire
     */
    public function setAmicales(\Vl\AnnonceBundle\Entity\Amicale $amicales = null)
    {
        $this->amicales = $amicales;

        return $this;
    }

    /**
     * Get amicales
     *
     * @return \Vl\AnnonceBundle\Entity\Amicale
     */
    public function getAMicales()
    {
        return $this->amicales;
    }
    /**
     * @var \Vl\AnnonceBundle\Entity\Amicale
     */
    private $amicales
    ;

}
