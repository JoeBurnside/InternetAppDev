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
include "connection.php";
session_start();
if(isset($_SESSION["username"])){
	$username = $_SESSION["username"];;
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
		<h1>Place Order</h1>
		<SPAN STYLE="color:white">
		<form action="addorder.php" method="post">
<h2>Date of Booking (DD/MM/YYYY): <input type="text" name="date"></h2><br>
<h2>The date you input was invalid. Please try again.</h2><p>
<h1><input type="image" src="images/order.png" width=20% alt="Submit Form" /></h1>
</form>
</span>
		</article>
		<div id="sidebar">
		<?php
echo "<p>You are logged in as: " . $_SESSION["username"] . "</p>" .
"<br><h1><a href=logout.php><img src=images/logout.png width=60%></a></h1>";
?>
		</div>
        <footer>
		<h1>&#169; Joe Burnside 2015</h1>
    	</footer>
		
	  </div>	
  </body>
</html>
