<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Idees
 */
class Idees
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ideestitle;

    /**
     * @var string
     */
    private $txtdef;


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
     * Set ideestitle
     *
     * @param string $ideestitle
     *
     * @return Idees
     */
    public function setIdeestitle($ideestitle)
    {
        $this->ideestitle = $ideestitle;

        return $this;
    }

    /**
     * Get ideestitle
     *
     * @return string
     */
    public function getIdeestitle()
    {
        return $this->ideestitle;
    }

    /**
     * Set txtdef
     *
     * @param string $txtdef
     *
     * @return Idees
     */
    public function setTxtdef($txtdef)
    {
        $this->txtdef = $txtdef;

        return $this;
    }

    /**
     * Get txtdef
     *
     * @return string
     */
    public function getTxtdef()
    {
        return $this->txtdef;
    }
}
