<?php
//Connecting to the Menu database
//replace 'Majed' and 'cs2810' with own username and password 
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if(!$conn){ //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

// selects the number of messages every second to update the notification number in the waiter homepage
$sql_count = 'SELECT count(*) FROM `notification` WHERE resolved = 0';


$count_result = mysqli_query($conn, $sql_count);

$count = mysqli_fetch_all($count_result, MYSQLI_ASSOC);

mysqli_free_result($count_result);

mysqli_close($conn);
// displays the notification number
echo $count[0]['count(*)'];
