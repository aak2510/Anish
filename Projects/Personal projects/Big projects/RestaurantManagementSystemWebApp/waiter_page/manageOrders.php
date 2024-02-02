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


<?php
//Connecting to the Menu database
//replace 'Majed' and 'cs2810' with own username and password 
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

//the query, which selects all messages from the kitchen  (table number = 0)
$sql = "SELECT * FROM orders WHERE order_status = 'non-confirmed' ORDER BY date_time ";
$sql2 = "SELECT * FROM orders WHERE order_status = 'done' ORDER BY date_time ";
//returns the result of the query

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);


//saves the query as an associative array
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);
$array2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);


//frees the result
mysqli_free_result($result);

//closes the connection

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="../waiter_page/Stylesheets_and_images/waiterPageStyle.css">
    <style>
        .Messages {
            text-align: center;
            width: 20%;
            min-height: 20%;
            border-radius: 5px;
            margin: 2% auto;
            margin-top: 7.5%;
            padding: 2%;
            background-color: black;
            color: white;
        }


        h2 {
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 40px;
            letter-spacing: 0.075em;
            font-family: "Monaco", "Monaco", monospace;
        }
    </style>
</head>

<!-- Add this head to all staff pages. Remove the topleft button for the homepages -->
<header>
    <h2>Manage Orders</h2>
    <!-- If the user tries to return to this page after logging out or changing to page access won't be granted -->
    <span class="topright">
        <p class="logOut"><a href="../waiter_page/manageOrders.php?logout='1'">Logout</a></p>
    </span>
    <span class="topleft">
        <p class="homepageButton" style="float:left"> <a href="../waiter_page/waiterHomepage.php">Homepage</a></p>
    </span>
    <script type="text/javascript">
        if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
            logout = '1'
            window.location.href = "../waiter_page/resubmission.html"
        }
    </script>
</header>




<body>

    

        <!-- displays all messages from the kitchen staff with the oldest at the top -->
        <?php

        foreach ($array as $notification) {
        ?>
        <div class="Messages">
            <!--  added a button for each message to give the waiter a chance to resolve it .  -->
            <form action="manageOrders.php" method="POST">

                <!-- name is the message id so that it can distinguished -->

                <?php

                echo 'Table Number: ';
                echo htmlspecialchars($notification['table_number']);
                echo "<br>";
                echo 'Starter ID: ';
                echo htmlspecialchars($notification['starter_menu_ids']);
                echo "<br>";
                echo 'Main ID: ';
                echo htmlspecialchars($notification['main_menu_ids']);
                echo "<br>";
                echo 'Side ID: ';
                echo htmlspecialchars($notification['side_menu_ids']);
                echo "<br>";
                echo 'Time of Order: ';
                echo htmlspecialchars($notification['date_time']);
                echo "<br>";

                ?>
                <br>
                <input type="submit" name=<?php echo $notification['table_number']; ?> value="Confirm Order">
                <input type="submit" name=<?php echo $notification['Order_ID']; ?> value="Cancel Order">
            </form>
            </div>

        <?php
            echo "<br>";
        }
        // if the waiter attempts to resolve one of the messages
        foreach ($array as $message) {
            if (isset($_POST[$message['table_number']])) { //if the Confirm button has been pressed for that message
                $resolveQuery = "UPDATE orders SET order_status = 'confirmed' WHERE table_number = " . $message['table_number'];
                if (mysqli_query($conn, $resolveQuery)) { 
                    echo "Order Confirmed!";
                }
            }

            if (isset($_POST[$message['Order_ID']])) { //if the Cancel button has been pressed for that message
                $MyQuery = "DELETE FROM orders WHERE Order_ID = " . $message['Order_ID'];
                if (mysqli_query($conn, $MyQuery)) { 
                    echo "Order Cancelled!";
                }
              
            }
        }
       
        ?>

<h2>COOKED ORDERS</h2>
        <?php

foreach ($array2 as $notification2) {
?>
<div class="Messages">
    <!--  added a button for each message to give the waiter a chance to resolve it .  -->
    <form action="manageOrders.php" method="POST">

        <!-- name is the message id so that it can distinguished -->

        <?php
        echo 'DELIVER ORDER';
        echo "<br>";
        echo "<br>";
        echo 'Table Number: ';
        echo htmlspecialchars($notification2['table_number']);
        echo "<br>";
        echo 'Starter ID: ';
        echo htmlspecialchars($notification2['starter_menu_ids']);
        echo "<br>";
        echo 'Main ID: ';
        echo htmlspecialchars($notification2['main_menu_ids']);
        echo "<br>";
        echo 'Side ID: ';
        echo htmlspecialchars($notification2['side_menu_ids']);
        echo "<br>";
        echo 'Time of Order: ';
        echo htmlspecialchars($notification2['date_time']);
        echo "<br>";

        ?>
        <br>
        <input type="submit" name=<?php echo $notification2['table_number']; ?> value="Delivered">
        
    </form>
    </div>

<?php
    echo "<br>";
}
// if the waiter attempts to resolve one of the messages
foreach ($array2 as $message2) {
    if (isset($_POST[$message2['table_number']])) { //if the Confirm button has been pressed for that message
        $SQL3 = "UPDATE orders SET order_status = 'delivered' WHERE table_number = " . $message2['table_number'];
        if (mysqli_query($conn, $SQL3)) { 
            echo "Order Delivered!";
        }
    }

}
mysqli_close($conn);
?>

   


</body>

</html>