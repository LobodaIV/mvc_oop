<?php

namespace Model\Entity;

class Style
{
    private $id;
    private $title;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function setStyleForView($title) {
        return $title = strtolower(str_replace(" ","-",$title));
    }
}