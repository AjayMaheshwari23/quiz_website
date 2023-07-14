<?php
error_reporting(0);
$conn  = mysqli_connect('localhost','root','','faculty_waala2');
$query = " SELECT * FROM quiz_data2 ORDER BY ID LIMIT 0,1 ";
$data  = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);




$conn2  = mysqli_connect('localhost','root','','flag');
$query2 = " SELECT * FROM flag_data WHERE number='first' ";
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
    <title>Document</title>
</head>
<style>
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
            color: #0e3742;
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
            color: rgb(255, 255, 255);
            text-shadow: 0 0 10px #03bcf4,
                0 0 20px #03bcf4,
                0 0 40px #03bcf4,
                0 0 160px #03bcf4,
                0 0 400px #03bcf4;

        }
    }
</style>

<body>
    <!-- Make Everything sticky position  -->
    <!-- Display some important Instructions-->
    <!-- Time more decorative way -->
    <!-- scrolling issue nahi hona chahiye -->
    <!-- Total count of Questions wagera , like if found switching tabs you will be unable to submit   -->
    <!--  -->

    <div style="display: flex;">

<div>
    
</div>
        
        
        <div>

        <?php 
        $value = 100 ;
        foreach($data as $row){
            $value =  $row['lname'];
        }
        foreach($data as $row){
            echo  $row['fname'];
        }
        echo $value;
         foreach($data2 as $row){
            $bul_value =  $row['bool_value'];
        }
        echo $bul_value;
        // echo $total2;
        ?>

            <!-- <iframe
                src="https://docs.google.com/forms/d/e/1FAIpQLSc7UfFlj7vIFkcP68BM8DNPK0P7OymV-dUdvNWMVT9_tCIvGA/viewform?embedded=true"
                width="640" height="824" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> -->

        </div>

        <div>
            <p id="countdown" style="position: sticky;"></p>
            <h2 id="alert"></h2>
            <!-- <h2 id="alert"><span>HAPPY </span><span>DIWALI</span> </h2> -->
        </div>

    </div>

    <!-- <div id="secondsdisplay" style="color: black;">H</div> -->


</body>
<script>
    
    // var startingminutes = <?php echo json_encode($value); ?>;
    const startingminutes = 0.3;
    let time = startingminutes * 60;
 var bulvalue = <?php echo json_encode($bul_value); ?>;
 console.log(bulvalue);
    if(bulvalue==1)
    {
        window.alert("CHEATING  🚨🚨 !! You have already opened the quiz ");
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
        time--;
        if (time == 15) {
            console.log("15 Seconds left");
            document.getElementById("alert").style.backgroundColor =  "#07252d";  
            document.getElementById("alert").innerHTML ="<span>Last 15 seconds , </span><span>Submit Your Quiz otherwise</span> ";
            // message("Last 10 seconds , Submit Your Quiz otherwise ");
        }
        if (time == 0) {
           <?php 
           //----------
           $update2 = "UPDATE `flag_data` SET bool_value='1' WHERE number='first' ";
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


</script>

</html>