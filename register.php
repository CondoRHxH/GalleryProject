<?php

	require "config.php";

	if(isset($_POST['submit'])){
		if($_POST['pop'] == ''){
			echo "3mr 3mr ajmi";
		} else {
			$email = $_POST['pop'];		

			$insert = $conn->prepare("INSERT INTO users(email) VALUES (:pop) ");

			$insert->execute([":pop" => $email ]);

		}

	}  

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
		<form method="post" action="register.php">
			
			<input type="text" name="pop">
			<button type="submit" name="submit">Register</button>
		</form>
</body>
</html>