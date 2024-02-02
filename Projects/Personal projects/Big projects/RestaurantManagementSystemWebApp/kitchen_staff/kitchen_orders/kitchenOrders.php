<!-- Has to be implemented before anything else so that the sessions can start as soon as the page is loaded. -->
<?php // Uncomment this once you're happy with the implementation you've done
session_start();
$value = $_SESSION['usernameEmail'];
// If no one has logged in then re-direct user to login page
/* The conidition is used as fail safe to make sure that the waiter cannot some how access the waiter pages through any other pages (i.e. if there happens to be a broken link) */
if (!isset($_SESSION['usernameEmail']) || $value != 'kitchen.staff@oaxaca.com') {
    header('location: ../../login_page/login.php');
    exit;
}

// If the user presses the logout button then the session variable for logout will be set and the session variables will be destroyed
if (isset($_GET['logout'])) {
    session_destroy();
    session_unset();
    // When the href is sent here from the logout button, it will check if the logout variable has been set. If it has, the user will be redirected using the header function
    header('location: ../../login_page/login.php');
    exit;
}
?>



<?php
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');

if (!$conn) {
    echo 'connection error' . mysqli_connect_error();
}
$sql = "SELECT * FROM orders";
$sqlStack = "SELECT * FROM orders_stack ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Kitchen Order</title>



    <style>
        .topleft {
            position: absolute;
            top: 20px;
            left: 30px;
            font-size: 18px;

        }

        .page{
            margin: 10px;
        }

        .homepageButton a {
            background-color: #555555;
            color: white;
            padding: 14px 25px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .topright {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 18px;
        }

        .undoLast {
            background-color: rgb(58, 89, 114);
            color: white;
            padding: 14px 50px;
            text-align: center;
            text-decoration: none;
            margin-left: 20px;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .logOut a {
            background-color: rgb(255, 0, 0);
            color: white;
            padding: 14px 50px;
            text-align: center;
            text-decoration: none;
        }

        .orderBox {
            background-color: #EBEBEB;
            width: 210px;
            float: left;
            line-height: 20px;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            padding: 7px 7px;
        }


    </style>

    <script>
        let orders = [];

        function removeOrder(index) {

            document.getElementById("idNum").value = orders[index].id;
            document.getElementById("tableNum").value = orders[index].table_number;
            document.getElementById("done").click();
            /* Fills in and submits a form so that the php side can remove the order */

        }

        function addOrderDB(id, table_number, starters, mains, desserts) {

            const order = {
                id: id,
                table_number: table_number,
                starter: starters.replaceAll(",", "<br>"),
                main: mains.replaceAll(",", "<br>"),
                dessert: desserts.replaceAll(",", "<br>")
            }/* Creates a class for each order */

            orders.push(order);

            loadOrders(); /* Reloads the display so that every order is displayed */

        }


        function loadOrders() {

            document.getElementById("page").innerHTML = "";

            for (let i = 0; i < orders.length; i++) {

                document.getElementById("page").innerHTML += "<div class=\"orderBox\", id = \"orderItems\", onclick=\"removeOrder(" + i + ")\">\n" +
                    "<b>Order num:</b>" + orders[i].id + "<b>&emsp;Table num:</b>" + orders[i].table_number + "<br>" +
                    "<b>Starters:</b><br>" + orders[i].starter +
                    "<br><b>Mains/Sides:</b><br>" + orders[i].main +
                    "<br><b>Desserts:</b><br>" + orders[i].dessert +

                    "    </div>";
            }/* Creates a div for each order in the list and adds all the information */

        }
    </script>

</head>
<header>
    <!-- If the user tries to return to this page after logging out or changing to page access won't be granted -->
    <span class="topright">
        <p class="logOut"><a href="../../kitchen_staff/kitchen_orders/KitchenOrders.php?logout='1'">Logout</a></p>
    </span>

    <span class="topleft">
        <p class="homepageButton" style="float:left"> <a href="../../kitchen_staff/kitchenHomepage.php">Homepage</a></p>
    </span>

    <!-- If the user tries to return to this page after logging out or changing to page which doesn't allow access -->
    <script type="text/javascript">
        if (window.performance && window.performance.navigation.type == window.performance.navigation.TYPE_BACK_FORWARD) {
            window.location.href = "../../waiter_page/resubmission.html"
        }
    </script>


</header>

<body id = "body">

    <h1 style="text-align: center;">
        Orders
    </h1>

    <form action="" method="post">
        <input style="visibility:hidden;" type="text" name="idNum" id="idNum">
        <input style="visibility:hidden;" type="text" name="tableNum" id="tableNum">
        <input style="visibility:hidden;" type="submit" name="done" id="done">
    </form type="submit">
    <form action="" method="post">
        <button type="submit" name="undoLast" id = "undoLast" class = "undoLast">Undo last</button>
    </form>
    <div class="page" , id="page">
        <?php
        function getItems(){
            $connTemp = mysqli_connect('localhost', 'root', '', 'CS2810_T32');
            $sql = "SELECT * FROM orders WHERE order_status = 'confirmed'";
            $result = $connTemp->query($sql);
            /* Gets all orders that have been confirmed by the waiter and not completed */

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                        if ($row['starter_menu_ids'] != "None") {
                            $sqlGetStarters = "SELECT item_name FROM menu where Menu_ID =" . $row['starter_menu_ids'];
                            $starters = $connTemp->query($sqlGetStarters)->fetch_assoc()['item_name'];
                            /* Converts the id of the item into the name of the item */
                        } else($starters = $row['starter_menu_ids']);

                        if ($row['main_menu_ids'] != "None") {
                            $sqlGetMains = "SELECT item_name FROM menu where Menu_ID =" . $row['main_menu_ids'];
                            $mains = $connTemp->query($sqlGetMains)->fetch_assoc()['item_name'];
                            /* Converts the id of the item into the name of the item */
                        } else($mains = $row['main_menu_ids']);

                        if ($row['side_menu_ids'] != "None") {
                            $sqlGetSides = "SELECT item_name FROM menu where Menu_ID =" . $row['side_menu_ids'];
                            $mains = $mains . ',' . $connTemp->query($sqlGetSides)->fetch_assoc()['item_name'];
                            /* Converts the id of the item into the name of the item */
                        }/* Can be empty */

                        if ($row['dessert_menu_ids'] != "None") {
                            $sqlGetDesserts = "SELECT item_name FROM menu where Menu_ID =" . $row['dessert_menu_ids'];
                            $desserts = $connTemp->query($sqlGetDesserts)->fetch_assoc()['item_name'];
                            /* Converts the id of the item into the name of the item */
                        } else($desserts = $row['dessert_menu_ids']);

                        if ($row['starters_done']) {
                            $starters = "<s>" . $starters . "</s>";
                        }
                        if ($row['mains_done']) {
                            $mains = "<s>" . $mains . "</s>";
                        }
                        if ($row['desserts_done']) {
                            $desserts = "<s>" . $desserts . "</s>";
                        }/* Strikes through items that have been completed */
                        echo '<script type="text/javascript">addOrderDB("' . $row['Order_ID'] . '","' .
                            $row['table_number'] . '","' . $starters . '","' . $mains . '","' . $desserts .
                            '");</script>';

                }
            } else {
                echo '<script type="text/javascript">loadOrders();</script>';
                echo 'No pending orders';
            }
        }
        getItems();
        ?>
    </div>
    <?php
    if (isset($_POST['done'])) {
        $orderId = $conn -> real_escape_string($_POST['idNum']);
        $tableNum = $conn -> real_escape_string($_POST['tableNum']);
        /* The user should not be able to access the form but there is a check for sql injection just in case */

        $sqlCheck = "SELECT starters_done, mains_done, desserts_done FROM orders WHERE Order_ID=" . $orderId;
        $check = ($conn->query($sqlCheck))->fetch_assoc();
        /* Gets the boolean values for if each part of the order has been completed */


        $sqlStackAdd = "INSERT INTO orders_stack(last_Change) VALUES (" . $orderId . ")";
        $conn->query($sqlStackAdd);
        /* Adds the order id to a stack so that changes can be undone */

        if (!$check['starters_done']) {

            $sqlDone = "UPDATE orders SET starters_done=1 WHERE Order_ID=" . $orderId;

            $message = "Order: " . $orderId . " Starter is ready.";
            $sqlNotif = "INSERT INTO notification(table_number, message, resolved) VALUES('".$tableNum."', '$message', '0')";
            $conn->query($sqlNotif);
            /* Sends a notification to the waiters that part of the order is ready to pick up */

        } else if (!$check['mains_done']) {
            $sqlDone = "UPDATE orders SET mains_done=1 WHERE Order_ID=" . $orderId;

            $message = "Order: " . $orderId . " Main is ready.";
            $sqlNotif = "INSERT INTO notification(table_number, message, resolved) VALUES('".$tableNum."', '$message', '0')";
            $conn->query($sqlNotif);
            /* Sends a notification to the waiters that part of the order is ready to pick up */

        } else if (!$check['desserts_done']) {
            $sqlDone = "UPDATE orders SET desserts_done=1 WHERE Order_ID=" . $orderId;

            $message = "Order: " . $orderId . " Dessert is ready.";
            $sqlNotif = "INSERT INTO notification(table_number, message, resolved) VALUES('".$tableNum."', '$message', '0')";
            $conn->query($sqlNotif);
            /* Sends a notification to the waiters that part of the order is ready to pick up */

        } else {
            $sqlDone = "UPDATE orders SET order_status='done' WHERE Order_ID=" . $orderId;
        }
        if (!$conn->query($sqlDone)) {
            /* Updates the db to say what's been done */
            echo '<script>alert("Could not delete item")</script>';
        } else {
            echo "<script type='text/javascript'> orders = [];</script>";
            getItems();
            /* Reloads all the orders so that it is always up to date */
        }


    }

    ?>


    <?php
    if (isset($_POST['undoLast'])) {
        $stack = $conn->query($sqlStack);
        if (mysqli_num_rows($stack)>0) {
            $id = (($stack)->fetch_assoc())['id'];
            $last = (($conn->query($sqlStack))->fetch_assoc())['last_Change'];

            $sqlCheck = "SELECT order_status, mains_done, desserts_done FROM orders WHERE Order_ID=" . $last;
            $check = ($conn->query($sqlCheck))->fetch_assoc();
            /* Gets the boolean values for if each part of the order has been completed */

            if ($check['order_status'] == 'done') {
                $sqlUndoLast = "UPDATE orders SET order_status='confirmed' WHERE Order_ID=" . $last;
            } else if ($check['desserts_done']) {
                $sqlUndoLast = "UPDATE orders SET desserts_done=0 WHERE Order_ID=" . $last;

                $sqlRemoveNotif = "DELETE FROM notification WHERE message = 'Order: " . $last . " Dessert is ready.'";
                $conn->query($sqlRemoveNotif);
                /* Removes the notification from the db */

            } else if ($check['mains_done']) {
                $sqlUndoLast = "UPDATE orders SET mains_done=0 WHERE Order_ID=" . $last;

                $sqlRemoveNotif = "DELETE FROM notification WHERE message = 'Order: " . $last . " Main is ready.'";
                $conn->query($sqlRemoveNotif);
                /* Removes the notification from the db */

            } else {
                $sqlUndoLast = "UPDATE orders SET starters_done=0 WHERE Order_ID=" . $last;

                $sqlRemoveNotif = "DELETE FROM notification WHERE message = 'Order: " . $last . " Starter is ready.'";
                $conn->query($sqlRemoveNotif);
                /* Removes the notification from the db */

            }
            if (!$conn->query($sqlUndoLast)) {
                /* Updates the db to say what's been done */
                echo '<script>alert("Could not undo")</script>';
            } else {
                $sqlStackDelete = "DELETE FROM orders_stack WHERE id=" . $id;
                $conn->query($sqlStackDelete);
                /* Removes the change from the stack */

                echo "<script type='text/javascript'> orders = [];</script>";
                getItems();
                /* Reloads all the orders so that it is always up to date */
            }
        } else {
            echo '<script>alert("Unable to undo")</script>';
        }
    }
    ?>



</body>

</html>