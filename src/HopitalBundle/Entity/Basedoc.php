<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Basedoc
 */
class Basedoc
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
            $this->basedocimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->basedocimg);
        unset($this->file1);
    }
    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
        }
    }
    /**
     * Set titlebasedoc
     *
     * @param string $titlebasedoc
     * @return Basedoc
     */
    public function setTitlebasedoc($titlebasedoc)
    {
        $this->titlebasedoc = $titlebasedoc;
        return $this;
    }
    /**
     * Get titlebasedoc
     *
     * @return string
     */
    public function getTitlebasedoc()
    {
        return $this->titlebasedoc;
    }
    /**
     * Set idbasedoc
     *
     * @param string $idbasedoc
     * @return Basedoc
     */
    public function setIdbasedoc($idbasedoc)
    {
        $this->idbasedoc = $idbasedoc;
        return $this;
    }
    /**
     * Get idbasedoc
     *
     * @return string
     */
    public function getIdbasedoc()
    {
        return $this->idbasedoc;
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
    private $titlebasedoc;
    /**
     * @var string
     */
    private $idbasedoc;
    /**
     * Set image
     *
     * @param string $image
     * @return Basedoc
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
    private $basedocimg;
    /**
     * Set basedocimg
     *
     * @param string $basedocimg
     * @return Basedoc
     */
    public function setBasedocimg($basedocimg)
    {
        $this->basedocimg = $basedocimg;
        return $this;
    }
    /**
     * Get basedocimg
     *
     * @return string
     */
    public function getBasedocimg()
    {
        return $this->basedocimg;
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