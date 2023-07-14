<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_email']) ){
   header('location:login_form.php');
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <script type="text/javascript" src="js/sidemenu.js"></script> -->
</head>
<style>
    * {
        margin: 0%;
    }

    header {
        padding: 20px;
        background: #000000;
        color: white;
        font-size: 30px;
        text-align: left;
    }

    body {
        margin: 0;
        overflow: hidden;
        background-color: #eae7dc;
    }

    .sm-wrapper {
        margin-top: 100px;
        color: #000000;
    }

    .sidemenu {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #0b0804;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;

    }

    .sidemenu a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 45px;
        color: #ffffff;
        display: block;
        letter-spacing: 5px;
        margin-bottom: 20px;
        transition: 0.3s;
    }

    .sidemenu .close {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 60px;
        margin-left: 50px;
    }

    .sm-wrapper a:after {
        z-index: -1;
        position: absolute;
        left: 0%;
        width: 0;
        height: 50px;
        background: rgb(21, 21, 124);
        content: '';
        transition: width 0.35s ease-in-out;
    }

    .sm-wrapper a:hover:after {
        width: 10%;
    }

    .sm-wrapper a:hover {
        padding-left: 64px;
        transition: 0.35s ease-in-out;

    }

    #pg-content {
        transition: margin-left 0.5s;
        padding: 16px;
        padding-top: 2px;
        height: 80px;
        width: 3000px;
        background-color: rgb(21, 21, 124);

    }

    .container {
        margin-top: 100px;
        background-color: #eae7dc;
        margin-left: 220px;
    }

    .main1 {
        margin-top: -100px;
        padding: 15px;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }


    .sidebar {
        background-color: rgb(93, 91, 91);
        color: whitesmoke;
        height: 100%;
    }

    .sidebar a {
        margin-left: 10px;
        display: white;
        color: skyblue;
        padding-bottom: 10px;
        font-size: 30px;
        text-decoration: white;
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        margin-top: 20px;
        padding: 2%;
    }

    .card-body {
        margin-top: 20px;
    }

    .card.mb-3.content {
        margin-left: 20px;
    }

    .content {
        background-color: skyblue;
    }
</style>

<body>
    <div id="mySidemenu" class="sidemenu">
        <a href="javascript:void(0)" class="close" onclick="closeSM()">
            &times;</a>
        <div class="sm-wrapper">
            <a style="font-size:35px" href="firstpage.html"><i class="fas fa-home" color="white"></i> Home</a>
            <a style="font-size:35px" href="quiz.php"><i class="fas fa-qrcode" color="white"></i> Quiz's</a>
            <a style="font-size:35px" href="prof.php"><i class="fas fa-address-card" color="white"></i> Profile</a>
            <a style="font-size:35px" class="nav-link" href="../logout.php"><i class="fas fa-door-open"
                    color="white"></i> Logout</a>
        </div>
    </div>
    <div id="pg-content">
        <div style="font-size: 50px; cursor:pointer ; color:white;" onclick="openSM()">&#9776;<b> Viktorina</b></div>
        <!-- <h1>Side Menu<br><span>Tutorial</span></h1> -->
    </div>
    <div class="container">
        <div class="main1">
            <div class="row">
                <div class="col-md-4 mt-1">
                    <div class="card text-center sidebar">
                        <div class="card-body">
                            <img src="image/passport size photo ka size kitna hota hai.jpg" class="rounded-circle"
                                width="150">
                            <div class="mt-3">
                                <h1>
                                    <?php echo $_SESSION['user_name'] ?>
                                </h1>
                                <a href="">Home</a><br><br>
                                <a href="">Work</a><br><br>
                                <a href="">Support</a><br><br>
                                <a href="">Setting</a><br><br>
                                <a  href="../logout.php">Signout</a><br><br>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 mt-1">
                    <div class="card mb-3 content">
                        <h1 class="m-3 pt-3"><b>About</b></h1>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Full Name</b></h4>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <h4><b><?php echo $_SESSION['user_name'] ?></b></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Email</b></h4>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <h4><b><?php echo $_SESSION['user_email'] ?></b></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Phone</b></h4>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <h4><b>34567834567</b></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Address</b></h4>
                            </div>
                            <div class="'col-md-9 text-secondary">
                                <h4><b>  ‎  ‎  ‎ street no. 4,xyz</b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 content">
                        <h1 class="m-3"><b>IIITL Info</b></h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4><b>Joining Year</b></h4>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h4><b>2022</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function openSM() {
            document.getElementById("mySidemenu").style.width = "300px";
            document.getElementById("pg-content").style.width = "3000px";
            document.getElementById("pg-content").style.marginLeft = "235px";
            document.querySelector(".container").style.marginLeft = "290px";

        }
        function closeSM() {
            document.getElementById("mySidemenu").style.width = "0";
            document.getElementById("mySidemenu").style.marginLeft = "0";
            document.getElementById("pg-content").style.marginLeft = "0px";
            document.querySelector(".container").style.marginLeft = "200px";
        }
    </script>
</body>

</html>