<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decline payment</title>

    <style>
        html {
            background: url('../../sharedImages/DeclinePayment.png') no-repeat center fixed;
            background-color: #cccccc;
            background-size: 600px;
            background-position-x: 0;
            width: 100%;
            font-family: "Monaco", "Monaco", monospace;
        }


        .declineMessage {
            color: red;
            margin-top: 250px;
            text-align: center;
            text-decoration: none;

        }


        .homeButton {
            text-align: center;
            margin: 50px;

        }


        .homepageButton {
            min-width: fit-content;
            height: 70px;
        }

        .homepageButton a {
            min-width: fit-content;
            padding: 25px 30px;
            text-decoration: none;
            cursor: pointer;
            color: black;
        }
    </style>
</head>


<body>
    <div class="declineMessage">
        <h2>Your payment has declined.</h2>
        <h2>Please return to the homepage!</h2>
    </div>
    <div class="homeButton">
        <button class="homepageButton"> <a href="../../home_page/home.html">Return to Homepage</a></button>
    </div>
</body>


</html>