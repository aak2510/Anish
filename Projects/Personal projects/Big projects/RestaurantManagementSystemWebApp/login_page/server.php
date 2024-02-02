<?php
/*
* Checks to see if a session already exists by looking for the presence of a session ID. 
* If it finds one, i.e. if the session is already started, it sets up the session variables 
* and if doesn't, it starts a new session by creating a new session ID.
*/
session_start();

/* Declaring variables for use through the program */
$usernameEmail = "";
/* If there are any errors, we store them in the array */
$errors = array();

/* connect to the database */
$db = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

/* User login - submission from login.php */
if (isset($_POST['login_user'])) {
	/* 
	* Removes any special characters that may interfere with the query operations. 
	* It also helps in the prevention of any possible SQL injection attacks 
	*/
	$usernameEmail = mysqli_real_escape_string($db, $_POST['usernameEmail']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	/* Read the server to see if the corresponding credentials are found there */
	$query = "SELECT * FROM staff WHERE email ='$usernameEmail' AND password ='$password'";
	$results = mysqli_query($db, $query);
	/* If the number of rows returned is 1, that means there credentials match and we can continue to log in the person. */
	if (mysqli_num_rows($results) == 1) {
		// Storing usernameEmail in session variable
		$_SESSION['usernameEmail'] = $usernameEmail;
		/* After a successful log in, the user is sent to the homepage */
		if ($usernameEmail == "waiter.staff@oaxaca.com") {
			header('location: ../waiter_page/waiterHomepage.php');
		} else if ($usernameEmail == "kitchen.staff@oaxaca.com") {
			header('location: ../kitchen_staff/kitchenHomepage.php');
		}
	} else {
		// If the usernameEmail and password doesn't match
		array_push($errors, "E-mail or password incorrect");
	}
}
