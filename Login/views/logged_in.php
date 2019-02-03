<link rel="stylesheet" type="text/css" href="style.css" />
<div>
    <!-- if you need user information, just put them into the $_SESSION variable and output them here -->
    <h4>You're logged in as, <?php echo $_SESSION['user_name']; ?>.
</div>

<div>
    <!-- because people were asking: "index.php?logout" is just my simplified form of "index.php?logout=true" -->
    <h5><a href="index.php?logout">Logout</a>
</div>

<script type="text/javascript">
<!--
//window.location = "/"
//-->
</script>
