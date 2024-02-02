<?php
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) { //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Branch Information</title>
    <link rel="stylesheet" href="../home_page/style.css">
    <script>
        function updateInfo() {/* Used so the page updates automatically when the dropdown is changed */
            document.getElementById("submit").click();
        }

    </script>

    <style>

    html{
        font-family: 'Alike Angular'; font-size: 20px;
    }
    .footer {
        position:absolute;
        width:100%;
        height:60px;   /* Height of the footer */
   
    }



    </style>

</head>

<body>

    <html class="home-bg">

    <div class="flex-logo">
        <img src="../sharedImages/logo-2.png" class="center" alt="logo" width="350" height="350" style="top: 0px" />
    </div>

    <div class="topnav">
    <a class="active" href="../home_page/home.html">Homepage</a>
    <a href="../branch_info/branch_info.php">Branch Info</a>
    <a href="../menu_page/menu.php">Menu</a>
    <a href="../waiter_page/customerNotifying.php">Call a waiter!</a>
    <a href="../order_page/paymentPage.php">Payment</a>
    <a href="../login_page/login.php">Employee Login</a>
    <div class="dropdown">
    <button class="dropbtn" onclick="myFunction()">Order
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown">
      <a href="../order_page\indexOrder.php">Make an order</a>
      <a href="../view_order_page\viewOrder.php">View your orders</a>
    </div>
    </div>
  </div>

    <h1>
        Branch information
    </h1>






    <div class="center">

    <p>
    Due to our continued support from our amazing customers, we are proud to be expanding all throughout London, with now 25 branches all over the capital
    with each branch showcasing the beautiful culture and tradition of mexico. Please see below to find a restaurant near you!
    </p>    
    <br><br>
    
    <label for="Locations">Select a location:</label>
    <form action="branch_info.php" method="POST">
        <select name="Locations" id="Locations" onchange="updateInfo()">
            <option value="Unselected" disabled selected>---Please select one---</option>
            <?php
            $sql = 'SELECT id, name FROM branch ORDER BY name';
            $result = mysqli_query($conn, $sql);
            $array = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
                
            foreach($array as $branches){
                echo "<option value=" . $branches['id'] . ">" . $branches['name'] . "</option>";
                /* Runs through each branch in the database and adds the name to the dropdown */
            } 
            
            ?>



        </select>
        <input style="visibility:hidden;" type="submit" name="submit" id="submit">
    </form>



    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['Locations'])) {
            $selected = $_POST['Locations'];
           
            $sqlGetBranch = 'SELECT id, telephone, email, map, description FROM branch WHERE id = ' . $selected;
            $branch = ($conn->query($sqlGetBranch))->fetch_assoc(); /* Gets the first (only) result from the db */

            echo $branch['description'] .'<br><br>' . $branch['map'] . '<br><br><br><b>Tel: ' . $branch['telephone']
                . '<br>Email: ' . $branch['email'] . '<br><br><br><br>';
                /* Displays all the information on the page */

        } else {
            echo 'Please select the value.';
        }
    }
    ?>
    
    </div>
    <div class="footer">
        <div class="bottomnav">
            <a class="active" href="../home_page/home.html">Homepage</a>
            <a href="../branch_info/branch_info.php">Branch Info</a>
            <a href="../menu_page/menu.php">Menu</a>
            <a href="../order_page/indexOrder.php">Order</a>
            <a href="../waiter_page/customerNotifying.php">Call a waiter!</a>
            <a href="../order_page/paymentPage.php">Payment</a>
            <a href="../login_page/login.php">Employee Login</a>
            

        </div>
        <h4>© 2022 RHUL CS - Group 32 </h4>
       
    </div>

</body>

</html>