<?php
session_start();

if(!isset($_SESSION["username"])){
	header("Location: LoginForm.php");
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Example of Authentication</title>
</head>

<body>
<p>Welcome: <?php echo $_SESSION["username"]; ?></p>
<p><a href="logout.php">Logout</a></p>

</body>
</html>