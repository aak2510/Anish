<?php

// Connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');
// Check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

// By default table numbers is set to any
$tableNum = null;
$error = null;

session_start();
$tableNum = $_SESSION['table_number'];

// Query for all current orders
$sqlOrders = "SELECT starter_menu_ids, main_menu_ids, dessert_menu_ids, side_menu_ids, table_number, order_status, starters_done, mains_done, desserts_done FROM orders WHERE table_number = '$tableNum' AND order_status != 'Done'";

// When the user inputs their table number
if (isset($_POST['submit'])) {
    if (empty($_POST['tableNum'])) { // Has the user input a table number
        $error = 'You need to input a table number <br>';
    } else {
        $tableNum = $_POST['tableNum'];
    }
}

if ($tableNum != null) {
    $sqlOrders = "SELECT starter_menu_ids, main_menu_ids, dessert_menu_ids, side_menu_ids, table_number, order_status, starters_done, mains_done, desserts_done 
            FROM orders WHERE table_number = '" . $tableNum . "'";
} else {
    // Query for all current orders
    $sqlOrders = 'SELECT starter_menu_ids, main_menu_ids, dessert_menu_ids, side_menu_ids, table_number, order_status, starters_done, mains_done, desserts_done FROM orders';
}

// Make the query
$result = mysqli_query($conn, $sqlOrders);

// Fetch resulting rows as arrays
$orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Oaxaca Menu</title>
    <link rel="stylesheet" href="../home_page/style.css">

</head>


<body>

    <html class="home-bg">

    <div class="flex-logo">
        <img src="logo-2.png" class="center" alt="logo" width="350" height="350" style="top: 0px" />
    </div>
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

    <h1>View Your Order</h1>
    <br>
    <form action="viewOrder.php" method="POST">
        <! form for the user to search orders by table>
            <h4>Enter Your Table Number:</h4>
            <div style="padding-left:40%; padding-right:40%">
                <input type="text" name="tableNum" value="<?php echo htmlspecialchars($tableNum) ?>" style=" text-align:center;">
            </div>

            <div style="text-align: center;"><?php echo $error; ?></div>

            <div style="padding-left:47%; padding-right:47%">
                <input type="submit" name="submit" value="Submit">
            </div>
    </form>


    <?php

    ?>

    <div class="flex-container">

        <?php
        foreach ($orders as $order) {
            $st = $order['starter_menu_ids'];
            $ma = $order['main_menu_ids'];
            $si = $order['side_menu_ids'];
            $de = $order['dessert_menu_ids'];

            echo '<div style="text-align:center">Table ' . $order['table_number'];

            echo '<br> Status: ' . $order['order_status'];

            if ($st != "None") {
                $StarterSQL = "SELECT item_name FROM menu WHERE  Menu_ID = $st";
                $starterResult = mysqli_query($conn, $StarterSQL);
                $StarterItem = mysqli_fetch_all($starterResult, MYSQLI_ASSOC);
                echo '<br> Starter: ' . $StarterItem[0]['item_name'];
            }
            if ($ma != "None") {
                $MainSQL = "SELECT item_name FROM menu WHERE Menu_ID = $ma";
                $mainResult = mysqli_query($conn, $MainSQL);
                $MainItem = mysqli_fetch_all($mainResult, MYSQLI_ASSOC);
                echo '<br> Mains: ' . $MainItem[0]['item_name'];
            }
            if ($si != "None") {
                $SideSQL = "SELECT item_name FROM menu WHERE Menu_ID = $si";
                $sideResult = mysqli_query($conn, $SideSQL);
                $SideItem = mysqli_fetch_all($sideResult, MYSQLI_ASSOC);
                echo '<br> Sides: ' . $SideItem[0]['item_name'];
            }
            if ($de != "None") {
                $DessertSQL = "SELECT item_name FROM menu WHERE Menu_ID = $de";
                $dessertResult = mysqli_query($conn, $DessertSQL);
                $DessertItem = mysqli_fetch_all($sideResult, MYSQLI_ASSOC);
                echo '<br> Desserts: ' . $DessertItem[0]['item_name'];
            }

            echo '</div>';
        }
        ?>

    </div>
    <br><br>

    <div class="footer">
        <div class="bottomnav">
            <a class="active" href="../home_page/home.html">Homepage</a>
            <a href="../branch_info/branch_info.php">Branch Info</a>
            <a class="active" href="../menu_page/menu.php">Menu</a>
            <a href="../order_page/indexOrder.php">Order</a>
            <a href="../waiter_page/customerNotifying.php">Call a waiter!</a>
            <a href="../order_page/paymentPage.php">Payment</a>
            <a href="../login_page/login.php">Employee Login</a>

        </div>
        <h4>© 2022 RHUL CS - Group 32 </h4>
    </div>

</body>

</html>