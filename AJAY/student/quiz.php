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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9edbc45998.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- <script type="text/javascript" src="js/sidemenu.js"></script> -->
    <title>Document</title>
</head>
<link rel="stylesheet" href="quizstyle.css">
<body>
    <!-- <header>Viktorina</header> -->
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
    <table>
        <tr>
        <p>Number of Quiz Available : <span id="yahavalue"><?php echo $total ?></span> </p>
        <button onclick="loadquiz()" id="clkme">Click me to load all quiz</button>
            <td id="tdmain">

            </td>
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
        // ttl/=2;
        var num = ttl;
        var htmml = "";
        for (i = 1; i <= num; i++) {
            htmml += `<a class="quiz1" href="firstquiz.php">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    Quiz-${i}
                </a>`
            // htmml += `<br><br>`;
        }

        document.getElementById("tdmain").innerHTML = htmml;
        document.getElementById("clkme").style.visibility = "hidden";
    }
    </script>
</body>

</html>