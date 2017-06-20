<?php

namespace Model;

use Library\PdoAwareTrait;
use Model\Entity\Author;

class AuthorRepository 
{
	use PdoAwareTrait;

	public function findAuthors() 
	{
		
		$authorCollections = [];
		$sth = $this->pdo->query("SELECT id,name FROM author");
		
		while($res = $sth->fetch(\PDO::FETCH_ASSOC)) {
			$author = (new Author())->setId($res['id'])->setName($res['name']);
			$authorCollections[] = $author;
		}

		return $authorCollections;
	}

	public function findAuthorById($id) 
	{
		$sth = $this->pdo->query("SELECT id,name,descr FROM author WHERE id = {$id}");
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function findAuthorByName($name)
	{
		$sth = $this->pdo->query("SELECT id,name FROM author WHERE name = '$name'");
		return $sth->fetch(\PDO::FETCH_ASSOC);
	}

	public function updateAuthorName($authorId, $authorName)
	{	
		$sql = "UPDATE author SET name = '$authorName' WHERE id = '$authorId'";
		return $this->pdo->exec($sql);	
	}

	public function deleteAuthor($authorId)
	{
		$sql = "DELETE FROM author WHERE id = '$authorId'";
		return $this->pdo->exec($sql);
	}

	public function addAuthor($authorName, $authorDescription) {
		$sql = "INSERT INTO author(id,name,descr) VALUES(null, '$authorName', '$authorDescription')";
		$stmt = $this->pdo->prepare($sql);
		//$stmt->bindParam(':authorName', $authorName);
		//$stmt->bindParam(':authorDescription', $authorDescription);
		return $stmt->execute();
	}
}