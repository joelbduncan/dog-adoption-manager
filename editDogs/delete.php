<?php

include '../config.php';

$conn = new mysqli($dbHost,$dbUsername,$dbPassword);

$conn->select_db($dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo '<script type="text/javascript">
           window.location = "/manage/editDogs/"
      </script>';

//Define the query
$query = "DELETE FROM hairyhounz_dogs.dogs WHERE id='" . $_GET['id'] . "' LIMIT 1";

//sends the query to delete the entry
$conn->query($query);

if ($conn->affected_rows == 1) { 
//if it updated
echo '<script type="text/javascript">
           window.location = "/manage/editDogs/"
      </script>';

 } else { 
//if it failed
echo '<script type="text/javascript">
           window.location = "/manage/editDogs/"
      </script>';
} 
?>