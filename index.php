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

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Hairyhounz Adoption Database</title>

<head>
    <meta charset=utf-8>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/addDog.js"></script>
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
            <li class="active nav-item"><a href="/manage/" class="nav-link">Add Dog</a>
            </li>
            <li class="nav-item"><a href="/manage/editDogList.php" class="nav-link">Edit Dogs</a>
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
    <!--/.nav-collapse -->
</div>
</div>

<div class="container">
 
<!-- The Modal -->
<div class="fade modal" id="success">
    <div class="modal-dialog modal-sm"">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Dog added Successfully</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <strong><p>Nice one!</strong> Keep up the good work 🙂</p>
            </div>

        </div>
    </div>
</div>

<div class="page-header" id="banner">
    <div class="row">
        <div class="col-lg-8">
        <h1><?php echo $charityName ?> Adoption Database</h1>
        <p class="lead">Add Dog</p>
        </div>
    </div>
</div>

<form id="form">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name"
        placeholder="Enter name" required>
    </div>
    <div class="form-group">
        <label for="email">Breed</label>
        <input type="text" class="form-control" id="breed" name="breed"
        placeholder="Enter breed" required>
    </div>
    <div class="form-group">
        <label for="email">Age</label>
        <input type="text" class="form-control" id="age" name="age"
        placeholder="Enter age" required>
    </div>
    <div class="form-group">
        <label for="sex">Sex</label>
        <select class="form-control" name="sex" id="sex">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="form-group">
        <label for="email">Location</label>
        <input type="text" class="form-control" id="location"
        name="location" placeholder="Enter location" required>
    </div>
    <div class="form-group">
        <label for="email">Short Description</label>
        <input type="text" class="form-control" id="short_description"
        name="short_description" placeholder="Breif description" required>
    </div>
    <div class="form-group">
        <label for="email">Long Description</label>
        <textarea class="form-control rounded-0" id="long_description"
        name="long_description" placeholder="Detailed description" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="adopted">Adopted</label>
        <select class="form-control" name="adopted" id="adopted">
            <option value="no">Available</option>
            <option value="yes">Adopted</option>
        </select>
    </div>
    <input id="uploadImage" type="file" accept="image/*" name="image" required>
    <div id="preview">
        <img src="img/filed.png">
    </div>
    <br>
    <input class="btn btn-success" type="submit" value="Upload">
</form>

<div id="err"></div>
<hr>
 
</body>
</html>