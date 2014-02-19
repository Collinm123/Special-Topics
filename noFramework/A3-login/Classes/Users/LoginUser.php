<?php

namespace Classes\Users;

class LoginUser {

	protected $username;
	protected $password;
	protected $pdo;
	protected $sql;

	public function __construct($username, $password, $pdo){
		$this->username = $username;
		$this->password = $password;
		$this->pdo = $pdo;
		$this->sql = "SELECT username, email, created_at FROM users WHERE username = '$this->username'AND password = SHA1('$this->password')";
	}

	public function loginUser(){
		$statement = $this->pdo->prepare($this->sql);
		$statement->execute();
		$user = $statement->fetchAll();
		return $user;
	}
}