<?php

// include the configs
require_once("config.php");


// load the login class
require_once("Login/classes/Login.php");


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
?>

<?php
    // Create connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM dogs where id = '" . $_GET['id'] . "'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Hairyhounz Adoption Database</title>

<head>
    <meta charset=utf-8>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/modifyDog.js"></script>
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>

<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
<div class="container">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> &#x2630;
    </button>
    <a class="navbar-brand" href="#">

        <?php echo $charityName ?>

    </a>
    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a href="/manage/" class="nav-link">Add Dog</a>
            </li>
            <li class="active nav-item"><a href="/manage/editDogList.php" class="nav-link">Edit Dogs</a>
            </li>
        </ul>
        <!--Login dropdown menu -->
        <ul class="nav navbar-nav nav navbar-nav ml-auto">
            <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Welcome <b><?php echo $_SESSION['user_name']; ?></b> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-item"><a href="/manage/Login/register.php">New User</a>
                    </li>
                    <li class="dropdown-item"><a href="index.php?logout">Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
</div>

<!-- The Modal -->
<div class="fade modal" id="success">
    <div class="modal-dialog modal-sm"">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title"><?php echo $row["name"]; ?> Updated</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <strong><p>Sweet!</strong> Keep thoses updates coming.</p>
            </div>

        </div>
    </div>
</div>

<div class="container">

<div class="page-header" id="banner">
<div class="row">
    <div class="col-lg-8">
    <h1><?php echo $charityName ?> Adoption Database</h1>
    <p class="lead">Edit <?php echo $row["name"]; ?></p>
    </div>
</div>
</div>

<form id="form">

<input type="hidden" id="id" name="id" value="<?php echo $row["id"]; ?>">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required value="<?php echo $row["name"]; ?>" />
    </div>

    <div class="form-group">
        <label for="email">Breed</label>
        <input type="text" class="form-control" id="breed" name="breed" placeholder="Enter breed" required value="<?php echo $row["breed"]; ?>" />
    </div>

    <div class="form-group">
        <label for="email">Age</label>
        <input type="text" class="form-control" id="age" name="age" placeholder="Enter age" required value="<?php echo $row["age"]; ?>" />
    </div>

    <div class="form-group">
        <label for="sex">Sex</label>
        <select class="form-control" name="sex" id="sex" value="<?php echo $row["sex"]; ?>">
            <option value="Male" <?php if ($row["sex"] == "Male") { echo "selected"; } ?>>Male</option>
            <option value="Female" <?php if ($row["sex"] == "Female") { echo "selected"; } ?>>Female</option>
        </select>
    </div>

    <div class="form-group">
        <label for="email">Location</label>
        <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" required value="<?php echo $row["location"]; ?>" />
    </div>

    <div class="form-group">
        <label for="email">Short Description</label>
        <input type="text" class="form-control" id="short_description" name="short_description" placeholder="Breif description" required value="<?php echo $row["short_description"]; ?>" />
    </div>

    <div class="form-group">
        <label for="email">Long Description</label>
        <textarea class="form-control rounded-0" id="long_description" name="long_description" placeholder="Detailed description" rows="3"><?php echo $row["long_description"]; ?></textarea>
    </div>

    <div class="form-group">
        <label for="adopted">Adopted</label>
        <select class="form-control" name="adopted" id="adopted" value="<?php echo $row["adopted"]; ?>">
            <option value="no" <?php if ($row["adopted"] == "no") { echo "selected"; } ?>>Available</option>
            <option value="yes" <?php if ($row["adopted"] == "yes") { echo "selected"; } ?>>Adopted</option>
        </select>
    </div>

    <div id="preview"><img src="<?php echo $row["image"]; ?>" /></div><br>
    <input class="btn btn-success" type="submit" value="Update">
    <button onclick="goBack()" type="button" class="btn btn-info">Cancel</button>
    <a class="btn btn-danger" href="lib/delete.php?id=<?php echo $_GET['id'] ?>" role="button">Delete</a>
</form>

<div id="err"></div>
<hr>

</body>
</html>
