<?php

class Song
{
			public function setTitle($title) {
				$sql = "
						INSERT INTO `songs`
						(`title`)
						VALUES (?)
						";
				$statement = $pdo->prepare($sql);
				if($statement->execute($title)){
					return TRUE;
				}else{
					return FALSE;
				}

			}

			public function setArtistId($artist_id) {
				$sql = "
						INSERT INTO `songs`
						(`artist_id`)
						VALUES (?)
						";
				$statement = $pdo->prepare($sql);
				if($statement->execute($artist_id)){
					return TRUE;
				}else{
					return FALSE;
				}

			}

			public function setGenreId($genre_id) {
				$sql = "
						INSERT INTO `songs`
						(`genre_id`)
						VALUES (?)
						";
				$statement = $pdo->prepare($sql);
				if($statement->execute($genre_id)){
					return TRUE;
				}else{
					return FALSE;
				}

			}
			public function setPrice($price) {
				$sql = "
						INSERT INTO `songs`
						(`price`)
						VALUES (?)
						";
				$statement = $pdo->prepare($sql);
				if($statement->execute($price)){
					return TRUE;
				}else{
					return FALSE;
				}

			}
			public function getTitle() {
				$sql = "
						SELECT `title`
						FROM `songs`
						WHERE `id` = ?
						";
				$statement = $pdo->prepare($sql);
				$statement->execute($pdo->lastInsertId());
				$title = $statement->fetch(PDO::FETCH_OBJ);
				return $title

			}
			public function getId() {
				$sql = "
						SELECT `id`
						FROM `songs`
						WHERE `id` = ?
						";
				$statement = $pdo->prepare($sql);
				$statement->execute($pdo->lastInsertId());
				$id = $statement->fetch(PDO::FETCH_OBJ);
				return $id

			}

			public function save() {
				$sql = "
						SELECT `id`
						FROM `songs`
						WHERE `id` = ?
						";
				$statement = $pdo->prepare($sql);
				$statement->execute($pdo->lastInsertId());
				$id = $statement->fetch(PDO::FETCH_OBJ);
				return $id

			}

}

?>