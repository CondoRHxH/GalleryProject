<?php
	require "header.php";

	require "config.php";

	if(isset($_POST['submit'])){
		
		if($_POST['title'] == '' || $_POST['description'] == ''  || $_FILES['img']['name'] == ''){
			echo "3Mr hya lwla";
		}
		 else {
		 	$title = $_POST['title'];
		 	$description = $_POST['description'];
		 	$img = $_FILES['img']['name']; // img name of the file type and name it's the name of the img 

		 	$sen = $conn->prepare("INSERT INTO images(title,description,img,username) VALUES (:title,
		 	:description,:img,:username)");

		 	// $dir = 'img/' . basename($_FILES['img']['name']);

		 	$sen->execute([
		 	':title' => $title,
		 	':description' => $description,
		 	':img' => $img,
		 	'username' => $_SESSION['username']
		 	]);

		 	// if(move_uploaded_file($_FILES['img']['tmp_name'], $dir)){ //tmp_name made to store the image temporarly until he move it to $dir
		 	// 	header("location:index.php");
		 	// }
		 }
	}






?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="style.css">
	<title></title>
</head>
<body>
<div class="tm-hero d-flex justify-content-center align-items-center" 
     style="background-image: url('img/hero.jpg'); background-size: cover; background-position: center; height: 300px;">

       <!--  <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form> -->
    </div>

    <div class="container tm-container-content tm-mt-60">
    	<div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Create Photo
            </h2>
           
        </div>
        <div class="row mb-4">


	     <form method="post" action="create.php" enctype="multipart/form-data"> <!--Special method to send image -->
	              <!-- Email input -->
	              <div class="form-outline mb-4">
	                <input type="text" name="title" id="form2Example1" class="form-control" placeholder="Title" />
	               
	              </div>

	             

	              <div class="form-outline mb-4">
	                <textarea type="text" name="description" id="form2Example1" class="form-control" placeholder="Description" rows="8"></textarea>
	            </div>
	           

	              
	             <div class="form-outline mb-4">
	                <input type="file" name="img" id="form2Example1" class="form-control" placeholder="image" />
	            </div>


	              <!-- Submit button -->
	              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Create</button>

	          
	            </form>
		</div>
	</div>

    <?php

    require "footer.php";
    ?>
	
</body>
</html>