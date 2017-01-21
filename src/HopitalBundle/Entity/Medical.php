<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Medical
 */
class Medical
{
    public $file2;
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
    public function preUpload2()
    {
        if (null !== $this->file2) {
            // do whatever you want to generate a unique name
            $this->medicalimg = uniqid().'.'.$this->file2->guessExtension();
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
        $this->file2->move($this->getUploadRootDir(), $this->medicalimg);
        unset($this->file2);
    }
    public function removeUpload2()
    {
        if ($file2 = $this->getAbsolutePath()) {
            unlink($file2);
        }
    }
    /**
     * Set titlemedical
     *
     * @param string $titlemedical
     * @return Medical
     */
    public function setTitlemedical($titlemedical)
    {
        $this->titlemedical = $titlemedical;
        return $this;
    }
    /**
     * Get titlemedical
     *
     * @return string
     */
    public function getTitlemedical()
    {
        return $this->titlemedical;
    }
    /**
     * Set idmedical
     *
     * @param string $idmedical
     * @return Medical
     */
    public function setIdmedical($idmedical)
    {
        $this->idmedical = $idmedical;
        return $this;
    }
    /**
     * Get idmedical
     *
     * @return string
     */
    public function getIdmedical()
    {
        return $this->idmedical;
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
    private $titlemedical;
    /**
     * @var string
     */
    private $idmedical;
    /**
     * Set image
     *
     * @param string $image
     * @return Medical
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
    private $medicalimg;
    /**
     * Set medicalimg
     *
     * @param string $medicalimg
     * @return Medical
     */
    public function setMedicalimg($medicalimg)
    {
        $this->medicalimg = $medicalimg;
        return $this;
    }
    /**
     * Get medicalimg
     *
     * @return string
     */
    public function getMedicalimg()
    {
        return $this->medicalimg;
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
