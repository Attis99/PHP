<?php
include "myDb.php";
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged']!=true){
    header('location: login.php');
}

echo "Welcome ".$_SESSION['username']."<br/>";
if (isset($_POST['hirdetes'])){
    header('location: AddAdvert.php');
}
if (isset($_POST['logout'])){
    header('location: logout.php');

}
$m=$_SESSION['username'];
$trr=true;
$db=new myDb();
$sql="SELECT * FROM Advertisment WHERE clientusername = '$m'";
$result=$db->connection->query($sql);




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
        .city {
            background-color: tomato;
            color: white;
            border: 2px solid black;
            margin: 20px;
            padding: 20px;
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
        }

        .container {
            padding: 16px;
        }
        #hh{
            background: #04AA6D;
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

<h2> </h2>


<form action="home.php" method="post">
    <button type="submit" name="hirdetes">Add advertisement</button>
    <button type="submit" name="logout">Log-out</button>
</form>
<h2>Sajat hirdeteseid:</h2>


<?php
if ($trr) {
    while ($sor = mysqli_fetch_array($result)) {
//        echo "<div class='city'>";
//        echo "<h1>" . $sor['service'] . "</h1>";
//        echo "<p>" . $sor['discreptios'] . "</p>";
//        echo "<form action='home.php' method='post'>";
//        echo "<button type='submit' name='torol'>Delete</button>";
//        echo "</form>";
//        echo "</div>";
?>
   <div class="city">
       <h1> <?php echo $sor['service']; ?> </h1>
       <p> <?php echo $sor['discreptios']; ?> </p>
   </div>
        <h3>Ajanlatok:</h3>
        <?php
        $akt=$sor['id'];
        $sql2="SELECT * FROM offer WHERE adventismentId='$akt'";
        $result2=$db->connection->query($sql2);
        while ($sor2 = mysqli_fetch_array($result2)){
            ?>
            <div class="imgcontainer" id="hh">
                <h2>Az ajanlat ara: <?php echo $sor2['price'];?></h2>
                <p>Leiras: <?php echo $sor2['discription'];?> </p>
                <p>Kuldo username: <?php echo $sor2['sender_username']; ?></p>
            </div>

            <?php
        }
            ?>
<?php
    }
}
?>


</body>
</html>
