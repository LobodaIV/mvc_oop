<?php

namespace Model;

use Library\PdoAwareTrait;
use Model\Entity\Book;

class BookRepository
{

	use PdoAwareTrait;

	public function findAll()
	{
		$collection = [];
		$sth = $this->pdo->query('SELECT * FROM book');
		
		while($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new Book())
			->setId(null)
			->setTitle($res['title'])
			->setPrice($res['price'])
			->setStatus((bool) $res['status'])
			->setDescription($res['description'])
			->setStyle($res['style_id']); 

			$collection[] = $book;
		}

		return $collection;
	}
}