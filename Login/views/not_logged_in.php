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
    <link href="login-style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </head>

<body>

  <div class="container-fluid">
  	<div class="row">
  		<div class="col-md-10 col-md-offset-1">

        <?php

        // show negative messages
        if ($login->errors) {
            foreach ($login->errors as $error) {
                echo '<div id="message" class="alert alert-danger">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Failed! </strong>'.$error.'
        </div>';

            }
        }

        // show positive messages
        if ($login->messages) {
            foreach ($login->messages as $message) {
                echo '<div id="message" class="alert alert-success">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success! </strong>'.$message.'
        </div>';
            }
        }

        ?>

  		</div>
    </div>
  </div>

<div class="container">
  <div id="login">

	<section id="content">
		<form method="post" action="index.php" name="loginform">
			<h3><font color = "#808080">Hairy Hounz Adoption System Login</font></h3>
			<div>
				<span class="fontawesome-user"></span><input name="user_name" type="text" placeholder="Username" required="" id="username" />
			</div>
			<div>
				<span class="fontawesome-lock"></span><input name="user_password" type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit"  name="login" value="Log in" />
			</div>
		<!--<a href="register.php"><h4>Register new account</a> -->
		</form><!-- form -->
	</section><!-- content -->
</div>
</div><!-- container -->
</body>
</html>
