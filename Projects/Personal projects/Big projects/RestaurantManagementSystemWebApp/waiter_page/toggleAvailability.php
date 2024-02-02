<!-- Connect to database -->
<?php
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) {
    echo 'connection error' . mysqli_connect_error();
}

$sql = 'SELECT * FROM menu ORDER BY item_name';

$result = mysqli_query($conn, $sql);


?>

<?php
    $id= $_GET['id'];
    $sqlGetAvailability = "SELECT availability WHERE menuId=" . $item_id;
    $availability = ($conn->query($sqlGetAvailability ))->fetch_assoc();
    // Adjusts availability of the item in the database
           if ($availability = 0 ){
               $sql = "UPDATE menu SET availability=1 WHERE id=item_id";
           }else{
               $sql = "UPDATE menu SET availability=0 WHERE id=item_id";
           }

?>