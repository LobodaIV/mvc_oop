<?php

namespace Library;

trait PdoAwareTrait
{
	protected $pdo;

	public function setPdo(\PDO $pdo)
	{
		$this->pdo = $pdo;
		return $this;
	}

	public function getPdo()
	{
		return $this->pdo;
	}
}