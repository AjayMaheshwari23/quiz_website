<?php
//This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username']))
{
    header("location: welcome.php");
    exit;
}
require_once "config.php";

$username = $password = "";
$err = "";
$wrongpass = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password'])))
    {
        $err = "Please enter username + password";
    }
    else{
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }


if(empty($err))
{
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $param_username);
    $param_username = $username;
    
    
    // Try to execute this statement
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                        if(password_verify($password, $hashed_password))
                        {
                            // this means the password is corrct. Allow user to login
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            //Redirect user to welcome page
                            header("location: login.php");
                            
                        }
                        else{
                          $wrongpass="wrong password";

                        }
                    }

                }else{
                  $err = "Username Not Registered";
                }
    }
}    
}


?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <title>PHP login system!</title>
    <style>
      body{
       background-color:white;
       background-image: url(images/vikto2.jpeg);
        background-size: cover;
        background-repeat: no-repeat;
      }
      .container{
        background-color: transparent;
        position: absolute;
        top: 12%;
        left: 7%;
        border-radius: 8px;
        padding: 18px;
        
      }
      .container{
        border: 2px solid  black;
        box-shadow: 5px 5px 13px 13px rgb(255,255,255);
      }
      h3{
        text-align: center;
      }
      .form-control:hover{
        background-color: white;
      }
      button[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;

}
button[type=submit]:hover {
  background-color: #45a049;
}
.logo{
  color:#ffffff;
  font-size:40px;
}
.logo:hover{
  color:#e7da62;
}
.check{
  float: right;
  font-size: 17.5px;
}
.error{
  color: #FF0000;
}
form i {
            
            cursor: pointer;
        }
.wte{
  color:white;
}

      </style>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a href="frontpage.html" class="logo">Viktorina</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="register.php">Register</a> -->
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="login.php">Login</a> -->
      </li>
      <li class="nav-item">
        <!-- <a class="nav-link" href="logout.php">Logout</a> -->
      </li>

      
     
    </ul>
  </div>
</nav>

<div class="container mt-4">
<h3 class="wte">Student Login :</h3>
<hr>

<form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" class="wte">Username</label>
    <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Username"><span class="error"><?php echo $err;?></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="wte">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password"><span class="error"><?php echo $wrongpass;?></span>
    <i class="bi bi-eye-slash" id="togglePassword"></i>
  </div>
 
  <div class="form-group">
  <button type="submit" class="btn btn-success">Submit</button> <div class="check"></div>
  <!-- <button type="submit" class="btn btn-success">Submit</button> <div class="check"><p>Don't have an account? Register <a href="register.php">here</a></p></div> -->
</div>
</form>



</div>
<script>
const togglePassword = document
            .querySelector('#togglePassword');
  
        const password = document.querySelector('#exampleInputPassword1');
  
        togglePassword.addEventListener('click', () => {
  
            // Toggle the type attribute using
            // getAttribure() method
            const type = password
                .getAttribute('type') === 'password' ?
                'text' : 'password';
                  
            password.setAttribute('type', type);
  
            // Toggle the eye and bi-eye icon
            //this.classList.toggle('bi-eye');
        });
        </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
