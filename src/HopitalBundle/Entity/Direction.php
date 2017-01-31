<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Direction
 */
class Direction
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
            $this->directionimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->directionimg);
        unset($this->file1);
    }
    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
        }
    }
    /**
     * Set titledirection
     *
     * @param string $titledirection
     * @return Direction
     */
    public function setTitledirection($titledirection)
    {
        $this->titledirection = $titledirection;
        return $this;
    }
    /**
     * Get titledirection
     *
     * @return string
     */
    public function getTitledirection()
    {
        return $this->titledirection;
    }
    /**
     * Set iddirection
     *
     * @param string $iddirection
     * @return Direction
     */
    public function setIddirection($iddirection)
    {
        $this->iddirection = $iddirection;
        return $this;
    }
    /**
     * Get iddirection
     *
     * @return string
     */
    public function getIddirection()
    {
        return $this->iddirection;
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
    private $titledirection;
    /**
     * @var string
     */
    private $iddirection;
    /**
     * Set image
     *
     * @param string $image
     * @return Direction
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
    private $directionimg;
    /**
     * Set directionimg
     *
     * @param string $directionimg
     * @return Direction
     */
    public function setDirectionimg($directionimg)
    {
        $this->directionimg = $directionimg;
        return $this;
    }
    /**
     * Get directionimg
     *
     * @return string
     */
    public function getDirectionimg()
    {
        return $this->directionimg;
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
