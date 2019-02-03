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
  
<script>
window.location.replace("/manage/addDog/");
</script>
