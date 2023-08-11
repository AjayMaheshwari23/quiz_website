<?php

session_start();

if(!isset($_SESSION['user_name']) && !isset($_SESSION['user_email']) ){
   header('location:firstquiz.php');
}


error_reporting(0);
$conn = mysqli_connect('localhost','id19262624_root','4>x!2^~0$Sz0d-C}','id19262624_user_db');
$query = " SELECT * FROM quiz_data2 ORDER BY ID LIMIT 0,1 ";
$data  = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);


// $conn2  = mysqli_connect('localhost','root','','flag');
$query2 = " SELECT * FROM flag_data2 WHERE number='first' && email='".$_SESSION['user_email']."'  ";
$data2  = mysqli_query($conn,$query2);
  foreach($data2 as $row){
            $bul_value =  $row['bool_value'];
        }
        //  echo $bul_value;
         



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
        user-select: none;
    }
            @media print {

            html,
            body {

                /* Hide the whole page */
                display: none;
            }

         
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
  margin-top:-40px;
  margin-right:20px;
  /* margin-left:5%; */
}

.base-timer__label {
  position: absolute;
  width: 180px;
  height: 100px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 48px;
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
        margin-left:80px;
    }

    .form h1{
       margin-top: 30px;
       padding-left:20vh;
       padding-top:1vh;
       font-family:Copperplate, Papyrus, fantasy;
       /* font-family: 'Abril Fatface', serif; */
       
    }

    .form{
        padding-left:5%;
        margin-top:-6vh;
        /* padding-top:-591vh; */
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
      margin-left:-2%;
    }


    

    .progress {
        background-color: #d8d8d8;
        border-radius: 20px;
        position: relative;
        margin: 15px 0;
        height: 30px;
        width: 570px;
    }

    .progress-done {
        background: linear-gradient(to left, #F2709C, #FF9472);
        box-shadow: 0 3px 3px -5px #F2709C, 0 2px 5px #F2709C;
        border-radius: 20px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 0;
        opacity: 0;
        transition: 0.1s ease-in-out 0.1s;
    }

    .pids-wrapper {
        width: 100%;
    }

    .pid {
        width: calc(10% - 10px);
        height: 10px;
        display: inline-block;
        margin: 5px;
    }

    #insidequiz{
      overflow-y:auto;
      height:80vh;
    }

    #rightpart{
      height:80%;
    }
    
    
    
    
    @media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }
  #leftpart{
    width:100%; 
        width: 97vw;
  }
  
  #quizleft{
          width: 97vw;
  }

  #rightpart{
      width:100%;
    }

    #main{
      /*width:100vw;*/
      display: table-row-group;
    }
    
    .form h1 {
        width:4vw;
        margin-left: -27%;
    }
    
    li{
        width:80vw;
        margin:4%;
    }
    
    body{
            background-color: #aebbff;
    }
    
    .base-timer__svg {
            margin-right: 54vw;
    }
    
    .base-timer__label {
        margin-left:-20vw;
    }
    
    .progress {
     width:85vw;   
    }
    
    .base-timer {
        margin-left:-37vw;
    }
    
    .form .tb {
        margin-top: 13vh;
    }
    
}
</style>

<body>
    <!-- multiple user can login at that time -->
    <!-- security features -->
    <!-- Responsive -->
    <!-- Display some important/more Instructions name,quiz time,mail-id,faculty name(option),topic-name -->
    <!-- Camera and audio --> 
    <!-- timer clock/animation by js -->

    <header id="mainheading">
        <h1 ><b>  VIKTORINA-1 </b></h1>
        <!--<h1 ><b> ------- VIKTORINA ------- </b></h1>-->
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
       
        // echo $total2;
        ?>
        
        <div overflow="auto" id="quizleft" >

        <div id="insidequiz">
            
                <?php
                  foreach($data as $row){
                   echo $row['fname'];
                  }
                 ?>
            <!--<iframe-->
            <!--    src="https://docs.google.com/forms/d/e/1FAIpQLSc7UfFlj7vIFkcP68BM8DNPK0P7OymV-dUdvNWMVT9_tCIvGA/viewform?embedded=true"-->
            <!--    width="824px" height="635px" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>-->

            </div>
        </div> 
        <div id="rightpart">
            
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
              <h1> Audio Detector</h1>
    <!-- <h1 id="volume">F</h1> -->
    <div class="progress">
        <div class="progress-done" data-done="30" id="progress-done">

        </div> 


      

    </div>
                <h1><b>INSTRUCTIONS</b></h1><br><br>
                <ul type="block" class="inst">
                    <h3><li>The quizzes consists of questions carefully designed to help you self-assess your comprehension of the information presented on the topics covered in the module.</li></h3><br>
                    <h3><li> You will need to complete each of your attempts in one sitting, as you are allotted perticular time to complete each attempt.</li></h3><br>
                    <h3><li>If you are opening multiple tabs. Alert message shows at top of window perticular number of times. Then quiz is closed automatically.</li></h3><br>
                </ul>
            </div>
        
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
    //if(bulvalue==4)
     if(bulvalue==1)
    {
        window.alert("🚨🚨 !! You Can Open a Quiz only Once  ");
            window.location.href = 'https://webdproj2.000webhostapp.com/webdproj2/AJAY/student/quiz.php';
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
            // document.queryselector(".base-timer__svg").style.margin-top=0px;
            // document.getElementById("mainheading").innerHTML ="<h1 ><b> ------- VIKTOFFFRINA ------- </b></h1>";
            // document.getElementById("mainheading").disabled=true;
            // message("Last 10 seconds , Submit Your Quiz otherwise quiz will show alert");
        }
        if (time == 0) {
           <?php 
           //----------
$update2 = "UPDATE `flag_data2` SET bool_value='1' WHERE number='first' && email='".$_SESSION['user_email']."'  ";
 $query_run = mysqli_query($conn,$update2);
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
            window.location.href = 'https://webdproj2.000webhostapp.com/webdproj2/AJAY/student/quiz.php';
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
   window.location.href = 'https://webdproj2.000webhostapp.com/webdproj2/AJAY/student/quiz.php';
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



//Script for Sound Bar

    const progress = document.querySelector('.progress-done');
    progress.setAttribute('data-done', 100);


    // var dataAttribute = progress.getAttribute('data-done');
    // console.log(dataAttribute);
// 
    // var pdone = document.getElementById("progress-done").


    navigator.mediaDevices.getUserMedia({
        audio: true
        // video: true
    })
        .then(function (stream) {
            const audioContext = new AudioContext();
            const analyser = audioContext.createAnalyser();
            const microphone = audioContext.createMediaStreamSource(stream);
            const scriptProcessor = audioContext.createScriptProcessor(2048, 1, 1);

            analyser.smoothingTimeConstant = 0.8;
            analyser.fftSize = 1024;

            microphone.connect(analyser);
            analyser.connect(scriptProcessor);
            scriptProcessor.connect(audioContext.destination);
            scriptProcessor.onaudioprocess = function () {
                const array = new Uint8Array(analyser.frequencyBinCount);
                analyser.getByteFrequencyData(array);
                const arraySum = array.reduce((a, value) => a + value, 0);
                const average = arraySum / array.length;
                const finalvol = Math.round(average);


                //JUGAAD
                // console.log(Math.round(average));
                console.log(finalvol);
                // document.write(Math.round(average));
                // document.getElementById("volume").innerHTML = 10* finalvol + '%';
                // colorPids(average);
                progress.setAttribute('data-done', 2 * finalvol);
                progress.innerHTML = 2 * finalvol + '%';
                progress.style.width = progress.getAttribute('data-done') + '%';
                progress.style.opacity = 1;
                if(2*finalvol>=220)
                {
                  console.log("inside if");
                //  window.alert("🚨🚨 !! You Can Open a Quiz only Once  ");
                 window.location.href = '../quiz.php';
                }
            };
        })
        .catch(function (err) {
            /* handle the error */
            console.error(err);
        });


    /// Screenshot nahi lene denge 
        //    window.addEventListener('keypress', e => {
        //    window.addEventListener('keydown', e => {


        const keyboard = document.querySelector('.keyboard');
        let keycount = 0;
        window.addEventListener('keyup', e => {
            console.log(e);
            // if(e.ctrlKey && e.keyCode ===65 )
            // {
            //     console.log("Control key is Pressed");
            // }
            if (e.keyCode === 44 || e.keyCode === 45 || e.keyCode === 17) {
                // if (e.keyCode === 	48 ) {
                // alert("Sorry ! you cannot use " + e.key);
                keycount++;
                e.preventDefault();
                console.log(keycount);
                if (keycount == 2) {
                    window.alert("🚨🚨 !! CHEATING You are trying to Capture Screenshots ");
                    window.location.href = '../quiz.php';
                }
            }
        })

     



</script>

</html>
