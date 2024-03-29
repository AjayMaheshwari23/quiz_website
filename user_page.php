<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9edbc45998.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>PHP login system!</title>
    <style>
        :root {
            --main-color: rgb(21, 21, 124);
            --black: #444;
            --light-color: #777;
            --box-shadow: .5rem .5rem 0 rgba(22, 160, 133, .2);
            --text-shadow: .4rem .4rem 0 rgba(0, 0, 0, .2);
            --border: .2rem solid var(--main-color);
        }


        * {
            margin: 0%;
        }

        header {
            padding: 20px;
            background: #ffffff;
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
            background: #e85ef4;
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
            background-color: rgb(21, 21, 124);
            width: 2000px;
            height: 80px;
        }



        section {
            padding: 2rem 9%;
            margin-top: 50px;
            margin-left: 200px;
        }

        ;

        section:nth-child(even) {
            background: #f5f5f5;
            margin-top: 50px;
            margin-left: 200px;
        }

        .review .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
            gap: 3rem;
        }

        .review .box-container .box {
            border: var(--border);
            box-shadow: var(--box-shadow);
            border-radius: 5rem;
            padding: 2.5rem;
            background: #fff;
            text-align: top;
            position: relative;
            overflow: hidden;
            z-index: 0;
            margin-top: 2px;

        }

        .review .box-container .box img {
            height: 5rem;
            width: 5rem;
            border-radius: 50%;
            object-fit: cover;
            border: .5rem solid #fff;
        }

        .review .box-container .box h3 {
            color: #fff;
            font-size: 2.2rem;
            padding: .5rem 0;
        }


        .review .box-container .box .text {
            color: var(--light-color);
            line-height: 1.8;
            font-size: 1.6rem;
            padding-top: 4rem;
        }

        .review .box-container .box::before {
            content: '';
            position: absolute;
            top: -4rem;
            left: 50%;
            transform: translateX(-50%);
            background: var(--main-color);
            border-bottom-left-radius: 50%;
            border-bottom-right-radius: 50%;
            height: 25rem;
            width: 120%;
            z-index: -1;
        }
    </style>

<body>
<div class="container">


</div>
    <!-- <header>Viktorina</header> -->
    <div id="mySidemenu" class="sidemenu">
        <a href="javascript:void(0)" class="close" onclick="closeSM()">
            &times;</a>
        <div class="sm-wrapper">
            <!-- <a href="#">Home</a>
            <a href="student/quiz.php">Quiz's</a>
            <a href="student/prof.php">Profile</a>
            <a class="nav-link" href="logout.php">Logout</a> -->

            <a style="font-size:35px" href="#"><i class="fas fa-home" color="white"></i> Home</a>
            <a style="font-size:35px" href="student/quiz.php"><i class="fas fa-qrcode" color="white"></i> Quiz's</a>
            <a style="font-size:35px" href="student/prof.php"><i class="fas fa-address-card" color="white"></i> Profile</a>
            <a style="font-size:35px" class="nav-link" href="logout.php"><i class="fas fa-door-open"
                    color="white"></i> Logout</a>
        </div>
    </div>
    <div id="pg-content">
        <div style="font-size: 50px; cursor:pointer ; color:#ffffff;" onclick="openSM()">&#9776; <b>Viktorina</b></div>
        <!-- <h1>Side Menu<br><span>Tutorial</span></h1> -->
    </div>

    <section class="review" id="review">


        <div class="box-container">

            <div class="box">
                <img src="pic-1.png" alt="">

            </div>

            <div class="box">
                <img src="pic-2.png" alt="">

            </div>

            <div class="box">
                <img src="pic-3.png" alt="">

            </div>

            <div class="box">
                <img src="pic-3.png" alt="">

            </div>
        </div>

        </div>

    </section>

    <script>
        function openSM() {
            document.getElementById("mySidemenu").style.width = "300px";
            document.getElementById("pg-content").style.width = "3000px";
            document.getElementById("pg-content").style.marginLeft = "235px";

        }
        function closeSM() {
            document.getElementById("mySidemenu").style.width = "0";
            document.getElementById("mySidemenu").style.marginLeft = "0";
            document.getElementById("pg-content").style.marginLeft = "0px";
        }
    </script>
</body>
</body>

</html>

   
