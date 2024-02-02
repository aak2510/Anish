<?php


function cardExpired($expireYear, $expireMonth)
{
    // Format the date received from the payment form into year-month
    $date = new DateTime($expireYear . '-' . $expireMonth);
    $expiryDate = $date->format('Y-m');

    // get todays date in the same form
    $today = new DateTime(date("Y-m"));
    $today = $today->format('Y-m');


    // If the expiry date on the card is less than todays - meaning if the card is expired
    if ($expiryDate <= $today) {
        //return true
        return true;
    } else {
        // Otherwise return false
        return false;
    }
}
