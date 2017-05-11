<?php 

namespace Model;
use Library\PdoAwareTrait;

class FeedbackRepository
{
    use PdoAwareTrait;
    
    public function save(array $feedback)
    {
        $sth = $this->pdo->prepare('INSERT INTO feedback VALUES (null, :author, :email, :message, null)');
        $sth->execute($feedback);
    }
}