<form action="index.php" method="post">
First Name	<input type="text" name="fname" id="fname"> <br> <br>
Sr Name	<input type="text" name="sr" id="sr"> <br> <br>
Last Name <input type="text" name="lname" id="lname"> <br> <br>
<Input type="submit">
</form>

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

$sr=$_POST['sr'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];

$sql = "INSERT INTO students (`sr`, `fname`, `lname`) 

VALUES ('$sr', '$fname', '$lname')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>