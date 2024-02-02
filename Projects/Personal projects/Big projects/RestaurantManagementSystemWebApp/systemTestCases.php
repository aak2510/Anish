<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
include('systemTesting.php');
echo "#Test 1. Card number verfication on cardCheck.php. <br><br>";
// These card should all return true 
test1("Amex",  "3445 45781 546782");
test1("Visa",  "4584 1111 1111 1234");
test1("MasterCard",  "5365 0866 4587 1234");
echo '<br>';

// These numbers should all return false
test1("Fake Card 1: ",  "1234 1234 1234 1234");
test1("Fake Card 2: ",  "4565 1565 4548 9745");
test1("Fake Card 3: ",  "3759 876543 210011");

echo "______________________________________________________<br>";

echo "Test 2: Check for card rejection and acceptance based on expiry date.<br><br>";
// Should return False
outputTest2("2022", "03");
// Should return True
outputTest2("2100", "12");
echo "______________________________________________________<br>";
