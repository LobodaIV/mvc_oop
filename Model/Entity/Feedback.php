<?php

namespace Model\Entity;

class Feedback
{
	private $id;
	private $author;
	private $email;
	private $message;
	private $created;

	public function __construct($author, $email, $message)
	{
		$this->author = $author;
		$this->email = $email;
		$this->message = $message;
	}

	public function getAuthor()
	{
		return $this->author;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getMessage()
	{
		return $this->message;
	}

}