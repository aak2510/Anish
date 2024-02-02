<?php
//Connecting to the Menu database
//replace 'Majed' and 'cs2810' with own username and password 
$conn = mysqli_connect('localhost', 'Majed', 'cs2810', 'CS2810_T32');

if(!$conn){ //if connection is unsucessfull
    echo 'error' . mysqli_connect_error();
}

$sql = 'SELECT * FROM Menu';

$result = mysqli_query($conn, $sql);

$array = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($conn);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <script>const order = [];</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My first php</title>
</head>
<body>
    <h1 style="text-align:center">Oaxaca</h1>
    <h3 style="text-align:center">Menu</h3>
    <h4 style="text-align:center">Please Select the number of the menu Item you would like to order</h4>

    <div>
    
    <?php
    foreach($array as $menuItem){
        $id = $menuItem['Menu_ID'];
        ?>
        <div  style="text-align:center">
       //runs myFunction once an order is placed. 
        <h4 id=" <?php echo $menuItem['Menu_ID'] ?> " onclick="myFunction(this);" > <?php echo htmlspecialchars($menuItem['Menu_ID']) . ") "; ?> </h4>
        <?php
        
        echo (htmlspecialchars($menuItem['item_name']) . ':- ');
        echo (htmlspecialchars($menuItem['item_desc']));
        echo "<br>";
        ?>
        
        </div>
    <?php
    }
    ?>
</div >
  
<div  style="text-align:center" onclick="getElementById('demo').innerHTML= 'Your final order is :- ' + order;" ><button> Confirm</button></div>
    <h3 style="text-align:center"id="demo"></h3>
    <p style="text-align:center"id="text">  </p>

    <script>
    function myFunction(object){
        
        var text = document.getElementById("text");
        var id = object.id;
        
        if(id == 1){ //replaces id with name of menu item.
            var menuItem = 'Classic Burger';
        }else if(id == 2){
            var menuItem = 'Pizza';
        }else if(id == 3){
            var menuItem = 'Tacos';
        }else if(id == 4){
            var menuItem = 'Burritos';
        }
        alert("added " + menuItem + " to your order"); //alert confirmation of order
        order.push(menuItem); //pushed menu items onto array
        //document.getElementById("text").innerHTML = order;
        

    }
    
    </script>



</body>
</html>
