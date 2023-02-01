<?php
session_start();

if (isset($_POST['submit'])){
    include "Offer.php";
    $price=$_POST['price'];
    $disc=$_POST['disc'];
    $advid=$_SESSION['adv_id'];
    $offer=new Offer($_SESSION['username'],$advid,$price,$disc);
    $s=$offer->registration($_SESSION['username']);
    if ($s){
        header('location: indexC.php');
    }


}



?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: black;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #04AA6D;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>

<form action="offersend.php" method="post">
    <div class="container">
        <h1>Send offer</h1>

        <hr>

        <label for="username"><b>Price</b></label>
        <input type="text" placeholder="Enter price" name="price" id="email" required>

        <label for="name"><b>Discription</b></label>
        <input type="text" placeholder="Enter Discription" name="disc" id="email" required>



        <button type="submit" class="registerbtn" name="submit">Register</button>
    </div>

</form>

</body>
</html>
