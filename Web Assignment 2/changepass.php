<?PHP
include "connection.php";
session_start();

if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}

if(isset($_POST["password"])){
	$password = $_POST["password"];
}

if(isset($_POST["repeat"])){
	$repeat = $_POST["repeat"];
}

if ($password == $repeat){
$stmt = $con->prepare("UPDATE users SET pass = ? WHERE username = ?");
$stmt->bind_param("ss", $password, $username);
$stmt->execute();
header("Location: login.php");
}
else {
header("Location: changepassword2.php");
}
?>