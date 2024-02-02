<!-- Has to be implemented before anything else so that the sessions can start as soon as the page is loaded. -->
<?php
session_start();
$value = $_SESSION['usernameEmail'];
// If no one has logged in then re-direct user to login page
/* The conidition is used as fail safe to make sure that the waiter cannot some how access the waiter pages through any other pages (i.e. if there happens to be a broken link) */
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
//replace 'Majed' and 'cs2810' with own username and password 
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

$name = '';
$table_num = '';
//array which displays the errors for the user
$errors = array('table_number' => '', 'name' => '');
//checking if the submit button has been pressed.

if (isset($_POST['value'])) {
    header('Location: ../waiter_page/Table-assignment.php');
}

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

    //checking name field
    if (empty($_POST['name'])) { //if the field is empty
        $errors['name'] = 'A Name is required. <br />';
    } else {
        $name = $_POST['name'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $name)) { //if the field contains numbers or special characters
            $errors['name'] = 'Name must be letters and spaces only.';
        }
    }


    if (array_filter($errors)) { //if arrray is empty and therefore error free.  
        //form is invalid
    } else {
        //form is valid
        //checking for sql characters, sql injection protection
        $table_num = mysqli_real_escape_string($conn, $_POST['table_num']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);

        $sql = "INSERT INTO table_assignment(name, tables, resolved) VALUES('$name', $table_num, 0) ";

        //if query is valid
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/JavaScript"> 
                    alert("Table Assigned");
            
                </script>';

            
        } else {
            //if error with the sql statement
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
        <link rel="stylesheet" href="../waiter_page/Stylesheets_and_images/chooseTable.css">
    </head>
    <style>
        html {
            background: url('../sharedImages/waiter_homepage.jpg') no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            font-family: "Monaco", "Monaco", monospace;
        }

        h2 {
            color: white;
            text-align: center;
        }
    </style>
</head>

<header>
    <div class="header">
        <h2>Assign a Table</h2>
        <!-- If the user tries to return to this page after logging out or changing to page access won't be granted -->
        <!-- logout button -->
        <span class="topright">
            <p class="logOut"><a href="../waiter_page/manageOrders.php?logout='1'">Logout</a></p>
        </span>
        <!-- homepage button -->
        <span class="topleft">
            <p class="homepageButton" style="float:left"> <a href="../waiter_page/waiterHomepage.php">Homepage</a></p>
        </span>
        <!-- if user tries to go back then forward, then they have to login again, for security reasons -->
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
    <section id="assign-table">
        <!-- form which takes the user's name and table number which they want to be assigned to.  -->
        <form style="text-align:center" action="ChooseTable.php" method="POST">
            <p style="color: white">Waiter's Name:</p>
            <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <!-- displays the error message for the user -->
            <div style='text-align:center; color:red'><?php echo $errors['name']; ?></div>
            <br>
            <p style="color: white">Table Number: </p>
            <input type="text" name="table_num" value="<?php echo htmlspecialchars($table_num); ?>">
            <div style='text-align:center; color:red'><?php echo $errors['table_number']; ?></div>
            <br>

            <div style="text-align: center">
                <input type="submit" name="submit" value="Submit">
            </div>
            <br>
            <div style="text-align: center">
                <input type="submit" name="value" value="View Table Assignment's">
            </div>

        </form>

    </section>





</body>


</html>