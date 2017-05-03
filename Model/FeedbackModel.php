<?php

namespace Model;

use Library\DbConnection;

class FeedbackModel
{
    // author => ..., email => ...
    public function save(array $feedback)
    {
        $pdo = DbConnection::getInstance()->getPdo();
        $sth = $pdo->prepare('INSERT INTO feedback VALUES (null, :author, :email, :message, null)');
        $sth->execute($feedback);
    }
}