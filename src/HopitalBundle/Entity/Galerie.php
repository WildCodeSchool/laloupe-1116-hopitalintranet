<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Galerie
 */
class Galerie
{
    public $galerie1;

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
        return null === $this->galerie1 ? null : $this->getUploadDir() . '/' . $this->galerie1;

    }

    public function getAbsolutePath()
    {
        return null === $this->galerie1 ? null : $this->getUploadRootDir() . '/' . $this->galerie1;
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null === $this->galerie1) {
            return;
        }

        $this->galerie1->move($this->getUploadRootDir(), $this->galerie1);

        unset($this->file);
    }


    /**
     * @ORM\PreUpdate
     */
    public function preUpload()
    {
        if (null === $this->galerie1) {
            return;
    }

        $this->galerie1->move($this->getUploadRootDir(), $this->galerie1);

        unset($this->file);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }

    /**code géréré
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


}
