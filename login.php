<?php

session_start();

require_once "pdo.php";

if(isset($_POST['log'])){
if(isset($_POST['pass']) && isset($_POST['username'])){
	$stmt = $pdo->query("SELECT * FROM user_info");
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rows as $row) {
	 if(($_POST['username']==$row['username']) && ($_POST['pass']==$row['password'])){
		 $_SESSION['username']=$_POST['username'];
		 header('Location: user.php');
		 return;
	 }
	}
	$_SESSION['error1']="Incorrect username or password";
	header('Location: login.php');
	return;
}
}


if(isset($_POST['sign'])){
	$stmt = $pdo->query("SELECT * FROM user_info");
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	foreach ($rows as $row) {
	 if(($_POST['username']==$row['username'])){
		 $_SESSION['error2']="username is  taken";
		 header('Location: login.php');
		 return;
	 }

	}

if(($_POST['username']=="") || ($_POST['pass']=="") || (strpos($_POST['username']," ")>-1) || (strpos($_POST['username']," ")>-1) ){
	$_SESSION['error2']="username or password can't have space";
	header('Location: login.php');
	return;
}
}


if(isset($_POST['sign'])){
	$stmt = $pdo->prepare('INSERT INTO user_info
	  (username,password) VALUES ( :us, :ps)');

	$stmt->execute(array(
	  ':us' => $_POST['username'],
	  ':ps' => $_POST['pass'])
	);
	$_SESSION['username']=$_POST['username'];
	header('Location: kyc.php');
	return;

}



?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>

	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="container">

	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>LogIn</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
				<h6 align="center" style="color:red; background:white;">
					<?php
						if(isset($_SESSION['error1'])){
							echo $_SESSION['error1'];
							unset($_SESSION['error1']);
						}
						if(isset($_SESSION['error2'])){
							echo $_SESSION['error2'];
							unset($_SESSION['error2']);
						}
						?>
					</h6>
			</div>

			<div class="card-body">
				<form method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" class="form-control" placeholder="username">

					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="pass" class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="log" value="Login" class="btn float-left login_btn">
                                                <input type="submit" name="sign" value="Sign Up" class="btn float-right signUp_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">

				<div class="d-flex justify-content-center links">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>

</div>
</body>
</html>
