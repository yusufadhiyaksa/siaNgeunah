<?php
class viewSideBar
{
    public $nama;
    public $icon;
    public $link;

    public function setNama($nama)
    {
        $this->nama = $nama;
    }
    public function getNama()
    {
        return $this->nama;
    }
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }
    public function getIcon()
    {
        return $this->icon;
    }
    public function setLink($link)
    {
        $this->link = $link;
    }
    public function getLink()
    {
        return $this->link;
    }


    public function __construct($nama, $icon, $link)
    {
        $this->setIcon($icon);
        $this->setNama($nama);
        $this->setLink($link);
    }

    public function createNavItem()
    {
        return "
                <a class='nav-link' href='$this->link'>
                    <div class='sb-nav-link-icon'><i class='fas fa-$this->icon text-warning'></i></div>
                    <p>$this->nama</p>
                </a>"   ;
    }
    public function clone()
    {
        return new viewSideBar($this->nama, $this->icon, $this->link);
    }
};