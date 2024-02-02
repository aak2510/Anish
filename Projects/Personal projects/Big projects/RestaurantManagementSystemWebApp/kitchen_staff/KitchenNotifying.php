<!-- Has to be implemented before anything else so that the sessions can start as soon as the page is loaded. -->
<?php
session_start();
$value = $_SESSION['usernameEmail'];
// If no one has logged in then re-direct user to login page
/* The conidition is used as fail safe to make sure that the waiter cannot some how access the waiter pages through any other pages (i.e. if there happens to be a broken link) */
if (!isset($_SESSION['usernameEmail']) || $value != 'kitchen.staff@oaxaca.com') {
    header('location: ../login_page/login.php');
}

// If the user presses the logout button then the session variable for logout will be set and the session variables will be destroyed
if (isset($_GET['logout'])) {
    session_destroy();
    session_unset();
    unset($_SESSION['usernameEmail']);
    header('location: ../login_page/login.php');
}
?>


<?php
//replace 'Majed' and 'cs2810' with own username and password 
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

$table_num = '';
$errors = array('table_number' => '');
//checking if the submit button has been pressed.
if (isset($_POST['submit'])) {

    //checking table number field
    if (empty($_POST['table_num'])) { //if the field is empty
        $errors['table_number'] = 'A table number is required. <br />';
    } else {
        $table_num = $_POST['table_num'];
        if (!filter_var($table_num, FILTER_VALIDATE_INT)) { //if the field is not an integer
            $errors['table_number'] = 'Table number has to be an Integer. <br />';
        }
    }


    if (array_filter($errors)) {
        //form is invalid
    } else {
        //checking table number field for sql injection
        $table_num = mysqli_real_escape_string($conn, $_POST['table_num']);

        $message = "Table: " . $table_num . ". Order is ready.";

        $sql = "INSERT INTO notification(table_number, message, resolved) VALUES('0', '$message', '0')";

        //if query is valid
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/JavaScript"> 
                    alert("Waiter Notified!");
            
                </script>';
        } else {
            //error
            echo mysqli_error($conn);
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notify Waiter</title>

    <head>
        <link rel="stylesheet" href="../kitchen_staff/kitchenStylesheet.css">
    </head>

</head>

<header>
    <div class="header">
        <h2>Call a Waiter</h2>
        <!-- If the user tries to return to this page after logging out or changing to page access won't be granted -->
        <span class="topright">
            <p class="logOut"><a href="../kitchen_staff/KitchenNotifying.php?logout='1'">Logout</a></p>
        </span>
        <span class="topleft">
            <p class="homepageButton" style="float:left"> <a href="../kitchen_staff/kitchenHomepage.php">Homepage</a></p>
        </span>
        <script type="text/javascript">
            if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
                logout = '1'
                window.location.href = "../waiter_page/resubmission.html"
            }
        </script>
    </div>

</header>

<body>

    <html class="backgroundKitchenNotif">
    <section id="call-waiter">


        <form style="text-align:center" action="KitchenNotifying.php" method="POST">
            <label style="color: white; font-size: 18px">Order's table number:</label>
            <br>
            <br>

            <input type="text" name="table_num" value="<?php echo htmlspecialchars($table_num); ?>">
            <br>

            <div style='text-align:center; color:red'><?php echo $errors['table_number']; ?></div>
            <br>

            <div style="text-align: center">
                <input type="submit" name="submit" value="Notify Waiter">
            </div>
        </form>

    </section>



</body>


</html>