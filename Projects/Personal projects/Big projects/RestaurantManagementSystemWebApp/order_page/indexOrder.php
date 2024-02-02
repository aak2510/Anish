<! this code is run when the form is submitted as this file is loaded>
    <?php

    // Connect to the database
    $conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');
    // Check connection
    if (!$conn) {
        echo 'Connection error: ' . mysqli_connect_error();
    }

    // SQL queries for the different types of meals in 'menu' table. 
    // Also checks if the menu item is available.
    $sqlStarters = "SELECT item_name, menu_id FROM menu WHERE section = 'starter' AND availability = 1 ORDER BY item_name";
    $resultStarters = mysqli_query($conn, $sqlStarters);
    $sqlMains = "SELECT item_name, menu_id FROM menu WHERE section = 'main' AND availability = 1 ORDER BY item_name";
    $resultMains = mysqli_query($conn, $sqlMains);
    $sqlSides = "SELECT item_name, menu_id FROM menu WHERE section = 'side' AND availability = 1 ORDER BY item_name";
    $resultSides = mysqli_query($conn, $sqlSides);
    $sqlDesserts = "SELECT item_name, menu_id FROM menu WHERE section = 'dessert' AND availability = 1 ORDER BY item_name";
    $resultDesserts = mysqli_query($conn, $sqlDesserts);

    // Data in form (So it persists upon resubmission)
    $tableNum = $starters = $mains = $sides = $desserts = '';

    // List of errors
    $errors = array('tableNum' => '', 'starters' => '');

    // Checks for submitted data
    if (isset($_POST['submit'])) {
        // Input checks
        if (empty($_POST['tableNum'])) { // Has the user input a table number
            $errors['tableNum'] = 'A table number is required <br>';
            // Integer input check does not seem to work properly; prevents order to be submitted.
            //} elseif (is_string($_POST['tableNum'])) { // Checks if the user has entered a string
            //    $errors['tableNum'] = 'Please enter a number <br>';
        } else {
            $tableNum = $_POST['tableNum'];
        }

        // TO BE FIXED TO WORK WITH DROPDOWN

        //if ($_POST['starters'] = 'None' and $_POST['mains'] = 'None' and $_POST['desserts'] = 'None') { // Has the user input at least one dish
        //$errors['starters'] = 'An order must contain at least one dish';

        //} else {
        $starters = $_POST['starters'];
        $mains = $_POST['mains'];
        $desserts = $_POST['desserts'];
        //}

        // Checks if there are any errors in the submission
        if (!array_filter($errors)) {

            $tableNum = mysqli_real_escape_string($conn, $_POST['tableNum']);
            $starters = mysqli_real_escape_string($conn, $_POST['starters']);
            $mains = mysqli_real_escape_string($conn, $_POST['mains']);
            $sides = mysqli_real_escape_string($conn, $_POST['sides']);
            $desserts = mysqli_real_escape_string($conn, $_POST['desserts']);

            // Create SQL
            $sql = "INSERT INTO orders(starter_menu_ids, main_menu_ids, side_menu_ids, dessert_menu_ids, table_number, order_status) 
                VALUES('$starters', '$mains', '$sides', '$desserts', '$tableNum', 'non-confirmed')";

            // Save to DB and check
            if (mysqli_query($conn, $sql)) {
                // Success
                // Change to customer order page
                header('Location: indexOrder.php');
            } else {
                // Failure
                echo 'query error: ' . mysqli_error($conn);
            }
            session_start();
            $_SESSION['table_number'] = $tableNum;
            header('Location: ../view_order_page/viewOrder.php?');
        }
    } // end of POST check

    ?>


    <!doctype html>
    <html lang="en">

    <head>
        <title>Oaxaca: Order now</title>
        <link rel="stylesheet" href="../home_page/style.css">
        <meta charset="UTF-8">

        <style>
            html {
                font-family: 'Alike Angular';
                font-size: 20px;

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

        <h1 style="text-align: center;">Order here!</h1>

        <p style="text-align:center">On this page, you can take your pick out
            of our many delicious dishes and order here! We will strive to get your food to you
            as quickly as possible! Please fill in the form below to make your order,
            and confirm this by pressing the "submit" button below. Enjoy!

        <form action="indexOrder.php" method="POST" style="text-align: center;">
            <! the action is to find this program and run the above PHP code with the data>
                <!-- Dropdown possibly not necessary for the table number field -->
                <h4>Table Number:</h4>
                <div style="padding-left:600px; padding-right:600px">
                    <input type="text" name="tableNum" value="<?php echo htmlspecialchars($tableNum) ?>" style=" text-align:center;">
                </div>

                <div class="red-text"><?php echo $errors['tableNum']; ?></div>

                <h4 style="display:inline">Starters:</h4>
                <!-- Dropdown menu for all available starters -->
                <?php
                echo "<select name='starters' id='starters'>";
                echo "<option value='None' selected>None</option>";
                while ($r = mysqli_fetch_array($resultStarters)) {
                    echo "<option value=" . strval($r['menu_id']) . ">" . $r['item_name'] . "</option>";
                }
                echo "</select>";
                ?>

                <h4 style="display:inline">Mains:</h4>
                <!-- Dropdown menu for all available mains -->
                <?php
                echo "<select name='mains' id='mains'>";
                echo "<option value='None' selected>None</option>";
                while ($r = mysqli_fetch_array($resultMains)) {
                    echo "<option value=" . strval($r['menu_id']) . ">" . $r['item_name'] . "</option>";
                }
                echo "</select>";
                ?>

                <h4 style="display:inline">Sides:</h4>
                <!-- Dropdown menu for all available sides -->
                <?php
                echo "<select name='sides' id='sides'>";
                echo "<option value='None' selected>None</option>";
                while ($r = mysqli_fetch_array($resultSides)) {
                    echo "<option value=" . strval($r['menu_id']) . ">" . $r['item_name'] . "</option>";
                }
                echo "</select>";
                ?>

                <h4 style="display:inline;">Desserts:</h4>
                <!-- Dropdown menu for all available desserts -->
                <?php
                echo "<select name='desserts' id='desserts'>";
                echo "<option value='None' selected>None</option>";
                while ($r = mysqli_fetch_array($resultDesserts)) {
                    echo "<option value=" . strval($r['menu_id']) . ">" . $r['item_name'] . "</option>";
                }
                echo "</select>";
                ?>
                <br>
                <br>
                <div>
                    <input type="submit" name="submit" value="Submit">
                </div>
                <br>
                <br>
        </form>

        <div class="footer">
            <div class="bottomnav">
                <a class="active" href="../home_page/home.html">Homepage</a>
                <a href="../branch_info/branch_info.php">Branch Info</a>
                <a href="../menu_page/menu.php">Menu</a>
                <a href="../order_page/indexOrder.php">Order</a>
                <a href="../waiter_page/customerNotifying.php">Call a waiter!</a>
                <a href="../order_page/payment.php">Payment</a>
                <a href="../login_page/login.php">Employee Login</a>

            </div>
            <h4>© 2022 RHUL CS - Group 32 </h4>
        </div>

    </body>

    </html>