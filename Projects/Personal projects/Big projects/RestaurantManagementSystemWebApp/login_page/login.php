<!-- Need to include at the beginning-->
<?php include('server.php') ?>
<!DOCTYPE html>
<html>

<head>
	<title>
		Employee Login
	</title>
	<link rel="stylesheet" href="loginPage.css">
	
</head>
<header>
	<nav class="topnav">
		<a class="active" href="../home_page/home.html">Homepage</a>
		<a class="active" href="../branch_info/branch_info.php">Branch Info</a>
		<a class="active" href="../menu_page/menu.php">Menu</a>
		<a class="active" href="../order_page/indexOrder.php"> Order</a>
		<a class="active" href="../waiter_page/customerNotifying.php">Call a waiter!</a>
		<a class="active" href="../order_page/paymentPage.php">Payment</a>
		<a class="active" href="../login_page/login.php">Employee Login</a>
	</nav>
	<h2>Employee Login</h2>
	<p>Please login with your Oaxaca credentials to access the restaurant management system.</p><br>
</header>

<body>
	<!--User log in form, data will be sent to another php page, but for now that page does not exist. -->
	<form action="login.php" method="post">
		<?php include('errors.php'); ?>

		<div class="loginUsername">
			<!--User of placeholder to add a greyed out hint to the user-->
			<input type="text" placeholder="Enter your email" name="usernameEmail" required>
		</div>
		<br>
		<div class="loginPassword">
			<input type="password" placeholder="Enter your Password" name="password" required>
		</div>

		<div class="loginButtons">
			<button type="submit" class="loginButton" name="login_user">Login</button>
			<button type="button" class="cancelButton"><a href="../home_page/home.html">Cancel</a></button>
		</div>
	</form>
</body>


<footer>
	<h4>© 2022 RHUL CS - Group 32 </h4>
</footer>

</html>