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
$username = $_SESSION["username"];
$sqlfav = "SELECT * FROM favourites JOIN tbl_menu ON favourites.ItemID = tbl_menu.Id WHERE username = '$username' ";
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
		<h1>Favourites</h1>
		<SPAN STYLE="font-weight:bold; color:white">
		<?php
		$resultfav = mysqli_query($con, $sqlfav);
		$countfav = mysqli_num_rows($resultfav);
	if($countfav > 0){
	while($row = mysqli_fetch_assoc($resultfav)){

	echo "<p>" .
		 "<table width=100%>" .
		 "<tr>" .
		 "<td width = 5%></td>" .
		 "<td width=10%><img src=getImage.php?ID=" . $row["ID"] . " width=100%></td>" .
		 "<td width = 5%></td>" .
         "<td width = 25%>". $row["Name"] . "</td>" .
		 "<td width = 10%>£". $row["Price"] . "</td>" .
		 "<td width = 15%><a href=detail.php?ID=" . $row["ID"] . "><img src=images/details.png width=100%></a></td>" .
		 "<td width = 15%><a href=addbasket.php?ID=" . $row["ID"] . "><img src=images/basket.png width=100%></a></td>" .
		 "<td width = 15%><a href=removefavourite.php?ID=" . $row["ID"] . "><img src=images/unfavourite.png width=100%></a></td>" .
	     "</tr>" .
		 "</table>" .
		 "</p>";
	}
	}
	else{
	echo "<h2>You have no favourites set</h2>";
	}
?>
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