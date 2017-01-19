<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Articles
 */
class Articles
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
            $this->articlesimg = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->articlesimg);
        unset($this->file1);
    }
    public function removeUpload1()
    {
        if ($file1 = $this->getAbsolutePath()) {
            unlink($file1);
        }
    }
    /**
     * Set titlearticles
     *
     * @param string $titlearticles
     * @return Articles
     */
    public function setTitlearticles($titlearticles)
    {
        $this->titlearticles = $titlearticles;
        return $this;
    }
    /**
     * Get titlearticles
     *
     * @return string
     */
    public function getTitlearticles()
    {
        return $this->titlearticles;
    }
    /**
     * Set idarticles
     *
     * @param string $idarticles
     * @return Articles
     */
    public function setIdarticles($idarticles)
    {
        $this->idarticles = $idarticles;
        return $this;
    }
    /**
     * Get idarticles
     *
     * @return string
     */
    public function getIdarticles()
    {
        return $this->idarticles;
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
    private $titlearticles;
    /**
     * @var string
     */
    private $idarticles;
    /**
     * Set image
     *
     * @param string $image
     * @return Articles
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
    private $articlesimg;
    /**
     * Set articlesimg
     *
     * @param string $articlesimg
     * @return Articles
     */
    public function setArticlesimg($articlesimg)
    {
        $this->articlesimg = $articlesimg;
        return $this;
    }
    /**
     * Get articlesimg
     *
     * @return string
     */
    public function getArticlesimg()
    {
        return $this->articlesimg;
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