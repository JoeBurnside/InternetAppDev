<?PHP
include "connection.php";
session_start();

if(isset($_POST["name"])){
	$name = $_POST["name"];
	echo $name;
}

if(isset($_POST["description"])){
	$description = $_POST["description"];
	echo $description;
}

if(isset($_POST["price"])){
	$price = $_POST["price"];
	echo $price;
}

if(isset($_POST["category"])){
	$category = $_POST["category"];
	echo $category;
}
if(isset($_FILES['image']))
{
$content = file_get_contents($_FILES['image']['tmp_name']);
$content = addslashes($content);
$sql = "INSERT INTO tbl_menu (Name, Description, Price, Category, image) VALUES ('$name', '$description', '$price', '$category', '$content')";
	 }
	 else{
$sql = "INSERT INTO tbl_menu (Name, Description, Price, Category) VALUES ('$name', '$description', '$price', '$category')";
}
if(mysqli_query($con, $sql)){
		header("Location: editmenu.php");
}
?>