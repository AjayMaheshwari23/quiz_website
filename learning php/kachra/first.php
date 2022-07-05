<?php
$conn = mysqli_connect('localhost','root','','faculty_waala');
$query=" SELECT * FROM quiz_data";
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
    <title>Document</title>
</head>
<body>
    <p>Number of Quiz Available : <span><?php echo $total ?></span> </p>
</body>
</html>