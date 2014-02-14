<?php

class GenreQuery
{

		protected $pdo;
		protected $sql;

			public function __construct($pdo){
				$this->pdo = $pdo;
				$this->sql = 'SELECT `id`, `genre` FROM `genres` ORDER BY `genre` ASC ';
			}

			public function getAll() {
				$statement = $this->pdo->prepare($this->sql);
				$statement->execute();
				return $statement->fetchAll();
			}
}

?>