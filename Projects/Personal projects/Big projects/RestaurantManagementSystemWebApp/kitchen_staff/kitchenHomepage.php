<?php
session_start();
$value = $_SESSION['usernameEmail'];
/* If no one has logged in then re-direct user to login page
 The conidition is used as fail safe to make sure that the waiter 
cannot some how access the waiter pages through any other pages 
(i.e. if there happens to be a broken link) */
if (!isset($_SESSION['usernameEmail']) || $value != 'kitchen.staff@oaxaca.com') {
    header('location: ../login_page/login.php');
}

// If the user presses the logout button then the session variable 
// for logout will be set and the session variables will be destroyed
if (isset($_GET['logout'])) {
    session_destroy();
    session_unset();
    // When the href is sent here from the logout button, it will check 
    // if the logout variable has been set. If it has, the user will be 
    // redirected using the header function
    header('location: ../login_page/login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../kitchen_staff/kitchenStylesheet.css">
    <title>Kitchen Homepage</title>
</head>

<header>

    <h2>Kitchen HomePage</h2>

    <!-- If the user tries to return to this page after logging out or changing to page access won't be granted -->
    <span class="topright">
        <p class="logOut"><a href="../kitchen_staff/kitchenHomepage.php?logout='1'">Logout</a></p>
    </span>


    <!-- If the user tries to return to this page after logging out or changing to page which doesn't allow access -->
    <script type="text/javascript">
        if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
            window.location.href = "../waiter_page/resubmission.html"
        }
    </script>


</header>

<body>

    <html class="kitchenhome-bg">

    <span class="kitchen_buttons">
        <button class="buttons"> <a href="KitchenNotifying.php">Call a Waiter</a></button>
        <button class="buttons"> <a href="../kitchen_staff/kitchen_orders/kitchenOrders.php">Confirmed Orders</a></button>

    </span>

</body>



</html>