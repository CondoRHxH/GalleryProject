<?php


	
	session_start();

	// require "header.php";
	require "config.php";



	if(isset($_SESSION['username'])){
		header("location:index.php");
		exit();
	}

	if(isset($_POST['submit'])){
		if($_POST['email']  == ''  || $_POST['password'] == ''){
			echo "3mr a plz";
		} else {

			$email = $_POST['email'];
			$password = $_POST['password'];

			$login = $conn->prepare("SELECT * FROM users WHERE email =:email ");

			$login->execute([':email' => $email,]);
			$data = $login->fetch(PDO::FETCH_ASSOC);


			if ($login->rowCount() > 0){

				if (password_verify($password, $data['password'])) {

					$_SESSION['username'] = $data['name'];
					header("location:index.php");
					exit();
				}
				
			} else {
				echo "sir signi plz";
				
			}

			
		}

	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<main class="form-signin w-50 m-auto">
		<h1 class="h3 mt-5 fw-normal text-center">Please Login</h1>

		<form method="post" action="login.php">
			<label class="">Email</label>
			<input type="text" name="email" class="form-control mt-3">

			<label class="">Password</label>
			<input type="password" name="password" class="form-control mt-3"> <br>


			<h6>Don't have an account ? <span><a href="register.php">Register</a></span></h6>

			<button type="submit" name="submit" class="btn btn-primary mt-3">Login</button>
		</form>
	</div>
	<main>
</body>
</html>