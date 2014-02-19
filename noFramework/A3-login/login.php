<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/Db.php';
use \Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$session->start();
foreach ($session->getFlashBag()->get('statusMessage', array()) as $message) {
    echo '<div class="flash-notice">'.$message.'</div>';
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>User Login</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h2>Login</h2>
	<form action="login-process.php">
		<input type="text" name="username" placeholder="Username..">
		<br>
		<input type="text" name="password" placeholder="Password..">
		<br>
		<input type="submit" value="Login">
	</form>
</body>
</html>