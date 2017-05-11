<?php

namespace Library;

class RepositoryManager
{
	private $repositories = []; // ['Book' => object(BookRepository), 'Feedback' => ...]

	public function getRepository($entityName)
	{
		if (isset($this->repositories[$entityName])) {
			return $this->repositories[$entityName];
		}

		$repoClassName = "\\Model\\{$entityName}Repository";
		$repo = new $repoClassName();

		$this->repositories[$entityName] = $repo;

		return $repo;
	}
}