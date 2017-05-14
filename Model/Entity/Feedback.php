<?php

namespace Model\Entity;
use Model\Form\FeedbackForm;

class Feedback
{
    private $id;
    private $author;
    private $email;
    private $message;
    private $created;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        
        return $this;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
        
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
        
        return $this;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        
        return $this;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setCreated($created)
    {
        $this->created = $created;
        
        return $this;
    }
    
    public function setFromForm(FeedbackForm $form)
    {
        foreach ($form as $property => $value) {
            $this->$property = $value;
        }
        
        return $this;
    }