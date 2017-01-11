<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fournisseur
 */
class Fournisseur
{
    public $file1;

    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__ . '/../../../web/' . $this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir() . '/' . $this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->image;
    }


    public function preUpload1()
    {
        if (null !== $this->file1) {
            // do whatever you want to generate a unique name
            $this->fournisseur1 = uniqid() . '.' . $this->file1->guessExtension();
        }
    }

    public function upload1()
    {
        if (null === $this->file1) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file1->move($this->getUploadRootDir(), $this->fournisseur1);

        unset($this->file1);
    }

    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        // Add your code here
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        // Add your code here
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        // Add your code here
    }


    /**
     * @var string
     */
    private $image;


    /**
     * Set image
     *
     * @param string $image
     * @return Fournisseur
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @var integer
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
    private $fournisseur1;


    /**
     * Set fournisseur1
     *
     * @param string $fournisseur1
     *
     * @return Fournisseur
     */
    public function setFournisseur1($fournisseur1)
    {
        $this->fournisseur1 = $fournisseur1;

        return $this;
    }

    /**
     * Get fournisseur1
     *
     * @return string
     */
    public function getFournisseur1()
    {
        return $this->fournisseur1;
    }

}