<?php

namespace Model;

use Library\DbConnection;

class BookModel
{
    public function findAll()
    {
        $pdo = DbConnection::getInstance()->getPdo();
        $sth = $pdo->query('SELECT * FROM book');
        return $sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}