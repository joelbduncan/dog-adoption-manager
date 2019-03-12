<?php

// include the configs
require_once("../config.php");

// load the login class
require_once("../Login/classes/Login.php");

// create a login object.
$login = new Login();

// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
// the user is logged in...
// include("Login/views/logged_in.php");
} else {
// the user is not logged in...
header( 'Location: /manage/Login' ) ;
}

include '../config.php';

$conn = new mysqli($dbHost,$dbUsername,$dbPassword);

$conn->select_db($dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo '<script type="text/javascript">
           window.location = "/manage/editDogList.php"
      </script>';

//Define the query
$query = "DELETE FROM hairyhounz_dogs.dogs WHERE id='" . $_GET['id'] . "' LIMIT 1";
unlink("../" .$_GET['image']);



//sends the query to delete the entry
$conn->query($query);

if ($conn->affected_rows == 1) { 
//if it updated
echo '<script type="text/javascript">
           window.location = "/manage/editDogList.php"
      </script>';

 } else { 
//if it failed
echo '<script type="text/javascript">
           window.location = "/manage/editDogList.php"
      </script>';
} 
?>
