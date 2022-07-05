<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="formcss.css">
    <title>Educational registration form</title>
</head>

<body>
    <div class="main-block">
        <div class="left-part">
            <i class="fas fa-graduation-cap"></i>
            <h1>Enter Details for your new Quiz</h1>
        </div>
        <form action="index.php" method="post">
            <div class="title">
                <i class="fas fa-pencil-alt"></i>
                <h2>Quiz Details</h2>
            </div>


            
            <div class="info">
                <input class="fname" type="fname" name="fname" id="fname" placeholder="G_Form Code link">
                <input type="lname" name="lname" id="lname" placeholder="Time in 24Hr Format">
                <!-- <input type="text" name="name" placeholder="Phone number"> -->
            </div>



            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "keyboard";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// $sr=$_POST['sr'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$sql = "INSERT INTO students (`sr`, `fname`, `lname`) 

VALUES (NULL, '$fname', '$lname')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>