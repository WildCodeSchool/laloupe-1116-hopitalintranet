<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lienssites
 */
class Lienssites
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
            $this->sitechartres = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->sitechartres);

        unset($this->file1);
    }

    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
        }
    }





    public $file2;

    public function preUpload2()
    {
        if (null !== $this->file2) {
            // do whatever you want to generate a unique name
            $this->sitenogent = uniqid().'.'.$this->file2->guessExtension();
        }
    }

    public function upload2()
    {
        if (null === $this->file2) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file2->move($this->getUploadRootDir(), $this->sitenogent);

        unset($this->file2);
    }

    public function removeUpload2()
    {
        if ($file2 = $this->getAbsolutePath()) {
            unlink($file2);
        }
    }





    public $file3;

    public function preUpload3()
    {
        if (null !== $this->file3) {
            // do whatever you want to generate a unique name
            $this->sitedreux = uniqid().'.'.$this->file2->guessExtension();
        }
    }

    public function upload3()
    {
        if (null === $this->file3) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file3->move($this->getUploadRootDir(), $this->sitedreux);

        unset($this->file3);
    }

    public function removeUpload3()
    {
        if ($file3 = $this->getAbsolutePath()) {
            unlink($file3);
        }
    }
    public $file4;

    public function preUpload4()
    {
        if (null !== $this->file4) {
            // do whatever you want to generate a unique name
            $this->sitebonneval = uniqid().'.'.$this->file4->guessExtension();
        }
    }

    public function upload4()
    {
        if (null === $this->file4) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file4->move($this->getUploadRootDir(), $this->sitebonneval);

        unset($this->file4);
    }

    public function removeUpload4()
    {
        if ($file4 = $this->getAbsolutePath()) {
            unlink($file4);
        }
    }
    public $file5;

    public function preUpload5()
    {
        if (null !== $this->file5) {
            // do whatever you want to generate a unique name
            $this->plansbatbrc = uniqid().'.'.$this->file5->guessExtension();
        }
    }

    public function upload5()
    {
        if (null === $this->file5) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file5->move($this->getUploadRootDir(), $this->plansbatbrc);

        unset($this->file5);
    }

    public function removeUpload5()
    {
        if ($file5 = $this->getAbsolutePath()) {
            unlink($file5);
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
     * @return Lienssites
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
    private $sitechartres;

    /**
     * @var string
     */
    private $sitenogent;

    /**
     * @var string
     */
    private $sitedreux;

    /**
     * @var string
     */
    private $sitebonneval;

    /**
     * @var string
     */
    private $sitechateaudun;


    /**
     * Set sitechartres
     *
     * @param string $sitechartres
     * @return Lienssites
     */
    public function setSitechartres($sitechartres)
    {
        $this->sitechartres = $sitechartres;

        return $this;
    }

    /**
     * Get sitechartres
     *
     * @return string
     */
    public function getSitechartres()
    {
        return $this->sitechartres;
    }

    /**
     * Set sitenogent
     *
     * @param string $sitenogent
     * @return Lienssites
     */
    public function setSitenogent($sitenogent)
    {
        $this->sitenogent = $sitenogent;

        return $this;
    }

    /**
     * Get sitenogent
     *
     * @return string
     */
    public function getSitenogent()
    {
        return $this->sitenogent;
    }

    /**
     * Set sitedreux
     *
     * @param string $sitedreux
     * @return Lienssites
     */
    public function setSitedreux($sitedreux)
    {
        $this->sitedreux = $sitedreux;

        return $this;
    }

    /**
     * Get sitedreux
     *
     * @return string
     */
    public function getSitedreux()
    {
        return $this->sitedreux;
    }

    /**
     * Set sitebonneval
     *
     * @param string $sitebonneval
     * @return Lienssites
     */
    public function setSitebonneval($sitebonneval)
    {
        $this->sitebonneval = $sitebonneval;

        return $this;
    }

    /**
     * Get sitebonneval
     *
     * @return string
     */
    public function getSitebonneval()
    {
        return $this->sitebonneval;
    }

    /**
     * Set sitechateaudun
     *
     * @param string $sitechateaudun
     * @return Lienssites
     */
    public function setSitechateaudun($sitechateaudun)
    {
        $this->sitechateaudun = $sitechateaudun;

        return $this;
    }

    /**
     * Get sitechateaudun
     *
     * @return string
     */
    public function getSitechateaudun()
    {
        return $this->sitechateaudun;
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
