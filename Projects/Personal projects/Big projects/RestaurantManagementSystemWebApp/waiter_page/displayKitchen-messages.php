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
$sql = 'SELECT * FROM notification where resolved = 0 and table_number = 0 ORDER BY created_at';

//returns the result of the query

$result = mysqli_query($conn, $sql);


//saves the query as an associative array
$array = mysqli_fetch_all($result, MYSQLI_ASSOC);


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
    <title>Kitchen Messages</title>
    <link rel="stylesheet" href="../waiter_page/Stylesheets_and_images/waiterPageStyle.css">
    <style>
        .Messages {
            text-align: center;
            width: 350px;
            min-height: 350px;
            border-radius: 5px;
            margin: 2% auto;
            margin-top: 7.5%;
            padding: 2%;
            background-color: black;
            color: white;
        }

        header h2 {
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
    <h2>Kitchen Messages</h2>
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

    <div class="Messages">

        <!-- displays all messages from the kitchen staff with the oldest at the top -->
        <?php

        foreach ($array as $notification) {
        ?>
            <!--  added a button for each message to give the waiter a chance to resolve it .  -->
            <form action="displayKitchen-messages.php" method="POST">

                <!-- name is the message id so that it can distinguished -->

                <?php

                echo 'Message: ';
                echo htmlspecialchars($notification['message']);
                echo "<br>";
                echo 'Time: ';
                echo htmlspecialchars($notification['created_at']);
                echo "<br>";

                ?>
                <input type="submit" name=<?php echo $notification['notification_ID']; ?> value="Delivered">
            </form>

        <?php
            echo "<br>";
        }
        // if the waiter attempts to resolve one of the messages
        foreach ($array as $message) {
            if (isset($_POST[$message['notification_ID']])) { //if the resolved button has been pressed for that message
                $resolveQuery = 'UPDATE notification SET resolved = 1 WHERE notification_ID = ' . $message['notification_ID'];
                if (mysqli_query($conn, $resolveQuery)) { //set message resolved to 1
                    echo "Kitchen query resolved!";
                }
            }
        }
        mysqli_close($conn);
        ?>

    </div>


</body>

</html>