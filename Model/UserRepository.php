<?php
namespace Model;
use Library\PdoAwareTrait;
use Model\Entity\User;
class UserRepository
{
    use PdoAwareTrait;
    
    // todo - for registration
    // public function save(Feedback $feedback)
    // {
    //     $sth = $this->pdo->prepare('INSERT INTO feedback VALUES (null, :author, :email, :message, null)');
    //     $sth->execute([
    //         'author' => $feedback->getAuthor(),
    //         'email' => $feedback->getEmail(),
    //         'message' => $feedback->getMessage(),
    //     ]);
    // }
    
    public function find($email, $password)
    {
        $sth = $this->pdo->prepare('SELECT * FROM user WHERE email = :email AND password = :password');
        
        $sth->execute([
            'email' => $email,
            'password' => $password
        ]);
        
        $res = $sth->fetch(\PDO::FETCH_ASSOC);
        
        if (!$res) {
            return null;
        }
        
        return (new User())->setEmail($email);
    }
}