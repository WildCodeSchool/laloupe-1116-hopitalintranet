<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Lettreinfo
 */
class Lettreinfo
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
            $this->lettreinfoimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->lettreinfoimg);
        unset($this->file1);
    }
    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
        }
    }
    /**
     * Set titlelettreinfo
     *
     * @param string $titlelettreinfo
     * @return Lettreinfo
     */
    public function setTitlelettreinfo($titlelettreinfo)
    {
        $this->titlelettreinfo = $titlelettreinfo;
        return $this;
    }
    /**
     * Get titlelettreinfo
     *
     * @return string
     */
    public function getTitlelettreinfo()
    {
        return $this->titlelettreinfo;
    }
    /**
     * Set idlettreinfo
     *
     * @param string $idlettreinfo
     * @return Lettreinfo
     */
    public function setIdlettreinfo($idlettreinfo)
    {
        $this->idlettreinfo = $idlettreinfo;
        return $this;
    }
    /**
     * Get idlettreinfo
     *
     * @return string
     */
    public function getIdlettreinfo()
    {
        return $this->idlettreinfo;
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
    private $titlelettreinfo;
    /**
     * @var string
     */
    private $idlettreinfo;
    /**
     * Set image
     *
     * @param string $image
     * @return Lettreinfo
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
    private $lettreinfoimg;
    /**
     * Set lettreinfoimg
     *
     * @param string $lettreinfoimg
     * @return Lettreinfo
     */
    public function setLettreinfoimg($lettreinfoimg)
    {
        $this->lettreinfoimg = $lettreinfoimg;
        return $this;
    }
    /**
     * Get lettreinfoimg
     *
     * @return string
     */
    public function getLettreinfoimg()
    {
        return $this->lettreinfoimg;
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
