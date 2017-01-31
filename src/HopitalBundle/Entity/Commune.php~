<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Commune
 */
class Commune
{
    public $file3;
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
    public function preUpload3()
    {
        if (null !== $this->file3) {
            // do whatever you want to generate a unique name
            $this->communeimg = uniqid().'.'.$this->file3->guessExtension();
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
        $this->file3->move($this->getUploadRootDir(), $this->communeimg);
        unset($this->file3);
    }
    public function removeUpload3()
    {
        if ($file3 = $this->getAbsolutePath()) {
            unlink($file3);
        }
    }
    /**
     * Set titlecommune
     *
     * @param string $titlecommune
     * @return Commune
     */
    public function setTitlecommune($titlecommune)
    {
        $this->titlecommune = $titlecommune;
        return $this;
    }
    /**
     * Get titlecommune
     *
     * @return string
     */
    public function getTitlecommune()
    {
        return $this->titlecommune;
    }
    /**
     * Set idcommune
     *
     * @param string $idcommune
     * @return Commune
     */
    public function setIdcommune($idcommune)
    {
        $this->idcommune = $idcommune;
        return $this;
    }
    /**
     * Get idcommune
     *
     * @return string
     */
    public function getIdcommune()
    {
        return $this->idcommune;
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
    private $titlecommune;
    /**
     * @var string
     */
    private $idcommune;
    /**
     * Set image
     *
     * @param string $image
     * @return Commune
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
    private $communeimg;
    /**
     * Set communeimg
     *
     * @param string $communeimg
     * @return Commune
     */
    public function setCommuneimg($communeimg)
    {
        $this->communeimg = $communeimg;
        return $this;
    }
    /**
     * Get communeimg
     *
     * @return string
     */
    public function getCommuneimg()
    {
        return $this->communeimg;
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
