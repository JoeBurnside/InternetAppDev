<?PHP
include "connection.php";
session_start();

if(isset($_POST["username"])){
	$username = $_POST["username"];
}

if(isset($_POST["password"])){
	$password = $_POST["password"];
}

if(isset($_POST["repeat"])){
	$repeat = $_POST["repeat"];
}

if ($password == $repeat){
$stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

$stmt->execute();
$result = $stmt->get_result();

$row = mysqli_fetch_assoc($result);

if(mysqli_num_rows($result) > 0){
header("Location: createaccount2.php");
}
else {
$stmt = $con->prepare("INSERT INTO users (username, pass, level) VALUES (?, ?, 'user')");
$stmt->bind_param("ss", $username, $password);
if ($stmt->execute()){
$_SESSION["username"] = $username;
$_SESSION["level"] = 'user';
header("Location: user.php");
}
}
}
else {
header("Location: createaccount3.php");
}
?>