<?php

namespace Classes\Songs;

class SongQuery {

	protected $pdo;
	protected $sql;
	protected $sort;

		public function __construct($pdo){
			$this->pdo = $pdo;
			$this->sql = "SELECT title, artist_name, genre, price FROM songs";

		}

		public function withArtist(){
			$this->sql .= " INNER JOIN artists ON songs.artist_id = artists.id";
			return $this;
		}

		public function withGenre(){
			$this->sql .= " INNER JOIN genres ON songs.genre_id = genres.id";
			return $this;
		}

		public function orderBy($sort){
			$this->sort = $sort;
			$this->sql .= " ORDER BY '$this->sort' ASC";
			return $this;
		}

		public function all(){
			$statement = $this->pdo->prepare($this->sql);
			$statement->execute();
			$songs = $statement->fetchAll(\PDO::FETCH_OBJ);
			return $songs;
		}
}