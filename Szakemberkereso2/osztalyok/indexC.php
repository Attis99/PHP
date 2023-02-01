<?php
session_start();
if (!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
    header('location: loginC.php');
}
echo "Welcome ".$_SESSION['username']."<br/>";
if (isset($_POST['hirdetes'])){
  //  header('location: AddAdvert.php');
}
if (isset($_POST['logout'])){
    header('location: logout.php');

}
$m="";
$db=new mysqli('localhost','admin','rekszi','Szakemberkereso');
$sql="SELECT * FROM Advertisment";
$result=$db->query($sql);
//$sor=mysqli_fetch_array($result);






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
        .city {
            background-color: tomato;
            color: white;
            border: 2px solid black;
            margin: 20px;
            padding: 20px;
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

<h2> </h2>


<form action="indexC.php" method="post">
    <button type="submit" name="hirdetes">Advertised search</button>
    <button type="submit" name="logout">Log-out</button>
</form>

</div>
<!--   <div class="city">-->
<!--      <h1>--><?php //echo $sor['service']?>
<!--       <h2>Service</h2>-->
<!--     <p>--><?php //echo $sor['discreptios']?><!--<br>-->
<!--         --><?php
//         $_SESSION['service']=$sor['service'];
//         $_SESSION['discreptios']=$sor['discreptios'];
//         $_SESSION['id']=$sor['id'];
//
//         ?>
<!--         <Button id="button">Send offer</Button>-->
<!---->
<!--   </div>-->

<?php
while ($sor = mysqli_fetch_array($result)){
  //  $m=$sor['id'];
//    echo "<div class='city'>";
//    echo "<h1>". $sor['service']."</h1>";
//    echo "<p>". $sor['discreptios']."</p>";
//    echo '<Button id="button">Send offer</Button>';
//    echo "</div>";
//}

?><div class="city">
    <form action="indexC.php" method="post">
        <input type="hidden" name="id" value="<?php echo $sor["id"]; ?>">
        <h1><?php echo $sor["service"]; ?> </h1>
        <p><?php echo $sor["discreptios"]; ?></p>
        <input type="submit" value="Send ofert" name="button" id="button">
    </form>
    </div>




    <?php
}
?>


<script>
    document.getElementById("button").addEventListener("click", function() {
        window.open("offersend.php", "Example", "height=500,width=500");
    });
</script>



</body>
</html>

<?php
if (isset($_POST['id'])){
    $_SESSION['adv_id']=$_POST['id'];


}
if (isset($_POST['button'])){
    header('location: offersend.php');
}
?>