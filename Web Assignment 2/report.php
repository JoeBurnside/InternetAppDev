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
		<h1>Report</h1>
<h2>Design</h2>
<p>The design of this website was largely based upon the website created for Assignment 1 earlier this academic year. A button set was created to give the website a smoother look. These have been used to link to details and option pages. They have rounded edges much like the rest of the site. Plus and Minus button have also been used to give the basket a more professional look.</p>
<h2>Database</h2>
<p>The database consists of six tables. These store the data for the users, menu, favourites, basket, orders and order items. BLOB images have been used for the menu items along with their price and description. The users have a username, password and level. The basket stores items directly to the orders table when the user confirms their purchase. Users can also select their favourite dishes and have them stored to the database.</p>
<h2>Menu</h2>
<p>The menu page uses several SQL queries to separate the menu items into categories. These are then sorted by price. Each menu item has a BLOB image and links for the user to add to favourites, add to basket and to view more details about the menu item.</p>
<p>On each details page a large image of the menu item is displayed, along with a short description and its price. Underneath similar items are shown. This was done by selecting the items category and using an Order By Random command in the SQL (1). </p>
<p>The add to basket and favourites links will only work if the user is logged in. If they are clicked and no session username is set then the user is automatically directed to the login page.</p>
<h2>User Area</h2>
<p>The user area is accessed via the login screen. Users can register by supplying a username and password. The website then uses session variables to give access to extra features. These include favourites, viewing previous orders, removing pending orders and changing their password from the user area. Logging in also gives them the ability to use the shopping basket.</p>
<p>The account creation page runs an SQL query to see if the desired username is already in use and will display this information to the user if needed. The page also checks that the user has typed in the same password twice for confirmation.</p>
<p>All user pages can only be accessed if a user is logged in and a session variable has been set. If these pages are attempted to be accessed without logging in then they redirect to the login screen. </p>
<p>Users can set favourites on the menu pages, and then view these items from the user page. From here they can add the items to their basket or remove them from their favourites.</p>
<p>Users can also view previous orders. This is done using an SQL query to search for orders with a date before today. All items ordered are displayed, along with the number of items ordered and the final order price.</p>
<p>Pending orders are displayed on a separate page. Today's orders will be displayed at the top of the screen along with total price. Orders due for the future can be cancelled by the user. Two separate SQL queries were used for this page to display todays data and future orders.</p>
<p>Passwords can also be changed from the user area. This is done by typing a new password into a password and confirmation box. This then updates the database.</p>
<p>Logout buttons can be found on every page in the basket area. This button destroys the session and directs to the login screen.</p>
<h2>Administrator Area</h2>
<p>The administrator area is accessed through the same login screen as the user. The database returns a user level which is set as a session variable. If a user tries to access the admin areas without being logged in with an admin account they are redirected to the user area. Users that are not logged in will be redirected to the login screen.</p>
<p>From this area the administrators have full control of several features. They can change their password in the same way as the users can. They can also edit the menu, user accounts and view pending orders.</p>
<p>The menu can be viewed and edited from the Administrator area. New items can be added with or without images. Two different SQL Insert statements are used to add menu items. If an image has been set then an image will be added to the item. If it hasn't then it wont be. Images are added using SQL to add BLOBs. File get contents and Add slashes methods are used to prepare the image for entry into the database (2). The admin also has the option to edit current items in the same way. They also have the option to delete menu items. This screen separates the menu items into categories and orders by price much like the users menu screen. After every database edit the administrator is redirected to the menu edit screen.</p>
<p>User accounts can be changed from the Administrator area. Admins have the option to grant a user account administrator privileges and also to remove them. They also have the option to delete accounts from the database.</p>
<p>Current orders can also be viewed from the Admin area. The orders date is displayed along with the name of the user that placed the order. The Admin has the option to cancel orders as well as removing individual items from a users order. Only current orders are displayed. Previous days orders are not available to view from the administrator area.</p>
<h2>Shopping Basket</h2>
<p>The shopping basket is available to all user that are logged in to the site. If the user is not logged in then the space where the basket would normally be shown includes a link to the login page. The basket is available on all pages throughout the website.</p>
<p>Users can add items to the basket from the menu pages or from their favourites in the user area. If the item is already added to the basket then the quantity in the basket will increase by one instead. The basket can also be dynamically edited through the use of plus and minus buttons. These either increase or reduce the quantity in the basket or delete the item completely.</p>
<p>When the user has finished the basket they can place the order by clicking the appropriate button at the bottom of the basket display. This will bring them to a confirmation screen where they can review and edit the order, and then place it. This will direct them to a screen asking for the date of their booking. Once the date is confirmed they can view the order from their user page.</p>
<p>The SQL Date type made the code for this part particularly difficult. SQL stores the date in a YYYY-MM-DD format while most people use a DD/MM/YYYY format. This meant that the date had to be exploded and reorganised (3).</p>
<p>The basket also includes a bill calculation showing the price for each item and a total price. It also shows the total number of items added to the basket.</p>
<h2>Evaluation</h2>
<p>The completed website functions well. It is user friendly and designed to be appealing. It demonstrates a wide range of PHP and SQL functions added to a good knowledge of HTML5.</p>
<h2>Declaration</h2>
<p>I declare that this website is entirely my own work. All designs and PHP code used were all of my own creation.</p>
<h2>References</h2>
<p>(1) Walsh, David. 'Return Random Records In Mysql'. David Walsh Blog. N.p., 2007. Web. 22 Apr. 2015.</p>
<p>(2) Webmaster-forums.net,. 'Inserting And Retrieving A Blob Data From Mysql Database Using Php | The Webmaster Forums'. N.p., 2015. Web. 22 Apr. 2015.</p>
<p>(3) W3schools.com,. 'Mysql DATE_FORMAT() Function'. N.p., 2015. Web. 22 Apr. 2015.</p>
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
