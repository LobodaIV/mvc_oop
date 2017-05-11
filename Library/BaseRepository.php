<?php

namespace Library;

class BaseRepository
{
	protected $pdo;

	public function setPdo(\PDO $pdo)
	{
		$this->pod = $pdo;

		return $this;
	}
}