<?php
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

$tableNumber = null;
session_start();
$tableNumber = $_SESSION['tableNum'];

if (isset($_POST['payment'])) {

    $number = $_POST['cardNumber'];
    $expireYear = $_POST['expYear'];
    $expireMonth = $_POST['expMonth'];
}


$date = new DateTime($expireYear . '-' . $expireMonth);
$expires = $date->format('Y-m');

$today = new DateTime(date("Y-m"));
$today = $today->format('Y-m');



if ($expires <= $today) {
    echo "expired <br>";
    //header('location: ../order_page/declinePayment.php');
} else {
    echo "Processing";
    $sql = "UPDATE orders SET order_status = 'paid' WHERE table_number = " . $tableNumber ;
    if (mysqli_query($conn, $sql)) { 
        header('location: paymentConfirmation/PaymentConfirmed.php');
    }
}
require_once('cardCheck.php');



