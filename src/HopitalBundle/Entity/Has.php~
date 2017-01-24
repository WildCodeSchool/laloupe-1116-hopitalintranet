<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Has
 */
class Has
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
            $this->hasimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->hasimg);

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
     * @return Has
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
    private $hasimg;




    /**
     * Set hasimg
     *
     * @param string $hasimg
     * @return Has
     */
    public function setHasimg($hasimg)
    {
        $this->hasimg = $hasimg;

        return $this;
    }

    /**
     * Get hasimg
     *
     * @return string
     */
    public function getHasimg()
    {
        return $this->hasimg;
    }

    /**
     * @var string
     */
    private $hastitle;

    /**
     * Set hastitle
     *
     * @param string $hastitle
     * @return Has
     */
    public function setHastitle($hastitle)
    {
        $this->hastitle = $hastitle;

        return $this;
    }
    /**
     * Get hastitle
     *
     * @return string
     */
    public function getHastitle()
    {
        return $this->hastitle;
    }


    /**
     * @var string
     */
    private $hasdescription;

    /**
     * Set hasdescription
     *
     * @param string $hasdescription
     * @return Has
     */
    public function setHasdescription($hasdescription)
    {
        $this->hasdescription = $hasdescription;

        return $this;
    }
    /**
     * Get hasdescription
     *
     * @return string
     */
    public function getHasdescription()
    {
        return $this->hasdescription;
    }
    /**
     * @var string
     */
    private $hasurl;




    /**
     * Set hasurl
     *
     * @param string $hasurl
     * @return Has
     */
    public function setHasurl($hasurl)
    {
        $this->hasurl = $hasurl;

        return $this;
    }

    /**
     * Get hasurl
     *
     * @return string
     */
    public function getHasurl()
    {
        return $this->hasurl;
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
