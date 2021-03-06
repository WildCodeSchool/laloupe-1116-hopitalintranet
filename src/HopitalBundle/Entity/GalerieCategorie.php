<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GalerieCategorie
 */
class GalerieCategorie
{

  public function __toString()
  {
    return $this->categorie;
  }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $categorie;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $photos;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return GalerieCategorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add photo
     *
     * @param \HopitalBundle\Entity\Galerie $photo
     *
     * @return GalerieCategorie
     */
    public function addPhoto(\HopitalBundle\Entity\Galerie $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \HopitalBundle\Entity\Galerie $photo
     */
    public function removePhoto(\HopitalBundle\Entity\Galerie $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }
}
