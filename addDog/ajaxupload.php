<?php

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp'); // valid extensions
$path = 'uploads/'; // upload directory

if(!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image'])
{
	$img = $_FILES['image']['name'];
	$tmp = $_FILES['image']['tmp_name'];

	// get uploaded file's extension
	$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

	// can upload same image using rand function
	$final_image = rand(1000,1000000).$img;

	// check's valid format
	if(in_array($ext, $valid_extensions)) 
	{					
		$path = $path.strtolower($final_image);	

		if(move_uploaded_file($tmp,$path)) 
		{
			echo "<img src='$path' />";
	$name = $_POST['name'];
    $breed = $_POST['breed'];
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $location = $_POST['location'];
    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];

    //include database configuration file
    include ('../config.php');

	//Create connection and select DB
	$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

	if($db->connect_error){
	    die("Unable to connect database: " . $db->connect_error);
	}

    //insert form data in the database
    $insert = $db->query("INSERT dogs (name,breed,age,sex,location,short_description,long_description,image) VALUES ('".$name."','".$breed."','".$age."','".$sex."','".$location."','".$short_description."','".$long_description."','".$path."')");
    //echo $insert?'ok':'err';
		
		}
	} 
	else 
	{
		echo 'invalid';
	}
}

?>