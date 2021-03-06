<?php

namespace Model;

use Library\PdoAwareTrait;
use Model\Entity\Book;
use Model\Entity\Style;
use Model\Entity\Author;

class BookRepository
{

	use PdoAwareTrait;

	public function findAll($offset, $count)
	{
		$collection = [];
		/* ofsset - сколько пропускаем, count - сколько показываем */
		$sth = $this->pdo->query("SELECT * FROM book LIMIT {$offset}, {$count}");
		
		while($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new Book())
			->setId($res['id'])
			->setTitle($res['title'])
			->setPrice($res['price'])
			->setStatus((bool) $res['status'])
			->setDescription($res['description'])
			->setStyle($res['style_id']); 

			$collection[] = $book;
		}

		return $collection;
	}


	public function findAllActive($offset, $count)
	{
		$collection = [];
		/* ofsset - сколько пропускаем, count - сколько показываем */
		$sth = $this->pdo->query("SELECT * FROM book WHERE status = 1 LIMIT {$offset}, {$count}");
		
		while($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$book = (new Book())
			->setId($res['id'])
			->setTitle($res['title'])
			->setPrice($res['price'])
			->setStatus((bool) $res['status'])
			->setDescription($res['description'])
			->setStyle($res['style_id']); 

			$collection[] = $book;
		}

		return $collection;
	}

	public function findBookById($id)
	{
		$sth = $this->pdo->query("SELECT * FROM book WHERE id = $id");
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function findStyles()
	{
		$collection = [];
		$sth = $this->pdo->query("SELECT * FROM style");

		while($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$style = (new Style())->setId($res['id'])->setTitle($res['title']);
			$collection[] = $style;
		}

		return $collection;
	}

	public function getStyleByTitle($style) {
		$sth = $this->pdo->query("SELECT id,title FROM style WHERE title = '$style'");
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function updateStyleTitle($styleTitleId,$styleTitle) {
		$sql = "UPDATE style SET title='$styleTitle' WHERE id = '$styleTitleId'";
		return $this->pdo->exec($sql);
	}

	public function findAuthors()
	{
		$collection = [];
		$sth = $this->pdo->query("SELECT * FROM author");

		while($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$author = (new Author())->setId($res['id'])->setName($res['name']);
			$collection[] = $author;
		}

		return $collection;
	}

	public function count()
	{
		$sth = $this->pdo->query('SELECT COUNT(*) FROM book WHERE status = 1');
		return $sth->fetchColumn(); /* fetchColumn - даст одно значение в колонке */
	}
}