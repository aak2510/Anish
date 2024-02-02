<?php
$conn = mysqli_connect('localhost', 'root', '', 'CS2810_T32');
// Check connection
if (!$conn) {
    echo 'Connection error: ' . mysqli_connect_error();
}
$sql = "SELECT table_number FROM orders WHERE order_status != 'Done'";

$result = mysqli_query($conn, $sql);
    
// Fetch resulting rows as arrays
$alltables = mysqli_fetch_all($result, MYSQLI_ASSOC);

$tableNum = null;
$error = null;

if(isset($_POST['submit'])){
    session_start();
    
    if (empty($_POST['tableNumber'])) { // Has the user input a table number
        $error = 'You need to input a table number <br>';
    } else {
        foreach ($alltables as $table){
            if($table['table_number'] == $_POST['tableNumber']){
                $_SESSION['tableNum'] = $_POST['tableNumber'];


                header("Location: payment.php");
            }else{
                $error = 'Enter a valid Table number!';
            }
       }

        
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#myModal").modal('show');
        });
    </script>
  

</head>

<body>
    <div id="myModal" class="modal fade" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">What is your Table Number?</h5>
                </div>
                <div class="modal-body">
                    <form action="paymentPage.php" method="POST">
                        <div class="form-group">
                            <input name="tableNumber" type="text" class="form-control" placeholder="Table Number" required>
                            <div class="red-text"><?php echo $error; ?></div>
                        </div>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href=' ../home_page/home.html'">Close</button>
                        <input type="submit" name="submit" value="Continue" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>