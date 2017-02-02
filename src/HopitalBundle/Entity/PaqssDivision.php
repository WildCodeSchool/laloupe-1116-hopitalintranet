<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaqssDivision
 */
class PaqssDivision
{

    public function __toString()
    {
        return $this->division;
    }

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
    private $division;


    /**
     * Set division
     *
     * @param string $division
     *
     * @return PaqssDivision
     */
    public function setDivision($division)
    {
        $this->division = $division;

        return $this;
    }

    /**
     * Get division
     *
     * @return string
     */
    public function getDivision()
    {
        return $this->division;
    }
    /**
     * @var integer
     */
    private $photos;


    /**
     * Set photos
     *
     * @param integer $photos
     *
     * @return PaqssDivision
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return integer
     */
    public function getPhotos()
    {
        return $this->photos;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add photo
     *
     * @param \HopitalBundle\Entity\Paqss $photo
     *
     * @return PaqssDivision
     */
    public function addPhoto(\HopitalBundle\Entity\Paqss $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \HopitalBundle\Entity\Paqss $photo
     */
    public function removePhoto(\HopitalBundle\Entity\Paqss $photo)
    {
        $this->photos->removeElement($photo);
    }
}
