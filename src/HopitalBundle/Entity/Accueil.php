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
    /**
     * @var string
     */
    private $bluemediurl;

    /**
     * @var string
     */
    private $bluemedititle;

    /**
     * @var string
     */
    private $viatrajectoirurl;

    /**
     * @var string
     */
    private $viatrajectoirtitle;

    /**
     * @var string
     */
    private $vidalurl;

    /**
     * @var string
     */
    private $vidaltitle;

    /**
     * @var string
     */
    private $dgsurl;

    /**
     * @var string
     */
    private $dgstitle;

    /**
     * @var string
     */
    private $meteourl;

    /**
     * @var string
     */
    private $actuurl;

    /**
     * @var string
     */
    private $actuparam;


    /**
     * Set bluemediurl
     *
     * @param string $bluemediurl
     *
     * @return Accueil
     */
    public function setBluemediurl($bluemediurl)
    {
        $this->bluemediurl = $bluemediurl;

        return $this;
    }

    /**
     * Get bluemediurl
     *
     * @return string
     */
    public function getBluemediurl()
    {
        return $this->bluemediurl;
    }

    /**
     * Set bluemedititle
     *
     * @param string $bluemedititle
     *
     * @return Accueil
     */
    public function setBluemedititle($bluemedititle)
    {
        $this->bluemedititle = $bluemedititle;

        return $this;
    }

    /**
     * Get bluemedititle
     *
     * @return string
     */
    public function getBluemedititle()
    {
        return $this->bluemedititle;
    }

    /**
     * Set viatrajectoirurl
     *
     * @param string $viatrajectoirurl
     *
     * @return Accueil
     */
    public function setViatrajectoirurl($viatrajectoirurl)
    {
        $this->viatrajectoirurl = $viatrajectoirurl;

        return $this;
    }

    /**
     * Get viatrajectoirurl
     *
     * @return string
     */
    public function getViatrajectoirurl()
    {
        return $this->viatrajectoirurl;
    }

    /**
     * Set viatrajectoirtitle
     *
     * @param string $viatrajectoirtitle
     *
     * @return Accueil
     */
    public function setViatrajectoirtitle($viatrajectoirtitle)
    {
        $this->viatrajectoirtitle = $viatrajectoirtitle;

        return $this;
    }

    /**
     * Get viatrajectoirtitle
     *
     * @return string
     */
    public function getViatrajectoirtitle()
    {
        return $this->viatrajectoirtitle;
    }

    /**
     * Set vidalurl
     *
     * @param string $vidalurl
     *
     * @return Accueil
     */
    public function setVidalurl($vidalurl)
    {
        $this->vidalurl = $vidalurl;

        return $this;
    }

    /**
     * Get vidalurl
     *
     * @return string
     */
    public function getVidalurl()
    {
        return $this->vidalurl;
    }

    /**
     * Set vidaltitle
     *
     * @param string $vidaltitle
     *
     * @return Accueil
     */
    public function setVidaltitle($vidaltitle)
    {
        $this->vidaltitle = $vidaltitle;

        return $this;
    }

    /**
     * Get vidaltitle
     *
     * @return string
     */
    public function getVidaltitle()
    {
        return $this->vidaltitle;
    }

    /**
     * Set dgsurl
     *
     * @param string $dgsurl
     *
     * @return Accueil
     */
    public function setDgsurl($dgsurl)
    {
        $this->dgsurl = $dgsurl;

        return $this;
    }

    /**
     * Get dgsurl
     *
     * @return string
     */
    public function getDgsurl()
    {
        return $this->dgsurl;
    }

    /**
     * Set dgstitle
     *
     * @param string $dgstitle
     *
     * @return Accueil
     */
    public function setDgstitle($dgstitle)
    {
        $this->dgstitle = $dgstitle;

        return $this;
    }

    /**
     * Get dgstitle
     *
     * @return string
     */
    public function getDgstitle()
    {
        return $this->dgstitle;
    }

    /**
     * Set meteourl
     *
     * @param string $meteourl
     *
     * @return Accueil
     */
    public function setMeteourl($meteourl)
    {
        $this->meteourl = $meteourl;

        return $this;
    }

    /**
     * Get meteourl
     *
     * @return string
     */
    public function getMeteourl()
    {
        return $this->meteourl;
    }

    /**
     * Set actuurl
     *
     * @param string $actuurl
     *
     * @return Accueil
     */
    public function setActuurl($actuurl)
    {
        $this->actuurl = $actuurl;

        return $this;
    }

    /**
     * Get actuurl
     *
     * @return string
     */
    public function getActuurl()
    {
        return $this->actuurl;
    }

    /**
     * Set actuparam
     *
     * @param string $actuparam
     *
     * @return Accueil
     */
    public function setActuparam($actuparam)
    {
        $this->actuparam = $actuparam;

        return $this;
    }

    /**
     * Get actuparam
     *
     * @return string
     */
    public function getActuparam()
    {
        return $this->actuparam;
    }
}
