<?php

session_start();

if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_email']) ){
   header('location:firstquiz.php');
}


error_reporting(0);
$conn  = mysqli_connect('localhost','root','','faculty_waala2');
$query = " SELECT * FROM quiz_data2 ORDER BY ID LIMIT 0,4 ";
$data  = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);


$conn2  = mysqli_connect('localhost','root','','flag');
$query2 = " SELECT * FROM flag_data WHERE number='fourth' ";
$data2  = mysqli_query($conn2,$query2);



// $insert2 = "INSERT INTO flag_data (`id`,`number`,`bool_value`) VALUES (`10`,`a`,false) "; 
// $data3 = mysqli_query($conn2, $insert2);

$total2 = mysqli_num_rows($data2);
// $insert2 = " INSERT INTO flag_data( id, number , bool_value ) VALUES( 10 , "a" ,  false) " ;
//  $update2 = "UPDATE flag_data SET bool_value=1 WHERE number=first " ;
// $insert2 = "INSERT INTO flag_data( id, number , bool_value ) VALUES( 1 , "first" ,  false);";
// mysqli_query($conn2, $insert2);
// $query = "SELECT * FROM quiz_data2 WHERE id=1 ";
// $query2 = " SELECT lname FROM quiz_data2 ORDER BY ID LIMIT 0,1 ";
// $data2  = mysqli_query($conn,$query);
// $fname = "SELECT fname FROM `quiz_data2` WHERE id='1' "
// $dataf  = mysqli_query($conn,$fname);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Page</title>
</head>
<style>
    *{
        margin:0;
        padding:0;
    }

    html{
      /* margin-left:-40px; */
        background-image:linear-gradient(-45deg,grey,white,blue);
        height:100%;
        /* background-repeat: no-repeat; */
        /* background-size:cover; */
    }

    header{
      height:8vh;
      width:100%;
      background-color: rgb(21, 21, 124);
      font-size: x-large;
      padding-bottom:2vh;
      font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    #alert {
        color: white;
        /* background-color: #07252d; */
        /* height: 40px; */
        padding: 10px;
        /* padding-bottom: 0px; */
        text-align: center;
        text-transform: uppercase;
        /* -webkit-box-reflect: below -42px linear-gradient(rgb(206, 14, 14),#0004); */
        /* -webkit-box-reflect: below -20px; */
    }
    
    header h1{
        color:white;
        font-size:xx-larger;
    }

    /* TIMER */
.base-timer {
  color:black;
  position: relative;
  width: 200px;
  height: 200px;
}

.base-timer__svg {
  transform: scaleX(-1);
  /* margin-left:5%; */
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 10px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 8px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: rgb(65, 184, 131);
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 200px;
  height: 200px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
}

    #app{
        color:white;
        /* background-color:blue; */
        border-radius:5px;
        width: 13%;
        float: right;
        height: fit-content;
        font-size: xx-large;
        text-align:center;
        margin: 65px 17px 10px 50px;
        padding: 3px 3px 3px 3px;
    }

    

    #time{
        font-size: x-large;
        font-family: 'Montserrat', sans-serif;
    }
    
    li {
      width:600px;
    }

    /* Table */
    .form .tb{
      margin-top:7.5vh;
      margin-right:5vh;
    }

    td,tr{
       padding:10px; 
    }


    #main{
        display:flex;
        font-family: Poppins, sans-serif;
    }

    .form h1{
       margin-top: 50px;
       padding-left:20vh;
       padding-top:1vh;
       font-family:Copperplate, Papyrus, fantasy;
       /* font-family: 'Abril Fatface', serif; */
       
    }

    .form{
        padding-left:5vh;
    }

    h2 span {
        animation: animate 5s linear infinite;
    }

    h2 span:nth-child(even) {
        animation-delay: 0.4s;
    }

    @keyframes animate {

        0%,
        18%,
        20%,
        50.1%,
        60%,
        65.1%,
        80%,
        90.1%,
        92% {
            color: white;
            text-shadow: none;
        }

        18.1%,
        20.1%,
        30%,
        50%,
        60.1%,
        65%,
        80.1%,
        90%,
        92.1%,
        100% {
            /* color: white; */
            text-shadow: 0 0 10px #03bcf4,
                0 0 20px #03bcf4,
                0 0 40px #03bcf4,
                0 0 160px #03bcf4,
                0 0 400px #03bcf4;

        }
    }
    header h1{
      text-align: center;
      padding-top:5px;
    }

    #quizleft {
      margin-left:-60px;
    }
</style>

<body>
    <!-- multiple user can login at that time -->
    <!-- security features -->
    <!-- Responsive -->
    <!-- Display some important/more Instructions name,quiz time,mail-id,faculty name(option),topic-name -->
    <!-- Camera and audio --> 
    <!-- timer clock/animation by js -->

    <header>
        <h1><b> ------- VIKTORINA ------- </b></h1>
        <!-- <h1><b>📗 ------- VIKTORINA ------- 📗</b></h1> -->
        <!-- <h1><b>VIKTORINA MAIN QUIZ PAGE</b></h1> -->
    </header>

    <div>


        <div id="app" display=flex;>
            <p id="countdown" style="position: sticky;"></p>
        </div>
        <div>    
            <h2 id="alert" display=flex;></h2>
            <!-- <h2 id="alert"><span>HAPPY </span><span>DIWALI</span> </h2> -->
        </div>

    </div>

    <!-- <div id="secondsdisplay" style="color: black;">H</div> -->

    <div id="main">

        <?php 
        // $value = 100 ;
        foreach($data as $row){
            $value =  $row['lname'];
        }

        foreach($data as $row){
          $course_name =  $row['sr'];
        }
        // echo $course_name;
        // foreach($data as $row){
        //     echo  $row['fname'];
        // }
        // echo $value;
         foreach($data2 as $row){
            $bul_value =  $row['bool_value'];
        }
        // echo $bul_value;
        // echo $total2;
        ?>
            <div overflow="auto" id="quizleft" >
            <iframe
                src="https://docs.google.com/forms/d/e/1FAIpQLSc7UfFlj7vIFkcP68BM8DNPK0P7OymV-dUdvNWMVT9_tCIvGA/viewform?embedded=true"
                width="824px" height="635px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
            </div> 
            
            <div class="form">
              <div class="tb">
              <table cellspacing="3vh" border="3" >
            <tr>
                <td>Name</td>
                <td><?php echo $_SESSION['user_name'] ?></td>
            </tr>
            <tr>
                <td>E-mail Id</td>
                <td><?php echo $_SESSION['user_email'] ?></td>
            </tr>
            <tr>
                <td>Course</td>
                <td> <?php echo $course_name ?></td>
            </tr>
            <tr>
                <td>Faculty Name</td>
                <td>Admin</td>
            </tr>
              </table>
              </div>  
                <h1><b>INSTRUCTIONS</b></h1><br><br>
                <ul type="block" class="inst">
                    <h3><li>The quizzes consists of questions carefully designed to help you self-assess your comprehension of the information presented on the topics covered in the module.</li></h3><br>
                    <h3><li> You will need to complete each of your attempts in one sitting, as you are allotted perticular time to complete each attempt.</li></h3><br>
                    <h3><li>If you are opening multiple tabs. Alert message shows at top of window perticular number of times. Then quiz is closed automatically.</li></h3><br>
                </ul>
            </div>
        
    </div>


</body>
<script>
    
    var startingminutes = <?php echo json_encode($value) ?>;
    // const startingminutes =99.3;
    console.log(startingminutes);
    let time = startingminutes * 60;
 var bulvalue = <?php echo json_encode($bul_value); ?>;
 console.log(bulvalue);
    // if(bulvalue==4)
    if(bulvalue==1)
    {
        window.alert("🚨🚨 !! You Can Open a Quiz only Once  ");
            window.location.href = '../quiz.php';
    }else{
            
         console.log("Ok Quiz dedo");
    }

    let countdownEl = document.getElementById('countdown');

    setInterval(updateCountdown, 1000);

    function updateCountdown() {
        const minutes = Math.floor(time / 60);
        let seconds = time % 60;
        seconds = seconds < 10 ? '0' + seconds : seconds;
        countdownEl.innerHTML = ` Remaining time =  ${minutes}:${seconds}`;
        // time--;
        if (time == 15) {
            console.log("15 Seconds left");
            document.getElementById("alert").style.backgroundColor =  "#154350";   
            document.getElementById("alert").innerHTML ="<span>Last 15 seconds , </span><span>Submit Your Quiz otherwise quiz will show alert</span> ";
            // message("Last 10 seconds , Submit Your Quiz otherwise quiz will show alert");
        }
        if (time == 0) {
           <?php 
           //----------
           $update2 = "UPDATE `flag_data` SET bool_value='1' WHERE number='fourth' ";
           $query_run = mysqli_query($conn2,$update2);
            //-------

        //    if($query_run)
        //    {
        //        echo '<script type="text/javascript"> alert("Data Updated") </script>  ';
        //    }else{
        //        echo '<script type="text/javascript"> alert("Nahi Chala") </script>  ';
        //    }
        //    $conn2  = mysqli_connect('localhost','root','','flag');
        //    $query2 = " SELECT * FROM flag_data ORDER BY ID LIMIT 0,1 ";
        //    $data2  = mysqli_query($conn2,$query2);
        //    $total2 = mysqli_num_rows($data2);
        //     $update2 = "UPDATE flag_data SET bool_value=1 WHERE number=first " ;
        //     mysqli_query($conn2, $update2);
         ?>
            //bul_value ko 1 karna hai yaha 
            // window.location.href = 'https://www.gmail.com';
            window.alert("Quiz Over");
            window.location.href = '../quiz.php';
        }
    }

    var count = 0;
    window.addEventListener('focus', function (event) {
        console.log('has focus');
    });

    window.addEventListener('blur', function (event) {
         count++;
        if (count == 1) {
            alert('You have either Opened a new tab or switched to a different screen 🚨 ');
        } else if (count == 3) {
            window.alert("CHEATING  🚨🚨 !! We have Ended You Quiz ");
            window.location.href = '../quiz.php';
        }
    });


    // TIMER
    const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

//YAHAN CHANGE KARNA H TIME CONNECT WITH DATABASE
const TIME_LIMIT = time;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
  // R E D IR E C T   TO   QU I Z   P AG E 
  window.location.href = '../quiz.php';
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }else if(timeLeft === 15)
    {
      console.log("15 Seconds left");
            document.getElementById("alert").style.backgroundColor =  "#154350";   
            document.getElementById("alert").innerHTML ="<span>Last 15 seconds , </span><span>Submit Your Quiz otherwise quiz will show alert</span> ";
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}
</script>

</html>