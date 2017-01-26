<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagesjaunes
 */
class Pagesjaunes
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
            $this->pagesjaunesimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->pagesjaunesimg);

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
     * @return Pagesjaunes
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
    private $pagesjaunesimg;




    /**
     * Set pagesjaunesimg
     *
     * @param string $pagesjaunesimg
     * @return Pagesjaunes
     */
    public function setPagesjaunesimg($pagesjaunesimg)
    {
        $this->pagesjaunesimg = $pagesjaunesimg;

        return $this;
    }

    /**
     * Get pagesjaunesimg
     *
     * @return string
     */
    public function getPagesjaunesimg()
    {
        return $this->pagesjaunesimg;
    }


    /**
     * @var string
     */
    private $pagesjaunestitle;

    /**
     * Set pagesjaunestitle
     *
     * @param string $pagesjaunestitle
     * @return Pagesjaunes
     */
    public function setPagesjaunestitle($pagesjaunestitle)
    {
        $this->pagesjaunestitle = $pagesjaunestitle;

        return $this;
    }
    /**
     * Get pagesjaunestitle
     *
     * @return string
     */
    public function getPagesjaunestitle()
    {
        return $this->pagesjaunestitle;
    }


    /**
     * @var string
     */
    private $pagesjaunesdescription;

    /**
     * Set pagesjaunesdescription
     *
     * @param string $pagesjaunesdescription
     * @return Pagesjaunes
     */
    public function setPagesjaunesdescription($pagesjaunesdescription)
    {
        $this->pagesjaunesdescription = $pagesjaunesdescription;

        return $this;
    }
    /**
     * Get pagesjaunesdescription
     *
     * @return string
     */
    public function getPagesjaunesdescription()
    {
        return $this->pagesjaunesdescription;
    }
    /**
     * @var string
     */
    private $pagesjaunesurl;




    /**
     * Set pagesjaunesurl
     *
     * @param string $pagesjaunesurl
     * @return Pagesjaunes
     */
    public function setPagesjaunesurl($pagesjaunesurl)
    {
        $this->pagesjaunesurl = $pagesjaunesurl;

        return $this;
    }

    /**
     * Get pagesjaunesurl
     *
     * @return string
     */
    public function getPagesjaunesurl()
    {
        return $this->pagesjaunesurl;
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
