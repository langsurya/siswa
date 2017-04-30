<?php
include_once 'inc/dbconfig.php';
include_once 'inc/class.login.php';
$login = new login($DB_con);

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login->cekloginadmin($username,$password);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="member/ico/salt.png">
	<title>Salt Water Aquarium</title>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" >
	<!-- Style login css -->
	<link href="assets/css/login.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="form-login-group">
        <form method="post" action="" class="form-signin" role="form">
            <h2 class="form-signin-heading"><center>Halam Login</center></h2>
            <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block btn-login" name="login" type="submit">Sign in</button>
        </form>
    </div>
</div>
