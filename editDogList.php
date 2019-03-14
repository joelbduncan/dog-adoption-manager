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
    <link rel="stylesheet" type="text/css" href="//bootswatch.com/4/darkly/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>

<div class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
<div class="container">
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> &#x2630;
    </button>
    <a class="navbar-brand" href="#"><?php echo $charityName ?> Adoption Database</a>
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

<?php
//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}

?>

<div class="container">
    <div class="page-header" id="banner">
        <div>
        <h1>Edit Dogs</h1>
        </div>
    </div>
</div>

<div class="album py-5">
    <div class="container">
        <div class="row">

            <?php
    // Create connection
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, name, breed, short_description, long_description, image, age, sex, location, adopted FROM dogs ORDER BY adopted ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if ($row["adopted"] == "yes") {
            $adoptionStatus = "Adopted";
            $badge = "badge-primary";
        }
            if ($row["adopted"] == "no") {
            $adoptionStatus = "Available";
            $badge = "badge-info";
        }
            echo '
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top img-responsive" src="' . $row["image"] . '">
                    <div class="card-body">
                        <h3>
                            <p class="card-text">' . $row["name"] . '</p>
                        </h3>
                        <h5>
                            <span class="badge ' . $badge . '">' . $adoptionStatus . '</span>
                        </h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-toolbar">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-success" href="/manage/editDog.php?id=' . $row["id"] . '" role="button">Edit</a>
                                    <a class="btn btn-danger" href="lib/delete.php?id=' . $row["id"] . '" role="button">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- The Modal -->
            <div class="fade modal" id="var' . $row["id"] . '">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">' . $row["name"] . '</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <h4><span class="badge ' . $badge . '">' . $adoptionStatus . '</span></h4>
                            <h5>Breed: <strong>' . $row["breed"] .'</strong></h5>
                            <p>Age: <strong>' . $row["age"] .'</strong>
                            Sex: <strong>' . $row["sex"] .'</strong>
                            Location: <strong>' . $row["location"] .'</strong>
                            <h5>Description</h5>
                            <p>' . $row["long_description"] .'</p>
                            <img class="card-img-top" src="/manage/addDog/' . $row["image"] . '">
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <a href="/contact/" class="btn btn-info">Adopt</a> <a href="https://www.facebook.com/friendsofthehairyhounz/" class="btn btn-primary">Facebook</a><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>';
        }
    } else {
        echo "0 results";
    }
    ?>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".search").keyup(function () {
            var searchTerm = $(".search").val();
            var listItem = $('.results tbody').children('tr');
            var searchSplit = searchTerm.replace(/ /g, "'):containsi('")
    
        $.extend($.expr[':'], {'containsi': function(elem, i, match, array){
                return (elem.textContent || elem.innerText || '').toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
            }
        });
    
        $(".results tbody tr").not(":containsi('" + searchSplit + "')").each(function(e){
            $(this).attr('visible','false');
        });
    
        $(".results tbody tr:containsi('" + searchSplit + "')").each(function(e){
            $(this).attr('visible','true');
        });
    
        var jobCount = $('.results tbody tr[visible="true"]').length;
            $('.counter').text(jobCount + ' item');
    
        if(jobCount == '0') {$('.no-result').show();}
            else {$('.no-result').hide();}
            });
        });
</script>

</body>
</html>
