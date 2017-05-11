<?php

namespace Model;

use Library\PdoAwareTrait;

class BookRepository
{

	use PdoAwareTrait;

	public function findAll()
	{
		$sth = $this->pdo->query('SELECT * FROM book');
		return $sth->fetchAll(\PDO::FETCH_ASSOC);
	}
}