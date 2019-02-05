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

    <link rel="stylesheet" type="text/css" href="//bootswatch.com/3/flatly/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/custom.css" />

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
                        <li><a href="/manage/addDog/">Add Dog</a></li>
                        <li class="active"><a href="/manage/editDogs/">Edit Dogs</a></li>
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
            <!-- Page Header -->
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h1 class="page-header">
                            Adoption Database
                        </h1>
                </div>
                </center>
            </div>
        </div>

        <div class="container">
            <script>
                $(document).ready(function() {

                    $('td.edit').click(function() {

                            $('.ajax').html($('.ajax input').val());
                            $('.ajax').removeClass('ajax');

                            $(this).addClass('ajax');
                            $(this).html('<input class="form-control" id="editbox" size="' + $(this).text().length + '" type="text" value="' + $(this).text() + '">');

                            $('#editbox').focus();

                        }

                    );

                    $('td.edit').keydown(function(event) {

                            arr = $(this).attr('class').split(" ");

                            if (event.which == 13) {

                                $.ajax({
                                    type: "POST",
                                    url: "config.php",
                                    data: "value=" + $('.ajax input').val() + "&rownum=" + arr[2] + "&field=" + arr[1],
                                    success: function(data) {
                                        $('.ajax').html($('.ajax input').val());
                                        $('.ajax').removeClass('ajax');
                                    }
                                });
                            }
                        }

                    );

                    $('#editbox').live('blur', function() {

                        $('.ajax').html($('.ajax input').val());
                        $('.ajax').removeClass('ajax');
                    });

                });
            </script>

            <table width="30%" class="table table-striped table-bordered table-condensed" cellpadding="30">

                <tr class="table table-striped">
                    <th>Name</th>
                    <th>Breed</th>
                    <th>Age</th>
                    <th>Sex</th>
                    <th>Location</th>
                    <th>Short Description</th>
                    <th>Long Description</th>
                    <th>Adopted</th>
                    <th>Image</th>
                </tr>

                <?php

  include('config.php');

  $result = get_data();

  while($rows = mysqli_fetch_array($result))
  {
    if($alt == 1)
    {
       echo '<tr class="alt">';
       $alt = 0;
    }
    else
    {
       echo '<tr>';
       $alt = 1;
    }

    echo '<td class="edit name '.$rows["id"].'">'.$rows["name"].'</td>
        <td class="edit breed '.$rows["id"].'">'.$rows["breed"].'</td>
        <td class="edit age '.$rows["id"].'">'.$rows["age"].'</td>
        <td class="edit sex '.$rows["id"].'">'.$rows["sex"].'</td>
        <td class="edit location '.$rows["id"].'">'.$rows["location"].'</td>
        <td class="edit short_description '.$rows["id"].'">'.$rows["short_description"].'</td>
        <td class="edit long_description '.$rows["id"].'">'.$rows["long_description"].'</td>
        <td class="edit adopted '.$rows["id"].'">'.$rows["adopted"].'</td>
        <td class="image '.$rows["id"].'"><img src="/manage/addDog/'.$rows["image"].'" style="max-width:150px" class="img-responsive"></td>
        <td class="contact-delete">
          <form action=delete.php?id='.$rows["id"].'&image='.$rows["image"].' method="post">
          <input type="hidden" name="name" value="'.$rows["id"].'">
          <button type="submit" class="btn btn-xs btn-danger">
          <span class="glyphicon glyphicon-trash"></span> Delete
          </button>
          </form>
        </td>
        </tr>';
  }
?>

            </table>
        </div>

        <br>
        <br>

    </body>

</html>
