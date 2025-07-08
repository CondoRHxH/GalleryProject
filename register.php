<?php


	include "header.php";	

	require "config.php";

	if(isset($_SESSION['username'])){
		header("location:index.php");
		exit();
	}

	if(isset($_POST['submit'])){
		if($_POST['name'] == '' || $_POST['email'] == '' || $_POST['password'] =='' ){
			echo "3mr 3mr ajmi";
		} else {
			$name = $_POST['name'];
			$email = $_POST['email'];		
			$password = $_POST['password'];		


			$insert = $conn->prepare("INSERT INTO users(name,email,password) 
				VALUES (:name,:email,:password) ");

			$insert->execute([":name" => $name,
			":email" => $email,
			":password" => password_hash($password, PASSWORD_DEFAULT),
			]);

		$_SESSION['username'] = $name; // You can also use email if you prefer
		$_SESSION['email'] = $email;

		header("location:index.php");
		exit();
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
			<h1 class="h3 mt-5 fw-normal text-center">Please Register</h1>
			<form method="post" action="register.php" >

				<label for="exampleInputEmail1" class="form-label mt-4">Name</label>
				<input type="text" name="name" class="form-control">

				<label for="exampleInputEmail1" class="form-label mt-4">Email</label>
				<input type="text" name="email" class="form-control">

				<label for="exampleInputEmail1" class="form-label mt-4">Password</label>
				<input type="Password" name="password" class="form-control">

			<button type="submit" name="submit" class="btn btn-primary mt-3">Register</button>
		</form>
		</main>
		
</body>
</html>