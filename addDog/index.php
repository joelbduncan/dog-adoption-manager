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
?>

<!doctype html>
<html>

<head lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hairyhounz Adoption Database</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/3/flatly/bootstrap.min.css" />
</head>

<body>

    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" href="#">
                    <?php
                    // Include project global variables
                    include('../config.php');
                    echo $charityName
                  ?>
                </a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/manage/addDog/">Add Dog</a></li>
                    <li><a href="/manage/editDogs/">Edit Dogs</a></li>
                </ul>

                <!--Login dropdown menu -->
                <ul class="nav navbar-nav nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <b><?php echo $_SESSION['user_name']; ?></b> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="/manage/Login/register.php">New User</a></li>
                            <li><a href="index.php?logout">Log Out</a></li>
                        </ul>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="col-md-8">

                <h1>
                    <?php
                    // Include project global variables
                    include('../config.php');
                    echo $charityName
                  ?> Adoption Database
                </h1>
                <hr>


                <form id="form" action="ajaxupload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Breed</label>
                        <input type="text" class="form-control" id="breed" name="breed" placeholder="Enter breed" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Short Description</label>
                        <input type="text" class="form-control" id="short_description" name="short_description" placeholder="Breif description" required />
                    </div>

                    <div class="form-group">
                        <label for="email">Long Description</label>
                        <textarea class="form-control rounded-0" id="long_description" name="long_description" placeholder="Detailed description" rows="3"></textarea>
                    </div>

                    <input id="uploadImage" type="file" accept="image/*" name="image" />
                    <div id="preview"><img src="filed.png" /></div><br>
                    <input class="btn btn-success" type="submit" value="Upload">
                </form>

                <div id="err"></div>
                <hr>
            </div>
        </div>
    </div>
</body>

</html>
