<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="Joes Food Palace website">
	<meta name="keywords" content="Food,Restaurant,Menu,Nottingham,Drink,Booking,Report">
	<meta name="author" content="Joe Burnside">
    <title>Joe's Food Palace</title>
    <link rel="stylesheet" href="styles.css" type="text/css" />
	<link rel="stylesheet" href="stylespf.css" type="text/css" media="print" />
	<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script>
  <![endif]-->
  <?php
session_start();
include "connection.php";
if(!isset($_SESSION["username"])){
	header("Location: login.php");
}

?>
  </head>
  <body>
	  <div id="wrapper">
  		<header>
			<div id="logo">
			</div>
			<div id="titlebar">
				<h1>Joe's Food Palace</h1>
			</div>
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="menu.php">Food & Drink</a></li>
					<li><a href="login.php">Members Area</a></li>
					<li><a href="report.php">Report</a></li>
				</ul>
			</nav>
  		</header>
		<article>
		<h1>Pending Orders</h1>
		<SPAN STYLE="font-weight:bold; color:white">
		<?php
		$username = $_SESSION["username"];
		$sqlorder = "SELECT * FROM orders WHERE username = '$username' AND Date > CURDATE() ORDER BY Date";
		$sqlordertd = "SELECT * FROM orders WHERE username = '$username' AND Date = CURDATE()";
		$resultordertd = mysqli_query($con, $sqlordertd);
		while($row = mysqli_fetch_assoc($resultordertd)){
		$orderid = $row["OrderID"];
		echo "<h1>Order Date: " . $row["Date"] . "</h1>";
		$sqlorderitems = "SELECT * FROM orderitems JOIN tbl_menu ON orderitems.ItemID = tbl_menu.Id WHERE OrderID = '$orderid' ";
		$resultorderitems = mysqli_query($con, $sqlorderitems);
		while($rowitems = mysqli_fetch_assoc($resultorderitems)){
		echo "<p>" .
		 "<table width=100%>" .
		 "<tr>" .
		 "<td width = 5%></td>" .
		 "<td width=10%><img src=getImage.php?ID=" . $rowitems["ItemID"] . " width=50%></td>" .
		 "<td width = 5%></td>" .
         "<td width = 25%>". $rowitems["Name"] . "</td>" .
		 "<td width = 10%>". $rowitems["Quantity"] . "</td>" .
		 "<td width = 10%>£". $rowitems["oPrice"] . "</td>" .
	     "</tr>" .
		 "</table>" .
		 "</p>";
		}
		$sqltotalprice = "SELECT SUM(oPrice) AS totalpr FROM orderitems WHERE OrderID = '$orderid'";
		$resulttotal = mysqli_query($con, $sqltotalprice);
		$rowtotalprice = mysqli_fetch_assoc($resulttotal);
		
		echo 	"<h2>Total Price: £" . $rowtotalprice["totalpr"] . "</h2>" .
				"<br><br>";
		}
		$resultorder = mysqli_query($con, $sqlorder);
		while($row = mysqli_fetch_assoc($resultorder)){
		$orderid = $row["OrderID"];
		echo "<h1>Order Date: " . $row["Date"] . "</h1>";
		$sqlorderitems = "SELECT * FROM orderitems JOIN tbl_menu ON orderitems.ItemID = tbl_menu.Id WHERE OrderID = '$orderid'";
		$resultorderitems = mysqli_query($con, $sqlorderitems);
		while($rowitems = mysqli_fetch_assoc($resultorderitems)){
		echo "<p>" .
		 "<table width=100%>" .
		 "<tr>" .
		 "<td width = 5%></td>" .
		 "<td width=10%><img src=getImage.php?ID=" . $rowitems["ItemID"] . " width=50%></td>" .
		 "<td width = 5%></td>" .
         "<td width = 25%>". $rowitems["Name"] . "</td>" .
		 "<td width = 10%>". $rowitems["Quantity"] . "</td>" .
		 "<td width = 10%>£". $rowitems["oPrice"] . "</td>" .
	     "</tr>" .
		 "</table>" .
		 "</p>";
		}
		$sqltotalprice = "SELECT SUM(oPrice) AS totalpr FROM orderitems WHERE OrderID = '$orderid'";
		$resulttotal = mysqli_query($con, $sqltotalprice);
		$rowtotalprice = mysqli_fetch_assoc($resulttotal);
		
		echo 	"<h2>Total Price: £" . $rowtotalprice["totalpr"] . "</h2>" .
				"<h1><a href=deleteorder.php?ID=" . $row["OrderID"] . "><img src=images/cancel.png width=20%></a></h1>" .
				"<br><br>";
		}
		?>
		<h2>End of Orders</h2>
		</SPAN>
		</article>
		<div id="sidebar">
		<h1>Basket</h1>
		<SPAN STYLE="color:white">
		<?php if(!isset($_SESSION["username"])){
	echo "<p> Please <a href=login.php>Login</a> to use basket features</p>";
}
else {
$username = $_SESSION["username"];
$sqlbsk = "SELECT * FROM basket JOIN tbl_menu ON basket.ItemID = tbl_menu.Id WHERE basket.username = '$username' ";
$sqltot = "SELECT SUM(Quantity) as sumquant, SUM(bskPrice) as sumprice FROM basket WHERE username = '$username' ";
$resultbsk = mysqli_query($con, $sqlbsk);
$count = mysqli_num_rows($resultbsk);
if($count > 0){
echo "<p>" .
		 "<table width=100%>";
while($row = mysqli_fetch_assoc($resultbsk)){

	echo "<tr>" .
		 "<td width=50%>" . $row["Name"] . "</td>" .
		 "<td width = 5%></td>" .
		 "<td width = 15%><a href=removebasket.php?ID=" . $row["ID"] . "><img src=images/minus.png width=60%></a></td>" .
         "<td width = 10%>". $row["Quantity"] . "</td>" .
		 "<td width = 15%><a href=addbasket.php?ID=" . $row["ID"] . "><img src=images/add.png width=60%></a></td>" .
		 "<td width = 10%>£". $row["bskPrice"] . "</td>" .
	     "</tr><tr><td height = 10px></td></tr>";
	}
	echo "</table>" .
		 "</p>";
	$resulttot = mysqli_query($con, $sqltot);
	$row = mysqli_fetch_assoc($resulttot);
	echo "<p>Number of Items: " . $row["sumquant"] . 
	"<br><br>Total Price: £" . $row["sumprice"] . "</p>" .
	"<br><h1><a href=placeorder.php><img src=images/order.png width=60%></a></h1>" .
	"<h1><a href=logout.php><img src=images/logout.png width=60%></a></h1>";
}
else {
echo "<p>You are logged in as: " . $_SESSION["username"] . "</p>" .
"<p>You have no items in your basket</p>" .
"<br><h1><a href=logout.php><img src=images/logout.png width=60%></a></h1>";
}
}
?>
</SPAN>
		</div>
        <footer>
		<h1>&#169; Joe Burnside 2015</h1>
    	</footer>
		
	  </div>	
  </body>
</html>