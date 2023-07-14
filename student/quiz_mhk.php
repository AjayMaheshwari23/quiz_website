<?php
$conn = mysqli_connect('localhost','root','','faculty_waala2');
$query=" SELECT * FROM quiz_data2";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);
?>
<?php

// @include 'config.php';

// session_start();

// if(!isset($_SESSION['user_name'])){
//    header('location:login_form.php');
// }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9edbc45998.js" crossorigin="anonymous"></script> -->

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <script type="text/javascript" src="js/sidemenu.js"></script> -->
    <title>Document</title>

    <link rel="stylesheet" href="quizstyle_m.css">
    <style>
        html {
            background: url(images/bg_quiz.jpeg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            margin-top: 0%;
        }

        #first {
            font-size: xxx-large;
            font-family: 'Dancing Script', cursive;
            font-family: 'Josefin Sans', sans-serif;
            font-family: 'Kdam Thmor Pro', sans-serif;
            margin-top: 10%;
            margin-left: 26%;
            text-transform: uppercase;
            background-image: linear-gradient(-225deg,
                    #231557 0%,
                    #44107a 29%,
                    #ff1361 67%,
                    #fff800 100%);
            /* background-size: auto auto; */
            /* background-clip: border-box; */
            background-size: 200% auto;
            color: #fff;
            background-clip: text;
            text-fill-color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textclip 2s linear infinite;
            display: inline-block;
        }


        @keyframes textclip {
            to {
                background-position: 200% center;
            }
        }




        #clkme {
            width: 80vh;
            height: 10vh;
            position: absolute;
            top: 55%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        #tdmain {
            position: absolute;
            top: 65%;
            left: 60%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            margin-top: 5vh;
            font-size: x-large;
            font-style: italic;
        }
    </style>
</head>

<body>
    <!-- <header>Viktorina</header> -->
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
        <div style="font-size:40px; cursor:pointer ; color:#ffffff;" onclick="openSM()"><b>&#9776; Viktorina</b></div>
        <!-- <h1>Side Menu<br><span>Tutorial</span></h1> -->
    </div>
    <table>
        <tr>
            <br>
            <p id="first" align="center"><b>Number of Quiz Available : 4<span id="yahavalue"></span></b></p><br><br>
            <div id="second">
                <button onclick="loadquiz()" id="clkme" style="font-size:xx-large ;">Click me to load all
                    quiz's</button>
            </div>
            <td id="tdmain"></td>
        </tr>
    </table>




    <script>
        function openSM() {
            document.getElementById("mySidemenu").style.width = "275px";
            document.getElementById("pg-content").style.width = "3000px";
            document.getElementById("pg-content").style.marginLeft = "235px";
            document.getElementById("quiz1").style.marginLeft = "330px";
        }
        function closeSM() {
            document.getElementById("mySidemenu").style.width = "0";
            document.getElementById("mySidemenu").style.marginLeft = "0";
            document.getElementById("pg-content").style.marginLeft = "0px";
            document.getElementById("quiz1").style.marginLeft = "20px";
        }


        function loadquiz() {
            console.log("Clicked");
            let ttl = document.getElementById("yahavalue").innerText;
            // var ttl = = <?php echo json_encode($total); ?>;
            var num = ttl;
            var htmml = "";

            for (i = 1; i <= num; i++) {
                if (i == 1) {
                    htmml += `<a class="quiz1" href="quizes/firstquiz.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Quiz-${i}
                </a>`}
                if (i == 2) {
                    htmml += `<a class="quiz1" href="quizes/secondquiz.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Quiz-${i}
                </a>`}
                if (i == 3) {
                    htmml += `<a class="quiz1" href="quizes/thirdquiz.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Quiz-${i}
                </a>`}
                if (i == 4) {
                    htmml += `<a class="quiz1" href="quizes/fourthquiz.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Quiz-${i}
                </a>`}
                if (i == 5) {
                    htmml += `<a class="quiz1" href="quizes/fifthquiz.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Quiz-${i}
                </a>`}
                // htmml += `<br><br>`;
            }

            document.getElementById("tdmain").innerHTML = htmml;
            document.getElementById("clkme").style.visibility = "hidden";
        }
    </script>
</body>

</html>