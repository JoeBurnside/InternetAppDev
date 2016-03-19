<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
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
</head>

<body>

<form action="loginscript.php" method="post">
Username: <input type="text" name="username"><p>
Password: <input type="password" name="password"><p>
<input type="submit">
</form>

</body>
</html>
