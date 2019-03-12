 <?php

//include database configuration file
include('../config.php');

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}

$valid_extensions = array(
    'jpeg',
    'jpg',
    'png',
    'gif',
    'bmp'
); // valid extensions
$path             = 'uploads/'; // upload directory

if (!empty($_POST['name']) || !empty($_POST['email']) || $_FILES['image']) {
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    // can upload same image using rand function
    $final_image = rand(1000, 1000000) . $img;
    
    // check's valid format
    if (in_array($ext, $valid_extensions)) {
        $path = $path . strtolower($final_image);
        
        if (move_uploaded_file($tmp, '../'.$path)) {
            echo "<img src='$path' />";
            $name              = mysqli_real_escape_string($db, $_POST['name']);
            $breed             = mysqli_real_escape_string($db, $_POST['breed']);
            $age               = mysqli_real_escape_string($db, $_POST['age']);
            $sex               = mysqli_real_escape_string($db, $_POST['sex']);
            $location          = mysqli_real_escape_string($db, $_POST['location']);
            $short_description = mysqli_real_escape_string($db, $_POST['short_description']);
            $long_description  = mysqli_real_escape_string($db, $_POST['long_description']);
            $adopted           = mysqli_real_escape_string($db, $_POST['adopted']);
            
            //insert form data in the database
            $insert = $db->query("INSERT dogs (name,breed,age,sex,location,short_description,long_description,adopted,image) VALUES ('" . $name . "','" . $breed . "','" . $age . "','" . $sex . "','" . $location . "','" . $short_description . "','" . $long_description . "','" . $adopted . "','" . $path . "')");
            //echo $insert?'ok':'err';
            
        }
    } else {
        echo 'invalid';
    }
}

?> 
