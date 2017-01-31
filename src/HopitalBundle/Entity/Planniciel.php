<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Planniciel
 */
class Planniciel
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
        return null === $this->planniciel1 ? null : $this->getUploadDir() . '/' . $this->planniciel1;
    }

    public function getAbsolutePath()
    {
        return null === $this->planniciel1 ? null : $this->getUploadRootDir() . '/' . $this->planniciel1;
    }


    public function preUpload1()
    {
        if (null !== $this->file1) {
            // do whatever you want to generate a unique name
            $this->setPlanniciel1 = uniqid() . '.' . $this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->planniciel1);

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
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $planniciel1;

    /**
     * @var string
     */
    private $titre;


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
     * Set planniciel1
     *
     * @param string $planniciel1
     *
     * @return Planniciel
     */
    public function setPlanniciel1($planniciel1)
    {
        $this->planniciel1 = $planniciel1;

        return $this;
    }

    /**
     * Get planniciel1
     *
     * @return string
     */
    public function getPlanniciel1()
    {
        return $this->planniciel1;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Planniciel
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
}
