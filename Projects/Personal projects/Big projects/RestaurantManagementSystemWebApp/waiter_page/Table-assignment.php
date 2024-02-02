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

//the query, which selects the waiter name and which table they are assigne to
$sql = 'SELECT * FROM table_assignment where resolved = 0 GROUP BY tables ORDER BY tables';

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
    <title>Table Assignment</title>
    <style>
        html {
            background: url("../sharedImages/waiter_homepage.jpg") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: "Monaco", "Monaco", monospace;
        }



        #call-waiter {
            width: 20%;
            min-height: 20%;
            border-radius: 5px;
            margin: 2% auto;
            margin-top: 10%;
            padding: 2%;
            background-color: black;
            color: white;
            text-align: center;
            display: block;
        }

        #title {
            color: white;
            text-align: center;
        }

        input[type=submit] {
            background-color: white;
            font-size: 16px;
            color: black;
            padding: 12px;
            border-radius: 12px;
            display: inline;
            text-align: center;
        }

        input[type=text] {
            background-color: white;
            font-size: 18px;
            color: black;
            padding: 10px;
            border-radius: 15px;
            display: inline;
            text-align: center;
            border: 0px none;
        }

        .header {
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 20px;
        }

        .topright {
            position: absolute;
            top: 30px;
            right: 20px;
            font-size: 18px;
        }

        .topleft {
            position: absolute;
            top: 30px;
            left: 20px;
            font-size: 18px;

        }

        .logOut a {
            background-color: rgb(255, 0, 0);
            color: white;
            padding: 14px 50px;
            text-align: center;
            text-decoration: none;
        }

        .homepageButton a {
            background-color: #555555;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2 id="title">Table Assignment</h2>

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
    </div>



    <!-- displays the waiter's name as well as the table they are assigned to, with the option to drop that table -->
    <?php

    foreach ($array as $notification) {
    ?>
        <section id="call-waiter">
            <!--  added a button for each message to give the waiter a chance to resolve it .  -->
            <form action="Table-assignment.php" method="POST">

                <!-- name is the message id so that it can distinguished -->
                <h3>Table:<?php echo htmlspecialchars($notification['tables']); ?> </h3>
                <br>
                <h4>Waiter:<?php echo htmlspecialchars($notification['name']); ?> </h4>
                <br>
                <input type="submit" name=<?php echo $notification['tables']; ?> value="Drop">
            </form>
        </section>

    <?php
        echo "<br>";
    }
    // dropping the table
    foreach ($array as $message) {
        if (isset($_POST[$message['tables']])) { //if the resolved button has been pressed for that message
            $resolveQuery = 'UPDATE table_assignment SET resolved = 1 WHERE tables = ' . $message['tables'];
            if (mysqli_query($conn, $resolveQuery)) { //set message resolved to 1

            }
        }
    }
    mysqli_close($conn);

    ?>



</body>


</html>