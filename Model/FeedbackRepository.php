<?php 

namespace Model;
use Library\PdoAwareTrait;
use Model\Entity\Feedback;

class FeedbackRepository
{
    use PdoAwareTrait;
    
    public function save(Feedback $feedback)
    {
    	$sth = $this->pdo->prepare('INSERT INTO feedback VALUES (null, :author, :email, :message, null)');
        $sth->execute( 
        	[ 
              'author'=>$feedback->getAuthor(), 
        	  'email'=>$feedback->getEmail(), 
        	  'message' => $feedback->getMessage() 
        	]);
    }
}