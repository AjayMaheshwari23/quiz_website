<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Educational registration form</title>
    <style>
        html,
        body {
            min-height: 100%;
        }

        body,
        div,
        form,
        input,
        select,
        p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
            color: #eee;
        }

        body {
            background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
            background-size: cover;
        }

        h1,
        h2 {
            text-transform: uppercase;
            font-weight: 400;
        }

        h2 {
            margin: 0 0 0 8px;
        }

        .main-block {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            padding: 25px;
            background: rgba(0, 0, 0, 0.5);
        }

        .left-part,
        form {
            padding: 25px;
        }

        .left-part {
            text-align: center;
        }

        .fa-graduation-cap {
            font-size: 72px;
        }

        form {
            background: rgba(0, 0, 0, 0.7);
        }

        .title {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .info {
            display: flex;
            flex-direction: column;
        }

        input,
        select {
            padding: 5px;
            margin-bottom: 30px;
            background: transparent;
            border: none;
            border-bottom: 1px solid #eee;
        }

        input::placeholder {
            color: #eee;
        }

        option:focus {
            border: none;
        }

        option {
            background: black;
            border: none;
        }

        .checkbox input {
            margin: 0 10px 0 0;
            vertical-align: middle;
        }

        .checkbox a {
            color: #26a9e0;
        }

        .checkbox a:hover {
            color: #85d6de;
        }

        .btn-item,
        button {
            padding: 10px 5px;
            margin-top: 20px;
            border-radius: 5px;
            border: none;
            background: #26a9e0;
            text-decoration: none;
            font-size: 15px;
            font-weight: 400;
            color: #fff;
        }

        .btn-item {
            display: inline-block;
            margin: 20px 5px 0;
        }

        button {
            width: 100%;
        }

        button:hover,
        .btn-item:hover {
            background: #85d6de;
        }

        @media (min-width: 568px) {

            html,
            body {
                height: 100%;
            }

            .main-block {
                flex-direction: row;
                height: calc(100% - 50px);
            }

            .left-part,
            form {
                flex: 1;
                height: auto;
            }
        }
    </style>
</head>

<body>
    <div class="main-block">
        <div class="left-part">
            <i class="fas fa-graduation-cap"></i>
            <h1>Enter Details for your new Quiz</h1>
        </div>
        <form onsubmit="onsubmi(event)" id="form">
            <div class="title">
                <i class="fas fa-pencil-alt"></i>
                <h2>Quiz Details</h2>
            </div>
            <div class="info">
                <input class="fname" type="text" name="name" placeholder="G_Form Code link">
                <input type="number" name="name" placeholder="Time in 24Hr Format">
                <!-- <input type="text" name="name" placeholder="Phone number"> -->
            </div>
            <button type="submit" onclick="onsubmit(event)">Submit</button>
        </form>
    </div>
    <div id="MainQuiz" style="visibility: hidden;">
        <h1>Am I visible</h1>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css"
            integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    </div>

</body>
<script>
    function onsubmi(e) {
        e.preventDefault();
        console.log("Form Submitted");
        // document.getElementById('form').style.visibility = 'hidden';
        // document.body.style.backgroundColor = white;
        // document.getElementById('MainQuiz').style.visibility = 'visible';
    }
</script>

</html>