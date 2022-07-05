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
            <button onclick="myFunction()">GO BACK</button>
        </div>


        <form action="details.php" method="post" id="form">
        <!-- <form action="details.php" method="post"> -->
            <div class="title">
                <i class="fas fa-pencil-alt"></i>
                <h2>Quiz Details</h2>
            </div>


            
            <div class="info">
                <input class="fname" type="text" name="fname" id="fname" placeholder="G_Form Code link">
                <input type="text" name="lname" id="lname" placeholder="Time in 24Hr Format">
                <input type="text" name="sr" id="sr" placeholder="Message">
            </div>



            <button type="submit">Submit</button>
           
            <!-- <button type="submit" onclick="onsubmit(event)">Submit</button> -->
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
   var form = document.getElementById('form')

   function myFunction(){
    alert("Thanks For Creating Quiz");
    window.location.href = "../AJAY/admin_page.php";
   }
    // event.preventDefault();
    // alert("Quiz Created");
    // window.location.href = "../AJAY/admin_page.php";
        // window.location.href = "../admin_page.php";
//    })
</script>

</html>



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty_waala2";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sr=$_POST['sr'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$required = array('sr', 'fname', 'lname');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
    $error = true;
    console.log("ERROR");
  }
}

if ($error) {
//   echo "All fields are required.";
//   window.alert("YOU can't leave fields Empty");
} else{
    $sql = "INSERT INTO quiz_data2 ( `fname`,`sr`, `lname`) 
    
    VALUES ( '$fname','$sr',  '$lname')";
    
    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

}


$conn->close();
?>