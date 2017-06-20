<?php

namespace Model\Entity;

class Author
{
	private $id;
	private $name;
	private $descr;

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	public function setDescr($descr)
	{
		$this->descr = $descr;
		return $this;
	}

	public function getDescr()
	{
		return $this->descr;
	}

    public function setAuthorForView($name) 
    {
    	$name = strtolower(str_replace(" ", "-", $name));
    	return $name.'-'.$this->getId();
    }
}