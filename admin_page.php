<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
     

      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="../learning php/details.php" class="btn">New Quiz</a>
      <a target="_blank" href="https://docs.google.com/forms/u/0/?tgif=d" class="btn">Take me to classroom</a>
      <a  href="http://localhost/phpmyadmin/index.php?route=/sql&db=faculty_waala2&table=quiz_data2&pos=0" class="btn">Manage Old Quiz</a>
      <!-- Ismpe Excel sheet wala svg  -->
      <a href="https://docs.google.com/spreadsheets/d/1WZUrE9azAoxcy86byOMXUAlQp2kFG1HEWjsWuWmDu-0/edit?resourcekey=null#gid=1756879897" class="btn">Excel Sheet</a>
      <!-- <a href="login_form.php" class="btn">login</a> -->
      <!-- <a href="register_form.php" class="btn">register</a> -->
      <a href="logout.php" class="btn">logout</a>
      <br>
      <br>
      <br>
      <h3>In Collaboration With <span>Google Forms</span></h3>
   </div>

</div>

</body>
</html>