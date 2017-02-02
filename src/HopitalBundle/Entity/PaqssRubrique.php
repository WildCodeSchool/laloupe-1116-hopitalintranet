<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaqssRubrique
 */
class PaqssRubrique
{

    public function __toString()
    {
        return $this->rubrique;
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
    private $rubrique;


    /**
     * Set rubrique
     *
     * @param string $rubrique
     *
     * @return PaqssRubrique
     */
    public function setRubrique($rubrique)
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    /**
     * Get rubrique
     *
     * @return string
     */
    public function getRubrique()
    {
        return $this->rubrique;
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
     * @return PaqssRubrique
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
     * @return PaqssRubrique
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
