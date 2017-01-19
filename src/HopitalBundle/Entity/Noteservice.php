<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Noteservice
 */
class Noteservice
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
            $this->noteserviceimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->noteserviceimg);
        unset($this->file1);
    }
    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
        }
    }
    /**
     * Set titlenoteservice
     *
     * @param string $titlenoteservice
     * @return Noteservice
     */
    public function setTitlenoteservice($titlenoteservice)
    {
        $this->titlenoteservice = $titlenoteservice;
        return $this;
    }
    /**
     * Get titlenoteservice
     *
     * @return string
     */
    public function getTitlenoteservice()
    {
        return $this->titlenoteservice;
    }
    /**
     * Set idnoteservice
     *
     * @param string $idnoteservice
     * @return Noteservice
     */
    public function setIdnoteservice($idnoteservice)
    {
        $this->idnoteservice = $idnoteservice;
        return $this;
    }
    /**
     * Get idnoteservice
     *
     * @return string
     */
    public function getIdnoteservice()
    {
        return $this->idnoteservice;
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
     * @var string
     */
    private $titlenoteservice;
    /**
     * @var string
     */
    private $idnoteservice;
    /**
     * Set image
     *
     * @param string $image
     * @return Noteservice
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
    private $noteserviceimg;
    /**
     * Set noteserviceimg
     *
     * @param string $noteserviceimg
     * @return Noteservice
     */
    public function setNoteserviceimg($noteserviceimg)
    {
        $this->noteserviceimg = $noteserviceimg;
        return $this;
    }
    /**
     * Get noteserviceimg
     *
     * @return string
     */
    public function getNoteserviceimg()
    {
        return $this->noteserviceimg;
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