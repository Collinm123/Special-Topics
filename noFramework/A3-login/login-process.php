<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Db.php';

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\RedirectResponse;
use \Symfony\Component\HttpFoundation\Session\Session;
use Carbon\Carbon;

$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

$user = $request->get('username'); // $_POST['username']
$pass = $request->get('password'); // $_POST['username']
$session = new Session();
$session->start();

if($user && $pass && $pdo){
	$userQuery = new Classes\Users\LoginUser($user, $pass, $pdo);
	$userInfo = $userQuery->loginUser();
	if($userInfo){
		$username = $userInfo[0]['username'];
		$email = $userInfo[0]['email'];
		$session->set('username', $username);
		$session->set('email', $email);
		$dt = Carbon::now();
		$session->set('loginTime', $dt);
		$response = new RedirectResponse('dashboard.php');
		return $response->send(); 
	} else {
		$session->getFlashBag()->add('statusMessage', 'The username and password do not match!');
		$response = new RedirectResponse('login.php');
		return $response->send(); 
	}
	
} else {
	$session->getFlashBag()->add('statusMessage', 'Please fill in your username and password!');
	$response = new RedirectResponse('login.php');
	return $response->send(); 
}


