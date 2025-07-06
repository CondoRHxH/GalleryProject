<?php

	require "config.php";

	if(isset($_POST['submit'])){
		if($_POST['pop']  == ''){
			echo "3mr a plz";
		} else {

			$email = $_POST['pop'];
			$login = $conn->prepare("SELECT * FROM users WHERE email =:email ");

			$login->execute([':email' => $email ]);

			$data = $login->fetchAll(PDO::FETCH_ASSOC);

			if ($login->rowCount() > 0){
				echo "MRHBA MRHBA";
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
	<title></title>
</head>
<body>
	<form method="post" action="login.php">
			
			<input type="text" name="pop">
			<button type="submit" name="submit">login</button>
		</form>
</body>
</html>