<!-- 
Luhn algorithm number checker - (c) 2005-2008 shaman - www.planzero.org
Last accessed: 24 March 2022 @ 12:56
This algorithm is available in the public domain, however it has been adapted
to fit in with the purpose of this implementation. 

The Rough Guide to PHP. 2022. 10 Regular Expressions you just can’t live without in PHP. [online] 
Available at: <http://web.archive.org/web/20080918014358/http://www.roughguidetophp.com/10-regular-expressions-you-just-cant-live-without-in-php/#Verifying%20Credit%20Card%20Numbers> 
[Accessed 24 March 2022].
-->
<?php

/**
 * The luhn check is a checksum 10 algorithm. This means we perform
 * Some sort of calculation (described below and in the comments), 
 * and then we check to see that the result of this calculation mod 10 
 * is equal to 0. This algorithm is used by many, in real-world applications.
 * 
 * 1. Double the value of every other digit from right to left, beginning with the second to last digit.
 * 2. Add the digits of the results of Step 1 to the remaining digits in the credit card number.
 * 3. If the result mod 10 is equal to 0, the number is valid. If the result mod 10 is not equal to 0, the validation fails.
 * */
function luhn_check($number)
{

    // Replace any non-digits with empty space
    $number = preg_replace('/\D/', '', $number);

    // Set the string length and parity
    $number_length = strlen($number);
    $parity = $number_length % 2;

    // Loop through each digit in the passed through number
    $total = 0;
    for ($i = 0; $i < $number_length; $i++) {
        $digit = $number[$i];
        // Multiply each other digit by 2
        if ($i % 2 == $parity) {
            $digit *= 2;
            // The we add all these values up, if a value is double digits,
            // We add them together before adding them to the running total.
            if ($digit > 9) {
                $digit -= 9;
            }
        }
        // Total up the digits
        $total += $digit;
    }

    // If the total mod 10 equals 0, the number is valid
    return ($total % 10 == 0);
}
