<?php
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

$tableNumber = null;
session_start();
$tableNumber = $_SESSION['tableNum'];
// Checks if payment card data was filled in
if (isset($_POST['payment'])) {
    // Get relevant form data
    $number = $_POST['cardNumber'];
    $expireYear = $_POST['expYear'];
    $expireMonth = $_POST['expMonth'];
}

// Separted verification into separate files
include('expiryDate.php');
include('cardCheck.php');


// If card is not expired, and its a valid card Number - payment  = confirmed
if((!cardExpired($expireYear, $expireMonth)) && (cardNumberCheck($number))){
    $sql = "UPDATE orders SET order_status = 'paid' WHERE table_number = " . $tableNumber ;
    if (mysqli_query($conn, $sql)) { 

    }
    header('location: ../paymentConfirmation/PaymentConfirmed.php');
}else{
    // Else payment declined
    header('location: ../paymentConfirmation/paymentDeclined.php');
}








