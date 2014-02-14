<?php

class ArtistQuery
{
		
		protected $pdo;
		protected $sql;

			public function __construct($pdo){
				$this->pdo = $pdo;
				$this->sql = 'SELECT `id`,`artist_name` FROM `artists` ORDER BY `artist_name` ASC';
			}

			public function getAll() {
				$statement = $this->pdo->prepare($this->sql);
				$statement->execute();
				return $statement->fetchAll();
			}

}

?>