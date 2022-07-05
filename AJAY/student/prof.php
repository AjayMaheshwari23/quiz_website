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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9edbc45998.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">

        <link rel="stylesheet" href="profstyle.css">
</head>
<body>
    <div id="mySidemenu" class="sidemenu">
        <a href="javascript:void(0)" class="close" onclick="closeSM()">
            &times;</a>
        <div class="sm-wrapper">
            <a href="firstpage.html">Home</a>
            <a href="quiz.php">Quiz's</a>
            <a href="prof.php">Profile</a>
            <a class="nav-link" href="../logout.php">Logout</a>
        </div>
    </div>
    <div id="pg-content">
        <div style="font-size: 50px; cursor:pointer ; color:#ffffff;" onclick="openSM()">&#9776;<b> Viktorina</b></div>
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
                                <h1><span>
                <?php echo $_SESSION['user_name'] ?>
            </span></h1>
                                <a href="">Home</a><br><br>
                                <a href="">Work</a><br><br>
                                <a href="">Support</a><br><br>
                                <a href="">Setting</a><br><br>
                                <a href="">Signout</a><br><br>
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
                                <h4><b><span>
                <?php echo $_SESSION['user_name'] ?>
            </span></b></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Email</b></h4>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <h4><b><span>
                <?php echo $_SESSION['user_email'] ?>
            </span></b></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Phone</b></h4>
                            </div>
                            <div class="col-md-9 text-secondary">
                                <h4><b>98XXXXXX21</b></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <h4><b>Address</b></h4>
                            </div>
                            <div class="'col-md-9 text-secondary">
                                <h4><b>street no. 4,xyz</b></h4>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3 content">
                        <h1 class="m-3"><b>Recent Projects</b></h1>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <h4><b>Project Name</b></h4>
                                </div>
                                <div class="col-md-9 text-secondary">
                                    <h4><b>Project Description</b></h4>
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