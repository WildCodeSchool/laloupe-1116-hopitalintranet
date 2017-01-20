<?php

namespace HopitalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 */
class Menu
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
            $this->menu1img = uniqid().'.'.$this->file1->guessExtension();
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
        $this->file1->move($this->getUploadRootDir(), $this->menu1img);

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
            $this->menu2img = uniqid().'.'.$this->file2->guessExtension();
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
        $this->file2->move($this->getUploadRootDir(), $this->menu2img);

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
            $this->menu3img = uniqid().'.'.$this->file3->guessExtension();
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
        $this->file3->move($this->getUploadRootDir(), $this->menu3img);

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
            $this->menu4img = uniqid().'.'.$this->file4->guessExtension();
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
        $this->file4->move($this->getUploadRootDir(), $this->menu4img);

        unset($this->file4);
    }

    public function removeUpload4()
    {
        if ($file4 = $this->getAbsolutePath()) {
            unlink($file4);
        }
    }

    public $file5;


    public function preUpload5()
    {
        if (null !== $this->file5) {
            // do whatever you want to generate a unique name
            $this->menuimgrempl = uniqid().'.'.$this->file5->guessExtension();
        }
    }

    public function upload5()
    {
        if (null === $this->file5) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file5->move($this->getUploadRootDir(), $this->menuimgrempl);

        unset($this->file5);
    }

    public function removeUpload5()
    {
        if ($file5= $this->getAbsolutePath()) {
            unlink($file5);
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
     * @var int
     */
    private $idmenu1;
    /**
     * Get idmenu1
     *
     * @return integer
     */
    public function getIdmenu1()
    {
        return $this->idmenu1;
    }
    /**
     * @var int
     */
    private $idmenu2;
    /**
     * Get idmenu2
     *
     * @return integer
     */
    public function getIdmenu2()
    {
        return $this->idmenu2;
    }
    /**
     * @var int
     */
    private $idmenu3;
    /**
     * Get idmenu3
     *
     * @return integer
     */
    public function getIdmenu3()
    {
        return $this->idmenu3;
    }
    /**
     * @var int
     */
    private $idmenurempl;
    /**
     * Get idmenurempl
     *
     * @return integer
     */
    public function getIdmenurempl()
    {
        return $this->idmenurempl;
    }

    /**
     * @var int
     */
    private $idmenu4;
    /**
     * Get idmenu4
     *
     * @return integer
     */
    public function getIdmenu4()
    {
        return $this->idmenu4;
    }

    /**
     * @var string
     */
    private $titlemenu1;
    /**
     * Get titlemenu1
     *
     * @return string
     */
    public function getTitlemenu1()
    {
        return $this->titlemenu1;
    }
    /**
     * @var string
     */
    private $titlemenu2;
    /**
     * Get titlemenu2
     *
     * @return string
     */
    public function getTitlemenu2()
    {
        return $this->titlemenu2;
    }
    /**
     * @var string
     */
    private $titlemenu3;
    /**
     * Get titlemenu3
     *
     * @return string
     */
    public function getTitlemenu3()
    {
        return $this->titlemenu3;
    }
    /**
     * @var string
     */
    private $titlemenu4;
    /**
     * Get titlemenu4
     *
     * @return string
     */
    public function getTitlemenu4()
    {
        return $this->titlemenu4;
    }

    private $titlemenurempl;
    /**
     * Get titlemenurempl
     *
     * @return string
     */
    public function getTitlemenurempl()
    {
        return $this->titlemenurempl;
    }

    /**
     * @var string
     */
    private $image;


    /**
     * Set image
     *
     * @param string $image
     * @return Menu
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
    private $menuimg;




    /**
     * @var string
     */
    private $menuimgrempl;






    /**
     * Set menuimg
     *
     * @param string $menuimg
     * @return Menu
     */
    public function setMenuimg($menuimg)
    {
        $this->menuimg = $menuimg;

        return $this;
    }

    /**
     * Get menuimg
     *
     * @return string
     */
    public function getMenuimg()
    {
        return $this->menuimg;
    }




    /**
     * Set menuimgrempl
     *
     * @param string $menuimgrempl
     * @return Menu
     */
    public function setMenuimgrempl($menuimgrempl)
    {
        $this->menuimgrempl = $menuimgrempl;

        return $this;
    }

    /**
     * Get menuimgrempl
     *
     * @return string
     */
    public function getMenuimgrempl()
    {
        return $this->menuimgrempl;
    }

    /**
     * @var string
     */
    private $menu1img;
    /**
     * Set menu1img
     *
     * @param string $menu1img
     * @return Menu
     */
    public function setMenu1img($menu1img)
    {
        $this->menu1img = $menu1img;
        return $this;
    }
    /**
     * Get menu1img
     *
     * @return string
     */
    public function getMenu1img()
    {
        return $this->menu1img;
    }

    /**
     * @var string
     */
    private $menu2img;
    /**
     * Set menu2img
     *
     * @param string $menu2img
     * @return Menu
     */
    public function setMenu2img($menu2img)
    {
        $this->menu2img = $menu2img;
        return $this;
    }

    /**
     * Get menu2img
     *
     * @return string
     */
    public function getMenu2img()
    {
        return $this->menu2img;
    }
    /**
     * @var string
     */
    private $menu3img;
    /**
     * Set menu3img
     *
     * @param string $menu3img
     * @return Menu
     */
    public function setMenu3img($menu3img)
    {
        $this->menu3img = $menu3img;
        return $this;
    }

    /**
     * Get menu3img
     *
     * @return string
     */
    public function getMenu3img()
    {
        return $this->menu3img;
    }

    /**
     * @var string
     */
    private $menu4img;
    /**
     * Set menu4img
     *
     * @param string $menu4img
     * @return Menu
     */
    public function setMenu4img($menu4img)
    {
        $this->menu4img = $menu4img;
        return $this;
    }

    /**
     * Get menu4img
     *
     * @return string
     */
    public function getMenu4img()
    {
        return $this->menu4img;
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
