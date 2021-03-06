<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Covoiturage
 */
class Covoiturage
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
            $this->covoiturageimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->covoiturageimg);

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
     * @return Covoiturage
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
    private $covoiturageimg;




    /**
     * Set covoiturageimg
     *
     * @param string $covoiturageimg
     * @return Covoiturage
     */
    public function setCovoiturageimg($covoiturageimg)
    {
        $this->covoiturageimg = $covoiturageimg;

        return $this;
    }

    /**
     * Get covoiturageimg
     *
     * @return string
     */
    public function getCovoiturageimg()
    {
        return $this->covoiturageimg;
    }


    /**
     * @var string
     */
    private $covoituragetitle;

    /**
     * Set covoituragetitle
     *
     * @param string $covoituragetitle
     * @return Covoiturage
     */
    public function setCovoituragetitle($covoituragetitle)
    {
        $this->covoituragetitle = $covoituragetitle;

        return $this;
    }
    /**
     * Get covoituragetitle
     *
     * @return string
     */
    public function getCovoituragetitle()
    {
        return $this->covoituragetitle;
    }


    /**
     * @var string
     */
    private $covoituragedescription;

    /**
     * Set covoituragedescription
     *
     * @param string $covoituragedescription
     * @return Covoiturage
     */
    public function setCovoituragedescription($covoituragedescription)
    {
        $this->covoituragedescription = $covoituragedescription;

        return $this;
    }
    /**
     * Get covoituragedescription
     *
     * @return string
     */
    public function getCovoituragedescription()
    {
        return $this->covoituragedescription;
    }
    /**
     * @var string
     */
    private $covoiturageurl;




    /**
     * Set covoiturageurl
     *
     * @param string $covoiturageurl
     * @return Covoiturage
     */
    public function setCovoiturageurl($covoiturageurl)
    {
        $this->covoiturageurl = $covoiturageurl;

        return $this;
    }

    /**
     * Get covoiturageurl
     *
     * @return string
     */
    public function getCovoiturageurl()
    {
        return $this->covoiturageurl;
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
