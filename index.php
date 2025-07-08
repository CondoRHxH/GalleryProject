<?php  require "config.php";

	// if(isset($_SESSION['email'])){

	// }
	require "header.php";

	if(!isset($_SESSION['username'])){
		header("location:login.php");
		exit();
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
	<?php  
  if(isset($_SESSION['username'])) {
    echo "HYYY " . $_SESSION['username'] ." Mrhba BIIIIk";
  } else {
    echo "HYYY guest 😅";
  }
?>


</body>
</html>