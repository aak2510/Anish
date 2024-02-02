<?php
//Connecting to the Menu database
//replace 'Majed' and 'cs2810' with own username and password 
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

//the query, selects all unresolved notifications from the notification table. 
$sql = 'SELECT * FROM notification where resolved = 0 ORDER BY created_at';

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
    <title>Customer Notifications</title>
    <link rel="stylesheet" href="../waiter_page/Stylesheets_and_images/waiterPageStyle.css">
    <style>
        h2 {
            text-align: center;
            color: white;
            margin-top: 40px;
            font-size: 40px;
            letter-spacing: 0.075em;
            font-family: "Monaco", "Monaco", monospace;
        }
    </style>

</head>


<header>
    <h2>Customer Notifications</h2>
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
<!-- displays all the messages from the client with the oldest at the top -->
    <div class="Messages">
        <?php

        foreach ($array as $notification) {
        ?>
            <!--  added a button for each message to give the waiter a chance to resolve it .  -->
            <form action="display-messages.php" method="POST">

                <!-- name is the message id so that it can distinguished -->

                <?php
                echo 'Table ' . htmlspecialchars($notification['table_number']) . ': ';
                echo "<br>";
                echo "Message: ";
                echo htmlspecialchars($notification['message']);
                echo "<br>";
                echo "Time: ";
                echo htmlspecialchars($notification['created_at']);
                echo "<br>";
                ?>
                <input type="submit" name=<?php echo $notification['notification_ID']; ?> value="Resolve">
            </form>

        <?php
            echo "<br>";
        }
        // if the user attempts to resolve the query
        foreach ($array as $message) {
            if (isset($_POST[$message['notification_ID']])) { //if the resolved button has been pressed for that message
                // update query so that the page only shows unresolved queries
                $resolveQuery = 'UPDATE notification SET resolved = 1 WHERE notification_ID = ' . $message['notification_ID']; 
                if (mysqli_query($conn, $resolveQuery)) { //set message resolved to 1
                    echo 'Table: ' . $message['table_number'] . " query resolved!";
                }
            }
        }
        mysqli_close($conn);
        ?>
    </div>


</body>

</html>