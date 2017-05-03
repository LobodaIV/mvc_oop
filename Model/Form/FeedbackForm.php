<?php

namespace Model\Form;

use Library\Request;

class FeedbackForm
{
    public $email;
    public $author;
    public $message;
    public $errors = array();
    
    public function __construct(Request $request)
    {
        $this->email = $request->post('email');
        $this->author = $request->post('author');
        $this->message = $request->post('message');
    }
    
    public function isValid()
    {
        if ($this->author !== '' and $this->author != null)
        {
            $this->author = filter_var($this->author, FILTER_SANITIZE_STRING);
        }
        else
        {
            $this->errors['err_author'] = "<div>Sorry, author name contains wrong symbols!</div>";
            return false;
        }

        if ( !($this->email = filter_var($this->email, FILTER_VALIDATE_EMAIL)) )
        {
            $this->errors['err_email'] = "<div>Sorry, email is not correct!</div>";
            return false;
        }

        if ($this->message !== '' and $this->message != null)
        {
            $this->message = filter_var($this->message, FILTER_SANITIZE_STRING);
        }
        else
        {
            $this->errors['err_message'] = "<div>Sorry, message contains wrong symbols!</div>";
            return false;
        }

        return true;
        
     }
 }