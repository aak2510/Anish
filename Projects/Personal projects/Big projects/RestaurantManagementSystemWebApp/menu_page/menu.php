<?php
$conn = mysqli_connect('localhost', 'root', '', 'cs2810_t32');

if (!$conn) {
    echo 'connection error' . mysqli_connect_error();
}

$sql = 'SELECT * FROM menu ORDER BY item_name';

$result = mysqli_query($conn, $sql);


?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="../menu_page/style.css">

    <script>
        const items = [];

        function showInfo(id) {
            document.getElementById("info").classList.add("show");
            /* Causes the modal to appear */

            for (let i = 0; i < items.length; i++) {
                if (items[i].id == id) {
                    document.getElementById("name").innerText = items[i].name;
                    document.getElementById("ingredients").innerText = "Ingredients:\n" + items[i].ingredients;
                    document.getElementById("calories").innerText = "Calories: " + items[i].calories;
                }
            }
            /* Adds all the information to the modal */

        }

        function hideInfo() {
            document.getElementById("info").classList.remove("show");
            /* Causes the modal to dissapear */
        }


        function updateDisplay() {
            /* Displays all the menu items on screen */

            document.getElementById("options").innerHTML = "";
            /* Clears the page */
            selected = document.getElementById("Menus").value;


            /* Splits the menu into Starters, Sides, Mains, and Desserts */
            if (selected == "starter" || selected == "all") {
                document.getElementById("options").innerHTML += "<h1> Starters </h1>";
                for (let i = 0; i < items.length; i++) {
                    let suitable = "";
                    if (items[i].section == "starter") {
                        if (items[i].vegan == 1) {
                            suitable = "Ve";
                        } else if (items[i].vegetarian == 1) {
                            suitable = "V ";
                        }
                        document.getElementById("options").innerHTML += "<div class=\"item\", onclick='showInfo(" + items[i].id + ")'>" +
                            items[i].name +
                            "<div class = 'price'>" + suitable.fontcolor("green") + "&ensp;&ensp;&ensp;£" +
                            items[i].price +
                            "</div>" +
                            "</div>";
                    }
                }
            }
            if (selected == "main" || selected == "all") {
                document.getElementById("options").innerHTML += "<h1> Mains </h1>";
                for (let i = 0; i < items.length; i++) {
                    if (items[i].section == "main") {
                        let suitable = "";
                        if (items[i].vegan == 1) {
                            suitable = "Ve";
                        } else if (items[i].vegetarian == 1) {
                            suitable = "V ";
                        }
                        document.getElementById("options").innerHTML += "<div class=\"item\", onclick='showInfo(" + items[i].id + ")'>" +
                            items[i].name +
                            "<div class = 'price'>" + suitable.fontcolor("green") + "&ensp;&ensp;&ensp;£" +
                            items[i].price +
                            "</div>" +
                            "</div>";
                    }
                }
            }
            if (selected == "side" || selected == "all") {
                document.getElementById("options").innerHTML += "<h1> Sides </h1>";
                for (let i = 0; i < items.length; i++) {
                    if (items[i].section == "side") {
                        let suitable = "";
                        if (items[i].vegan == 1) {
                            suitable = "Ve";
                        } else if (items[i].vegetarian == 1) {
                            suitable = "V ";
                        }
                        document.getElementById("options").innerHTML += "<div class=\"item\", onclick='showInfo(" + items[i].id + ")'>" +
                            items[i].name +
                            "<div class = 'price'>" + suitable.fontcolor("green") + "&ensp;&ensp;&ensp;£" +
                            items[i].price +
                            "</div>" +
                            "</div>";
                    }
                }
            }

            if (selected == "dessert" || selected == "all") {
                document.getElementById("options").innerHTML += "<h1> Desserts </h1>";
                for (let i = 0; i < items.length; i++) {
                    if (items[i].section == "dessert") {
                        let suitable = "";
                        if (items[i].vegan == 1) {
                            suitable = "Ve";
                        } else if (items[i].vegetarian == 1) {
                            suitable = "V ";
                        }
                        document.getElementById("options").innerHTML += "<div class=\"item\", onclick='showInfo(" + items[i].id + ")'>" +
                            items[i].name +
                            "<div class = 'price'>" + suitable.fontcolor("green") + "&ensp;&ensp;&ensp;£" +
                            items[i].price +
                            "</div>" +
                            "</div>";
                    }
                }
            }



        }

        function addItem(id, name, section, ingredients, calories, vegan, vegetarian, price) {
            const item = {
                id: id,
                name: name,
                section: section,
                ingredients: ingredients,
                calories: calories,
                vegan: vegan,
                vegetarian: vegetarian,
                price: price
            } /* Creates a class for each item */
            items.push(item);
        }
    </script>



</head>

<body>

    <html class="home-bg">
    <div class="flex-logo">
        <img src="../sharedImages/logo-2.png" class="center" alt="logo" width="745" height="335" style="top: 0px" />
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


    <div class="dropdown">
        <h1>
            Menu
        </h1>
        <select class="menu-drop" name="Menus" id="Menus" onchange="updateDisplay()">
            <option value="all">All items</option>

            <option value="starter">Starters</option>
            <option value="main">Main meal</option>
            <option value="side">Sides</option>
            <option value="dessert">Desserts</option>

        </select>
    </div>

    <div class="options" id="options">

    </div>

    <?php
    while ($row = $result->fetch_assoc()) {
        // Checks if the item is currently available
        if ($row['availability'] >= 1) {
            $id = $row['Menu_ID'];
            $name = $row['item_name'];
            $section = $row['section'];
            $sqlGet = "SELECT * FROM ingredients WHERE menuId=" . $id;
            $item = ($conn->query($sqlGet))->fetch_assoc();
            echo '<script type="text/javascript">addItem("' . $id . '", "' . $name . '", "' . $section . '", "' .
                $item['ingredients'] . '", "' . $item['calories'] . '", "' .
                $item['vegan'] . '", "' . $item['vegetarian'] . '", "' . $row['price'] . '");</script>';
        }/* Adds each item to the list if there is at least 1 available */
    }
    echo '<script type="text/javascript">updateDisplay();</script>';
    /* Updates the display to initially show the whole menu */

    ?>



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

    <div class="background" id="info">
        <!-- div that covers the whole screen and makes it darker when the modal appears -->
        <div class="modal">

            <div class="name" id="name"></div>
            <div class="calories" id="calories"></div>
            <div class="ingredients" id="ingredients"></div>

            <span class="close" , onclick="hideInfo()">X</span>
            <!-- X in the corner to close the modal -->
        </div>
    </div>


</body>

</html>