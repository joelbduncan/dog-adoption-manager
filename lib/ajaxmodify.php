<?php

//include database configuration file
include('../config.php');

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}


$id              = mysqli_real_escape_string($db, $_POST['id']);
$name              = mysqli_real_escape_string($db, $_POST['name']);
$breed             = mysqli_real_escape_string($db, $_POST['breed']);
$age               = mysqli_real_escape_string($db, $_POST['age']);
$sex               = mysqli_real_escape_string($db, $_POST['sex']);
$location          = mysqli_real_escape_string($db, $_POST['location']);
$short_description = mysqli_real_escape_string($db, $_POST['short_description']);
$long_description  = mysqli_real_escape_string($db, $_POST['long_description']);
$adopted           = mysqli_real_escape_string($db, $_POST['adopted']);

//insert form data in the database
$insert = $db->query("UPDATE `dogs` SET `name` = '" . $name . "', `breed` = '" . $breed . "', `age` = '" . $age . "', `sex` = '" . $sex . "', `location` = '" . $location . "', `short_description` = '" . $short_description . "', `long_description` = '" . $long_description . "', `adopted` = '" . $adopted . "' WHERE `dogs`.`id` = '" . $id . "';");
//echo $insert?'ok':'err';

?> 
