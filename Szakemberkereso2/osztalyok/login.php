<?php

$db=new mysqli('localhost','admin','rekszi','Szakemberkereso');
if(isset($_POST['submint'])){
    $errors=array();
    $true=true;
    if(empty($_POST['username'])){
        $true=false;
        array_push($errors,"A felhasznalo ures");

    }
    if(empty($_POST['password'])){
        $true=false;
        array_push($errors,"A jelszo ures");

    }
    if($true){
        $username=( $_POST['username']);
        $password=( $_POST['password']);

        $sql="SELECT * FROM ugyfelek WHERE username='$username' AND password='$password'";
        $query=$db->query($sql);
        if(mysqli_num_rows($query)==1){
            session_start();
            $_SESSION['logged']=$true;
           $beta= mysqli_fetch_array($query);
            $_SESSION['name']= $beta['name'];
            $_SESSION['telnumber']= $beta['telnumber'];
            $_SESSION['password']= $beta['password'];

            $_SESSION['username']=$username;
            header('location: home.php');


        }
        else{
            array_push($errors,"Nem megfelelo");
        }


    }
}



$db->close();

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
            width: 50px;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<h2>Login Form</h2>

<form action="login.php" method="post">
    <div class="imgcontainer">
        <a href="index.php"> <img src="login.jpeg" alt="" class="avatar"></a>
    </div>

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" name="submint">Login</button>
        <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label><br>
        <?php
        if(!empty($errors)){
            foreach($errors as $key){
                echo $key."<br/>";
            }
        }
        ?>
    </div>

    <div class="container" style="background-color:#f1f1f1">
        <a href="register.php">Registration</a>
        <span class="psw"><a href="#">password?</a></span>
    </div>
</form>

</body>
</html>