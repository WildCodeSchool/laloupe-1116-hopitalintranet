<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Technique
 */
class Technique
{
    public $file4;
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
    public function preUpload4()
    {
        if (null !== $this->file4) {
            // do whatever you want to generate a unique name
            $this->techniqueimg = uniqid().'.'.$this->file4->guessExtension();
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
        $this->file4->move($this->getUploadRootDir(), $this->techniqueimg);
        unset($this->file4);
    }
    public function removeUpload4()
    {
        if ($file4 = $this->getAbsolutePath()) {
            unlink($file4);
        }
    }
    /**
     * Set titletechnique
     *
     * @param string $titletechnique
     * @return Technique
     */
    public function setTitletechnique($titletechnique)
    {
        $this->titletechnique = $titletechnique;
        return $this;
    }
    /**
     * Get titletechnique
     *
     * @return string
     */
    public function getTitletechnique()
    {
        return $this->titletechnique;
    }
    /**
     * Set idtechnique
     *
     * @param string $idtechnique
     * @return Technique
     */
    public function setIdtechnique($idtechnique)
    {
        $this->idtechnique = $idtechnique;
        return $this;
    }
    /**
     * Get idtechnique
     *
     * @return string
     */
    public function getIdtechnique()
    {
        return $this->idtechnique;
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
    private $titletechnique;
    /**
     * @var string
     */
    private $idtechnique;
    /**
     * Set image
     *
     * @param string $image
     * @return Technique
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
    private $techniqueimg;
    /**
     * Set techniqueimg
     *
     * @param string $techniqueimg
     * @return Technique
     */
    public function setTechniqueimg($techniqueimg)
    {
        $this->techniqueimg = $techniqueimg;
        return $this;
    }
    /**
     * Get techniqueimg
     *
     * @return string
     */
    public function getTechniqueimg()
    {
        return $this->techniqueimg;
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
