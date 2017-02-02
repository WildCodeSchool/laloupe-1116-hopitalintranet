<?php
namespace HopitalBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Communication
 */
class Communication
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





    public $file2;

    public function preUpload2()
    {
        if (null !== $this->file2) {
            // do whatever you want to generate a unique name
            $this->ghtimg = uniqid().'.'.$this->file2->guessExtension();
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
        $this->file2->move($this->getUploadRootDir(), $this->ghtimg);
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
            $this->lettreinfoimg = uniqid().'.'.$this->file3->guessExtension();
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
        $this->file3->move($this->getUploadRootDir(), $this->lettreinfoimg);
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
            $this->articlesimg = uniqid().'.'.$this->file4->guessExtension();
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
        $this->file4->move($this->getUploadRootDir(), $this->articlesimg);
        unset($this->file4);
    }
    public function removeUpload4()
    {
        if ($file4 = $this->getAbsolutePath()) {
            unlink($file4);
        }
    }




    /******* ID *********/

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



    /******* IMAGE *********/

    /**
     * @var string
     */
    private $image;

    /**
     * Set image
     *
     * @param string $image
     * @return Communication
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



    /******* DIRECTION IMAGE *********/

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



    /******* GHT IMAGE *********/

    /**
     * @var string
     */
    private $ghtimg;

    /**
     * Set ghtimg
     *
     * @param string $ghtimg
     * @return Ght
     */
    public function setGhtimg($ghtimg)
    {
        $this->ghtimg = $ghtimg;
        return $this;
    }

    /**
     * Get ghtimg
     *
     * @return string
     */
    public function getGhtimg()
    {
        return $this->ghtimg;
    }



    /******* LETTRE INFO IMAGE *********/

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



    /******* ARTICLES IMAGE *********/

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





    /******* DIRECTION TITRE *********/

    /**
     * @var string
     */
    private $titledirection;


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



    /******* GHT TITRE *********/

    /**
     * @var string
     */
    private $titleght;


    /**
     * Set titleght
     *
     * @param string $titleght
     * @return Ght
     */
    public function setTitleght($titleght)
    {
        $this->titleght = $titleght;
        return $this;
    }
    /**
     * Get titleght
     *
     * @return string
     */
    public function getTitleght()
    {
        return $this->titleght;
    }



    /******* LETTREINFO TITRE *********/

    /**
     * @var string
     */
    private $titlelettreinfo;


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



    /******* ARTICLES TITRE *********/

    /**
     * @var string
     */
    private $titlearticles;


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



    /******* DIRECTION ID *********/

    /**
     * @var string
     */
    private $iddirection;


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

    /******* GHT ID *********/

    /**
     * @var string
     */
    private $idght;


    /**
     * Set idght
     *
     * @param string $idght
     * @return Direction
     */
    public function setIdght($idght)
    {
        $this->idght = $idght;
        return $this;
    }
    /**
     * Get idght
     *
     * @return string
     */
    public function getIdght()
    {
        return $this->idght;
    }


    /******* LETTREINFO ID *********/

    /**
     * @var string
     */
    private $idlettreinfo;


    /**
     * Set idlettreinfo
     *
     * @param string $idlettreinfo
     * @return Direction
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


    /******* ARTICLES ID *********/

    /**
     * @var string
     */
    private $idarticles;


    /**
     * Set idarticles
     *
     * @param string $idarticles
     * @return Direction
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



}
