<?php

  $conn = new mysqli('localhost', 'root', '', 'cs2810_t32');
  if (!$conn) {
    echo 'error' . mysqli_connect_error();
  }

  // Incomplete code to insert into MySQL table 'orders'. This will most likely be moved to another page.
  //  $orderInsert = "INSERT INTO TABLE orders (table_number, starters, mains, desserts)
  //  VALUES ('".$_POST["tableNum"]."','".$_POST["starters"]."','".$_POST["mains"]."','".$_POST["desserts"]."')";
  //  $result = mysqli_query($conn,$orderInsert);

  // Printing table 'orders' to kitchen staff page.
  $sql = "SELECT * FROM orders";
  $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Oaxaca: Kitchen</title>
  </head>
  <body>
    <h1>Orders:</h1>
    <?php if ($result->num_rows > 0) { ?>
      <?php while($row = $result->fetch_assoc()) { ?>
        <p><?php echo 'Order ID: ' . $row['Order_ID'] . '<br />'; ?></p>
        <p><?php echo 'Time: ' . $row['date_time'] . '<br />'; ?></p>
        <p><?php echo 'Table number: ' . $row['table_number'] . '<br />'; ?></p>
        <p><?php echo 'Starter ID: ' . $row['starter_menu_ids'] . '<br />'; ?></p>
        <p><?php echo 'Main ID: ' . $row['main_menu_ids'] . '<br />'; ?></p>
        <p><?php echo 'Dessert ID: ' . $row['dessert_menu_ids'] . '<br />'; ?></p>
        <p><?php echo 'Status: ' . $row['order_status'] . '<br />'; ?></p>
        <br>
      <?php } ?>
    <?php } else { ?>
      <p><?php echo 'No pending orders'; ?></p>
    <?php } ?>
  </body>
</html>