<?php

$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');
// Check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}

$tableNumber = null;
session_start();
$tableNumber = $_SESSION['tableNum'];

$sqlOrders = "SELECT starter_menu_ids, main_menu_ids, dessert_menu_ids, side_menu_ids FROM orders WHERE table_number = '$tableNumber' AND order_status != 'Done'";

    // Make the query
    $result = mysqli_query($conn, $sqlOrders);
    
    // Fetch resulting rows as arrays
    $orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($orders as $order){
        $x =  $order['starter_menu_ids'];
        $y = $order['main_menu_ids'];
        $z = $order['side_menu_ids'];
        $starterSQL = "SELECT price FROM menu WHERE Menu_ID = $x";
        $mainSQL = "SELECT price FROM menu WHERE Menu_ID = $y";
        $sideSQL = "SELECT price FROM menu WHERE Menu_ID = $z";
    }

    $starter = mysqli_query($conn, $starterSQL);
    $main = mysqli_query($conn, $mainSQL);
    $side = mysqli_query($conn, $sideSQL);

    $starterPrice = mysqli_fetch_all($starter, MYSQLI_ASSOC);
    $mainPrice = mysqli_fetch_all($main, MYSQLI_ASSOC);
    $sidePrice = mysqli_fetch_all($side, MYSQLI_ASSOC);


    $sum = $starterPrice[0]['price'] + $mainPrice[0]['price'] + $sidePrice[0]['price'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link type="text/css" rel="stylesheet" href="../order_page/payment.css">


</head>


<header>
    <nav class="topnav">
        <a class="active" href="../home_page/home.html">Homepage</a>
        <a class="active" href="../branch_info/Branch-Info.html">Branch Info</a>
        <a class="active" href="../menu_page/menu.php">Menu</a>
        <a class="active" href="../order_page/indexOrder.php">Order</a>
        <a class="active" href="../waiter_page/customerNotifying.php">Call a waiter</a>
        <a class="active" href="../order_page/paymentPage.php">Payment</a>
        <a class="active" href="../login_page/login.php">Employee Login</a>
    </nav>


</header>

<body>

    <div class="checkout">
        <h1>Checkout</h1>

        <!-- Make sure to get total price from database and display here. -->
        <br>
        <h3 style="color: red"><?php 
        echo 'Your total is: £' . $sum . '.00'
        ?></h3>
    </div>
    <form action="../order_page/cardVerification/server.php" method="post">
        <div class="row">
            <div class="innerForms">
                <h3>Billing Address</h3><br>
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname" placeholder="Firstname" required>
                <label for="lastname">Lastname</label>
                <input type="text" id="lastname" name="lastname" placeholder="Lastname" required>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="abc@example.com" required>
                <label for="adress">First line of Address</label>
                <input type="text" id="adr" name="address" placeholder="1 Leicester Square" required>
                <label for="postcode">Postcode</label>
                <input type="text" id="postcode" name="postcode" placeholder="WC2H 7LU" required>
            </div>

            <div class="innerForms">
                <h3>Card Information</h3><br>
                <label for="nameOnCard">Name on Card</label>
                <input type="text" id="cardName" name="cardName" placeholder="John Snow" required>

                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required>

                <div class="row">
                    <div class="innerForms">
                        <label for="expiryMonth">Exp Month</label>
                        <select type="text" id="expiryMonth" name="expMonth" placeholder="MM" required>
                            <option value="Invalid">MM</option>
                            <option value="01">01</option>
                            <option value="02">02</option>
                            <option value="03">03</option>
                            <option value="04">04</option>
                            <option value="05">05</option>
                            <option value="06">06</option>
                            <option value="07">07</option>
                            <option value="08">08</option>
                            <option value="09">09</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                        </select>
                    </div>
                    <div class="innerForms">
                        <label for="expYear">Exp Year</label>
                        <input type="text" id="expyear" name="expYear" placeholder="YYYY" required>
                    </div>

                </div>
                <div class="innerForms">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="999" required>
                </div>
            </div>
        </div>

        <span class="submitButtons">
            <button type="submit" class="payButton" name="payment" value="confirmed">Pay</button>
            <button type="button" class="cancelButton"><a href="../home_page/home.html">Cancel</a></button>
        </span>
    </form>

</body>


<footer>
    <br>
    <h4>© 2022 RHUL CS - Group 32 </h4>
</footer>

</html>