<?php
include('order_page\cardVerification\cardCheck.php');
include('order_page\cardVerification\expiryDate.php');

// Formatting and display results of test for cardCheck.php
function test1($CardType, $cardNumber)
{

    if (cardNumberCheck($cardNumber))
        echo $CardType . ": " . $cardNumber . " - True";
    else
        echo $CardType . ": " . $cardNumber . " - False";
    echo "<br/>";
    
}

function outputTest2($cardYear, $cardMonth)
{
    if (cardExpired($cardYear, $cardMonth))
        echo "Year: " . $cardYear . "<br>Month: " . $cardMonth . "<br> = True";
    else
        echo "Year: " . $cardYear . "<br>Month: " . $cardMonth . "<br> = False";
    echo "<br/><br/>";
}

