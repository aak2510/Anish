<?php
require_once('luhnCardCheck.php');

function cardNumberCheck($cardNumber)
{   // Map of accepted cards
    $cards = array(
        // Visa cards all start with a 4 and are followed by 15 digits from ranging from 0-9
        "visa" => "/4\d{12}(?:\d{3})?/",
        // Amex cards start with 3 followed by either a 4 or a 7. Then followed by 13 additional digits
        "amex" => "/^3[47]\d{13}$/",
        // Master cards all start with the number 5 followed by any value between 1 and 5 inclusive. This is then followed by 14 additional digits
        "mastercard" => "/^5[1-5]\d{14}$/"
    );

    // Format the card number to remove spaces for content check
    $cardNumberFormatted =  str_replace(" ", "", $cardNumber);

    $result = false;
    // if the card number the user entered matches the pattern, we create a result set from that
    if ((preg_match($cards['visa'], $cardNumberFormatted)) || (preg_match($cards['amex'], $cardNumberFormatted)) || (preg_match($cards['mastercard'], $cardNumberFormatted))) {
        $result = true;
    }

    // If the card number entered is one of the cards accepted
    // Performs the Luhn check - An additional check to see if the card entered is a valid card
    if ($result > 0) {
        $result = (luhn_check($cardNumber));
    }
    return ($result > 0);
}
