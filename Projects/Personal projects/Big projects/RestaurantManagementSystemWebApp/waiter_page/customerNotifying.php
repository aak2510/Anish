<?php
//replace 'Majed' and 'cs2810' with own username and password 
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

//initialising to empty string
$table_num = $message = '';
$errors = array('table_number' => '', 'message' => '');

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

    //checking message field
    if (empty($_POST['message'])) { //if the field is empty
        $errors['message'] = 'A message is required. <br />';
    } else {
        $message = $_POST['message'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $message)) { //if the field contains numbers or special characters
            $errors['message'] = 'Message must be letters and spaces only.';
        }
    }

    if (array_filter($errors)) { //if arrray is empty and therefore error free.  
        //form is invalid
    } else {
        //form is valid
        //checking for sql characters, sql injection protection
        $table_num = mysqli_real_escape_string($conn, $_POST['table_num']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $sql = "INSERT INTO notification(table_number, message, resolved) VALUES('$table_num', '$message', '0')";

        //if query is valid
        if (mysqli_query($conn, $sql)) {
            echo '<script type="text/JavaScript"> 
                    alert("Waiter Notified!");
            
                </script>';

            //header('Location: .....'); //redirect to home page 
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
    <link rel="stylesheet" href="../home_page/style.css">

    <style>
        html {
            font-family: 'Alike Angular';
            font-size: 20px;

        }
    </style>

</head>

<body>
    <html class="home-bg">
    <div class="flex-logo">
        <img src="../sharedImages/logo-2.png" class="center" alt="logo" width="350" height="350" style="top: 0px" />
    </div>

    <!-- navigation bar to access other pages in the client side -->
    <div class="topnav">
        <a class="active" href="../home_page/home.html">Homepage</a>
        <a href="../branch_info/branch_info.php">Branch Info</a>
        <a href="../menu_page/menu.php">Menu</a>
        <a href="../waiter_page/customerNotifying.php">Call a waiter!</a>
        <a href="../order_page/paymentPage.php">Payment</a>
        <a href="../login_page/login.php">Employee Login</a>
        <div class="dropdown">
            <button class="dropbtn" onclick="myFunction()">Order
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content" id="myDropdown">
                <a href="../order_page\indexOrder.php">Make an order</a>
                <a href="../view_order_page\viewOrder.php">View your orders</a>
            </div>
        </div>
    </div>

    <h1 style="text-align:center">Call a Waiter!</h1>

    <p class="Mytext">
        At Oaxaca we pride ourselves on our customer service, it's an honour for us to assist in anything you may need.
        Feel free to use the form below to call a waiter for anything that you may need!
    </p>

    <section style="padding-left: 40px; padding-right: 40px">
        <!-- form, that takes the clients table number and message to notify the waiter -->

        <form style="text-align:center" action="customerNotifying.php" method="POST">
            <label>Table Number:</label>
            <input type="text" name="table_num" value="<?php echo htmlspecialchars($table_num); ?>" style="text-align:center">
            <div style='text-align:center; color:red'><?php echo $errors['table_number']; ?></div>

            <br>

            <label>Message</label>
            <input type="text" name="message" value="<?php echo htmlspecialchars($message); ?>" style="text-align:center">
            <div style='text-align:center; color:red'><?php echo $errors['message']; ?></div>

            <div style="text-align: center">
                <input type="submit" name="submit" value="submit">
            </div>
            <br>
            <br>
        </form>

    </section>

</body>

<div class="footer">
    <div class="bottomnav">
        <a class="active" href="../home_page/home.html">Homepage</a>
        <a href="../branch_info/branch_info.php">Branch Info</a>
        <a href="../menu_page/menu.php">Menu</a>
        <a href="../order_page/indexOrder.php">Order</a>
        <a href="../waiter_page/customerNotifying.php">Call a waiter!</a>
        <a href="../order_page/paymentPage.php">Payment</a>
        <a href="../login_page/login.php">Employee Login</a>

    </div>
    <h4>© 2022 RHUL CS - Group 32 </h4>
</div>


</html>