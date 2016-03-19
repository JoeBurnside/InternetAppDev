<?PHP
include "connection.php";
session_start();
if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];
}
if(isset($_POST["date"])){
$phpdate = $_POST["date"];
}
function validate_date($phpdate)
{
    if (preg_match("^\d{2}/\d{2}/\d{4}^", $phpdate))
    {
        $date_array = explode('/', $phpdate);

        if(! checkdate($date_array[1], $date_array[0], $date_array[2]))
        {
            return false;
        }
    }
    else
    {
        return false;
    }

    return true;
}

if(validate_date($phpdate))
{
$date_array = explode('/', $phpdate);
$date = date('Y/m/d', strtotime($date_array[0] . "-" . $date_array[1] . "-" . $date_array[2]));
$today = date('Y/m/d');
	$sqlfind = "SELECT * FROM orders WHERE username = '$username' AND Date = '$date'";
$resultcount = mysqli_query($con, $sqlfind);
$count = mysqli_num_rows($resultcount);
$row = mysqli_fetch_assoc($resultcount);

if($count > 0){
$orderid = $row["OrderID"];
} 
else{
$sqladd = "INSERT INTO orders (username, Date) VALUES ('$username', '$date')";
if(mysqli_query($con, $sqladd)){
		$sqlfindorder = "SELECT * FROM orders WHERE username = '$username' AND Date = '$date'";
$resultorder = mysqli_query($con, $sqlfindorder);
$row = mysqli_fetch_assoc($resultorder);
$orderid = $row["OrderID"];
}
else{
	echo "Error: " .mysqli_error($con);
}
}
$sqlbsk = "SELECT * FROM basket WHERE username = '$username'";
$resultbsk = mysqli_query($con, $sqlbsk);
while($row = mysqli_fetch_assoc($resultbsk)){
$itemid = $row["ItemID"];
$quantity = $row["Quantity"];
$price = $row["bskPrice"];
$sqladditem = "INSERT INTO orderitems (OrderID, ItemID, Quantity, oPrice) VALUES ('$orderid', '$itemid', '$quantity', '$price')";
mysqli_query($con, $sqladditem);

}
$sqldelete = "DELETE FROM basket WHERE username = '$username'";
if(mysqli_query($con, $sqldelete)){
header("Location: confirm.php");
}
else{
	echo "Error: " .mysqli_error($con);
}
}
else
{
	header("Location: placeorder3.php");
}
?>