<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bulletinoff
 */
class Bulletinoff
{
    public $file1;

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


    public function preUpload1()
    {
        if (null !== $this->file1) {
            // do whatever you want to generate a unique name
            $this->bulletinoffimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->bulletinoffimg);

        unset($this->file1);
    }

    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
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
     * @return Bulletinoff
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
    private $bulletinoffimg;




    /**
     * Set bulletinoffimg
     *
     * @param string $bulletinoffimg
     * @return Bulletinoff
     */
    public function setBulletinoffimg($bulletinoffimg)
    {
        $this->bulletinoffimg = $bulletinoffimg;

        return $this;
    }

    /**
     * Get bulletinoffimg
     *
     * @return string
     */
    public function getBulletinoffimg()
    {
        return $this->bulletinoffimg;
    }

    /**
     * @var string
     */
    private $bulletinofftitle;

    /**
     * Set bulletinofftitle
     *
     * @param string $bulletinofftitle
     * @return Bulletinoff
     */
    public function setBulletinofftitle($bulletinofftitle)
    {
        $this->bulletinofftitle = $bulletinofftitle;

        return $this;
    }
    /**
     * Get bulletinofftitle
     *
     * @return string
     */
    public function getBulletinofftitle()
    {
        return $this->bulletinofftitle;
    }


    /**
     * @var string
     */
    private $bulletinoffdescription;

    /**
     * Set bulletinoffdescription
     *
     * @param string $bulletinoffdescription
     * @return Bulletinoff
     */
    public function setBulletinoffdescription($bulletinoffdescription)
    {
        $this->bulletinoffdescription = $bulletinoffdescription;

        return $this;
    }
    /**
     * Get bulletinoffdescription
     *
     * @return string
     */
    public function getBulletinoffdescription()
    {
        return $this->bulletinoffdescription;
    }
    /**
     * @var string
     */
    private $bulletinoffurl;




    /**
     * Set bulletinoffurl
     *
     * @param string $bulletinoffurl
     * @return Bulletinoff
     */
    public function setBulletinoffurl($bulletinoffurl)
    {
        $this->bulletinoffurl = $bulletinoffurl;

        return $this;
    }

    /**
     * Get bulletinoffurl
     *
     * @return string
     */
    public function getBulletinoffurl()
    {
        return $this->bulletinoffurl;
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
