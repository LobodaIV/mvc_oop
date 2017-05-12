<?php

namespace Model;

use Library\PdoAwareTrait;
//use Model\Entity\Book as Book;

class BookRepository
{

	use PdoAwareTrait;

	public function findAll()
	{
		$sth = $this->pdo->query('SELECT * FROM book');
		$sth->setFetchMode(\PDO::FETCH_CLASS,'Model\Entity\Book');
		return $sth->fetchAll(\PDO::FETCH_CLASS,'Book');
	}
}