<?php

session_start();
$db=new mysqli('localhost','admin','rekszi','Szakemberkereso');
if (isset($_POST['submit'])){
    $errors=array();
    $true=true;
    if (empty($_POST['name'])){
        $true=false;
        array_push($errors,"A felhasznalo ures");
    }
    if (empty($_POST['service'])){
        $true=false;
        array_push($errors,"Valaszd k a szolgaltatast");
    }
    if (empty($_POST['subject'])){
        $true=false;
        array_push($errors,"A legiras ures");
    }
    if ($true){
        //costemer
        $cusername= $_SESSION['username'];
//        $cname=$_SESSION['name'];
//        $cpassword=$_SESSION['password'];
//        $ctelnumber=$_SESSION['telnumber'];
//        include "Custemer.php";
//        $cstm=new Custemer($cusername,$cname,$ctelnumber,$cpassword);
        include "Advertisment.php";

        $name=$_POST['name'];
        $service=$_POST['service'];
        $compOrNot=$_POST['companyOrNor'];
        $discr=$_POST['subject'];
        $adv=new Advertisment($cusername,$service,$compOrNot,$discr);
        $adv->register();

      //  $cstm->addAdvertisment($adv);

    }
}




?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block;
        }

        input[type=submit] {
            background-color: #04AA6D;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        .container {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .col-25, .col-75, input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
    </style>
</head>
<body>

<h2>Advertisment Form</h2>
<p>Fill out the form.</p>

<div class="container">
    <form action="AddAdvert.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="fname">Short dicription</label>
            </div>
            <div class="col-75">
                <input type="text" id="fname" name="name" placeholder="Short dicription...">
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="country">Service</label>
            </div>
            <div class="col-75">
                <select id="country" name="service">
                    <option value="1">Clining</option>
                    <option value="2">Painting</option>
                    <option value="3">Gardening</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-25">
                <label for="country">Company or not</label>
            </div>
            <div class="col-75">
                <select id="country" name="companyOrNor">
                    <option value="1">Both</option>
                    <option value="2">Company</option>
                    <option value="3">Private person</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-25">
                <label for="subject">Subject</label>
            </div>
            <div class="col-75">
                <textarea id="subject" name="subject" placeholder="Write more about what whold you want.." style="height:200px"></textarea>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="Submit" name="submit">
        </div>
    </form>
</div>

</body>
</html>