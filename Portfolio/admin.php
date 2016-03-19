<?php
session_start();

if(isset($_SESSION["username"])){
	if($_SESSION["level"] != "admin"){
		header("Location: user.php");
		}
	else{	
	header("Location: user.php");
	}
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