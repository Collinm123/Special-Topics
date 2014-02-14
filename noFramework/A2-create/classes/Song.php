<?php

class Song
{
	public $title;
	public $artist_id;
	public $genre_id;
	public $price;
	protected $pdo;
	protected $sql;

			public function __construct($pdo){
				$this->pdo = $pdo;
				$this->sql = "INSERT INTO `songs` (`title`, `artist_id`, `genre_id`, `price`) VALUES ( ?, ?, ?, ? )";
			}


			public function setTitle($title) {
				$this->title = $title;
			}

			public function setArtistId($artist_id) {
				$this->artist_id = $artist_id;
			}

			public function setGenreId($genre_id) {
				$this->genre_id = $genre_id;
			}

			public function setPrice($price) {
				$this->price = $price;
			}
			public function getTitle() {
				return $this->title;
			}

			public function getId() {
				return $this->pdo->lastInsertId();
			}

			public function save() {
				$statement = $this->pdo->prepare($this->sql);
				if($statement->execute(array($this->title, $this->artist_id, $this->genre_id, $this->price))){
					return TRUE;
				}else{
					return FALSE;
				}

			}

}

?>