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

<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Hairyhounz Adoption Database</title>

<head>
    <meta charset=utf-8>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
</head>

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
              <li class="nav-item"><a href="/manage/editDogList.php" class="nav-link">Edit Dogs</a>
              </li>
          </ul>
          <!--Login dropdown menu -->
          <ul class="nav navbar-nav nav navbar-nav ml-auto">
              <li class="dropdown nav-item"> <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">Welcome <b><?php echo $_SESSION['user_name']; ?></b> <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                      <li class="active dropdown-item"><a href="/manage/Login/register.php">New User</a>
                      </li>
                      <li class="dropdown-item"><a href="index.php?logout">Log Out</a>
                      </li>
                  </ul>
              </li>
          </ul>
      </div>
  </div>
  </div>

      <form method="post" action="register.php" name="registerform" class="form-horizontal">
      <fieldset>

    <div class="container">

      <div class="page-header">

<?php

// show negative messages
if ($registration->errors) {
    foreach ($registration->errors as $error) {
        echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Failed! </strong>'.$error.'
</div>';

    }
}

// show positive messages
if ($registration->messages) {
    foreach ($registration->messages as $message) {
        echo '<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success! </strong>'.$message.'
</div>';
    }
}

?>

         <center><h1>Create User</h1></center>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-sm-6 offset-sm-3 control-label" for="login_input_username">Username</label>
        <div class="col-sm-6 offset-sm-3">
        <input id="login_input_username" pattern="[a-zA-Z0-9]{2,64}" name="user_name" type="text" placeholder="" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-sm-6 offset-sm-3 control-label" for="login_input_email">Email</label>
        <div class="col-sm-6 offset-sm-3">
        <input id="login_input_email" name="user_email" type="text" placeholder="" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Password input-->
      <div class="form-group">
        <label class="col-sm-6 offset-sm-3 control-label" for="login_input_password_new">Password</label>
        <div class="col-sm-6 offset-sm-3">
          <input id="login_input_password_new" name="user_password_new" type="password" pattern=".{6,}" required autocomplete="off" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Password input-->
      <div class="form-group">
        <label class="col-sm-6 offset-sm-3 control-label" for="login_input_password_repeat">Repeat password</label>
        <div class="col-sm-6 offset-sm-3">
          <input id="login_input_password_repeat" name="user_password_repeat" type="password" pattern=".{6,}" required autocomplete="off" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Button (Double) -->
      <div class="form-group">
        <label class="col-sm-6 offset-sm-3 control-label" for="register"></label>
        <div class="col-sm-6 offset-sm-3">
          <button id="register" name="register" class="btn btn-success">Create</button>
           <input type="button" name="Cancel" value="Cancel" onClick="window.location='/';" class="btn btn-danger"/>
        </div>
      </div>

      </fieldset>
      </form>

<br ><br >
<!-- backlink -->

</div>
</section><!-- content -->
