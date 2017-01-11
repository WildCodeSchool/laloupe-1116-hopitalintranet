<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Direction
 */
class Direction
{
    public $file6;

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


    public function preUpload6()
    {
        if (null !== $this->file6) {
            // do whatever you want to generate a unique name
            $this->directionimg = uniqid().'.'.$this->file6->guessExtension();
        }
    }

    public function upload6()
    {
        if (null === $this->file6) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file6->move($this->getUploadRootDir(), $this->directionimg);

        unset($this->file6);
    }

    public function removeUpload6()
    {
        if ($file6 = $this->getAbsolutePath()) {
            unlink($file6);
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
     * @return Direction
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
    private $directionimg;


    /**
     * Set directionimg
     *
     * @param string $directionimg
     * @return Direction
     */
    public function setDirectionimg($directionimg)
    {
        $this->directionimg = $directionimg;

        return $this;
    }

    /**
     * Get directionimg
     *
     * @return string
     */
    public function getDirectionimg()
    {
        return $this->directionimg;
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
