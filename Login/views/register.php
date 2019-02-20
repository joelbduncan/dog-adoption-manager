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
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hairy Hounz | Adoption</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/3/flatly/bootstrap.min.css" />
    <link href="/css/custom.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>

    <div class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
                <a class="navbar-brand" href="#">Hairy Hounz</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/manage/addDog/">Add Dog</a></li>
                    <li><a href="/manage/editDogs/">Edit Dogs</a></li>
                </ul>

                <!--Login dropdown menu -->
                <ul class="nav navbar-nav nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <b><?php echo $_SESSION['user_name']; ?></b> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="active"><a href="/manage/Login/register.php">New User</a></li>
                            <li><a href="index.php?logout">Log Out</a></li>
                        </ul>
                </ul>

            </div>
            <!--/.nav-collapse -->
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
        <label class="col-md-4 control-label" for="login_input_username">Username</label>
        <div class="col-md-4">
        <input id="login_input_username" pattern="[a-zA-Z0-9]{2,64}" name="user_name" type="text" placeholder="" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="login_input_email">Email</label>
        <div class="col-md-4">
        <input id="login_input_email" name="user_email" type="text" placeholder="" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Password input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="login_input_password_new">Password</label>
        <div class="col-md-4">
          <input id="login_input_password_new" name="user_password_new" type="password" pattern=".{6,}" required autocomplete="off" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Password input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="login_input_password_repeat">Repeat password</label>
        <div class="col-md-4">
          <input id="login_input_password_repeat" name="user_password_repeat" type="password" pattern=".{6,}" required autocomplete="off" class="form-control input-md" required="">

        </div>
      </div>

      <!-- Button (Double) -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="register"></label>
        <div class="col-md-8">
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
