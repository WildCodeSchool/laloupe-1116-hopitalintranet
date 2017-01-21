<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contacts
 */
class Contacts
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
            $this->contactsimg1 = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->contactsimg1);

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
            $this->contactsimg2 = uniqid().'.'.$this->file2->guessExtension();
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
        $this->file2->move($this->getUploadRootDir(), $this->contactsimg2);

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
            $this->contactsimg3 = uniqid().'.'.$this->file3->guessExtension();
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
        $this->file3->move($this->getUploadRootDir(), $this->contactsimg3);

        unset($this->file3);
    }

    public function removeUpload3()
    {
        if ($file3 = $this->getAbsolutePath()) {
            unlink($file3);
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
     * @return Contacts
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
    private $contactsimg1;


    /**
     * @var string
     */
    private $contactsimg2;



    /**
     * @var string
     */
    private $contactsimg3;




    /**
     * Set contactsimg1
     *
     * @param string $contactsimg1
     * @return Contacts
     */
    public function setContactsimg1($contactsimg1)
    {
        $this->contactsimg1 = $contactsimg1;

        return $this;
    }

    /**
     * Get contactsimg1
     *
     * @return string
     */
    public function getContactsimg1()
    {
        return $this->contactsimg1;
    }



    /**
     * Set contactsimg2
     *
     * @param string $contactsimg2
     * @return Contacts
     */
    public function setContactsimg2($contactsimg2)
    {
        $this->contactsimg2 = $contactsimg2;

        return $this;
    }

    /**
     * Get contactsimg2
     *
     * @return string
     */
    public function getContactsimg2()
    {
        return $this->contactsimg2;
    }



    /**
     * Set contactsimg3
     *
     * @param string $contactsimg3
     * @return Contacts
     */
    public function setContactsimg3($contactsimg3)
    {
        $this->contactsimg3 = $contactsimg3;

        return $this;
    }

    /**
     * Get contactsimg3
     *
     * @return string
     */
    public function getContactsimg3()
    {
        return $this->contactsimg3;
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
