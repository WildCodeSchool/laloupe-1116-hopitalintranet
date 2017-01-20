<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paqss
 */
class Paqss
{
    public $file7;

    protected function getUploadDir()
    {
        return 'uploads';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().'/'.$this->image;
    }

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().'/'.$this->image;
    }


    public function preUpload7()
    {
        if (null !== $this->file7) {
            // do whatever you want to generate a unique name
            $this->paqssimg = uniqid().'.'.$this->file7->guessExtension();
        }
    }

    public function upload7()
    {
        if (null === $this->file7) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file7->move($this->getUploadRootDir(), $this->paqssimg);

        unset($this->file7);
    }

    public function removeUpload7()
    {
        if ($file7 = $this->getAbsolutePath()) {
            unlink($file7);
        }
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
    private $image;


    /**
     * Set image
     *
     * @param string $image
     * @return Paqss
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
     * @var string
     */
    private $paqssimg;




    /**
     * Set paqssimg
     *
     * @param string $paqssimg
     * @return Paqss
     */
    public function setPaqssimg($paqssimg)
    {
        $this->paqssimg = $paqssimg;

        return $this;
    }

    /**
     * Get paqssimg
     *
     * @return string
     */
    public function getPaqssimg()
    {
        return $this->paqssimg;
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




}
