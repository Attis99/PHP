<?php
if(isset($_POST['submit'])){
    $errors=array();
    $true=true;
    if(empty($_POST['companyname'])){
        $true=false;
        array_push($errors,"A nev ures");

    }
    if(empty($_POST['name'])){
        $true=false;
        array_push($errors,"A nev ures");

    }
    if(empty($_POST['telnumber'])){
        $true=false;
        array_push($errors,"A telefonszam ures");

    }
    if(empty($_POST['password'])){
        $true=false;


    }
    if($true){
        $companyname=$_POST['campanyname'];
        $service=$_POST['name'];
        $telnumber=$_POST['telnumber'];
        $password=$_POST['password'];
        $address=$_POST['address'];
        include "Company.php";
        $cpy=new Company($companyname,$service,$telnumber,$address,$password);
        $result=$cpy->registration();
        if ($result){

        }





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

<form action="register.php" method="post">
    <div class="container">
        <h1>Register</h1>
        <p>Please fill in this form to create an account.</p>
        <hr>

        <label for="username"><b>Company name</b></label>
        <input type="text" placeholder="Enter Company name" name="campanyname" id="email" required>

        <label for="name"><b>Services</b></label>
        <input type="text" placeholder="Enter Name" name="name" id="email" required>

        <label for="username"><b>Tell number</b></label>
        <input type="text" placeholder="Enter Tell number" name="telnumber" id="email" required>

        <label for="username"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" name="address" id="email" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" id="psw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
        <hr>
        <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

        <button type="submit" class="registerbtn" name="submit">Register</button>
    </div>

    <div class="container signin">
        <p>Already have an account? <a href="#">Sign in</a>.</p>
    </div>
</form>

</body>
</html>