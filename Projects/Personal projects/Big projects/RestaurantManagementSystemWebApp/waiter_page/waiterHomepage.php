<?php
session_start();
$value = $_SESSION['usernameEmail'];
// If no one has logged in then re-direct user to login page
if (!isset($_SESSION['usernameEmail']) || $value != 'waiter.staff@oaxaca.com') {
    header('location: ../login_page/login.php');
}

// If the user presses the logout button then the session variable for logout will be set and the session variables will be destroyed
if (isset($_GET['logout'])) {
    session_destroy();
    session_unset();
    // When the href is sent here from the logout button, it will check if the logout variable has been set. If it has, the user will be redirected using the header function
    header('location: ../login_page/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- notification icon  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../waiter_page/Stylesheets_and_images/waiterHomepageStyle.css">
    <title>Waiter Homepage</title>
    <style>
    /* html styling for the page */
        header h2 {
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 40px;
            letter-spacing: 0.075em;
            
        }
    </style>

</head>

<header>
    <script>

        // Java script to allow the client to see the number of notifications in real time without having to refresh the page. 
        function loadDoc() {

            setInterval(function() { //Runs every second 

                var xhttp = new XMLHttpRequest(); //Allows exchange of data with a web server in the background
                xhttp.onreadystatechange = function() { // When the ready state changes -> run function()
                    if (this.readyState == 4 && this.status == 200) { //when readystate is 4 (response is ready) and http message is 200 ("OK")
                        document.getElementById("notification_number").innerHTML = this.responseText; //Display the response to notification number variable
                    }
                };
                xhttp.open("GET", "data.php", true); //specifies a GET request to data.php every second
                xhttp.send(); //sends the request


            }, 1000)

            // reloads every second
        }
        loadDoc();

    </script>

    <!-- Redirect to this page so that session is destroyed properly -->
    <div class="header">
        <h2>Waiter Homepage</h2>
        <!-- logout button -->
        <span class="topright">
            <p class="logOut" style="text-align: right;"><a href="../waiter_page/waiterHomepage.php?logout='1'">Logout</a></p>
        </span>
        <!-- notification icon that shows client messages -->
        <span class="topleft">
            <button type="button" class="icon-button" onclick="window.location.href='display-messages.php'">
                <span class="material-icons">notifications</span>
                <span class="icon-button__badge" id="notification_number"></span>
            </button>
        </span>
    </div>

    <!-- If the user tries to return to this page after logging out or changing to page which doesn't allow access -->
    <script type="text/javascript">
        if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
            logout = '1'
            window.location.href = "../waiter_page/resubmission.html"
        }
    </script>

</header>

<body>
    <!-- buttons to navigate the waiter side GUI -->
    <span class="waiter_buttons">
        <button class="buttons"> <a href="../waiter_page/manageOrders.php">Manage Orders</a></button>
        <button class="buttons"> <a href="../waiter_page/edit_menu.php">Change Menu</a></button>
        <button class="buttons"> <a href="displayKitchen-messages.php">Kitchen staff</a></button>
        <button class="buttons"> <a href="unpaid-customers.php">Unpaid Tables</a></button>
        <button class="buttons"> <a href="ChooseTable.php">Assign a Table</a></button>
        <button class="buttons"> <a href="Table-assignment.php">View Table Assingment's</a></button>
    </span>


</body>